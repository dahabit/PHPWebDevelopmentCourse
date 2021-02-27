<?php
/**
 * ----------------------------------------------------------------------
 *  
 * Copyright (c) 2006-2010 Khaled Al-Shamaa.
 *  
 * http://www.ar-php.org
 *  
 * PHP Version 5 
 *  
 * ----------------------------------------------------------------------
 *  
 * LICENSE
 *
 * This program is open source product; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License (LGPL)
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 *  
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *  
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/lgpl.txt>.
 *  
 * ----------------------------------------------------------------------
 *  
 * Class Name: Arabic Soundex
 *  
 * Filename:   ArSoundex.class.php
 *  
 * Original    Author(s): Khaled Al-Sham'aa <khaled.alshamaa@gmail.com>
 *  
 * Purpose:    Arabic soundex algorithm takes Arabic word as an input
 *             and produces a character string which identifies a set words
 *             that are (roughly) phonetically alike.
 *              
 * ----------------------------------------------------------------------
 *  
 * Arabic Soundex
 *
 * PHP class for Arabic soundex algorithm takes Arabic word as an input and
 * produces a character string which identifies a set words of those are
 * (roughly) phonetically alike.
 * 
 * Terms that are often misspelled can be a problem for database designers. Names, 
 * for example, are variable length, can have strange spellings, and they are not 
 * unique. Words can be misspelled or have multiple spellings, especially across 
 * different cultures or national sources.
 * 
 * To solve this problem, we need phonetic algorithms which can find similar 
 * sounding terms and names. Just such a family of algorithms exists and is called 
 * SoundExes, after the first patented version.
 * 
 * A Soundex search algorithm takes a word, such as a person's name, as input and 
 * produces a character string which identifies a set of words that are (roughly) 
 * phonetically alike. It is very handy for searching large databases when the user 
 * has incomplete data.
 * 
 * The original Soundex algorithm was patented by Margaret O'Dell and Robert 
 * C. Russell in 1918. The method is based on the six phonetic classifications of 
 * human speech sounds (bilabial, labiodental, dental, alveolar, velar, and 
 * glottal), which in turn are based on where you put your lips and tongue to make 
 * the sounds.
 * 
 * Soundex function that is available in PHP, but it has been limited to English and 
 * other Latin-based languages. This function described in PHP manual as the 
 * following: Soundex keys have the property that words pronounced similarly produce 
 * the same soundex key, and can thus be used to simplify searches in databases 
 * where you know the pronunciation but not the spelling. This soundex function 
 * returns string of 4 characters long, starting with a letter.
 * 
 * We develop this class as an Arabic counterpart to English Soundex, it handle an 
 * Arabic input string formatted in windows-1256 character set to return Soundex key 
 * equivalent to normal soundex function in PHP even for English and other 
 * Latin-based languages because the original algorithm focus on phonetically 
 * characters alike not the meaning of the word itself.
 * 
 * Example:
 * <code>
 *   include('./Arabic.php');
 *   $obj = new Arabic('ArSoundex');
 *     
 *   $soundex = $obj->soundex($name);
 * </code>   
 *    
 * @category  I18N 
 * @package   Arabic
 * @author    Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
 * @copyright 2006-2010 Khaled Al-Shamaa
 *    
 * @license   LGPL <http://www.gnu.org/licenses/lgpl.txt>
 * @link      http://www.ar-php.org 
 */

// New in PHP V5.3: Namespaces
// namespace I18N/Arabic/ArSoundex;

/**
 * This PHP class implement Arabic soundex algorithm
 *  
 * @category  I18N 
 * @package   Arabic
 * @author    Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
 * @copyright 2006-2010 Khaled Al-Shamaa
 *    
 * @license   LGPL <http://www.gnu.org/licenses/lgpl.txt>
 * @link      http://www.ar-php.org 
 */ 
class ArSoundex
{
    protected $asoundexCode    = array();
    protected $aphonixCode     = array();
    protected $transliteration = array();
    protected $map             = array();
    
    protected $len  = 4;
    protected $lang = 'en';
    protected $code = 'soundex';

    /**
     * "soundex" method output charset
     * @var String     
     */         
    public $soundexOutput = 'windows-1256';

    /**
     * "soundex" method input charset
     * @var String     
     */         
    public $soundexInput = 'windows-1256';

    /**
     * Name of the textual "soundex" method parameters 
     * @var Array     
     */         
    public $soundexVars = array('word');
    
    /**
     * Loads initialize values
     */         
    public function __construct()
    {
        $xml = simplexml_load_file(dirname(__FILE__).'/data/ArSoundex.xml');
        
        foreach ($xml->asoundexCode->item as $item) {
            $index = $item['id'];
            $value = iconv("utf-8", "cp1256//TRANSLIT", (string)$item);

            $this->asoundexCode["$index"] = $value;
        } 
        
        foreach ($xml->aphonixCode->item as $item) {
            $index = $item['id'];
            $value = iconv("utf-8", "cp1256//TRANSLIT", (string)$item);
            
            $this->aphonixCode["$index"] = $value;
        } 
        
        foreach ($xml->transliteration->item as $item) {
            $index = iconv("utf-8", "cp1256//TRANSLIT", $item['id']);
            
            $this->transliteration["$index"] = (string)$item;
        } 

        $this->map = $this->asoundexCode;
    }
    
    /**
     * Set the length of soundex key (default value is 4)
     *      
     * @param integer $integer Soundex key length
     *      
     * @return object $this to build a fluent interface
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function setLen($integer)
    {
        $this->len = (int)$integer;
        
        return $this;
    }
    
    /**
     * Set the language of the soundex key (default value is "en")
     *      
     * @param string $str Soundex key language [ar|en]
     *      
     * @return object $this to build a fluent interface
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function setLang($str)
    {
        $str = strtolower($str);
        
        if ($str == 'ar' || $str == 'en') {
            $this->lang = $str;
        }
        
        return $this;
    }
    
    /**
     * Set the mapping code of the soundex key (default value is "soundex")
     *      
     * @param string $str Soundex key mapping code [soundex|phonix]
     *      
     * @return object $this to build a fluent interface
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function setCode($str)
    {
        $str = strtolower($str);
        
        if ($str == 'soundex' || $str == 'phonix') {
            $this->code = $str;
            if ($str == 'phonix') {
                $this->map = $this->aphonixCode;
            } else {
                $this->map = $this->asoundexCode;
            }
        }
        
        return $this;
    }
    
    /**
     * Get the soundex key length used now
     *      
     * @return integer return current setting for soundex key length
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function getLen()
    {
        return $this->len;
    }
    
    /**
     * Get the soundex key language used now
     *      
     * @return string return current setting for soundex key language
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function getLang()
    {
        return $this->lang;
    }
    
    /**
     * Get the soundex key calculation method used now
     *      
     * @return string return current setting for soundex key calculation method
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * Methode to get soundex/phonix numric code for given word
     *      
     * @param string $word The word that we want to encode it
     *      
     * @return string The calculated soundex/phonix numeric code
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    protected function mapCode($word)
    {
        $encodedWord = $word;
        
        foreach ($this->map as $codeID => $condition) {
            $encodedWord = preg_replace($condition, $codeID, $encodedWord);
        }
        $encodedWord = preg_replace('/\D/', '0', $encodedWord);
        
        return $encodedWord;
    }
    
    /**
     * Remove any characters replicates
     *      
     * @param string $word Arabic word you want to check if it is feminine
     *      
     * @return string Same word without any duplicate chracters
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    protected function trimRep($word)
    {
        $lastChar  = null;
        $cleanWord = null;
        $max       = strlen($word);
        
        $i = 0;
        while ($i < $max) {
            if ($word[$i] != $lastChar) {
                $cleanWord .= $word[$i];
            }
            $lastChar = $word[$i];
            $i++;
        }
        
        return $cleanWord;
    }
    
    /**
     * Arabic soundex algorithm takes Arabic word as an input and produces a 
     * character string which identifies a set words that are (roughly) 
     * phonetically alike.
     *      
     * @param string $word Arabic word you want to calculate its soundex
     *                    
     * @return string Soundex value for a given Arabic word
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public function soundex($word)
    {
        $soundex = $word[0];
        $rest    = substr($word, 1);
        
        if ($this->lang == 'en') {
            $soundex = $this->transliteration[$soundex];
        }
        
        $encodedRest      = $this->mapCode($rest);
        $cleanEncodedRest = $this->trimRep($encodedRest);
        
        $soundex .= $cleanEncodedRest;
        
        $soundex = str_replace('0', '', $soundex);
        
        $totalLen = strlen($soundex);
        if ($totalLen > $this->len) {
            $soundex = substr($soundex, 0, $this->len);
        } else {
            $soundex .= str_repeat('0', $this->len - $totalLen);
        }
        
        return $soundex;
    }
}

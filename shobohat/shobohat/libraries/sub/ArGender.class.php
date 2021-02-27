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
 * Class Name: Arabic Gender Guesser
 *  
 * Filename:   ArGender.class.php
 *  
 * Original    Author(s): Khaled Al-Sham'aa <khaled.alshamaa@gmail.com>
 *  
 * Purpose:    This class attempts to guess the gender of Arabic names
 *  
 * ----------------------------------------------------------------------
 *
 * Arabic Gender Guesser
 *
 * This PHP class attempts to guess the gender of Arabic names.
 * 
 * Arabic nouns are either masculine or feminine. Usually when referring to a male, 
 * a masculine noun is usually used and when referring to a female, a feminine noun 
 * is used. In most cases the feminine noun is formed by adding a special characters 
 * to the end of the masculine noun. Its not just nouns referring to people that 
 * have gender. Inanimate objects (doors, houses, cars, etc.) is either masculine or 
 * feminine. Whether an inanimate noun is masculine or feminine is mostly 
 * arbitrary.      
 * 
 * Example:
 * <code>
 *   include('./Arabic.php');
 *   $obj = new Arabic('ArGender');
 *      
 *   echo "$name ";
 * 
 *   if ($obj->isFemale($name) == true) { 
 *      echo '(Female)';
 *   }else{
 *      echo '(Male)';
 *   }    
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
// namespace I18N/Arabic/ArGender;

/**
 * This PHP class attempts to guess the gender of Arabic names
 *  
 * @category  I18N 
 * @package   Arabic
 * @author    Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
 * @copyright 2006-2010 Khaled Al-Shamaa
 *    
 * @license   LGPL <http://www.gnu.org/licenses/lgpl.txt>
 * @link      http://www.ar-php.org 
 */ 
class ArGender
{
    /**
     * "isFemale" method input charset
     * @var String     
     */         
    public $isFemaleInput = 'windows-1256';

    /**
     * Name of the textual "isFemale" method parameters 
     * @var Array     
     */         
    public $isFemaleVars = array('str');

    /**
     * Loads initialize values
     */         
    public function __construct()
    {
    }

    /**
     * Check if Arabic word is feminine
     *          
     * @param string $str Arabic word you would like to check if it is 
     *                    feminine
     *                    
     * @return boolean Return true if input Arabic word is feminine
     * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
     */
    public static function isFemale($str)
    {
        $female = false;
        
        $words = explode(' ', $str);
        $str   = $words[0];
        
        $last = strlen($str) - 1;
        
        if ($str[$last] == 'É' || $str[$last] == 'å' || $str[$last] == 'ì' || 
            $str[$last] == 'Ç' || ($str[$last] == 'Á' && $str[$last-1] == 'Ç')) {

            $female = true;
        }
        
        return $female;
    }
}

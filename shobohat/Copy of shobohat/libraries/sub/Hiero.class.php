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
 * Class Name: Translate English word into Hieroglyphics
 *  
 * Filename:   Hiero.class.php
 *  
 * Original    Author(s): Khaled Al-Sham'aa <khaled.alshamaa@gmail.com>
 *  
 * Purpose:    Translate English word into Hieroglyphics
 *              
 * ----------------------------------------------------------------------
 *  
 * Translate English word into Hieroglyphics
 *
 * Royality is made affordable, and within your reach. Now you can have The 
 * Royal Cartouche custome made in Egypt in 18 Kt. Gold with your name 
 * translated and inscribed in Hieroglyphic.
 * 
 * Originally, the Cartouche was worn only by the Pharaohs or Kings of Egypt. 
 * The Pharaoh was considered a living God and his Cartouche was his insignia. 
 * The "Magical Oval" in which the Pharaoh's first name was written was intended 
 * to protect him from evil spirits both while he lived and in the afterworld 
 * when entombed.
 * 
 * Over the past 5000 years the Cartouche has become a universal symbol of long 
 * life, good luck and protection from any evil.
 * 
 * Now you can acquire this ancient pendent handmade in Egypt from pure 18 Karat 
 * Egyptian gold with your name spelled out in the same way as King Tut, Ramses, 
 * Queen Nefertiti did.  
 *
 * Example:
 * <code>
 *     include('./Arabic.php');
 *     $obj = new Arabic('Hiero');
 * 
 *     $word = $_GET['w'];
 *     $im   = $obj->str2hiero($word);
 *      
 *     header ("Content-type: image/jpeg");
 *     imagejpeg($im, '', 80);
 *     ImageDestroy($im);
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
// namespace I18N/Arabic/Hiero;

/**
 * Translate English word into Hieroglyphics
 *  
 * @category  I18N 
 * @package   Arabic
 * @author    Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
 * @copyright 2006-2010 Khaled Al-Shamaa
 *    
 * @license   LGPL <http://www.gnu.org/licenses/lgpl.txt>
 * @link      http://www.ar-php.org 
 */ 
class Hiero
{
    /**
     * "str2hiero" method input charset
     * @var String     
     */         
    public $str2hieroInput = 'windows-1256';

    /**
     * Name of the textual "str2hiero" method parameters 
     * @var Array     
     */         
    public $str2hieroVars = array('word');
    
    /**
     * Loads initialize values
     */         
    public function __construct ()
    {
    }
    
    /**
    * Translate Arabic or English word into Hieroglyphics
    *      
    * @param string  $word  Arabic or English word
    * @param string  $dir   Writing direction [ltr, rtl, ttd, dtt] (default ltr)
    * @param string  $lang  Input language [en, ar] (default en)
    * @param integer $red   Value of background red component (default is null)
    * @param integer $green Value of background green component (default is null)
    * @param integer $blue  Value of background blue component (default is null)
    *      
    * @return resource Image resource identifier
    * @author Khaled Al-Shamaa <khaled.alshamaa@gmail.com>
    */
    public function str2hiero($word, $dir = 'ltr', $lang = 'en', 
                                    $red = null, $green = null, $blue = null)
    {
        if ($dir == 'rtl' || $dir == 'btt') {
            $word = strrev($word);
        }

        $arabic = array(
            'Ç' => 'alef',
            'È' => 'beh',
            'Ê' => 'teh',
            'Ë' => 'theh',
            'Ì' => 'jeem',
            'Í' => 'hah',
            'Î' => 'khah',
            'Ï' => 'dal',
            'Ð' => 'thal',
            'Ñ' => 'reh',
            'Ò' => 'zain',
            'Ó' => 'seen',
            'Ô' => 'sheen',
            'Õ' => 'sad',
            'Ö' => 'dad',
            'Ø' => 'tah',
            'Ù' => 'zah',
            'Ú' => 'ain',
            'Û' => 'ghain',
            'Ý' => 'feh',
            'Þ' => 'qaf',
            'ß' => 'kaf',
            'á' => 'lam',
            'ã' => 'meem',
            'ä' => 'noon',
            'å' => 'heh',
            'æ' => 'waw',
            'í' => 'yeh'
        );
                
        if ($lang != 'ar') {
            $word = strtolower($word);
        } else {
            $word = str_replace('É', 'Ê', $word);
            $alef = array('Ã', 'Å', 'Â', 'Á', 'Æ', 'Ä', 'ì');
            $word = str_replace($alef, 'Ç', $word);
        }
        
        $chars = preg_split('//', $word, -1, PREG_SPLIT_NO_EMPTY);
        
        $max_w = 0;
        $max_h = 0;
        
        foreach ($chars as $char) {
            if ($lang == 'ar') {
                $char = $arabic[$char];
            }
            if (file_exists(dirname(__FILE__)."/hiero/$char.gif")) {
                list($width, $height) = getimagesize(dirname(__FILE__)."/hiero/$char.gif");
            } else {
                $width  = 75;
                $height = 100;
            }
            
            if ($dir == 'ltr' || $dir == 'rtl') {
                $max_w += $width;
                if ($height > $max_h) { 
                    $max_h = $height; 
                }
            } else {
                $max_h += $height;
                if ($width > $max_w) { 
                    $max_w = $width; 
                }
            }
        }
        
        $im = imagecreatetruecolor($max_w, $max_h);
        
        if ($red == null) {
            $bck = imagecolorallocate($im, 0, 0, 255);
            imagefill($im, 0, 0, $bck);

            // Make the background transparent
            imagecolortransparent($im, $bck);
        } else {
            $bck = imagecolorallocate($im, $red, $green, $blue);
            imagefill($im, 0, 0, $bck);
        }

        $current_x = 0;
        
        foreach ($chars as $char) {
            if ($lang == 'ar') {
                $char = $arabic[$char];
            }
            $filename = dirname(__FILE__)."/hiero/$char.gif";
            
            if ($dir == 'ltr' || $dir == 'rtl') {
                if (file_exists($filename)) {
                    list($width, $height) = getimagesize($filename);

                    $image = imagecreatefromgif($filename);
                    imagecopy($im, $image, $current_x, $max_h - $height, 
                               0, 0, $width, $height);
                } else {
                    $width = 75;
                }
    
                $current_x += $width;
            } else {
                if (file_exists($filename)) {
                    list($width, $height) = getimagesize($filename);

                    $image = imagecreatefromgif($filename);
                    imagecopy($im, $image, 0, $current_y, 
                               0, 0, $width, $height);
                } else {
                    $height = 100;
                }
    
                $current_y += $height;
            }
        }
        
        return $im;
    }
}
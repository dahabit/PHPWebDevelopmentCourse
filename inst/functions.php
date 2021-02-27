<?php


function html2text($html){
$html = str_replace( "&#032;"       , " "             , $html );
    	$html = str_replace( "&"            , "&amp;"         , $html );
    	$html = str_replace( "<!--"         , "&#60;&#33;--"  , $html );
    	$html = str_replace( "-->"          , "--&#62;"       , $html );
    	$html = preg_replace( "/<script/i"  , "&#60;script"   , $html );
    	$html = str_replace( ">"            , "&gt;"          , $html );
    	$html = str_replace( "<"            , "&lt;"          , $html );
    	$html = str_replace( "\""           , "&quot;"        , $html );
    	$html = preg_replace( "/\|/"        , "&#124;"        , $html );
    	$html = preg_replace( "/\n/"        , "<br>"          , $html ); // Convert literal newlines
    	$html = preg_replace( "/\\\$/"      , "&#036;"        , $html );
    	$html = preg_replace( "/\r/"        , ""              , $html ); // Remove literal carriage returns
    	$html = str_replace( "!"            , "&#33;"         , $html );
    	$html = str_replace( "'"            , "&#39;"         , $html ); // IMPORTANT: It helps to increase sql query safety.
    	$html = stripslashes($html);                                     // Swop PHP added backslashes
    	$html = preg_replace( "/\\\/"       , "&#092;"        , $html ); // Swop user inputted backslashes


return $html;
}

?>
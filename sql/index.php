<?php

define("VERSION", "1.1");
define("MYSQLUSER", "root");
define("MYSQLPASS", "");

# list of databases to show
$db_list = array (
    'album',
    'test',
    'world'
);


_init();
main();
page();

function do_sql( $query )
{
    global $SID;

    // do some cleanup and input checking
    $query = ltrim($query);     // trim leading spaces
    $query = rtrim($query);     // trim trailing spaces
    $qlen = strlen($query);

    $verb = current(explode(' ', $query, 2));
    $select_flag = FALSE;
    foreach ( array( 'SELECT', 'DESCRIBE', 'DESC', 'SHOW' ) as $sl ) {
        if( strtoupper($verb) == $sl ) $select_flag = TRUE;
    }

    // multiple statements?
    $multistmt_flag = FALSE;
    if( ( $i = strpos($query, ';') ) and ++$i < $qlen) {
        $multistmt_flag = TRUE;
        $stmt_array = explode(';', $query);
        // count the statements
        $stmt_count = 0;
        foreach ( $stmt_array as $s ) {
            $s = ltrim($s); $s = rtrim($s);
            if(strlen($s)) $stmt_count++;
        }
    }

    if( $select_flag and $multistmt_flag ) {   // disallow multiple select statements
        error("Multiple SELECT statements are not supported (';' at $i)");
    }

    $SID['query_start_time'] = microtime(TRUE);
    $dbh = $SID['dbh'];
    $sth = $dbh->prepare($query);
    if($sth) $sth->execute();
    $err = $sth->errorInfo();
    if($err[0] != 0) error( $err[2] );

    if($select_flag) {
        if($sth) select_results($sth);
        else message('Empty result');
    } else {
        $elapsed_time = microtime(TRUE) - $SID['query_start_time'];
        if($multistmt_flag)
            message("$stmt_count statements executed.");
        else
            message("Statement affected " . $sth->rowCount() . " row(s) in " . number_format($elapsed_time * 1000, 2) . " milliseconds.");
    }
}

function select_results( &$sth )
{
    global $SID;
    // $a is an accumulator for the output string
    $a = "\n";
    $a .= "<table class=\"results\">\n";

    // get the first row
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    if( ! $row ) {
        message("The query returned no data.");
        return;
    }

    $col_names = array_keys($row);

    // head of table
    $a .= "<tr>";   // table row for headings
    foreach( $col_names as $name ) {
        $a .= "<td class=\"column_head\">$name</td>\n";
    }

    $row_count = 0;
    do {
        $a .= result_row($row);
        $row_count++;
    } while ( $row = $sth->fetch(PDO::FETCH_ASSOC) );

    $a .= "</tr>\n"; 
    $a .= "</table>\n"; 

    $elapsed_time = microtime(TRUE) - $SID['query_start_time'];
    message( "Query returned " . number_format($row_count) . " rows in " . number_format($elapsed_time * 1000, 2) . " milliseconds.");

    content($a);
}

function result_row( &$row )
{
    global $SID;
    $a = "<tr>\n";
    foreach( $row as $v ) {
        // show NULL values in red
        if( ! isset($v) ) $v = "<span class=\"red\">NULL</span>\n";
        else $v = strtr( $v, $SID['xlat'] );

        /****** uncomment to discover missing entities
        $v = preg_replace_callback(
            '/[^\x00-\x7f]/',
            create_function( '$c', ' return "&#" . ord($c[0]) . ";"; '),
            $v
        );
        *********************************************/

        $a .= "<td class=\"cell_value\">" . $v . "</td>\n";
    }
    $a .= "</tr>\n";
    return $a;
}

function database_select_list( $database )
{
    global $SID;
    global $db_list;

    if(isset($SID['dbh'])) $dbh = $SID['dbh'];
    else return;

    $sth = $dbh->query("SHOW DATABASES");
    $err = $dbh->errorInfo();
    if($err[0] != 0) {
        error_message( $err[2] );
        return;
    }
    $a = "<option value=\"--NONE--\">-- Select Database --</option>\n";

    while( $row = $sth->fetch() ) {
        $v = $row['Database'];
        foreach( $db_list as $s ) {
            if($v == $s) {
                $selected = ($v == $database) ? ' selected' : '';
                $a .= "<option$selected>$v</option>\n";
            }
        }
    }
    return $a;
}

//

function main()
{
    if(isset($_REQUEST['a'])) jump($_REQUEST["a"]);
}
function _init( )
{
    global $SID;

    // initialize display vars
    foreach ( array( 'MESSAGES', 'ERRORS', 'CONTENT', 'SQLfield' ) as $v )
        $SID[$v] = "";

    // connect to the database (persistent)
    $database = (isset($_REQUEST['select_database'])) ? $_REQUEST['select_database'] : '';
    if($database == '--NONE--') $database = '';
    try {
        $SID['dbh'] = new PDO('mysql:host=localhost;dbname=' . $database, MYSQLUSER, MYSQLPASS,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_PERSISTENT => true ,));
    } catch (PDOException $e) {
        error($e->getMessage());
    }

    $SID['TITLE'] = "SQL Training";
    $SID['SELF'] = $_SERVER["SCRIPT_NAME"];
    $SID['DATABASE_SELECT_LIST'] = database_select_list($database);

    // fixup missing common characters from the PHP entity translation table
    $SID['xlat'] = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES);
    $SID['xlat'][chr(130)] = '&sbquo;';     // Single Low-9 Quotation Mark
    $SID['xlat'][chr(131)] = '&fnof;';      // Latin Small Letter F With Hook
    $SID['xlat'][chr(132)] = '&bdquo;';     // Double Low-9 Quotation Mark
    $SID['xlat'][chr(133)] = '&hellip;';    // Horizontal Ellipsis
    $SID['xlat'][chr(136)] = '&circ;';      // Modifier Letter Circumflex Accent
    $SID['xlat'][chr(138)] = '&Scaron;';    // Latin Capital Letter S With Caron
    $SID['xlat'][chr(139)] = '&lsaquo;';    // Single Left-Pointing Angle Quotation Mark
    $SID['xlat'][chr(140)] = '&OElig;';     // Latin Capital Ligature OE
    $SID['xlat'][chr(145)] = '&lsquo;';     // Left Single Quotation Mark
    $SID['xlat'][chr(146)] = '&rsquo;';     // Right Single Quotation Mark
    $SID['xlat'][chr(147)] = '&ldquo;';     // Left Double Quotation Mark
    $SID['xlat'][chr(148)] = '&rdquo;';     // Right Double Quotation Mark
    $SID['xlat'][chr(149)] = '&bull;';      // Bullet
    $SID['xlat'][chr(150)] = '&ndash;';     // En Dash
    $SID['xlat'][chr(151)] = '&mdash;';     // Em Dash
    $SID['xlat'][chr(152)] = '&tilde;';     // Small Tilde
    $SID['xlat'][chr(154)] = '&scaron;';    // Latin Small Letter S With Caron
    $SID['xlat'][chr(155)] = '&rsaquo;';    // Single Right-Pointing Angle Quotation Mark
    $SID['xlat'][chr(156)] = '&oelig;';     // Latin Small Ligature OE
    $SID['xlat'][chr(159)] = '&Yuml;';      // Latin Capital Letter Y With Diaeresis

    // loose "index.php" if nec (regexes are fugly in php. Feh.)
    $SID["SELF"] = preg_replace('/([\\/\\\])index\\.php$/i', '$1', $SID["SELF"]); 
}

function page( )
{
    global $SID;
    set_vars();

    require_once "assets/header.php";
    require_once "assets/main.php";
    require_once "assets/footer.php";
}

function jump( $action )
{
    switch($action) {
        case "go":
            do_sql(stripslashes($_REQUEST['SQLfield']));
            break;
    }
    return;
}

function set_vars( )
{
    global $SID;
    if(isset($SID["_MSG_ARRAY"])) foreach ( $SID["_MSG_ARRAY"] as $m ) $SID["MESSAGES"] .= $m;
    if(isset($SID["_ERR_ARRAY"])) foreach ( $SID["_ERR_ARRAY"] as $m ) $SID["ERRORS"] .= $m;
    if(isset($SID["_CON_ARRAY"])) foreach ( $SID["_CON_ARRAY"] as $m ) $SID["CONTENT"] .= $m;
    if(isset($_REQUEST['SQLfield'])) $SID['SQLfield'] = htmlspecialchars(stripslashes($_REQUEST['SQLfield']));
}

function content( $s )
{
    global $SID;
    $SID["_CON_ARRAY"][] = "\n<div class=\"content\">$s</div>\n";
}

function message( $s )
{
    global $SID;
    $SID["_MSG_ARRAY"][] = "<p class=\"message\">$s</p>\n";
}

function error_message( $s )
{
    global $SID;
    $SID["_ERR_ARRAY"][] = "<p class=\"error_message\">$s</p>\n";
}

function error( $s )
{
    error_message($s);
    page();
}

?>

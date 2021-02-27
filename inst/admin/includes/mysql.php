<?php
class MySQL {

    var $host;
    var $dbUser;
    var $dbPass;
    var $dbName;
    var $dbConn;
    var $connectError;

    function MySQL ($host,$dbUser,$dbPass,$dbName) {
        $this->host=$host;
        $this->dbUser=$dbUser;
        $this->dbPass=$dbPass;
        $this->dbName=$dbName;
        $this->connectToDb();
    }
    function connectToDb () {
        // Make connection to MySQL server
        if (!$this->dbConn = @mysql_connect($this->host,
                                      $this->dbUser,
                                      $this->dbPass)) {
            trigger_error('Could not connect to server');
            $this->connectError=true;
        // Select database
        } else if ( !@mysql_select_db($this->dbName,$this->dbConn) ) {
            trigger_error('Could not select database');
            $this->connectError=true;
        }
    }

    /**
    * Checks for MySQL errors
    * @return boolean
    * @access public
    */
    function isError () {
        if ( $this->connectError )
            return true;
        $error=mysql_error ($this->dbConn);
        if ( empty ($error) )
            return false;
        else
            return true;
    }

    /**
    * Returns an instance of MySQLResult to fetch rows with
    * @param $sql string the database query to run
    * @return MySQLResult
    * @access public
    */
    function & query($sql) {
        if (!$queryResource=mysql_query($sql,$this->dbConn))
            trigger_error ('Query failed: '.mysql_error($this->dbConn).
                           ' SQL: '.$sql);
        return new MySQLResult($this,$queryResource);
    }
}

/**
* MySQLResult Data Fetching Class
* @access public
* @package SPLIB
*/
class MySQLResult {

    var $mysql;
    var $query;
    function MySQLResult(& $mysql,$query) {
        $this->mysql=& $mysql;
        $this->query=$query;
    }

    function fetch () {
        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) ) {
            return $row;
        } else if ( $this->size() > 0 ) {
            mysql_data_seek($this->query,0);
            return false;
        } else {
            return false;
        }
    }

    /**
    * Returns the number of rows selected
    * @return int
    * @access public
    */
    function size () {
        return mysql_num_rows($this->query);
    }

    /**
    * Returns the ID of the last row inserted
    * @return int
    * @access public
    */
    function insertID () {
        return mysql_insert_id($this->mysql->dbConn);
    }

    /**
    * Checks for MySQL errors
    * @return boolean
    * @access public
    */
    function isError () {
        return $this->mysql->isError();
    }
}


?>

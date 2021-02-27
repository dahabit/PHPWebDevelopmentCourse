<?php
class sajax {
    var $version        = '0.10-oo';
   
    var $debug_mode     = 0;
   
    ///var $export_list    = array();
    var $export_list    = array();
   
    var $request_type   = 'GET';
    var $remote_uri     = '';
   
    function sajax() {
        $this->remote_uri = $_SERVER['REQUEST_URI'];
        //$this->export_list = array();
    }
   
    function handleClientRequest() {
        $mode = '';
       
        if( !empty( $_GET['rs'] ) ) {
            $mode = 'get';
        }
       
        if( !empty( $_POST['rs'] ) ) {
            $mode = 'post';
        }
       
        if( empty( $mode ) ) {
            return;
        }   
       
        if( $mode == 'get' ) {
            // Bust cache in the head
         header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );    // Date in the past
         header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
         
         // always modified
         header( "Cache-Control: no-cache, must-revalidate" );  // HTTP/1.1
         header( "Pragma: no-cache" );                          // HTTP/1.0
         
         $func_name = $_GET['rs'];
         if( !empty( $_GET['rsargs'] ) ) {
             $args = $_GET['rsargs'];
         } else {
             $args = array();
         }
        } else {
            $func_name = $_POST['rs'];
            if( !empty( $_POST['rsargs'] ) ) {
                $args = $_POST['rsargs'];
            } else {
                $args = array();
            }
        }
       
        if( !in_array( $func_name, $this->export_list ) ) {
            echo "-: {$func_name} not callable";
        } else {
            echo "+:";
            $result = call_user_func_array( $func_name, $args );
            echo $result;
        }
        exit;
    }
   
    function getCommonJS() {   
      $t = strtoupper( $this->request_type );
      if( ( $t != 'GET' ) && ( $t != 'POST' ) ) {
         return "// Invalid type: {$t}.. \n\n";
      }
      
      ob_start();
      ?>
      
      // remote scripting library
      // (c) copyright 2005 modernmethod, inc
      var sajax_debug_mode = <?php echo ( $this->debug_mode ) ? "true" : "false"; ?>;
      var sajax_request_type = "<?php echo $t; ?>";
      
      function sajax_debug(text) {
         if (sajax_debug_mode)
            alert("RSD: " + text)
      }
       function sajax_init_object() {
          sajax_debug("sajax_init_object() called..")
          
          var A;
         try {
            A=new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               A=new ActiveXObject("Microsoft.XMLHTTP");
            } catch (oc) {
               A=null;
            }
         }
         if(!A && typeof XMLHttpRequest != "undefined")
            A = new XMLHttpRequest();
         if (!A)
            sajax_debug("Could not create connection object.");
         return A;
      }
      function sajax_do_call(func_name, args) {
         var i, x, n;
         var uri;
         var post_data;
         
        uri = "<?php
   if (!$this->remote_uri) {
      $this->remote_uri = $_SERVER['PHP_SELF'];
   }
   echo $this->remote_uri;
?>";

         if (sajax_request_type == "GET") {
            if (uri.indexOf("?") == -1)
               uri = uri + "?rs=" + escape(func_name);
            else
               uri = uri + "&rs=" + escape(func_name);
            for (i = 0; i < args.length-1; i++)
               uri = uri + "&rsargs[]=" + escape(args[i]);
            uri = uri + "&rsrnd=" + new Date().getTime();
            post_data = null;
         } else {
            post_data = "rs=" + escape(func_name);
            for (i = 0; i < args.length-1; i++)
               post_data = post_data + "&rsargs[]=" + escape(args[i]);
         }
         
         x = sajax_init_object();
         x.open(sajax_request_type, uri, true);
         if (sajax_request_type == "POST") {
            x.setRequestHeader("Method", "POST " + uri + " HTTP/1.1");
            x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         }
         x.onreadystatechange = function() {
            if (x.readyState != 4)
               return;
            sajax_debug("received " + x.responseText);
            
            var status;
            var data;
            status = x.responseText.charAt(0);
            data = x.responseText.substring(2);
            if (status == "-")
               alert("Error: " + data);
            else 
               args[args.length-1](data);
         }
         x.send(post_data);
         sajax_debug(func_name + " uri = " + uri + "/post = " + post_data);
         sajax_debug(func_name + " waiting..");
         delete x;
      }
      
      <?php
      $html = ob_get_contents();
      ob_end_clean();
      return $html;
   }
   
   function showCommonJS() {
       echo $this->getCommonJS();
   }
   
   function esc( $val ) {
       return str_replace( '"', '\\\\"', $val );
   }
   
   function getOneStub( $func_name ) {
       ob_start();
       ?>   
      // wrapper for <?php echo $func_name; ?>
      
      function x_<?php echo $func_name; ?>() {
         sajax_do_call("<?php echo $func_name; ?>",
            x_<?php echo $func_name; ?>.arguments);
      }
      
      <?php
      $html = ob_get_contents();
      ob_end_clean();
      return $html;
   }
   
   function showOneStub( $func_name ) {
       echo $this->getOneStub( $func_name );
   }
   
   function export() {
       $n = func_num_args();
       for( $i = 0; $i < $n; $i++ ) {
           $this->export_list[] = func_get_arg( $i );
       }
   }
   
   function getJavascript() {
       $html = "";
      
       if( !$GLOBALS['sajax_js_has_been_shown'] ) {
           $html .= $this->getCommonJS();
           $GLOBALS['sajax_js_has_been_shown'] = 1;
       }
      
       foreach( $this->export_list as $func ) {
           $html .= $this->getOneStub( $func );
       }
      
       return $html;
   }
   
   function showJavascript() {
       echo $this->getJavascript();
   }
}   
?> 
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	function check_session($actual){
	    if (!isset($_SESSION['idusuario'])) 
	    	header("location:principal.php");
		switch ($actual) {
			case 0:
	    		if($_SESSION['idusuario']>=1)     
	        		header("location:principal.php");
		}
 	}
?>
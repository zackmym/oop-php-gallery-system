<?php require_once("includes/admin_header.php"); ?>	

<?php
 $session->logout(); 
 redirect_to("login.php");
 ?>
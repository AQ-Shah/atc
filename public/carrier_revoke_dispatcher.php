<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "carrier_revoke_dispatcher";
	
    confirm_access($current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/carrier_revoke_dispatcher_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update the location.";
        redirect_to("home");
    }
?>
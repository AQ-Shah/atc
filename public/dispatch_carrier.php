<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "dispatch_carrier";
	
    confirm_access($current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/carrier_dispatch_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to dispatch carrier.";
        redirect_to("list_carriers");
    }
?>
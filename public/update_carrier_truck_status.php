<?php 
     require_once("../includes/public_require.php"); 
    $current_page = "update_carrier_truck_status";
	
    confirm_access($current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/carrier_truck_status_update_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update the status.";
        redirect_to("home");
    }
?>
<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "update_truck_location";
	
    confirm_access($current_page);

    if (isset($_POST['submit'])) {

    include("../includes/api/truck_location_update_query.php"); 
      
    } else {
        $_SESSION["message"] = "Please use proper form to update the location.";
        redirect_to("home");
    }
?>
<?php
require_once("../includes/public_require.php");
$current_page = "carrier_truck_edit_note";

confirm_access($current_page);

if (isset($_POST['submit'])) {

    include("../includes/api/carrier_truck_note_edit_query.php");

} else {
    $_SESSION["message"] = "Please use proper form to update the location.";
    redirect_to("home");
}
?>
<?php 
  
   //fields which are required
    if (isset($_POST['carrier-id-for-add-truck'])) {$carrier_id = mysql_prep($_POST["carrier-id-for-add-truck"]);} 
    if (isset($_POST['carrier-id-for-truck-to-be-edited'])) {$cid_truck_edit = mysql_prep($_POST["carrier-id-for-truck-to-be-edited"]);} 
    if (isset($_POST['truck_type'])) {$truck_type = mysql_prep($_POST["truck_type"]);} 
    if (isset($_POST['d_name'])) {$d_name = mysql_prep($_POST["d_name"]);} 
    if (isset($_POST['d_number'])) {$d_number = mysql_prep($_POST["d_number"]);} 

    //fields which are optionals
    if (isset($_POST['t_length'])) {$t_length = mysql_prep($_POST["t_length"]);} else {$t_length = null;}
    if (isset($_POST['t_weight'])) {$t_weight = mysql_prep($_POST["t_weight"]);} else {$t_weight = null;}
    if (isset($_POST['truck_no'])) {$truck_no = mysql_prep($_POST["truck_no"]);} else {$truck_no = null;}
    if (isset($_POST['trailer_no'])) {$trailer_no = mysql_prep($_POST["trailer_no"]);}else {$trailer_no = null;}
    if (isset($_POST['vin_no'])) {$vin_no = mysql_prep($_POST["vin_no"]);}else {$vin_no = null;}
    if (isset($_POST['note'])) {$note = mysql_prep($_POST["note"]);} else {$note = null;}

   // Sanitize inspection checkboxes
    $hazmat = isset($_POST['hazmat']) ? 1 : 0;
    $twic = isset($_POST['twic']) ? 1 : 0;
    $sida = isset($_POST['sida']) ? 1 : 0;
    $atp = isset($_POST['atp']) ? 1 : 0;

?>
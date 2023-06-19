<?php

    function find_invoice_by_id($id){
     	global $connection;
        $safe_id = mysqli_real_escape_string($connection, $id);
        $query  = "SELECT * ";
        $query .= "FROM invoices ";
        $query .= "WHERE id = {$safe_id} ";
        $query .= "LIMIT 1";
        $data_set = mysqli_query($connection, $query);

        confirm_query($data_set);
        
        if($data = mysqli_fetch_assoc($data_set)) {
            return $data;
        } else {
            return null;
        }}

    function find_pending_invoices_amount_by_carrier_id($id) {
        
        global $connection;
        $safe_id = mysqli_real_escape_string($connection, $id);
        $record_set_object = find_pending_invoices_by_carrier_id($safe_id);
       
        $total_amount = 0;
        while ($record = mysqli_fetch_assoc($record_set_object)) {
            $total_amount += $record["commission"] ;
        }
        
        return $total_amount;
       
    }

    function find_pending_invoices_by_carrier_id($id) {
        global $connection;
        $safe_id = mysqli_real_escape_string($connection, $id);

        $query  = "SELECT * ";
        $query .= "FROM dispatch_list ";
        $query .= "WHERE invoice_status = '1' ";
        $query .= "AND carrier_id = '{$safe_id}' ";
        $query .= "AND status = 'Completed' ";
        $query .= "ORDER BY dispatch_time DESC ";
        $set = mysqli_query($connection, $query);
        confirm_query($set);
        return $set;}

    function invoice_creation_function($carrier_id,$total_amount,$due_date,$record_set){
        global $connection;
        
        $query  = "INSERT INTO invoices (";
        $query .= "  carrier_id, total_amount, due_date";
        $query .= ") VALUES (";
        $query .= "  '{$carrier_id}', '{$total_amount}', '{$due_date}'";
        $query .= ")";
        $result = mysqli_query($connection, $query);
        if($result){
            $new_id = mysqli_insert_id($connection);
             foreach ($record_set as $record)  {  
                $record_id = $record['id'];
                $sql = "UPDATE dispatch_list SET invoice_id='$new_id', invoice_status = 2 WHERE id='$record_id'";
                $result = mysqli_query($connection, $sql);
            } 
            if($result){
                redirect_to("invoice_view?invoice_id=" . $new_id);

            } else {
                $_SESSION["message"] = "something went wrong.";
                redirect_to("home");
            }
            
        } else {
            $_SESSION["message"] = "Invoice Creation Failed.";
            redirect_to("home");
        }

        }


    


?>
<?php

    function check_access($current_page){
        
        $permission= find_user_permission();

         if ($current_page ==='home'){ return true; }
        
        //these pages will not be visible for admin & top management because it is used for individual performance not overall.  
        if ($permission === '1'){
            if ($current_page === 'update_carrier_location') return false;
            if ($current_page === 'dispatch_carrier') return false;
            return true;
            }
            
        //permission's for Sales & Dispatch 
        if ( $permission === '4' || $permission === '5' || $permission === '9' || $permission === '10') {
            if ($current_page === 'add_news') return true;
            if ($current_page === 'settings') return true;
            if ($current_page === 'discussion_board') return true;
            if ($current_page === 'show_discussion') return true;
            if ($current_page === 'notification') return true;
            if ($current_page === 'profile') return true;
            }

        //permissions for Dispatch staff only

        //supervisor
        if ( $permission === '4'){
            if ($current_page === 'carrier_assign_dispatcher') return true;
            if ($current_page === 'update_dispatched_status') return true;
            if ($current_page === 'list_team_all_carriers') return true;
            if ($current_page === 'list_team_available_carriers') return true;
            if ($current_page === 'list_team_unavailable_carriers') return true;
            if ($current_page === 'list_team_dispatched') return true;
            if ($current_page === 'list_team_cancelled_dispatched') return true;
            if ($current_page === 'update_carrier_status') return true;
            if ($current_page === 'stats_box_dispatch_team_1') return true;
            if ($current_page === 'stats_box_dispatch_team_2') return true;
            }

        if ( $permission === '4' || $permission === '5'){
            

            if ($current_page === 'list_my_carriers') return true;
            if ($current_page === 'list_my_dispatched') return true;
            if ($current_page === 'list_my_cancelled_dispatched') return true;
            if ($current_page === 'update_carrier_location') return true;
            if ($current_page === 'dispatch_carrier') return true;
            if ($current_page === 'show_carrier') return true;
            
            }

        //permissions for Sales staff only

        //supervisor
        if ( $permission === '9'){
            if ($current_page === 'list_sales_team_carriers') return true;
            if ($current_page === 'carrier_update') return true;
            if ($current_page === 'show_carrier') return true;
            if ($current_page === 'sales_dashboard_1') return true;
            }

        if ( $permission === '9' || $permission === '10'){
                if ($current_page === 'sales_agent_performance_1') return true;
                if ($current_page === 'carrier_create') return true;
            }
        
      return false;
    }
    
    function confirm_access($current_page) {
        if (!check_access($current_page)){
            $_SESSION["message"] = "You don't have permission for this page";
            redirect_to("home");
        }
    }

    function check_team_view_required($role_id){
        if ($role_id === '1') return false;
        return true;
    }
   
    function not_executive($role_id){
        if ($role_id === '1') return false;
        return true;
    }

    function is_executive($role_id){
        if ($role_id === '1') return true;
        return false;
    }
    
    function is_sales_agent($role_id){
        if ($role_id === '10') return true;
        return false;
    }
    
    function find_permission($role_id){
        if ($role_id === '1') return 1;
        if ($role_id === '4') return 4;
        if ($role_id === '5') return 5;
        if ($role_id === '9') return 9;
        if ($role_id === '10') return 10;
        return 10;
    }
   
    function find_designation($role_id){
        if ($role_id === '1') return 'Manager';
        if ($role_id === '4') return 'Dispatch Supervisor';
        if ($role_id === '5') return 'Dispatch Agent';
        if ($role_id === '9') return 'Sales Supervisor';
        if ($role_id === '10') return 'Sales Agent';
        return 'Not Assigned';
    }
    

?>
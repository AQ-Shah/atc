<?php 
	require_once("../includes/public_require.php"); 
	$current_page = "home";
	include("../includes/layouts/public_header.php"); 
 ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Welcome <?php echo $user["full_name"]; ?>
                </h2>

            </div>
        </div>
    </div>


    <?php include("../includes/views/sales_dashboard_1.php"); ?>

    <?php include("../includes/views/dispatch_stats_1.php"); ?>

    <?php if (not_executive($user['permission'])){ include("../includes/views/stats_box_dispatch_team_1.php"); } ?>

    <?php if (not_executive($user['permission'])){  include("../includes/views/stats_box_dispatch_team_2.php"); }?>

    <?php include("../includes/views/dispatch_dashboard_1.php"); ?>

    <?php include("../includes/views/revenue_dashboard_1.php"); ?>

    <div class="row">
        <?php if ($user['permission']==1){ ?>
        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button">Invoice Management</button>
            </div>
        </div>
        <?php } ?>
        <?php if ($user['permission']==1 || $user['permission']==5){ ?>
        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button" onclick="location.href='list_carriers'">Carriers</button>
            </div>
        </div>
        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button" onclick="location.href='list_dispatching'">Available for
                    Dispatch</button>
            </div>
        </div>
        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button" onclick="location.href='list_unavailable'">Unavailable
                    Carriers</button>
            </div>
        </div>

        <?php } ?>
        <?php if ($user['permission']==1 || $user['permission']==10){ ?>
        <div class="col-12 col-md-3 my-2">
            <div class="d-grid gap-3">
                <button type="button" class="primary-button" onclick="location.href='carrier_create'">New
                    Carrier</button>
            </div>
        </div>
        <?php } ?>


    </div>

    <?php include("../includes/views/sales_agent_performance_1.php"); ?>


</div>

<?php 
include("../includes/pagination/table_script.php"); 
include("../includes/layouts/public_footer.php"); 
?>
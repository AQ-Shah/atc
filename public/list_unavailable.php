<?php 
    require_once("../includes/public_require.php"); 
    $current_page = "list_unavailable";
	include("../includes/layouts/public_header.php"); 
	include("../includes/pagination/unavailable_carrier_data_fetch.php"); 
  ?>
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <?php echo message(); ?>

                <h2>
                    Carriers
                </h2>

            </div>
        </div>
    </div>

    <div class="row card">
        <?php include("../includes/views/dispatch_stats_1.php"); ?>
    </div>

    <div class="row card">
        <div class="col-12">
            <div class="row py-3">
                <div class="col-6 simple-panel">
                    <label>List of unavailable Carriers</label>
                </div>
                <div class="col-6 simple-panel" style="background-color:transparent">
                    <input class="form-control" id="tableSearch" onkeyup="table_search()" type="text"
                        placeholder="Search..">
                </div>
            </div>
            <div class="row panel table-primary p-2">
                <div class="panel-body table-responsive">
                    <table class="table table-hover" id="currentTable">
                        <thead>
                            <tr>
                                <th>MC</th>
                                <th>Carrier Name</th>
                                <th>Truck Type</th>
                                <th>Driver Name</th>
                                <th>Driver Number</th>
                                <th>Reason of unavailability</th>
                                <th data-sortable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($record_set)) { ?>
                            <?php while($record = mysqli_fetch_assoc($record_set)) { ?>
                            <tr>
                                <td><?php echo htmlentities($record["mc"]); ?></td>
                                <td><?php echo htmlentities($record["b_name"]); ?></td>
                                <td>
                                    <?php echo htmlentities($record["truck_type"]); ?><br>
                                    <?php echo htmlentities($record["t_length"]).'ft, '; ?>
                                    <?php echo htmlentities($record["t_weight"]).'lbs'; ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($record["d_name"]); ?>
                                </td>
                                <td><?php echo htmlentities($record["d_number"]); ?></td>
                                <td><?php echo htmlentities($record["status_change_reason"]); ?></td>
                                <td>
                                    <?php include("../includes/views/action_dropdown_button.php");?>
                                </td>

                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row form_panel">
                        <?php include("../includes/pagination/bottom_pagination_bar.php");?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php 
	include("../includes/views/carrier_status_popup.php"); 
    include("../includes/views/carrier_move_popup.php"); 
	include("../includes/views/carrier_dispatch_popup.php"); 
	include("../includes/pagination/table_search.php"); 
	include("../includes/layouts/public_footer.php"); 
?>
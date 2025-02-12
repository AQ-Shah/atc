<?php if (check_access("dispatch_stats_1")){ ?>

<div class="row text-center">
    <div class="col-12">
        <div class="page-title-box">
            <h2>
                Carriers Stats
            </h2>

        </div>
    </div>
</div>


<div class="row" id="form_box_button">
    <div class="col-3">
        <a href='list_carriers?only_available'>
            <div class=" custom-panel card" style="background:#58467e">
                <h3><?php echo no_of_active_carriers_by_company();?></h3>
                <p>Available Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_carriers?only_unavailable'>
            <div class=" custom-panel card" style="background:#55847e">
                <h3><?php echo no_of_unavailable_carriers();?></h3>
                <p>Unavailable Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_carriers'>
            <div class=" custom-panel card" style="background:#23a6d5">
                <h3><?php echo no_of_carriers_by_company();?></h3>
                <p>Total Carriers</p>
            </div>
        </a>
    </div>
    <div class="col-3">
        <a href='list_carriers?only_removed'>
            <div class=" custom-panel card" style="background:#d43a0f">
                <h3><?php echo no_of_removed_carriers();?></h3>
                <p>Removed Carriers</p>
            </div>
        </a>
    </div>
   
</div>

<?php } ?>
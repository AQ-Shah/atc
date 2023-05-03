<div class="dropdown">
    <button class="dropdown-button">Actions</button>
    <div class="dropdown-content">
        <button onclick="window.open('show_carrier?id=<?php echo urlencode($record["id"]); ?>', '_blank')">View</button>

        <?php if (check_access("carrier_update")) {?>
        <button
            onclick="window.open('carrier_update?id=<?php echo urlencode($record["id"]); ?>', '_blank')">Edit</button>
        <?php } ?>

        <?php if (check_access("carrier_update")) {?>
        <button onclick="showDispatchPopup(<?php echo $record["id"]; ?>)">Dispatch</button>
        <?php } ?>

        <?php if (check_access("update_carrier_status")) {?>
        <button onclick="showStatusPopup(<?php echo $record["id"]; ?>)">Change Status</button>
        <?php } ?>

        <?php if (check_access("update_carrier_location")) {?>
        <button onclick="showMovePopup(<?php echo $record["id"]; ?>)">Change Location</button>
        <?php } ?>

        <?php if (check_access("carrier_assign_dispatcher")) {?>
        <button onclick="showDAssignDispatcherPopup(<?php echo $record["id"]; ?>)">Assign Dispatcher</button>
        <?php } ?>
        <!-- add more actions here as needed -->
    </div>
</div>
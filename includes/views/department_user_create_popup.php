<div id="department-user-create-popup" class="popup">
    <div class="popup-content">
        <h2>Create Department</h2>
        <form class="department-user-create-popup-form popup-form" action="" method="post">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="text" id="password" name="password">


            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name">

            <label for="email">Email:</label>
            <input type="text" id="new-department-email" name="email">

            <label for="phone_num">Phone Number:</label>
            <input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" id="phone_num" name="phone_num">

            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date">

            <label for="join_date">Joining Date:</label>
            <input type="date" id="join_date" name="join_date">

            <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <button type="submit" name="submit" onclick="hideDepartmentUserCreatePopup()">Create</button>

            <button type="button" onclick="hideDepartmentUserCreatePopup()">Cancel</button>
        </form>
    </div>
</div>

<script>
//for dispatch popup

function showDepartmentUserCreatePopup() {

    var formAction = "profile_create?department_id=";

    // set the form action to the constructed URL
    document.querySelector(".department-user-create-popup-form").action = formAction;
    // Show the popup
    var popup = document.getElementById("department-user-create-popup");
    popup.style.display = "flex";
}

function hideDepartmentUserCreatePopup() {
    var popup = document.getElementById("department-user-create-popup");
    popup.style.display = "none";
}
</script>
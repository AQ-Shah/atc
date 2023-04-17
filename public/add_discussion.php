<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_user_logged_in(); ?>
<?php 
$user = find_user_by_id($_SESSION["id"]); 

$current_page = "forums";


if (isset($_POST['submit'])) {
  // validations
  $required_fields = array("topic");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Perform Create

    $topic = mysql_prep($_POST["topic"]);
    $uploader = mysql_prep($user["id"]);
    $replies = 0 ;
	$upload_date = date("Y-m-d");
	$upload_time = date('H:i:s');
    $query  = "INSERT INTO forum_subject (";
    $query .= "  topic, uploader, replies, upload_date, upload_time ";
    $query .= ") VALUES (";
    $query .= "  '{$topic}', '{$uploader}', '{$replies}', '{$upload_date}','{$upload_time}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Topic added";
      redirect_to("forums.php");
    } else {
      // Failure
      $_SESSION["message"] = "Couldnot Add Topic";
    }
  }
}
?>

<?php include("../includes/layouts/public_header.php"); ?>
<div class="container">
	<div class="col-md-6">
		<div class="row">
			<?php echo message(); ?>
			<?php echo form_errors($errors); ?>
			<h2>Add New Discussion :</h2><br/>
				<form class="form-inline" role="form" action="" method="post">
					
					<div class="form-group">
						<label>Topic :</label>
						<input type="text" class="form-control" name="topic">
					</div>
					<br/>
					<input class="btn btn-default" type="submit" name="submit" value="Submit" />
				</form>
		</div>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>

<?php
    include('includes/scripts.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";

    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    
    $_SESSION['id'] = $id;
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body>
    <sction class="countainer py-4">
				<form action="includes/scripts.php" method="POST" id="form-task">
						<h5 class="modal-title">Add Task</h5>
					<div class="container">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="task-id">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text" class="form-control" name="title" id="task-title" value="<?php echo $result["title"] ?>"/>
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" type="radio" name="type" value="Feature" id="feature" <?php if($result["type"] == "Feature"){ echo"checked" ;} ?>/>
										<label class="form-check-label" for="task-type-feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="type" value="Bug" id="bug" <?php if($result["type"] == "Bug"){ echo"checked" ;} ?>/>
										<label class="form-check-label" for="task-type-bug">Bug</label>
									</div>
								</div>
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select class="form-select" name="priority" id="task-priority">
									<option value="">Please select</option>
									<option <?php if($result["priority"] == "Low"){ echo"selected" ;} ?> value="Low">Low</option>
									<option <?php if($result["priority"] == "Medium"){ echo"selected" ;} ?> value="Medium">Medium</option>
									<option <?php if($result["priority"] == "High"){ echo"selected" ;} ?> value="High">High</option>
									<option <?php if($result["priority"] == "Critical"){ echo"selected" ;} ?> value="Critical">Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-select" name="status" id="task-status">
									<option value="">Please select</option>
									<option <?php if($result["status"] == "To Do"){ echo"selected" ;} ?> value="To Do">To Do</option>
									<option <?php if($result["status"] == "In Progress"){ echo"selected" ;} ?> value="In Progress">In Progress</option>
									<option <?php if($result["status"] == "Done"){ echo"selected" ;} ?> value="Done">Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="datetime-local" class="form-control" name="date" id="task-date" value="<?php echo $result["task_datetime"] ?>"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" name="description" rows="10" id="task-description"><?php echo $result['description'] ?></textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<button type="submit" name="update" class="btn btn-warning task-action-btn" name="update" id="task-update-btn">Update</a>
					</div>
				</form>
    </sction>
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script src="js/scripts.js"></script>

	<script>
		//reloadTasks();
	</script>
</body>
</html>
<?php
    include('includes/scripts.php');
    $result = edit($conn);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link href="css/stayle.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
  </head>
  <body class="bg-grey">
    <sction class="container py-4">
				<form action="includes/scripts.php" method="POST" id="form-task">
					<div class="container">
						<h5 class="modal-title">Edit Task</h5><hr>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
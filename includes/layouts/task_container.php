<?php $data = getTasks($conn , $status); ?>
                <div class="col-xl-4 col-lg-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $status ?> (<span id="to-do-tasks-count"></span>)</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="list-group list-group-flush rounded-bottom overflow-hidden panel-body p-0">
							<!-- TO DO TASKS HERE -->
							
							<?php while($row = $data->fetch_assoc()) { ?> 
								<a href="update.php?id=<?php echo $row["id"]?>">
									<button class="bg-light row m-0 border-0 col-12 py-2 border-bottom" id="parent-button">
										<div class="col-2 col-md-1">
											<i class="fa-regular fa-circle-question fa-2x text-success"></i>
										</div>
										<div class="text-start col">
											<div class="text-dark fw-bold" id="title"><?php echo $row["title"] ?></div>
											<div class="">
												<div class="list-item text-body" id="date">#1 created in <?php echo $row["task_datetime"] ?></div>
												<div class="list-item" id="description" title=""><?php echo $row["description"] ?></div>
											</div>
											<div class="mt-3">
												<span class="btn btn-primary btn-sm" id="priority"><?php echo $row['priority'] ?></span>
												<span class="btn btn-outline-secondary btn-sm" id="type"><?php echo $row['type'] ?></span>
											</div>
										</div>
									</button>
									<?php include'includes/layouts/delete-btn.php'; ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
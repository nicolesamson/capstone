<?php if ($_settings->chk_flashdata('success')): ?>
	<!-- If a 'success' flash message is set, show a success toast -->
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>

<style>
	/* Styling for user avatar images */
	.img-avatar {
		width: 45px;
		/* Set avatar width */
		height: 45px;
		/* Set avatar height */
		object-fit: cover;
		/* Ensure image covers the container */
		object-position: center center;
		/* Center the image */
		border-radius: 100%;
		/* Make the image circular */
	}
</style>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h2 class="card-title"><b> List of System Users</b></h2>
		<div class="card-tools">
			<!-- Button to create a new user -->
			<a href="?page=user/manage_user" class="btn btn-flat btn-sm btn-primary" style="border-radius: 3px;">
				<span class="fas fa-plus"></span> Create New
			</a>
		</div>
	</div>

	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<!-- Table displaying the list of users -->
				<table class="table table-hover table-striped">
					<thead>
						<!-- Table headers -->
						<tr>
							<th>#</th>
							<th>Avatar</th>
							<th>Name</th>
							<th>Username</th>
							<th>User Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Fetch users from the database (excluding user ID 1)
						$i = 1;
						$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name from `users` where id != '1' order by concat(firstname,' ',lastname) asc ");
						while ($row = $qry->fetch_assoc()):
							?>
							<!-- Table row for each user -->
							<tr style="background-color: <?= ($i % 2 == 0) ? '#e6f7ff' : 'inherit' ?>;">
								<td class="text-center"><?php echo $i++; ?></td> <!-- Display user number -->
								<td class="text-center">
									<!-- Display user avatar -->
									<img src="<?php echo validate_image($row['avatar']) ?>"
										class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar">
								</td>
								<td><?php echo ucwords($row['name']) ?></td> <!-- Display user name -->
								<td>
									<p class="m-0 truncate-1"><?php echo $row['username'] ?></p> <!-- Display username -->
								</td>
								<td>
									<p class="m-0"><?php echo ($row['type'] == 1) ? "Administrator" : "Staff" ?></p>
									<!-- Display user type -->
								</td>
								<td align="center">
									<!-- Action dropdown button -->
									<button type="button"
										class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
										data-toggle="dropdown">
										Action
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<!-- Dropdown menu for actions -->
									<div class="dropdown-menu" role="menu">
										<!-- Edit user link -->
										<a class="dropdown-item"
											href="?page=user/manage_user&id=<?php echo $row['id'] ?>"><span
												class="fa fa-edit text-primary"></span> Edit</a>
										<div class="dropdown-divider"></div>
										<?php if ($row['status'] != 1): ?>
											<!-- Verify user link (only if user is not already verified) -->
											<a class="dropdown-item verify_user" href="javascript:void(0)"
												data-id="<?= $row['id'] ?>" data-name="<?= $row['username'] ?>"><span
													class="fa fa-check text-primary"></span> Verify</a>
											<div class="dropdown-divider"></div>
										<?php endif; ?>
										<!-- Delete user link -->
										<a class="dropdown-item delete_data" href="javascript:void(0)"
											data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span>
											Delete</a>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		// Handle click event for delete action
		$('.delete_data').click(function () {
			_conf("Are you sure to delete this User permanently?", "delete_user", [$(this).attr('data-id')])
		})

		// Add padding to table cells for better alignment
		$('.table td,.table th').addClass('py-1 px-2 align-middle')

		// Initialize DataTables for table sorting and pagination
		$('.table').dataTable();

		// Handle click event for verify user action
		$('.verify_user').click(function () {
			_conf("Are you sure to verify <b>" + $(this).attr('data-name') + "<b/>?", "verify_user", [$(this).attr('data-id')])
		})
	})

	// Function to delete user
	function delete_user($id) {
		start_loader(); // Show loader while processing
		$.ajax({
			url: _base_url_ + "classes/Users.php?f=delete", // URL to send request to
			method: "POST",
			data: { id: $id }, // Send user ID to the server
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("An error occurred.", 'error'); // Show error toast if there is an error
				end_loader(); // Hide loader
			},
			success: function (resp) {
				// If user is deleted successfully, reload the page
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occurred.", 'error'); // Show error toast if there is an issue
					end_loader(); // Hide loader
				}
			}
		})
	}

	// Function to verify user
	function verify_user($id) {
		start_loader(); // Show loader while processing
		$.ajax({
			url: _base_url_ + "classes/Users.php?f=verify_user", // URL to send request to
			method: "POST",
			data: { id: $id }, // Send user ID to the server
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("An error occurred.", 'error'); // Show error toast if there is an error
				end_loader(); // Hide loader
			},
			success: function (resp) {
				// If user is verified successfully, reload the page
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occurred.", 'error'); // Show error toast if there is an issue
					end_loader(); // Hide loader
				}
			}
		})
	}
</script>
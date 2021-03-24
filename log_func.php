<?php
require_once "required/function.php";
 if (isset($_POST['stud_log'])){
		$reg = data_input($_POST['reg']);
		$password = data_input($_POST['password']);
		$hashed_password = md5($password);
	
		$query1 ="SELECT * FROM student WHERE reg='$reg' AND password='$hashed_password'";
		$result = $connect->query($query1);
		$user_data=mysqli_fetch_assoc($result);
			if ($result->num_rows == 0){ ?>
				<div class="alert alert-danger">
					<strong>Error!</strong> Wrong Login Details!
				</div>
			<?php
				}else if ($result->num_rows == 1) {
				$user_id = $user_data['id'];
				$_SESSION['reg'] = $reg;
				$_SESSION['id'] = $id;
				$_SESSION['loggedIn'] = true;
				$_SESSION['user_id']=$user_id;
				header('Location: students');
			
			}
		}

		if (isset($_POST['teacher_log'])){
			$username = data_input($_POST['username']);
			$password = data_input($_POST['password']);
			$hashed_password = md5($password);
		
			$query1 ="SELECT * FROM tutor WHERE username='$username' AND password='$hashed_password'";
			$result = $connect->query($query1);
			$user_data=mysqli_fetch_assoc($result);
				if ($result->num_rows == 0) {?>
					<div class="alert alert-danger">
						<strong>Error!</strong> Wrong Login Details!
					</div>
				<?php
				}else if ($result->num_rows == 1) {
					$user_id = $user_data['id'];
					$_SESSION['username'] = $username;
					$_SESSION['id'] = $id;
					$_SESSION['loggedIn'] = true;
					$_SESSION['user_id']=$user_id;
					header('Location: teachers');
				
				}
			}
?>
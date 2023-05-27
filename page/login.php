<!DOCTYPE html>
<html>
	<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php"; ?>
	<link  rel="stylesheet" href="/css/login.css">
        <?php 
	if (!empty($_POST) && !empty($_POST['singemail']) && !empty($_POST['singpass'])) {
        $singname = $_POST['singname'];
        $email = $_POST['singemail'];
        $password = password_hash($_POST['singpass'], PASSWORD_BCRYPT);

        $emailExistsQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
        $emailExistsResult = mysqli_query($conn, $emailExistsQuery);

        if (mysqli_num_rows($emailExistsResult) > 0) {
            ?>
            <script>alert("Email already exists.");</script>
            <?php
        } else {
            $sql = "INSERT INTO `users` (`id`, `usersname`, `email`, `pass`) VALUES (NULL, '" . $singname . "', '" . $email . "', '" . $password . "');";

            if (mysqli_query($conn, $sql)) {
                ?>
                <script>alert("New record created successfully");</script>
                <?php
                echo '<script>window.location.href = "/page/login.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    if (!empty($_POST) && !empty($_POST['logemail']) && !empty($_POST['logpass'])) {
        $email = $_POST['logemail'];
        $password = $_POST['logpass'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['pass'])) {
            setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
            ?>
            <script>alert("You are logged in.");</script>
            <?php
            header('Location: /');
        } else {
            echo "Wrong email or password";
            setcookie('user_id', '', 0, '/');
        }
    }
        ?>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<form method="POST">
											<div class="form-group">
												<input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button class="btn mt-4">submit</button>
                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
											</form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<form method="POST" action="#">
											<div class="form-group">
												<input type="text" name="singname" class="form-style" placeholder="Your Username" id="singname" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="singemail" class="form-style" placeholder="Your Email" id="singemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="singpass" class="form-style" placeholder="Your Password" id="singpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button class="btn mt-4">submit</button>
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
	<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/scripts.php"; ?>
</body>
</html>
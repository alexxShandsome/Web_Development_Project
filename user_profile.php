<?php
	require './partial/database_connection.php';

	if (!isset($_SESSION['is_logged_in'])){
		header("Location: ./login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="./style/user_profile.css" rel="stylesheet" type="text/css">

	<?php
		// global requirements: favicon, global_style.css, Bootstrap, and Global Font
		require_once './partial/global_requirements.html';
	?>
</head>

<body class="">
	<?php
		//require_once './partial/navbar.php';
		//require './partial/logged_in_navbar.php';

		// use if session is already implemented
		if(isset($_SESSION['is_logged_in']))
			require './partial/logged_in_navbar.php';
		else
			require './partial/navbar.php';
	?>
	<?php
		//Access the Specific Data from the Array
		//Assign the 'user_info' to variable $User to easily access its data individually
		// if ($_SESSION['visit_other_profile'] == true)
		// 	$User = $_SESSION['other_user_info'][$_SESSION['visited_id']];
		// else
			$User = $_SESSION['user_info'];

		// echo "<pre>";
		// var_dump($User);
		// echo "</pre>";

		$profile_pic = "./uploaded_files/profile_pics/" . $User["PROFILE_PIC"];
	?>

	<div class="profile_area border shadow-lg rounded-3 p-3">
		<!-- Upper Area Profile Picture, Profile Name, Username, and Bio -->
		<center>
			<!-- profile picture -->
			<div class="picture-container">
				<a class="profile-picture" href="<?php echo $profile_pic; ?>" target="_self">
					<img class="profile-picture border border-2" src="<?php echo $profile_pic; ?>" alt="User_image">
				</a>
			</div>

			<!-- name and user-name -->
			<div class="name-container">
				<p class="name">
					<?php echo $User["FIRST_NAME"]." ".$User["LAST_NAME"]; ?>
					<span class="username">
						<?php echo "@".$User["USER_NAME"]; ?>
					</span>
				</p>
			</div>

			<!-- user's bio -->
			<div class="bio-container">
				<p class="bio">
					<?php
						echo $User["BIO"];
					?>
				</p>
			</div>
		</center>
		<!-- End of Upper Area Profile Picture, Profile Name, Username, and Bio -->

		<!-- Start for Tabs in User-profile -->
		<div class="profile-tabs">
			<!-- Start for Timeline-Tab -->
			<input type="radio" name="profile-tabs" id="timeline-tab" checked="checked">
			<label for="timeline-tab">Timeline</label>
			<div class="tab-container">
				<center>
					<h4>Your timeline</h4>
				</center>

				<!-- Timeline Posts -->
				<?php
					$posts = get_personal_posts($pdo, $User['USER_ID']);
					//for each loop to access every post made by the user
					foreach ($posts as $post){
						// echo "<pre>";
						// var_dump($post);
						// echo "</pre>";
				?>
						<div class="border rounded shadow mb-4 p-4">
							<div class="row">
								<div class="col-auto me-2 profile-pic-container">
									<a class="profile-picture" href="./uploaded_files/profile_pics/<?php echo $profile_pic; ?>" target="_self">
										<img class="poster-profile-pic" src="<?php echo $profile_pic; ?>">
									</a>
								</div>
								<b class="col align-self-center"><?php echo $User["USER_NAME"]; ?></b>
							</div>

							<h3 class="text-center"><?php echo $post["TITLE"];?></h3>

							<div class="text-center border rounded-2 p-2">
								<a href="./uploaded_files/memes_posted/<?php echo $post['POST_IMAGE'];?>" target="_self">
									<img class="img-fluid rounded mx-auto d-block" src="./uploaded_files/memes_posted/<?php echo $post['POST_IMAGE'];?>">
								</a>
							</div>
								<!-- show upvote and downvote counts -->
							<p>
								<b>Upvotes:<?php echo $post["UPVOTE"];?></b>
								<br>
								<b> Downvotes:<?php echo $post["DOWNVOTE"];?></b>
							</p>

						</div>
				<?php
					}
				?>
				<!-- Timeline Posts -->

			</div>
			<!-- End of Timeline-Tab -->

			<!-- Start for About-Tab -->
			<input type="radio" name="profile-tabs" id="about-tab">
			<label for="about-tab">About</label>
			<div class="tab-container">
				<center>
					<h4>About</h4>
				</center>

				<div class="about-container">

					<!-- User Gender -->
					<div class="about-info">
						<div class="info"><span><?php echo $User["GENDER"]; ?></span></div>
						<div>Gender</div>
					</div>
					<!-- End User Gender -->

					<!-- User Contact -->
					<div class="about-info">
						<div class="info"><span><?php echo $User["EMAIL"]; ?></span></div>
						<div>Contact</div>
					</div>
					<!-- End User Contact -->

					<!-- User Birthday -->
					<div class="about-info">
						<div class="info"><span><?php echo $User["BIRTHDAY"]; ?></span></div>
						<div>Birthday</div>
					</div>
					<!-- End User Birthday -->
				</div>
			</div>
			<!-- End of About-Tab -->
		</div>
	<!-- End for Tabs in User-profile -->
	</div>

	<!-- Footer -->
	<?php require_once './partial/footer.php'; ?>
	<!-- Footer -->
</body>
</html>

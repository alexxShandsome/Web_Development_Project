<?php
	require './partial/database_connection.php';

	if (!isset($_SESSION['is_logged_in'])){
		header("Location: ./login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="./style/global_style.css" rel="stylesheet" type="text/css">
	<link href="./style/user_profile.css" rel="stylesheet" type="text/css">

	<?php
		require_once './style/bootstrap.html';
		require_once './style/ubuntu_regular_font.html';
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

		// echo '<pre>';
		// var_dump($_SESSION['user_info']);
		// echo '</pre>';
	?>

	<div class="profile_area border shadow-lg rounded-3 p-3">
		<!-- Upper Area Profile Picture, Profile Name, Username, and Bio -->
		<center>
			<!-- profile picture -->
			<div class="picture-container">
				<img class="profile-picture" src="https://seedpsychology.com.au/wp-content/uploads/2018/09/Damian-profile-pic-square.jpg" alt="User_image">
			</div>

			<!-- name and user-name -->
			<div class="name-container">
				<p class="name">
					Profile Name
					<span class="username">
						(User Name)
					</span>
				</p>
			</div>

			<!-- user's bio -->
			<div class="bio-container">
				<p class="bio">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut,
					doloribus sed hic ipsum consectetur asperiores commodi. Officia autem eligendi,
					beatae, a qui odit iste voluptas atque at alias voluptatem omnis?
				</p>
			</div>

		</center>
		<!-- End of Upper Area Profile Picture, Profile Name, Username, and Bio -->

		<!-- Collapsible Area -->
		<div class="accordion accordion-flush" id="Container">

			<!-- Buttons for collapsible area -->
			<div class="button-container">
				<center>
					<button class="btn posts-button" type="button" data-bs-toggle="collapse" data-bs-target="#Posts">
						<b>Posts</b>
					</button>
					<button class="btn about-button" type="button" data-bs-toggle="collapse" data-bs-target="#About">
						<b>About</b>
					</button>
				</center>
			</div>
			<!-- Buttons for collapsible area -->

			<!-- About -->
			<div id="About" class="collapse" data-bs-parent="#Container">
				<div class="accordion-body">
					About Here..
				</div>
			</div>
			<!-- End of About -->

			<!-- Posts -->
			<div id="Posts" class="collapse" data-bs-parent="#Container">
				<div class="accordion-body">
					Posts Here...
				</div>
			</div>
			<!-- End of Posts -->

		</div>
		<!-- End of Collapsible Area -->
	</div>

	<!-- Footer -->
	<?php require_once './partial/footer.php'; ?>
	<!-- Footer -->
</body>
</html>

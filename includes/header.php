<?php  
require 'config/config.php'; 
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");

if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php"); 
}
?>

<html>
<head>
	<title>Noodle</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/buddy.js"></script>
	<script src="assets/js/jquery.jcrop.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />

</head>
<body 
	style='
	background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url("assets/images/backgrounds/register_bg.jpg"); background-size: 100%;
	background-position: center;
	background-attachment: fixed;'>

	<div class="top_bar"> 
		<div class = "logo">
			<a href="index.php"><h2> Noodle </h2></a>
		</div>

		<div class="search">
			<form action="search.php" method="GET" name="search_form">
				<input type="text" onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn; ?>')" name="q" placeholder="Search..." autocomplete="off" id="search_text_input">
				<div class="button_holder">
					<img src="assets/images/icons/magnifying_glass.png">
				</div>
			</form>
			<div class="search_results">
			</div>
			<div class="search_results_footer_empty">
			</div>
		</div>

		<nav>
			<a href="<?php echo $userLoggedIn; ?>">
				<?php echo $user['first_name']; ?>
			</a>
			<a href="index.php">
				<i class="fas fa-home"></i>
			</a>
			<a href="messages.php">
				<i class="fas fa-comments"></i>
			</a>
			<a href="requests.php">
				<i class="fas fa-users"></i>
			</a>
			<a href="settings.php">
				<i class="fas fa-cog"></i>
			</a>
			<a href="includes/handlers/logout.php">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</nav>
		<div class="dropdown_data_window" style="height:0px; border:none;"></div>
		<input type="hidden" id="dropdown_data_type" value="">
	</div>
	<div class="wrapper">
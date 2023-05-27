<?php 
if(!empty($_COOKIE["user_id"])){
	$userSQL = "SELECT * FROM users WHERE id = '".$_COOKIE["user_id"]."'";
	$userResult = mysqli_query($conn, $userSQL);
	if($userResult){
		$user = mysqli_fetch_assoc($userResult);
		$username = $user["usersname"];
		$pageLog = "logout";
	}}else {
		$pageLog = "login";
		$username = "Hello";
	}
?>

<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.php"><?php echo $username ?><span>.</span></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="/?page=home">Home</a></li>
					<li><a href="/?page=photography">Photography</a></li>
					<li><a href="/?page=travel">Travel</a></li>
					<li><a href="/?page=fashion">Fashion</a></li>
					<li><a href="/?page=about">About</a></li>
					<li><a href="/?page=contact">Contact</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<a href="/page/<?php echo $pageLog ?>.php"><?php echo $pageLog ?></a>
			</div>
</aside>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var currentPage = urlParams.get('page');

    if (currentPage === null || currentPage === "") {
      currentPage = "home";
    }

    $('#colorlib-main-menu a').each(function() {
      var href = $(this).attr('href');
      var pageParam = new URLSearchParams(href.substring(href.indexOf('?'))).get('page');

      if (currentPage === pageParam) {
        $(this).parent().addClass('colorlib-active');
      }
    });
  });
</script>





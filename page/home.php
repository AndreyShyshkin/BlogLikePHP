			<div class="hero-wrap js-fullheight" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="js-fullheight d-flex justify-content-center align-items-center">
					<div class="col-md-8 text text-center">
						<div class="img mb-4" style="background-image: url(images/author.jpg);"></div>
						<div class="desc">
							<h2 class="subheading">Hello I'm</h2>
							<h1 class="mb-4">Elen Henderson</h1>
							<p class="mb-4">I am A Blogger Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn-custom">More About Me <span class="ion-ios-arrow-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>
			<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Articles</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
          </div>
        </div>
    		<div class="row">
					<?php 
$sql = "SELECT posts.*, categories.title AS category_title 
FROM posts 
JOIN categories ON posts.category_id = categories.id";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
echo "<div class='col-md-4'>";
echo "<div class='blog-entry ftco-animate'>";
if ($row['preview'] == "") {
echo "";
} else {
echo "<a href='#' class='img img-2' style='background-image: url(" . $row['preview'] . ");'></a>";
}
echo  "<div class='text text-2 pt-2 mt-3'>";
echo "<span class='category mb-3 d-block'><a href='#'>" . $row['category_title'] . "</a></span>";
echo "<h3 class='mb-4'><a href='#'>" . $row['title'] . "</a></h3>";
echo "<p class='mb-4'>" . $row['text'] . "</p>";
echo "<div class='author mb-4 d-flex align-items-center'>";
echo "<a href='#' class='img' style='background-image: url(images/person_2.jpg);'></a>";
echo "<div class='ml-3 info'>";
echo "<span>Written by</span>";
echo "<h3><a href='#'>Dave Lewis</a></h3>";
echo "<span>" . $row['created'] . "</span>";
echo "</div>";
echo "</div>";
echo "<div class='meta-wrap align-items-center'>";
echo "<div class='half order-md-last'>";
echo "<p class='meta'>"; 

$likesSQL = 'SELECT count(*) as total FROM user_post_likes WHERE post_id =' . $row['id'];
$likesResult = $conn->query($likesSQL);

$likesCount = $likesResult->fetch_assoc()['total'];

$likeUserResult = null;
$likeClass = "";

if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
    $likeUserSQL = 'SELECT count(*) as total FROM user_post_likes WHERE post_id = ' . $row['id'] . ' AND user_id = ' . $_COOKIE['user_id'];
    $likeUserResult = mysqli_query($conn, $likeUserSQL);
}

if ($likeUserResult && $likeUserResult->fetch_assoc()['total'] > 0) {
    $likeClass = "liked";
}

echo "<span class='likeBtn " . $likeClass . "' data-id='" . $row['id'] . "'><i class='icon-heart'></i><span class='likesCount'>" . $likesCount . "</span></span>";
echo "<span><i class='icon-eye'></i>100</span>";
echo "<span><i class='icon-comment'></i>5</span>";
echo "</p>";
echo "</div>";
echo "<div class='half'>";
echo "<p><a href='#' class='btn py-2'>Continue Reading <span class='ion-ios-arrow-forward'></span></a></p>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
}
  ?>
    		</div>
    	</div>
    </section>
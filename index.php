<!DOCTYPE html>
<html lang="en">
<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/head.php"; ?>
  <body>

	<div id="colorlib-page">
		<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/aside.php"; ?>
		<div id="colorlib-main">
			<?php 
			$page = "home";
			if(isset($_GET["page"])) {
				switch ($_GET["page"]) {
					case 'home':
						$page = "home";
						break;
					case 'about':
						$page = "about";
						break;
					case 'contact':
						$page = "contact";
						break;
					case 'fashion':
						$page = "fashion";
						break;
					case 'travel':
						$page = "travel";
						break;
					case 'single':
						$page = "single";
						break;
					case 'photography':
						$page = "photography";
						break;
				}
			}
			require $_SERVER["DOCUMENT_ROOT"] . "/page/$page.php";
			?>
		<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/footer.php"; ?>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

	<?php require $_SERVER["DOCUMENT_ROOT"] . "/partials/scripts.php"; ?>
    
  </body>
</html>
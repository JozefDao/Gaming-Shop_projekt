<!-- ***** Preloader Start ***** -->
<!--<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>-->
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<?php
// Získanie názvu aktuálnej stránky
$currentFile = $_SERVER["PHP_SELF"];
$currentPage = basename($currentFile);

// Funkcia pre pridanie triedy "active" k aktuálnej stránke
function echoActiveClassIfRequestMatches($requestUri)
{
    $currentFile = $_SERVER["PHP_SELF"];
    $currentPage = basename($currentFile);

    if ($currentPage == $requestUri) {
        echo 'class="active"';
    }
}
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" <?php echoActiveClassIfRequestMatches("index.php"); ?>>Home</a></li>
                        <li><a href="explore.php" <?php echoActiveClassIfRequestMatches("explore.php"); ?>>Explore</a></li>
                        <li><a href="details.php" <?php echoActiveClassIfRequestMatches("details.php"); ?>>Item Details</a></li>
                        <li><a href="author.php" <?php echoActiveClassIfRequestMatches("author.php"); ?>>Author</a></li>
                        <li><a href="create.php" <?php echoActiveClassIfRequestMatches("create.php"); ?>>Create Yours</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

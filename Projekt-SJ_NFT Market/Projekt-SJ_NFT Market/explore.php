<!DOCTYPE html>
<html lang="en">

  <head>
    <?php
    include_once('partials/head.php');
    ?>
  </head>

<body>
  <?php
  include_once('inc/Explore.php');
  include_once('partials/header.php');
  ?>

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Liberty NFT Market</h6>
          <h2>Discover Some Top Items</h2>
          <span>Home > <a href="#">Explore</a></span>
        </div>
      </div>
    </div>
    <div class="featured-explore">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-features owl-carousel">
              
                <?php
                  $result = $Explore->get_explore();
                  for($i=0;$i<=3;$i++){
                    echo '<div class="item">';
                    echo '<div class="thumb">';
                    echo '<img src="' . $result[$i]->image. '" alt="" style="border-radius: 20px;">';
                    echo '<div class="hover-effect">';
                    echo '<div class="content">';
                    echo '<h4>'.$result[$i]->name.'</h4>';
                    echo '<span class="author">';
                    echo '<img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">';
                    echo '<h6>' . $result[$i]->title . '<br><a href="#">@libertyart</a></h6>';
                    echo '</span>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                    echo '</div>';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="discover-items">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Discover Some Of Our <em>Items</em>.</h2>
          </div>
        </div>
        <div class="col-lg-7">
          <form id="search-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-4">
                <fieldset>
                    <input type="text" name="keyword" class="searchText" placeholder="Type Something..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>All Categories</option>
                        <option type="checkbox" name="option1" value="Music">Music</option>
                        <option value="Digital">Digital</option>
                        <option value="Blockchain">Blockchain</option>
                        <option value="Virtual">Virtual</option>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <select name="Price" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                        <option selected>Available</option>
                        <option value="Ending-Soon">Ending Soon</option>
                        <option value="Coming-Soon">Coming Soon</option>
                        <option value="Closed">Closed</option>
                    </select>
                </fieldset>
              </div>
              <div class="col-lg-2">                        
                <fieldset>
                    <button class="main-button">Search</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="banner">Double Item</span>
              </div>
              <div class="col-lg-6 col-sm-6">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-01.jpg" alt="" style="border-radius: 20px;">
                <h4>Mutant Ape Bored</h4>
              </div>
              <div class="col-lg-6 col-sm-6">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-02.jpg" alt="" style="border-radius: 20px;">
                <h4>His Other Half</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
                    <span>Current Bid: <br> <strong>8.16 ETH</strong></span>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <span>Category: <br> <strong>Digital Art</strong></span>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <span>Collection:: <br> <strong>2/2</strong></span>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <span>Ends In: <br> <strong>25th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                <h4>Genesis Meta Boom</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-6">
                    <span>Current Bid: <br> <strong>5.15 ETH</strong></span>
                  </div>
                  <div class="col-6">
                    <span>Ends In: <br> <strong>26th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-04.jpg" alt="" style="border-radius: 20px;">
                <h4>Another Half Ape</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-6">
                    <span>Current Bid: <br> <strong>3.63 ETH</strong></span>
                  </div>
                  <div class="col-6">
                    <span>Ends In: <br> <strong>24th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-03.jpg" alt="" style="border-radius: 20px;">
                <h4>Pixel Sand Box</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-6">
                    <span>Current Bid: <br> <strong>4.68 ETH</strong></span>
                  </div>
                  <div class="col-6">
                    <span>Ends In: <br> <strong>28th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-04.jpg" alt="" style="border-radius: 20px;">
                <h4>Another Half Ape</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-6">
                    <span>Current Bid: <br> <strong>2.03 ETH</strong></span>
                  </div>
                  <div class="col-6">
                    <span>Ends In: <br> <strong>25th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-06.jpg" alt="" style="border-radius: 20px;">
                <h4>Invisible NFT Land</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-6">
                    <span>Current Bid: <br> <strong>2.03 ETH</strong></span>
                  </div>
                  <div class="col-6">
                    <span>Ends In: <br> <strong>25th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="item">
            <div class="row">
              <div class="col-lg-12">
                <span class="author">
                  <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                </span>
                <img src="assets/images/discover-05.jpg" alt="" style="border-radius: 20px;">
                <h4>Another Half Ape</h4>
              </div>
              <div class="col-lg-12">
                <div class="line-dec"></div>
                <div class="row">
                  <div class="col-6">
                    <span>Current Bid: <br> <strong>2.64 ETH</strong></span>
                  </div>
                  <div class="col-6">
                    <span>Ends In: <br> <strong>25th Nov</strong></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="main-button">
                  <a href="details.html">View Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="top-seller">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Our Top Sellers This Week.</h2>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>1.</h4>
                <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>NFT Top Artist<br><a href="#">8.6 ETH or $12,000</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>2.</h4>
                <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>George Brandon<br><a href="#">4.8 ETH or $14,000</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>3.</h4>
                <img src="assets/images/author-03.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Johnny Mayson<br><a href="#">6.2 ETH or $26,000</a></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>4.</h4>
                <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Liberty Artist<br><a href="#">4.5 ETH or $11,600</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>5.</h4>
                <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Ronald Martino<br><a href="#">7.2 ETH or $14,500</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>6.</h4>
                <img src="assets/images/author-03.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Anthony Brown<br><a href="#">8.6 ETH or $7,400</a></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>7.</h4>
                <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Liberty Artist<br><a href="#">9.8 ETH or $14,200</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>8.</h4>
                <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Ronald Martino<br><a href="#">6.5 ETH or $15,000</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>9.</h4>
                <img src="assets/images/author-03.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>David Walker<br><a href="#">2.5 ETH or $12,000</a></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="item">
                <h4>10.</h4>
                <img src="assets/images/author.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Liberty Artist<br><a href="#">8.8 ETH or $16,800</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>11.</h4>
                <img src="assets/images/author-02.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>Anthony Brown<br><a href="#">7.5 ETH or $15,400</a></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item">
                <h4>12.</h4>
                <img src="assets/images/author-03.jpg" alt="" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                <h6>David Walker<br><a href="#">5.2 ETH or $12,300</a></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once('partials/footer.php');
  include_once('partials/skripts.php');
  ?>

</body>
</html>
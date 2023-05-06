<?php
include('partials/header.php');
?>
<main>
    <?php
        include('partials/banner.php');
        include('partials/quote.php');
    ?>
    <section class="container">
        <?php
            $Explore->get_explore(8);
        ?>
    </section>

</main>
<?php
include('partials/footer.php');
?>

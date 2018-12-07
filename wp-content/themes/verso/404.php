<?php get_header(); ?>

<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="not-found">
                    <h1><?php _e("OH, NO!  Supervillains destroyed this website. Try heading back to our Home page. You will be covered there.", "itbrolis"); ?></h1>
                    <a href="<?php echo get_home_url(); ?>"><?php _e("Back", "itb"); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

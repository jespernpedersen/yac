<?php 
/*
Template Name: Frontpage
Template Post Type: post, page, event
*/


get_header();
?>

<!-- Content -->
<main>

<?php 
    if(!wp_is_mobile()) {
        // Is Desktop
    ?>
    <!-- Desktop -->
    

    <!-- Blogs -->
    <section class="blogs-section">
        <div class="container">
           <h2>Blog</h2>
           <div class="blog-container">
                <div class="all-blog-items">
                    <div class="blog-featured">
                        <h3>Featured</h3>
                    </div>
                    <div class="blog-items">
                        <?php 
                            $posts = get_posts( array(
                                'post_type'      => 'post',
                                'order'          => 'DESC',
                                'meta_key'       => 'is_post_featured',
                                'posts_per_page' => '4'
                            ));
                            
                            if( $posts ) {
                                foreach( $posts as $post ) {
                                    ?>                
                                    <div class="blog-item">
                                        <div class="bg-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID);  ?>') ">
                                        </div>
                                            <a href="<?php echo get_permalink($post->ID); ?>" class="overlay-link" title="">
                                                <span>
                                                    <div class="overlay-content">
                                                        <div class="blog-categories">
                                                            <span>Categories</span>
                                                        </div>
                                                        <div class="blog-title-wrapper">
                                                            <h4><?php echo get_the_title(); ?></h4>
                                                            <hr>
                                                            <div class="date-author">
                                                                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                                                                <span class="author"><?php echo the_author_meta( 'display_name', $post->post_author ); ?></span>
                                                            </div>
                                                        </div>
                                                        <p> <?php echo get_the_excerpt($post->ID); ?></p>
                                                    </div>
                                                </span>
                                            </a>
                                    </div>
                                    <?php
                                }
                                wp_reset_query();
                            }
                        ?>
                        </div>
                </div><!-- End .all-blog-items -->
                <div class="newest-articles">
                    <h3>Newest Articles</h3>
                    <!-- Latest Articles -->
                    <?php 
                            $posts = get_posts( array(
                                'post_type'      => 'post',
                                'order'          => 'DESC',
                                'posts_per_page' => '3'
                            ));
                            
                            if( $posts ) {
                                foreach( $posts as $post ) {
                                    ?>                
                                    <div class="blog-item">
                                            <a href="<?php echo get_permalink($post->ID); ?>" class="overlay-link" title="">
                                                <span>
                                                    <div class="blog-title-wrapper">
                                                        <h4><?php echo get_the_title(); ?></h4>
                                                        <p> <?php echo get_the_excerpt($post->ID); ?></p>
                                                        <div class="date-author">
                                                            <span class="author"><?php echo the_author_meta( 'display_name', $post->post_author ); ?></span>
                                                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                                                        </div>
                                                    </div>
                                                </span>
                                            </a>
                                        </div>
                                    <?php
                                }
                                wp_reset_query();
                            }
                        ?>
                    <!-- See all articles -->
                    <a class="article-btn btn" title="" href="#">See all Articles</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Events Timeline -->


    <!-- Who Are We? -->
    <section class="about-section">
        <div class="container">
            <h2>Who are we?</h2>
            <div class="grid grid-2">
                <div class="column">
                    <!-- Paragraph Text -->
                    <p>Halvah corissant powder. Cheesecake candy canes jelly-o muffin pastry lemon drops macaroon. Jelly tart tiramisu jelly-o cotton candy chocolate bar bear claw sweet donut. Marshmallow carrot cake chocolate bar sesame snaps.</p>
                    <p>Tiramisu pie cupcake chocolate cake candy liquorice. Powder wafer caramels. Fruitcake soufflé macaroon jelly beans. Lollipop halvah dragée</p>
                </div>
                <div class="column">
                    <!-- YouTube Video -->    
                    <div class="youtube-embed">
                        <iframe id="ytplayer" type="text/html" width="100%" height="100%"
                        src="https://www.youtube.com/embed/iuFI31BJArs"
                        frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors -->


    <?php 
        }
    else {
        // Is Mobile
    ?>
    <!-- Mobile --> 




    <?php } ?>
</main>


<?php
get_footer();
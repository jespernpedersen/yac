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
           <h2>Blogs</h2>
           <div class="blog-items">
            <?php 
                $posts = get_posts( array(
                    'post_type'      => 'post',
                    'order'          => 'DESC',
                ));
                
                if( $posts ) {
                    foreach( $posts as $post ) {
                        ?>
                        <!-- Image -->
                        <!-- Title -->
                        <!-- Excerpt -->
                        <!-- Date -->
                        <!-- Author -->                  
                        <div class="blog-item">
                            <div class="bg-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID);  ?>') ">
                                <a href="<?php echo get_permalink($post->ID); ?>" class="overlay-link" title="">
                                    <span>
                                        <div class="overlay-content">
                                            <div class="blog-title-wrapper">
                                                <h3><?php echo get_the_title(); ?></h3>
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
                        </div>
                        <?php
                    }
                    wp_reset_query();
                }
            ?>
            </div>
        </div>
    </section>


    <!-- Events Timeline -->


    <!-- Who Are We? -->


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
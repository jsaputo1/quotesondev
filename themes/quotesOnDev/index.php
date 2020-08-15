<?php get_header(); ?>
    <section class="random-quote-home-page">
    <!-- Random quote loop -->
        <?php
        $args = array( 
        'post_type' => 'post', 
        'orderby' => 'rand',
        'numberposts' => 1
        );
        $quotes = get_posts( $args ); 
        ?>
        <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>
        <div class="home-quote">
            <!-- Random quote content -->
            <q>
                <?php the_content(); ?> 
            </q>
        </div>
        <div class="credentials">
            <span class="author">— <?php the_title(); ?></span>
            <div class="source">
            <a href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" class="source-link" target="new"> 
            <span><?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>
            </div>
        </div> 
        <?php endforeach;?>
    <!-- Random quote generator -->
    <button id="quote-button">Show Me Another!</button>
</section>
<!-- Footer -->
<?php get_footer();?>




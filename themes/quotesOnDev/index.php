<?php get_header(); ?>


<!-- Random quote loop -->
<div class="random-quote">


    <?php
        $args = array( 
            'post_type' => 'post', 
            'orderby' => 'rand',
            'numberposts' => 1
            );
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>
<div class="desktop-container">
    <!-- Random quote content -->
    <i class="fas fa-quote-left" id="left"></i>
    <div class="home-quote">
    

        <?php the_content(); ?> 
    </div>
    <i class="fas fa-quote-right" id="right"></i>

    </div>
        
    <div class="quote-section">
        <span class="author">— <?php the_title(); ?></span>

        <div class="source">
        <a href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" class="source-link" target="new"> 
        
        <span><?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>
        </div>
    </div>

    
    <?php endforeach;?>
   

</div>

<!-- Random quote generator -->
<button id="quote-button">Show Me Another!</button>


<!-- Footer -->
<?php get_footer();?>




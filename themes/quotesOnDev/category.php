<?php get_header(); ?>
<div class="category-page">

    <h1 class="category-header">Category: <?php $category = get_the_category(); echo $category[0]->cat_name;?> </h1>
    <hr>

<!-- Category quote loop -->

    <?php
        $args = array( 
            'post_type' => 'post', 
            'orderby' => 'ASC',
            'numberposts' => 5
            );
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

    <!-- Random quote content -->
    <div class="home-quote">
        <?php the_content(); ?> 
    </div>

    <span class="author">- <?php the_title(); ?></span>
     <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
    <hr>
    <?php endforeach;?>


</div>
<div class="posts-nav">
    <?php the_posts_pagination(array (
        'prev_text' => __( 'Prev' ),
        'next_text' => __( 'Next' ),  
        'screen_reader_text' => __('  ')
    ));?>

</div>



<!-- Footer -->
<?php get_footer();?>




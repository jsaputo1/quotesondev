<?php get_header(); ?>
<div class="category-page">
    <h1 class="selected-category-title">Category: <?php $category = get_the_category(); echo $category[0]->cat_name;?> </h1>
    <hr class="single-page-dotted-line">
    <?php  
    if( have_posts() )  
    while( have_posts() ) :
    the_post(); 
    ?>
    <div class="category-quote-container">
        <div class="category-quote">
            <?php the_content(); ?> 
        </div>
        <div class="category-credentials">
            <span class="category-page-author">- <?php the_title(); ?>
            <a href="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" class="source-link" target="new"> 
            <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>
        </div>
    </div>
    <hr class="single-page-dotted-line">
    <?php endwhile;?>
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

<?php get_header(); ?>
<div class="archive-page">

    <h1>Archives</h1>

    <!-- author loop -->
    <h2>Quote Authors</h2>

    <?php
        $args = array( 
            'order' => 'ASC',
            'orderby' => 'title',
            'numberposts' => -1

        );
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

    <?php endforeach;?>

    <!-- Category loop -->
    <h2>Categories</h2>
    <?php 
    $args = array(
        'order' => 'ASC', 
    ); 
    $cats = get_categories($args);
    foreach ($cats as $cat) {           
        $cat_id= $cat->term_id;
        $cat_name= $cat->name; ?>

        <?php echo '<a href="' . get_category_link( $cat_id ) . '">'.$cat->name.'</a>'; ?>    

    <?php  } ?>

    <!-- Tags loop -->
    <h2>Tags</h2>
    <?php 
        $args = array(
            'order' => 'ASC', 
        ); 
        $tags = get_tags($args);
        foreach ($tags as $tag) {           
            $tag_id= $tag->term_id;
            $tag_name= $tag->name; ?>
            <?php echo '<a href="' . get_tag_link( $tag_id ) . '">'.$tag->name.'</a>'; ?>      
    <?php  } ?>

</div>

<!-- Footer -->
<?php get_footer();?>

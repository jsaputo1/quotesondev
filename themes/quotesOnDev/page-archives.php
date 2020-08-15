<?php get_header(); ?>
<div class="archive-page">

    <h1>Archives</h1>

    <!-- author loop -->
    <h2>Quote Authors</h2>

    <?php
        $args = array( 
            'orderby' => 'title',
            'order' => 'ASC',
            'hide_empty' => 1,
            'numberposts' => -1
        );
        $quotes = get_posts( $args ); 
        $list = array();
    ?>

    <ul>
        <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>
        <?php 
            if(in_array(get_the_title(), $list)){ continue; }
            $list[] = get_the_title();
        ?>
        <li> 
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
        <?php endforeach;?>
    </ul>
    <?php  wp_reset_postdata(); ?>
    <!-- Category loop -->
    <h2>Categories</h2>
    <ul>
    <?php 
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => 1, 
        'number' => 9999 
    ); 
    $cats = get_categories($args);
    foreach ($cats as $cat) {           
        $cat_id= $cat->term_id;
        $cat_name= $cat->name; ?>
        <li>
        <?php echo '<a href="' . get_category_link( $cat_id ) . '">'.$cat->name.'</a>'; ?>   
        </li>

    <?php  } ?>
    </ul>

    <!-- Tags loop -->
    <h2>Tags</h2>
    <ul>
    <?php 
        $args = array(
            'order' => 'ASC', 
        ); 
        $tags = get_tags($args);
        foreach ($tags as $tag) {           
            $tag_id= $tag->term_id;
            $tag_name= $tag->name; ?>
            <li>
            <?php echo '<a href="' . get_tag_link( $tag_id ) . '">'.$tag->name.'</a>'; ?> 
            </li>     
    <?php  } ?>
    </ul>
</div>

<!-- Footer -->
<?php get_footer();?>

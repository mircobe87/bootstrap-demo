<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>
        <?php bloginfo('name');?>
    </title>

    <link href="<?php bloginfo('template_url'); ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/less/style.less" />

    <script src="<?php bloginfo('template_url'); ?>/libs/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/libs/lessjs/less.min.js" type="text/javascript"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/tiles.js" type="text/javascript"></script>
</head>

<body>
    <?php get_header(); ?>

    <!-- BODY -->
    <?php
    $latest_posts = array();
        if ( have_posts() ) {
            $format = 'l d M Y, H:i';
        	while ( have_posts() ) {
        		the_post();
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large')[0];
                $post_map = array(
                    "id" => get_the_ID(),
                    "author" => get_the_author(),
                    "title" => the_title( '', '', false),
                    "categories" => get_the_category(),
                    "tags" => get_tags(),
                    "date" => get_the_date($format),
                    "thumbnail" => $large_image_url
                );
                array_push($latest_posts, $post_map);
            }
/*
            ?>
                <code><?php echo var_dump($latest_posts) ?></code>
            <?php
*/
        }
        function the_tile_style($posts_data, $index)
        {
            $style = '""';
            if ($index < count($posts_data) && $posts_data[$index]['thumbnail'] != NULL) {
                $style = "\"background-image: url(" . $posts_data[$index]['thumbnail'] . "\")";
            }
            echo $style;
        }
        function the_post_content($posts_data, $index)
        {
            global $post;
            $my_postid = $posts_data[$index]['id'];
            $post = get_post($my_postid);
            setup_postdata( $post, null, true );
            the_content();
            wp_reset_postdata( $post );
            /*
            $content = get_post_field('post_content', $my_postid);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
            */
        }
        function getName($cat) {
            return $cat -> {'name'};
        }
        function concat($str0, $str1) {
            if ($str0 == null || $str0 == '') {
                return $str1;
            }
            return $str0 . ', ' . $str1;
        }
        function the_categories_list($posts_data, $index)
        {
            $categories = $posts_data[$index]['categories'];
            $list = array_reduce(array_map("getName", $categories), "concat");
            return $list;
        }
        function the_tags_list($posts_data, $index)
        {
            $tags = $posts_data[$index]['tags'];
            $list = array_reduce(array_map("getName", $tags), "concat");
            return $list;
        }

        function the_overlay_content($posts_data, $index)
        {
            if ($index < count($posts_data)) {
                ?>
                    <div class="overlay-header">
                        <span class="left"><?php echo $posts_data[$index]['date']; ?></span>
                        <span class="right"><?php echo $posts_data[$index]['author']; ?></span>
                    </div>
                    <div class="overlay-title">
                        <?php echo $posts_data[$index]['title']; ?>
                    </div>
                    <div class="overlay-body">
                        <?php the_post_content($posts_data, $index) ?>
                    </div>
                    <div class="overlay-footer">
                        <span class="left"><?php echo the_categories_list($posts_data, $index); ?></span>
                        <span class="right"><?php echo the_tags_list($posts_data, $index); ?></span>
                    </div>
                <?php
            } else {
                ?>
                    <p>No Post</p>
                <?php
            }
        }
    ?>
    <div class="container">

        <div class="row">
            <div class="col-sm-7 col-md-7 col-lg-7 tile-container">
                <div class="tile">
                    <div class="post-img lvl-1" style=<?php the_tile_style($latest_posts, 0); ?>></div>
                </div>
                <div class="tile-overlay">
                    <?php the_overlay_content($latest_posts, 0); ?>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 tile-container">
                        <div class="tile">
                            <div class="post-img lvl-2" style=<?php the_tile_style($latest_posts, 1); ?>></div>
                        </div>
                        <div class="tile-overlay">
                            <?php the_overlay_content($latest_posts, 1); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 tile-container">
                        <div class="tile">
                            <div class="post-img lvl-2" style=<?php the_tile_style($latest_posts, 2); ?>></div>
                        </div>
                        <div class="tile-overlay">
                            <?php the_overlay_content($latest_posts, 2); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 tile-container">
                <div class="tile">
                    <div class="post-img lvl-3" style=<?php the_tile_style($latest_posts, 3); ?>></div>
                </div>
                <div class="tile-overlay">
                    <?php the_overlay_content($latest_posts, 3); ?>
                </div>
            </div>
            <div class="col-sm-4 tile-container">
                <div class="tile">
                    <div class="post-img lvl-3" style=<?php the_tile_style($latest_posts, 4); ?>></div>
                </div>
                <div class="tile-overlay">
                    <?php the_overlay_content($latest_posts, 4); ?>
                </div>
            </div>
            <div class="col-sm-4 tile-container">
                <div class="tile">
                    <div class="post-img lvl-3" style=<?php the_tile_style($latest_posts, 5); ?>></div>
                </div>
                <div class="tile-overlay">
                    <?php the_overlay_content($latest_posts, 5); ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>

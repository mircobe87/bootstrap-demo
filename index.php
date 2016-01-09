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
        function the_post_title($posts_data, $index)
        {
            $title = "";
            if ($index < count($posts_data)) {
                $title = $posts_data[$index]['title'];
            }
            echo $title;
        }
    ?>
    <div class="container">

        <div class="row">
            <div class="col-sm-6 col-md-8 tile-container">
                <div class="tile">
                    <div class="post-img lvl-1" style=<?php the_tile_style($latest_posts, 0); ?>></div>
                </div>
                <div class="tile-overlay">
                    <h2><?php the_post_title($latest_posts, 0); ?></h2>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 tile-container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12 tile-container">
                        <div class="tile">
                            <div class="post-img lvl-2" style=<?php the_tile_style($latest_posts, 1); ?>></div>
                        </div>
                        <div class="tile-overlay">
                            <h2><?php the_post_title($latest_posts, 1); ?></h2>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12 tile-container">
                        <div class="tile">
                            <div class="post-img lvl-2" style=<?php the_tile_style($latest_posts, 2); ?>></div>
                        </div>
                        <div class="tile-overlay">
                            <h2><?php the_post_title($latest_posts, 2); ?></h2>
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
                    <h2><?php the_post_title($latest_posts, 3); ?></h2>
                </div>
            </div>
            <div class="col-sm-4 tile-container">
                <div class="tile">
                    <div class="post-img lvl-3" style=<?php the_tile_style($latest_posts, 4); ?>></div>
                </div>
                <div class="tile-overlay">
                    <h2><?php the_post_title($latest_posts, 4); ?></h2>
                </div>
            </div>
            <div class="col-sm-4 tile-container">
                <div class="tile">
                    <div class="post-img lvl-3" style=<?php the_tile_style($latest_posts, 5); ?>></div>
                </div>
                <div class="tile-overlay">
                    <h2><?php the_post_title($latest_posts, 5); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>
</body>

</html>

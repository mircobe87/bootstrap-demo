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
</head>

<body>
  <?php get_header(); ?>
  <!-- BODY -->
  <div class="container">
    <?php the_post(); ?>
    <div class="row">
      <div class="col-sm-6 tile-container">
        <div class="tile avatar-backgrounded" style="background-image: url(<?php echo get_avatar_url($post->post_author); ?>);">
          <div>
            <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;</span>
            <span><?php the_author(); ?></span>
          </div>
          <div>
            <span class="glyphicon glyphicon-time" aria-hidden="true">&nbsp;</span>
            <span><?php the_date(); ?></span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 tile-container">
        <div class="tile">
          <div>
            <span class="glyphicon glyphicon-folder-open" aria-hidden="true">&nbsp;</span>
            <span><?php the_category(', '); ?> </span>
          </div>
          <div>
            <span class="glyphicon glyphicon-tags" aria-hidden="true">&nbsp;</span>
            <span><?php the_tags('', ', ', '.'); ?> </span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 tile-container">
        <div class="tile">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
</body>
</html>

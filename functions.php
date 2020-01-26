<?php

    //
    // navbar functions
    //


    // register custom navigation walker
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    // activate featured image support, and nav menus
  function theme_setup() {
    add_theme_support('post-thumbnails');
    register_nav_menus(array( 'primary' => __('Primary Menu') ));
  }
  add_action('after_setup_theme', 'theme_setup');

    //
    // widget functions
    //

    // activate widgits, and html options
  function init_widgets($id) {
    register_sidebar(array(
      'name' => 'Sidebar',
      'id'   => 'sidebar',
      'before_widget' => '<div class="card">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<div class="card-header"><h2 class="text-left">',
      'after_title'   => '</h2></div><div class="card-body">'
    ));
  }
  add_action('widgets_init', 'init_widgets');

    // require customized widget files
  require_once('widgets/class-wp-widget-recent-posts.php');
  require_once('widgets/class-wp-widget-recent-comments.php');
  require_once('widgets/class-wp-widget-categories.php');

    // adds 'list-group-item' css class to categories li
  function add_new_class_list_categories($list){
  	$list = str_replace('cat-item', 'cat-item list-group-item', $list);
  	return $list;
  }
  add_filter('wp_list_categories', 'add_new_class_list_categories');

    // register custom widgets
  function bootpress_register_widgets(){
  	register_widget('WP_Widget_Recent_Posts_Custom');
  	register_widget('WP_Widget_Recent_Comments_Custom');
  	register_widget('WP_Widget_Categories_Custom');
  }
  add_action('widgets_init','bootpress_register_widgets');

    //
    // comment functions
    //

    // add comments
  function add_theme_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li class="card comment-item"';
      $add_below = 'div-comment';
    }
  ?>
     <!-- snippet from: https://codex.wordpress.org/Function_Reference/wp_list_comments -->
  <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="comment-author vcard">
            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
          </div>
        </div>

        <div class="col-md-9">
          <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
            <br />
          <?php endif; ?>

          <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php
              /* translators: 1: date, 2: time */
              printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
            ?>
          </div>

          <?php comment_text(); ?>

          <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
          </div>
        </div>
      </div>
    </div>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
  <?php
  }

?>

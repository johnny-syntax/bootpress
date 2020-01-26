  <!-- get header partial -->
<?php get_header(); ?>

    <div class="container index">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-center d-none"> Blog Posts </h2>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <article class="post">
                <br />
                <h2 class="text-center"> <?php echo the_title(); ?> </h2>
                <br />

                <div class="row">
                  <div class="col-md-12">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                      </div>
                    <?php endif; ?>

                    <p class="meta"> Posted at <?php the_time(); ?> on <?php the_date(); ?> by <strong> <?php the_author(); ?> </strong> </p>

                      <!-- the post content -->
                    <?php the_content(); ?>
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php comments_template(); ?>
        </div>
        <div class="col-md-4">
          <?php if (is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

  <!-- get footer partial -->
<?php get_footer(); ?>

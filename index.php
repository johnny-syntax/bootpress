  <!-- get header partial -->
<?php get_header(); ?>

    <div class="container index">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-center d-none"> Blog Posts </h2>
            <!-- the post loop -->
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <article class="post">
                <div class="card">
                  <div class="card-header">
                      <!-- the post title, and permalink -->
                    <h3> <a href="<?php echo the_permalink(); ?>"> <?php echo the_title(); ?> </a> </h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <?php if (has_post_thumbnail()) : ?>
                          <div class="post-thumbnail">
                              <!-- the post thumbnail -->
                            <?php the_post_thumbnail(); ?>
                          </div>
                        <?php else : ?>
                          <div class="post-thumbnail">
                              <!-- the post thumbnail -->
                            <img src="<? bloginfo('template_url'); ?>/screenshot.png" alt="BootPress Logo">
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-md-9">
                        <p class="meta">
                            <!-- the post time, date, and author -->
                          Posted at <?php the_time(); ?> on <?php the_date(); ?> by <strong> <?php the_author(); ?> </strong>
                        </p>
                        <div class="excerpt">
                            <!-- the post exerpt -->
                          <?php echo get_the_excerpt(); ?>
                        </div> <br/>
                        <a class="btn btn-primary float-right" href="<?php the_permalink(); ?>">
                          Read More &rarr;
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
          <?php endif; ?>
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

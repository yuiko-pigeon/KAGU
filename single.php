<?php get_header(); ?>
<?php 
    if( have_posts()):
        while( have_posts()):
            the_post(); ?>
      
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="about">
            <h2 id="about" class="about__title about__title--top-margin about__title--bottom-margin">
            <?php the_title(); ?>
            </h2>
            <?php the_content(); ?>
            </section>
            </article>
    <?php endwhile;
        else:?>
        <p>表示する記事がありません</p>
    <?php endif; ?>

        <?php get_footer(); ?> 
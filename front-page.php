<?php get_header(); ?>
<main class="main"> 
            <section class="about">
            <?php the_content(); ?>
            </section>
            <?php
                $post_id = 1; // 表示したい投稿のID
                $query = new WP_Query( array( 'p' => $post_id, 'post_type' => 'post' ) );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        get_template_part( 'template-parts/content', 'single' ); // パーツを呼び出す。template-parts/contentについては後述。
                    }
                    wp_reset_postdata();
                }
                ?>
        </main>
        <?php get_footer(); ?> 
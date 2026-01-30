<?php
/**
 * The Archive Template
 *
 * Displays archive pages (category, tag, date, author).
 * RGAA 4.1.2 compliant.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="archive-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <header class="archive-header">
            <?php
            the_archive_title('<h1 id="archive-title" class="archive-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>

            <div class="posts-grid" role="list" aria-label="<?php esc_attr_e('List of posts', 'azit-industrial'); ?>">
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?> role="listitem">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php the_post_thumbnail('azit-card', array('alt' => '')); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="post-header">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="post-date">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>

                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>

                            <div class="post-excerpt">
                                <?php echo esc_html(azit_excerpt(20, '...')); ?>
                            </div>

                            <footer class="post-footer">
                                <a href="<?php the_permalink(); ?>" class="post-link">
                                    <?php esc_html_e('Read more', 'azit-industrial'); ?>
                                    <span class="sr-only">
                                        <?php echo esc_html(sprintf(__('about %s', 'azit-industrial'), get_the_title())); ?>
                                    </span>
                                </a>
                            </footer>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <?php azit_pagination(); ?>

        <?php else : ?>

            <section class="no-results">
                <h2><?php esc_html_e('No posts found', 'azit-industrial'); ?></h2>
                <p><?php esc_html_e('No content matches your criteria. Please try a different filter or browse other sections.', 'azit-industrial'); ?></p>
            </section>

        <?php endif; ?>

    </div>

</main>

<?php
get_footer();

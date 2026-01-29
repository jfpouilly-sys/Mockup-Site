<?php
/**
 * The template for displaying all single posts
 *
 * RGAA 4.1.2 compliant with proper landmarks, navigation, and metadata.
 *
 * @package AZIT_Industrial
 * @since 7.1-RGAA-WP
 */

get_header();
?>

<main id="main-content" role="main" tabindex="-1" aria-labelledby="post-title">

    <div class="container">

        <?php echo azit_breadcrumb(); ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

                <header class="entry-header">
                    <h1 id="post-title" class="entry-title"><?php the_title(); ?></h1>

                    <div class="entry-meta">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="posted-on">
                            <?php
                            printf(
                                /* translators: %s: post date */
                                esc_html__('Published on %s', 'azit-industrial'),
                                '<span class="date">' . esc_html(get_the_date()) . '</span>'
                            );
                            ?>
                        </time>

                        <span class="byline">
                            <?php
                            printf(
                                /* translators: %s: author name */
                                esc_html__('by %s', 'azit-industrial'),
                                '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>'
                            );
                            ?>
                        </span>

                        <?php
                        $categories = get_the_category();
                        if ($categories) :
                        ?>
                        <span class="cat-links">
                            <span class="sr-only"><?php esc_html_e('Categories:', 'azit-industrial'); ?></span>
                            <?php
                            $cat_links = array();
                            foreach ($categories as $cat) {
                                $cat_links[] = '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
                            }
                            echo implode(', ', $cat_links);
                            ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                <figure class="entry-thumbnail">
                    <?php
                    the_post_thumbnail('large', array(
                        'alt' => get_the_title(),
                        'class' => 'featured-image',
                    ));
                    ?>
                </figure>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page navigation', 'azit-industrial') . '"><span class="page-links-title">' . __('Pages:', 'azit-industrial') . '</span>',
                        'after'  => '</nav>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    // Tags
                    $tags = get_the_tags();
                    if ($tags) :
                    ?>
                    <div class="tags-links">
                        <span class="tags-label"><?php esc_html_e('Tags:', 'azit-industrial'); ?></span>
                        <?php
                        $tag_links = array();
                        foreach ($tags as $tag) {
                            $tag_links[] = '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" rel="tag">' . esc_html($tag->name) . '</a>';
                        }
                        echo implode(', ', $tag_links);
                        ?>
                    </div>
                    <?php endif; ?>

                    <?php azit_social_share(); ?>

                    <?php
                    if (get_edit_post_link()) :
                        edit_post_link(
                            sprintf(
                                __('Edit %s', 'azit-industrial'),
                                '<span class="sr-only">' . get_the_title() . '</span>'
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                    endif;
                    ?>
                </footer>

            </article>

            <!-- Post Navigation -->
            <nav class="post-navigation" aria-label="<?php esc_attr_e('Post navigation', 'azit-industrial'); ?>">
                <h2 class="sr-only"><?php esc_html_e('Post navigation', 'azit-industrial'); ?></h2>
                <div class="nav-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();

                    if ($prev_post) :
                    ?>
                    <div class="nav-previous">
                        <span class="nav-subtitle"><?php esc_html_e('Previous', 'azit-industrial'); ?></span>
                        <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" rel="prev">
                            <span class="nav-title"><?php echo esc_html($prev_post->post_title); ?></span>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                    <div class="nav-next">
                        <span class="nav-subtitle"><?php esc_html_e('Next', 'azit-industrial'); ?></span>
                        <a href="<?php echo esc_url(get_permalink($next_post)); ?>" rel="next">
                            <span class="nav-title"><?php echo esc_html($next_post->post_title); ?></span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </nav>

            <?php
            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>

    </div>

</main>

<?php
get_footer();

<?php

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package HashOne
 */
if (!function_exists('hashone_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function hashone_posted_on() {
        $time_string = '<span class="hs-month">%1$s</span><span class="hs-day">%2$s</span><span class="hs-year">%3$s</span>';

        $posted_on = sprintf($time_string, esc_attr(get_the_date('M')), esc_html(get_the_date('j')), esc_html(get_the_date('Y'))
        );

        $byline = sprintf(
                esc_html_x('by %s', 'post author', 'hashone'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        $comment_count = get_comments_number(); // get_comments_number returns only a numeric value


        if ($comment_count == 0) {
            $comments = sprintf(esc_html__('No %s', 'hashone'), '<span>' . esc_html__('Comments', 'hashone') . '</span>');
        } elseif ($comment_count > 1) {
            $comments = $comment_count . ' <span>' . esc_html__('Comments', 'hashone') . '</span>';
        } else {
            $comments = sprintf(esc_html__('1 %s', 'hashone'), '<span>' . esc_html__('Comment', 'hashone') . '</span>');
        }
        $comment_link = '<a href="' . get_comments_link() . '">' . $comments . '</a>';

        echo '<span class="entry-date published updated">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>' . $comment_link; // WPCS: XSS OK.
    }

endif;

if (!function_exists('hashone_entry_footer')) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function hashone_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'hashone') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list) {
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'hashone') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            comments_popup_link(esc_html__('Leave a comment', 'hashone'), esc_html__('1 Comment', 'hashone'), esc_html__('% Comments', 'hashone'));
            echo '</span>';
        }

        edit_post_link(esc_html__('Edit', 'hashone'), '<span class="edit-link">', '</span>');
    }

endif;

if (!function_exists('hashone_entry_category')) :

    /**
     * Prints HTML with meta information for the categories
     */
    function hashone_entry_category() {
        // Hide category and tag text for pages.
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                echo '<i class="fa fa-bookmark"></i>' . $categories_list; // WPCS: XSS OK.
            }
        }
    }

endif;
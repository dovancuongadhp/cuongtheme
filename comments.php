<?php
// Kiểm tra nếu bình luận đã được phê duyệt và số lượng bình luận không phải là 0
if ( have_comments() ) : ?>

    <div id="comments" class="comments-area">

        <h2 class="comments-title">
            <?php
            // Lấy số lượng bình luận
            $comments_number = get_comments_number();

            if ( '1' === $comments_number ) {
                printf(
                    /* translators: 1: số lượng bình luận */
                    esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'cuongtheme' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf( // WPCS: XSS OK.
                    /* translators: 1: số lượng bình luận */
                    esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'cuongtheme' ) ),
                    number_format_i18n( $comments_number ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            // Hiển thị danh sách các bình luận
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>

        <?php
        // Kiểm tra xem có cần hiển thị phân trang bình luận không
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cuongtheme' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cuongtheme' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cuongtheme' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    </div><!-- #comments -->

<?php
// Nếu bình luận chưa được phê duyệt và không có bình luận nào
endif; // check for have_comments()

// Nếu bình luận bị tắt
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cuongtheme' ); ?></p>
<?php
endif;

// Hiển thị biểu mẫu để người dùng có thể thêm bình luận mới
comment_form();

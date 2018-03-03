<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package responsiveness
 */

?>

</div><!-- #content -->

<a href="#" class="topbutton"></a><!-- Back to top button -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <div class="row"><!-- Start Foundation row -->

        <?php get_sidebar( 'footer' ); ?>

    </div><!-- End Foundation row -->



    <div class="copyright small-12 columns text-center">
        <?php if (get_theme_mod('footer_custom_copyright_text') ) : ?>
        <?php echo wp_kses_post(get_theme_mod('footer_custom_copyright_text')) ?>
    <?php else : ?>
    <?php echo '&copy; '.date_i18n(__('Y','responsiveness')); ?> <?php bloginfo( 'name' ); ?>
<?php endif; ?>
</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

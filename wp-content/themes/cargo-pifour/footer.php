<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
 
    </div><!-- .site-content -->
    <footer id="colophon" class="site-footer wow fadeIn">
        <?php cargo_pifour_footer_top(); ?> 
        <div id="footer-bottom" class="footer-bottom">
            <div class="container">
                <div class="row">
                <?php
                    if(is_active_sidebar( 'sidebar-footer-bottom-left' ) ){  
                    ?> 
                    <div class= "<?php cargo_pifour_footer_class('footer-bottom-left');  ?>">
                                
                        <?php dynamic_sidebar( 'sidebar-footer-bottom-left' ); ?>
                                     
                    </div>
                   <?php } ?>
                   <?php
                    if(is_active_sidebar( 'sidebar-footer-bottom-right' ) ){  
                    ?> 
                    <div class="<?php cargo_pifour_footer_class('footer-bottom-right');  ?>" >
                                
                         <?php dynamic_sidebar( 'sidebar-footer-bottom-right' ); ?>
                                     
                    </div>
                   <?php } ?>                      
                </div>
            </div>
        </div><!-- #footer-bottom -->
         
    </footer><!-- .site-footer -->

</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>
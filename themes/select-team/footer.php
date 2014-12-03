        </div><!--CONTENT-->
        <!-- MODALS -->
        <!-- LOGIN -->
        <div class="[ modal fade ]" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="[ modal-dialog ]">
                <div class="[ modal-content ]">
                    <div class="[ modal-header ]">
                        <button type="button" class="[ close ]" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="[ modal-title ] [ center-text ]" id="myModalLabel">Login</h4>
                    </div>
                    <div class="[ modal-body ]">
                    <?php own_wp_login_form(); ?>
                </div>
            </div>
        </div>
    </div><!--CONTAINER-FLUID-->
    <?php if( !is_page('dashboard') AND !is_page('dashboard-admin') AND !is_page('register') AND !is_page('register-advisor') AND !is_page('admin-advisor-single') ) { ?>
        <footer>
            <div class="[ row ]">
                <div class=" [  col-xs-8 col-sm-6 col-md-4 center block ] [ text-center ]">
                    <a class="[ btn btn-success ] [ center block ] [ margin-bottom ]" href="">Aviso de Privacidad.</a>
                </div>
                <p class="[ col-xs-12 ] [ text-center ]" href="">Todos los derechos reservados. <br class="[ hidden-sm hidden-md hidden-lg ]"> Select Team Becas 2014</p>
            </div>
        </footer>
    <?php } else { ?>
        <footer style="display: none;">
        </footer>
    <?php } ?>
    
    <?php wp_footer(); ?>
  </body>
</html>
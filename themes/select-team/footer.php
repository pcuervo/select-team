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
    <footer>
        <div class="[ row ]">
            <div class=" [  col-xs-8 center block ] [ text-center ]">
                <a class="[ btn btn-success ] [ col-md-8 center block ] [ margin-bottom ]" href="">Aviso de Privacidad.</a>
                <p class="[ col-xs-12 ] [ text-center ]" href="">Todos los derechos reservados. Select Team Becas 2014</p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
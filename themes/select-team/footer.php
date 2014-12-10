        </div><!--CONTENT-->
        <!-- MODALS -->
        <!-- LOGIN -->
        <div class="[ modal fade ]" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="[ modal-dialog ]">
                <div class="[ modal-content ]">
                    <form role="form" class="[ j-login ]">
                    <div class="[ modal-header ]">
                        <button type="button" class="[ close ]" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h4 class="[ modal-title ] [ center-text ]" id="myModalLabel">Iniciar sesión</h4>
                        <?php } else { ?>
                            <h4 class="[ modal-title ] [ center-text ]" id="myModalLabel">Login</h4>
                        <?php } ?>
                    </div>
                    <div class="[ modal-body ]">
                            <div class="[ input-group ] [ margin-bottom-sm ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <span class="[ input-group-addon ]"><i class="fa fa-user"></i></span>
                                    <input class="[ form-control ]" type="text" placeholder="Nombre de usuario" name="j-email">
                                <?php } else { ?>
                                    <span class="[ input-group-addon ]"><i class="fa fa-user"></i></span>
                                    <input class="[ form-control ]" type="text" placeholder="Username" name="j-email">
                                <?php } ?>
                            </div>
                            <div class="[ input-group ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <span class="[ input-group-addon ]"><i class="fa fa-lock"></i></span>
                                    <input class="[ form-control ]" type="password" placeholder="Contraseña" name="j-password">
                                <?php } else { ?>
                                    <span class="[ input-group-addon ]"><i class="fa fa-lock"></i></span>
                                    <input class="[ form-control ]" type="password" placeholder="Password" name="j-password">
                                <?php } ?>
                            </div>
                    </div>
                    <div class="[ modal-footer ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <button type="button" class="[ btn btn-success ] [ center block ]">Entrar</button>
                        <?php } else { ?>
                            <button type="button" class="[ btn btn-success ] [ center block ]">Enter</button>
                        <?php } ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div><!--CONTAINER-FLUID-->
    <?php if( !is_page('dashboard') AND !is_page('dashboard-admin') AND !is_page('register') AND !is_page('register-advisor') AND !is_page('admin-advisor-single') AND !is_home() ) { ?>
        <footer>
            <div class="[ row ]">
                <div class=" [  col-xs-12 col-sm-6 col-md-12 center block ] [ text-center ]">
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <p class="[ col-xs-12 col-md-8 ] [ center block ] [ text-center ]" href=""> <a href="">Aviso de Privacidad </a> <span>/</span> Todos los derechos reservados. <br class="[ hidden-sm hidden-md hidden-lg ]"> Select Team Becas 2014.</p>
                    <?php } else { ?>
                        <p class="[ col-xs-12 col-md-8 ] [ center block ] [ text-center ]" href=""> <a href="">Privacy policy </a> <span>/</span> All rights reserved. <br class="[ hidden-sm hidden-md hidden-lg ]"> Select Team Becas 2014.</p>
                    <?php } ?>
                </div>
            </div>
        </footer>
    <?php } else { ?>
        <footer style="display: none;">
        </footer>
    <?php } ?>
    <?php wp_footer(); ?>
  </body>
</html>
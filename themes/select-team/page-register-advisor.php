<?php
    if ( ! is_user_logged_in() ) {
        $location = site_url();
        wp_redirect( $location );
        exit;
    }
    get_header();
?>
    <div id="dashboard">
        <!-- Page Content -->
        <div id="page-content-wrapper" class="[ margin-bottom ]">
            <div class="[ container-fluid ]" id="page-content">
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                    <div class="[ col-xs-12 col-sm-7 center block ]">
                        <a href="#" id="menu-toggle" class="[ hidden-md hidden-lg ]"><img src="<?php echo THEMEPATH; ?>images/logo-select-team-mobile.png" class="[ center block ]" alt=""></a>
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Registrar agente</h3>
                        <?php } else { ?>
                            <h3>Register advisor</h3>
                        <?php } ?>
                        <form id="userForm" role="form" class="[ row ] [ j-register-advisor ]" >
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="full_name">Nombre completo</label>
                                <?php } else { ?>
                                    <label for="full_name">Full name</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" name="full_name">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="username">Nombre de usuario</label>
                                <?php } else { ?>
                                    <label for="username">Username</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" name="username">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="email">Correo electrónico</label>
                                <?php } else { ?>
                                    <label for="email">Email</label>
                                <?php } ?>
                                <input type="email" class="[ form-control ]" name="email"> 
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="password">Password</label>
                                <input type="password" class="[ form-control ]" name="password">
                                <p class="help-block">El password debe contener al menos 8 caracteres.</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="password_confirmation">Confirmar password</label>
                                <?php } else { ?>
                                    <label for="password_confirmation">Confirm password</label>
                                <?php } ?>
                                    <input type="password" class="[ form-control ]" name="password_confirmation">
                                    <label for="validate" id="validate"></label>                                 
                            </div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Guardar cambios</button>
                            <?php } else { ?>
                                <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Save changes</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /#page-content-wrapper -->
    </div> <!-- /#dashboard -->
<?php get_footer(); ?>
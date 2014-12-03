<?php
    if ( ! is_user_logged_in() ) {
        $location = site_url();
        wp_redirect( $location );
        exit;
    }
?>
<?php get_header(); ?>
    <div id="dashboard">
        <!-- Page Content -->
        <div id="page-content-wrapper" class="[ margin-bottom ]">
            <div class="[ container-fluid ]" id="page-content">
                <a href="#menu-toggle" id="menu-toggle" class="[ hidden-md hidden-lg ]"><i class="[ fa fa-bars fa-2x ]"></i></a>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                    <div class="[ col-xs-12 col-sm-7 center block ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Perfil</h3>
                        <?php } else { ?>
                            <h3>Profile</h3>
                        <?php } ?>
                        <form id="userForm" role="form" class="[ row ] [  ]" >
                            
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="username">Nombre de usuario</label>
                                    <?php } else { ?>
                                        <label for="username">Username</label>
                                    <?php } ?>
                                    <p>Nombre de usuario</p>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="email">Correo electrónico</label>
                                    <?php } else { ?>
                                        <label for="email">Email</label>
                                    <?php } ?>
                                    <p>Email</p>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <label for="password">Password</label>
                                    <p>password</p>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="password_confirmation">Confirmar password</label>
                                    <?php } else { ?>
                                        <label for="password_confirmation">Confirm password</label>
                                    <?php } ?>
                                        <p>confirmar password</p>
                                        <label for="validate" id="validate"></label>                                 
                                </div>
                            
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="full_name">Nombre completo</label>
                                <?php } else { ?>
                                    <label for="full_name">Full name</label>
                                <?php } ?>
                                <p>Nombre completo</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div><!-- /#page-content-wrapper -->
    </div> <!-- /#dashboard -->
<?php get_footer(); ?>
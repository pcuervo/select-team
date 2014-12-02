<?php
    if ( ! is_user_logged_in() ) {
        $location = site_url();
        wp_redirect( $location );
        exit;
    }
?>
<?php get_header(); ?>
    <div id="dashboard">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <?php if (qtrans_getLanguage() == 'es'){ ?>
                    <li class="sidebar-brand">
                        <p><i class="fa fa-cogs"></i> <span></span>Admin Dashboard </p>
                    </li>
                    <li>
                        <a href="#profile" class="[ js-page-scroll ]"><i class="fa fa-user"></i> <span></span>Mi perfil</a>
                    </li>
                    <li>
                        <a href="#prospects" class="[ js-page-scroll ]"><i class="fa fa-folder-open"></i> <span></span>Prospectos</a>
                    </li>
                    <li>
                        <a href="#messages" class="[ js-page-scroll ]"><i class="fa fa-briefcase"></i> <span></span>Agentes</a>
                    </li>
                <?php } else { ?>
                    <li class="sidebar-brand">
                        <p><i class="fa fa-cogs"></i> <span>Admin Dashboard </span></p>
                    </li>
                    <li>
                        <a href="#profile" class="[ js-page-scroll ]"><i class="fa fa-user"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="#prospects" class="[ js-page-scroll ]"><i class="fa fa-folder-open"></i> <span>Prospects</span></a>
                    </li>
                    <li>
                        <a href="#messages" class="[ js-page-scroll ]"><i class="fa fa-briefcase"></i> <span>Advisors</span></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="[ margin-bottom ]">
            <div class="[ container-fluid ]" id="page-content">
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                    <div class="[ col-xs-12 col-sm-7 center block ]">
                        <h3>Basic Profile</h3>
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
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
                        <p><i class="fa fa-cogs"></i> <span>Admin Dashboard</span> </p>
                    </li>
                    <li>
                        <a href="#profile" class="[ js-page-scroll ]"><i class="fa fa-user"></i> <span>Mi perfil</span></a>
                    </li>
                    <li>
                        <a href="#prospects" class="[ js-page-scroll ]"><i class="fa fa-folder-open"></i> <span>Prospectos</span></a>
                    </li>
                    <li>
                        <a href="#messages" class="[ js-page-scroll ]"><i class="fa fa-briefcase"></i> <span>Agentes</span></a>
                    </li>
                <?php } else { ?>
                    <li class="sidebar-brand">
                        <p><i class="fa fa-cogs"></i> <span>Admin Dashboard</span> </p>
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
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="gender">Género</label>
                                    <p>Mujer u hombre</p>
                                <?php } else { ?>
                                    <label for="gender">Gender</label>
                                    <p>Male or Female</p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="date_of_birth">Fecha de nacimiento</label>
                                    <p>fecha nacimiento</p>  
                                <?php } else { ?>
                                    <label for="date_of_birth">Date of birth</label>
                                    <p>fecha nacimiento</p> 
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="sport">Deporte que practicas</label>
                                <?php } else { ?>
                                    <label for="sport">Sport you practice</label>
                                <?php } ?>
                                <p>Deporte que practica</p>
                            </div>
                            <!--GOLF-->
                            <?php if($_GET['q7']=='golf') { ?>
                                <div class="[ form-group ] [ col-xs-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="average_score">Puntaje promedio</label>
                                    <?php } else { ?>
                                        <label for="average_score">Average score</label>
                                    <?php } ?>
                                    <p>Puntaje promedio</p>
                                </div>
                                <div class="clear"></div>
                            <?php } ?>
                            <!--TENNIS-->
                            <?php if($_GET['q7']=='tennis') { ?>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="tennis_hand">¿Eres zurdo o derecho?</label>
                                        <p>Zurdo o derecho</p>
                                    <?php } else { ?>
                                        <label for="tennis_hand">Right or lef handed?</label>
                                        <p>Left or right</p>
                                    <?php } ?>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="fmt_ranking">Ranking en la FMT (solo para mexicanos)</label>
                                    <?php } else { ?>
                                        <label for="fmt_ranking">FMT ranking (mexicans only)</label>
                                    <?php } ?>
                                    <p>Rank</p>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="atp_tournament">¿Has jugado en torneos de la ATP?</label>
                                    <p>si o no</p>
                                <?php } else { ?>
                                    <label for="atp_tournament">Played an ATP tournament?</label>
                                    <p>yes or no</p>
                                <?php } ?>
                                </div>
                            <?php } ?>
                            <!--SOCCER-->
                            <?php if($_GET['q7']=='soccer') { ?>
                                <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="soccer_position">Posición</label>
                                        <p>posición seleccionada</p>
                                    <?php } else { ?>
                                        <label for="soccer_position">Position</label>
                                        <p>selected position</p>
                                    <?php } ?>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="soccer_height">Estatura (cm)</label>
                                    <?php } else { ?>
                                        <label for="soccer_height">Height (cm)</label>
                                    <?php } ?>
                                    <p>180cm</p>
                                </div>
                            <?php } ?>
                            <!--VOLLEYBALL-->
                            <?php if($_GET['q7']=='volleyball') { ?>
                                <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="volley_position">Posición</label>
                                <?php } else { ?>
                                    <label for="volley_position">Position</label>
                                <?php } ?>
                                    <p>posicion volley</p>
                                </div>
                                <div class="[ form-group ] [ col-xs-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="volley_height">Estatura (cm)</label>
                                    <?php } else { ?>
                                        <label for="volley_height">Height (cm)</label>
                                    <?php } ?>
                                    <p>estatura</p>
                                </div>
                            <?php } ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="exampleInputFile">Sube una foto de perfil</label>
                                <?php } else { ?>
                                    <label for="exampleInputFile">Upload your profile picture</label>
                                <?php } ?>
                                <input type="file" id="exampleInputFile" name="q19">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="help-block">Tu archivo debe ser de 500 x 500 pixels. Peso máximo 400 kb.</p>
                                <?php } else { ?>
                                    <p class="help-block">File must be 500 x 500 pixels. No larger than 400 kb.</p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="">Selecciona el sitio dónde está tu video.</label>
                                <?php } else { ?>
                                    <label for="">Where is your video hosted?</label>
                                <?php } ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="video_host" id="optionsRadios1" value="vimeo" checked>
                                        Vimeo
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="video_host" id="optionsRadios2" value="youtube">
                                        YouTube
                                    </label>
                                </div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="playerVideo">URL de tu video</label>
                                <?php } else { ?>
                                    <label for="playerVideo">Your video URL</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="playerVideo">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="help-block">Pega completa la url de tu video ( www.youtube.com/watch?v=HT3diQX3i1I )</p>
                                <?php } else { ?>
                                    <p class="help-block">Paste the entire url of the video ( www.youtube.com/watch?v=HT3diQX3i1I )</p>
                                <?php } ?>
                            </div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Guardar cambios</button>
                            <?php } else { ?>
                                <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Save changes</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="curriculum">
                    <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                        <h3>Curriculum</h3>
                        <form role="form" class="[ row ]">
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="address">Dirección</label>
                                <?php } else { ?>
                                    <label for="address">Address</label>
                                <?php } ?>
                                <p>su direccion</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="phone">Teléfono</label>
                                <?php } else { ?>
                                    <label for="phone">Phone</label>
                                <?php } ?>
                                <p>su telefono</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="mPhone">Celular</label>
                                <?php } else { ?>
                                    <label for="mPhone">Mobile Phone</label>
                                <?php } ?>
                                <p>su celular</p>
                            </div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <h4 class="[ col-xs-12 ]">Educación</h4>
                            <?php } else { ?>
                                <h4 class="[ col-xs-12 ]">Academic carreer</h4>
                            <?php } ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="highSchool">Preparatoria</label>
                                <?php } else { ?>
                                    <label for="highSchool">Highschool</label>
                                <?php } ?>
                                <p>la escuela patito</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="midGrad" id="midGrad" name="q4">¿En qué año vas?</label>
                                    <p>3º secundaria</p>
                                    <?php } else { ?>
                                        <label for="midGrad" id="midGrad" name="q4">What Class are you in?</label>
                                        <p> freshman</p>
                                 <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <span><label for="q3">¿Cuándo te vas a graduar?</label></span>
                                <?php } else { ?>
                                    <span><label for="q3">When are you graduating?</label></span>
                                <?php } ?>
                                <p>2015</p>
                            </div>
                            <div class="clear"></div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <h4 class="[ col-xs-12 ]">Desarrollo deportivo</h4>
                                <?php } else { ?>
                                    <h4 class="[ col-xs-12 ]">Sports Development</h4>
                                <?php } ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tournament">Torneo</label>
                                <?php } else { ?>
                                    <label for="tournament">Tournament</label>
                                <?php } ?>
                                <p>torneo equis</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tournamentDate">Fecha</label>
                                    <p>2008</p>
                                <?php } else { ?>
                                    <label for="tournamentDate">Date</label>
                                    <p>2008</p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <label for="tournamentRank">Ranking</label>
                                <p>999º</p>
                            </div>
                            <div class="clear"></div>
                            <div class="clear"></div>
                            <div class="[ tournaments-added ] [ col-xs-12 ]"></div>
                        </form>
                    </div>
                </div>
            </div>    
        </div><!-- /#page-content-wrapper -->
    </div> <!-- /#dashboard -->
<?php get_footer(); ?>
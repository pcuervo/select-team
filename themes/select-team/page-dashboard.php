<?php
    if ( ! is_user_logged_in() ) {
        $location = site_url();
        wp_redirect( $location );
        exit;
    }
?>
<?php get_header();?>

    <div id="dashboard">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <p><i class="fa fa-cogs"></i> My Dashboard </p>
                </li>
                <li>
                    <a href="#profile" class="[ js-page-scroll ]"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#curriculum" class="[ js-page-scroll ]"><i class="fa fa-file-o"></i> Curriculum</a>
                </li>
                <li>
                    <a href="#messages" class="[ js-page-scroll ]"><i class="fa fa-envelope-o"></i> Messages</a>
                </li>
                <li class="j-download">
                    <a href="#" type="download"><i class="fa fa-download"></i> Applicant manual</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <?php 
            if(isset($_SESSION['name'])){
                add_profile_picture($_SESSION['st_user_id'], $_SESSION['name']);
                unset($_SESSION['name']);
            }

            $prospect_info = get_user_basic_info(get_current_user_id()); 
            $prospect_sport_answers = get_user_sport_answers($prospect_info->st_user_id);
            $created_curriculum= true; //Aquí se debe checar si tiene o no información registrada.

        ?>
        <!-- Page Content -->
        <div id="page-content-wrapper" class="[ margin-bottom ]">
            <div class="[ container-fluid ]" id="page-content">
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]"  id="upload_picture">
                    <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Foto de perfil</h3>
                        <?php } else { ?>
                            <h3>Profile Picture</h3>
                        <?php } ?>
                        <?php if ( $prospect_info->profile_picture != '' ) { ?>
                            <img src="<?php echo THEMEPATH.'profile_pictures/'.$prospect_info->profile_picture ?>" />
                        <?php } ?>
                        <img src="" />
                        <form action="<?php echo THEMEPATH; ?>upload_picture.php" method="POST" role="form" class="[ row ] [ j-upload-profile-picture ]" enctype="multipart/form-data">
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="exampleInputFile">Sube una foto de perfil</label>
                                <?php } else { ?>
                                    <label for="exampleInputFile">Upload your profile picture</label>
                                <?php } ?>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="help-block">Tu archivo debe ser de 500 x 500 pixels. Peso máximo 400 kb.</p>
                                <?php } else { ?>
                                    <p class="help-block">File must be 500 x 500 pixels. No larger than 400 kb.</p>
                                <?php } ?>
                                <input type="hidden" name="site_url" value="<?php echo site_url(); ?>">
                                <input type="hidden" name="st_user_id" value="<?php echo $prospect_info->st_user_id ?>">
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000" />
                                <input class="columna xsmall-12 medium-4 center block" type="file" name="filename" id="filename">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Subir foto</button>
                                <?php } else { ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Upload file</button>
                                <?php } ?>
                            </div>
                        </form>
                        <?php 
                            if(isset($_GET['err'])){
                                foreach ($_SESSION['upload_message'] as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                    <div class="[ col-xs-12 col-sm-7 center block ]">
                        <form id="userForm" role="form" class="[ row ] [ j-update-basic-profile ]" >
                        </form>

                        <h3>Basic Profile</h3>
                        <form id="userForm" role="form" class="[ row ] [ j-update-basic-profile ]" >
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="username">Nombre de usuario</label>
                                <?php } else { ?>
                                    <label for="username">Username</label>
                                <?php } ?>
                                <p><?php echo $prospect_info->user_login; ?></p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="email">Correo electrónico</label>
                                <?php } else { ?>
                                    <label for="email">Email</label>
                                <?php } ?>
                                <p><?php echo $prospect_info->user_email; ?></p> 
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ] [ hidden ]">
                                <label for="password">Password</label>
                                <input type="password" class="[ form-control ]" name="password">
                                <p class="help-block">El password debe contener al menos 8 caracteres.</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ] [ hidden ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="password_confirmation">Confirmar password</label>
                                <?php } else { ?>
                                    <label for="password_confirmation">Confirm password</label>
                                <?php } ?>
                                    <input type="password" class="[ form-control ]" name="password_confirmation">
                                    <label for="validate" id="validate"></label>                                 
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="full_name">Nombre completo</label>
                                    <input type="text" class="[ form-control ]" id="full_name" value="<?php echo $prospect_info->full_name; ?>" name="full_name" >
                                <?php } else { ?>
                                    <label for="full_name">Full name</label>
                                    <input type="text" class="[ form-control ]" id="full_name" value="<?php echo $prospect_info->full_name; ?>" name="full_name" >
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label>Género</label>
                                    <p>
                                    <?php 
                                        if($prospect_info->gender == 'male') 
                                            echo 'hombre';
                                        else
                                            echo 'mujer';
                                    ?>
                                    </p>
                                <?php } else { ?>
                                    <label>Gender</label>
                                    <p>
                                    <?php 
                                        if($prospect_info->gender == 'male') 
                                            echo 'male';
                                        else
                                            echo 'female';
                                    ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="date_of_birth">Fecha de nacimiento (año-mes-día)</label>
                                <?php } else { ?>
                                    <label for="date_of_birth">Date of birth (year-month-day)</label>
                                <?php } ?>
                                <p><?php echo $prospect_info->date_of_birth; ?></p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="sport">Deporte que practicas</label>
                                <?php } else { ?>
                                    <label for="sport">Sport you practice</label>
                                <?php } ?>
                                <p><?php echo $prospect_info->sport; ?><p/>  
                            </div>
                            <!--GOLF-->
                            <?php if($prospect_info->sport =='golf') { ?>
                                <div class="[ form-group ] [ col-xs-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="average_score">Puntaje promedio</label>
                                    <?php } else { ?>
                                        <label for="average_score">Average score</label>
                                    <?php } ?>
                                    <select class="[ form-control ]" id="averageScore" value="<?php echo $prospect_sport_answers[0]->asnwer; ?>" name="average_score">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <option value="-66" <?php if($prospect_sport_answers[0]->answer=='-66')echo "selected"; ?>>Menor a 66</option>
                                    <?php } else { ?>
                                        <option value="-66" <?php if($prospect_sport_answers[0]->answer=='-66')echo "selected"; ?>>Under 66</option>
                                    <?php } ?>
                                        <option value="66-67" <?php if($prospect_sport_answers[0]->answer=='66-67')echo "selected"; ?>>66-67</option>
                                        <option value="68-70" <?php if($prospect_sport_answers[0]->answer=='68-70')echo "selected"; ?>>68-70</option>
                                        <option value="71-73" <?php if($prospect_sport_answers[0]->answer=='71-73')echo "selected"; ?>>71-73</option>
                                        <option value="74-76" <?php if($prospect_sport_answers[0]->answer=='74-76')echo "selected"; ?>>74-76</option>
                                        <option value="77-79" <?php if($prospect_sport_answers[0]->answer=='77-79')echo "selected"; ?>>77-79</option>
                                        <option value="80-82" <?php if($prospect_sport_answers[0]->answer=='80-82')echo "selected"; ?>>80-82</option>
                                        <option value="83-85" <?php if($prospect_sport_answers[0]->answer=='83-85')echo "selected"; ?>>83-85</option>
                                        <option value="86-88" <?php if($prospect_sport_answers[0]->answer=='86-88')echo "selected"; ?>>86-88</option>
                                        <option value="89-90" <?php if($prospect_sport_answers[0]->answer=='89-90')echo "selected"; ?>>89-90</option>                                        
                                    </select>
                                </div>
                                <div class="clear"></div>
                            <?php } ?>
                            <!--TENNIS-->
                            <?php if($prospect_info->sport =='tennis') { ?>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="tennis_hand">¿Eres zurdo o derecho?</label>
                                        <p>
                                    <?php 
                                        if($prospect_sport_answers[TENNIS_HAND-1]->answer == 'right') 
                                            echo 'derecho';
                                        else
                                            echo 'zurdo';
                                    ?>
                                    </p>
                                    <?php } else { ?>
                                        <label for="tennis_hand">Right or lef handed?</label>
                                        <p><?php echo $prospect_sport_answers[TENNIS_HAND-1]->answer; ?></p>
                                    <?php } ?>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="fmt_ranking">Ranking en la FMT (solo para mexicanos)</label>
                                    <?php } else { ?>
                                        <label for="fmt_ranking">FMT ranking (mexicans only)</label>
                                    <?php } ?>
                                    <input class="[ form-control ]" id="fmtRank" name="fmt_ranking" value="<?php echo $prospect_sport_answers[FMT_RANKING-1]->answer; ?> ">
                                </div>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="atp_tournament">¿Has jugado en torneos de la ATP?</label>
                                    <select class="[ form-control ]" id="atp" name="atp_tournament" value="<?php echo $prospect_sport_answers[ATP_TOURNAMENT-1]->answer; ?> ">
                                        <option value="yes" <?php if($prospect_sport_answers[ATP_TOURNAMENT-1]->answer=='yes')echo "selected"; ?>>Sí</option>
                                        <option value="no" <?php if($prospect_sport_answers[ATP_TOURNAMENT-1]->answer=='no')echo "selected"; ?>>No</option>
                                    </select>
                                <?php } else { ?>
                                    <label for="atp_tournament">Played an ATP tournament?</label>
                                    <select class="[ form-control ]" id="atp" name="atp_tournament" value="<?php echo $prospect_sport_answers[ATP_TOURNAMENT-1]->answer; ?> ">
                                        <option value="yes"> <?php if($prospect_sport_answers[ATP_TOURNAMENT-1]->answer=='yes')echo "selected"; ?>Yes</option>
                                        <option value="no" <?php if($prospect_sport_answers[ATP_TOURNAMENT-1]->answer=='no')echo "selected"; ?>>No</option>
                                    </select>
                                <?php } ?>
                                </div>
                            <?php } ?>
                            <!--SOCCER-->
                            <?php if($prospect_info->sport =='soccer') { ?>
                                <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="soccer_position">Posición</label>
                                        <select class="[ form-control ]" id="q14" name="soccer_position">
                                            <option value="goal-keeper" <?php if($prospect_sport_answers[0]->answer=='goal-keeper') echo " selected"; ?> >Portero</option>
                                            <option value="defender" <?php if($prospect_sport_answers[0]->answer=='defender') echo " selected"; ?> >Defensa</option>
                                            <option value="midfielder" <?php if($prospect_sport_answers[0]->answer=='midfielder') echo " selected"; ?> >Medio</option>
                                            <option value="forward" <?php if($prospect_sport_answers[0]->answer=='forward') echo " selected"; ?> >Delantero</option>
                                        </select>
                                    <?php } else { ?>
                                        <label for="soccer_position">Position</label>
                                        <select class="[ form-control ]" id="q14" name="soccer_position">
                                            <option value="goal-keeper" <?php if($prospect_sport_answers[0]->answer=='goal-keeper') echo " selected"; ?> >Goal keeper</option>
                                            <option value="defender" <?php if($prospect_sport_answers[0]->answer=='defender') echo " selected"; ?> >Defender</option>
                                            <option value="midfielder" <?php if($prospect_sport_answers[0]->answer=='midfielder') echo " selected"; ?> >Midfielder</option>
                                            <option value="forward" <?php if($prospect_sport_answers[0]->answer=='forward') echo " selected"; ?> >Forward</option>
                                        </select>
                                    <?php } ?>
                                </div>
                                <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="soccer_height">Estatura (cm)</label>
                                    <?php } else { ?>
                                        <label for="soccer_height">Height (cm)</label>
                                    <?php } ?>
                                    <p> <?php echo $prospect_sport_answers[1]->answer; ?> </p>
                                    <!--<input type="text" class="[ form-control ]" id="soccer_height" name="q15" value="<?php echo $prospect_sport_answers[1]->answer; ?>">-->
                                </div>
                            <?php } ?>
                            <!--VOLLEYBALL-->
                            <?php if($prospect_info->sport =='volleyball') { ?>
                                <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="volley_position">Posición</label>
                                <?php } else { ?>
                                    <label for="volley_position">Position</label>
                                <?php } ?>
                                    <select class="[ form-control ]" id="volleyPosition" value="<?php echo $prospect_sport_answers[1]->answer; ?>" name="volley_position">                                       
                                        <option value="1" <?php if($prospect_sport_answers[0]->answer=='1') echo "selected";?>>1</option>
                                        <option value="2" <?php if($prospect_sport_answers[0]->answer=='2') echo "selected";?>>2</option>
                                        <option value="3" <?php if($prospect_sport_answers[0]->answer=='3') echo "selected";?>>3</option>
                                        <option value="4" <?php if($prospect_sport_answers[0]->answer=='4') echo "selected";?>>4</option>
                                        <option value="5" <?php if($prospect_sport_answers[0]->answer=='5') echo "selected";?>>5</option>
                                        <option value="6" <?php if($prospect_sport_answers[0]->answer=='6') echo "selected";?>>6</option>
                                    </select>
                                </div>
                                <div class="[ form-group ] [ col-xs-6 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="volley_height">Estatura (cm)</label>
                                    <?php } else { ?>
                                        <label for="volley_height">Height (cm)</label>
                                    <?php } ?>
                                    <p class="[form-control]"> <?php echo $prospect_sport_answers[1]->answer; ?> </p>
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
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Guardar cambios</button>
                                <?php } else { ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Save changes</button>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="curriculum">
                    <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                        <h3>Curriculum</h3>
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <p class="help-block">Esta section no será visible en tu perfil público.</p>
                        <?php } else { ?>
                            <p class="help-block">This section will not appear on your public profile.</p>
                        <?php } ?>
                        <form role="form" class="[ row ][ j-user_curriculum ]">
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="address">Dirección</label>
                                <?php } else { ?>
                                    <label for="address">Address</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="address" name="curriculum_address">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="phone">Teléfono</label>
                                <?php } else { ?>
                                    <label for="phone">Phone</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="phone" name="curriculum_phone">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="mPhone">Celular</label>
                                <?php } else { ?>
                                    <label for="mPhone">Mobile Phone</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="mPhone" name="curriculum_mobile_phone">
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
                                <input type="text" class="[ form-control ]" id="highSchool" name="high_school">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="help-block">Nombre de la escuela</p>
                                <?php } else { ?>
                                    <p class="help-block">School Name</p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="midGrad" id="midGrad" name="q4" ?> ">¿En qué año vas?</label>
                                    <select class="[ form-control ]" id="q4" name="grade">
                                        <option value="grado" selected disabled>Grado</option>
                                        <option value="grado1">3º Secundaria </option>
                                        <option value="grado2">4º Preparatoria </option>
                                        <option value="grado3">5º Preparatoria </option>
                                        <option value="grado4">6º Preparatoria </option>
                                        <option value="graduated">Graduado</option>
                                    </select>
                                    <?php } else { ?>
                                        <label for="midGrad" id="midGrad" name="q4" >What Class are you in?</label>
                                        <select class="[ form-control ]" id="q4" name="grade">
                                            <option value="grado" selected disabled>Class</option>
                                            <option value="grado1">Freshment </option>
                                            <option value="grado2">Sophomore </option>
                                            <option value="grado3">Junior </option>
                                            <option value="grado4">Senior </option>
                                            <option value="graduated">Already graduated</option>
                                        </select>
                                 <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="highGrad" id="highGrad" name="high_grad">Graduation Year</label>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <span><label for="q3">¿Cuándo te vas a graduar?</label></span>
                                <?php } else { ?>
                                    <span><label for="q3">When are you graduating?</label></span>
                                <?php } ?>
                                <input name="high_grad" class="[ form-control ] [ .j-datepicker ]" type="date" id="datepicker-date-of-graduation"/>
                            </div>
                            <div class="clear"></div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <h4 class="[ col-xs-12 ]">Desa_grollo deportivo</h4>
                                    <p class="[ col-xs-12 ] [ help-block ]">Puedes agregar más de un torneo</p>
                                <?php } else { ?>
                                    <h4 class="[ col-xs-12 ]">Sports Development</h4>
                                    <p class="[ col-xs-12 ] [ help-block ]">You can add more than one tournament.</p>
                                <?php } ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tournament">Torneo</label>
                                <?php } else { ?>
                                    <label for="tournament">Tournament</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="tournament" name="tournament">
                            </div>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tournamentDate">Fecha</label>
                                    <input type="date" class="[ form-control ] [ j-datepicker ]" id="datepicker-date-of-tournament" name="tournament_date">
                                <?php } else { ?>
                                    <label for="tournamentDate">Date</label>
                                    <input type="date" class="[ form-control ] [ j-datepicker ]" id="datepicker-date-of-tournament" name="tournament_date">
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <label for="tournamentRank">Ranking</label>
                                <input type="text" class="[ form-control ]" id="tournamentRank" name="tournament_rank">
                            </div>
                            <div class="clear"></div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <button class="[ btn btn-primary ] [ margin-bottom ] [ j-add-tournament ] ">Agregar torneo <i class="fa fa-plus"></i></button>
                            <?php } else { ?>
                                <button class="[ btn btn-primary ] [ margin-bottom ] [ j-add-tournament ] ">Add tournament <i class="fa fa-plus"></i></button>
                            <?php } ?>
                            <div class="clear"></div>
                            <div class="[ tournaments-added ] [ col-xs-12 ]"></div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <button type="submit" class="[ btn btn-primary ] [ margin-bottom ] [ j-update-curriculum<?php if($created_curriculum)echo "-create"; else echo "-update"; ?> ] ">Guardar cambios</button>
                                <?php } else { ?>
                                    <button type="submit" class="[ btn btn-primary ] [ margin-bottom ] [ j-update-curriculum<?php if($created_curriculum)echo "-create"; else echo "-update"; ?> ] ">Save changes</button>
                                <?php } ?>
                        </form>
                    </div>
                </div>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]"  id="messages">
                    <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Mensajes</h3>
                            <p class="help-block">Envía un mensaje a uno de nuestros agentes.</p>
                        <?php } else { ?>
                            <h3>Messages</h3>
                            <p class="help-block">Send a message to one of our managers.</p>
                        <?php } ?>
                        <form role="form" class="[ row ]">
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="manager" id="manager" name="agent">Selecciona un agente:</label>
                                    <select class="[ form-control ]" id="manager" name="q5">
                                        <option value="zurol@pcuervo.com">Luis Mendoza</option>
                                        <option value="miguel@pcuervo.com">Nair Tolomeo</option>
                                    </select>
                                <?php } else { ?>
                                    <label for="manager" id="manager" name="agent">Select an advisor:</label>
                                    <select class="[ form-control ]" id="manager" name="q5">
                                        <option value="zurol@pcuervo.com">Luis Mendoza</option>
                                        <option value="miguel@pcuervo.com">Nair Tolomeo</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="message">Tu mensaje</label>
                                <?php } else { ?>
                                    <label for="message">Your message</label>
                                <?php } ?>
                                <textarea class="form-control" rows="3" id="message"></textarea>
                            </div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <button type="submit" class="[ btn btn-primary ] [ margin-bottom ]">Enviar mensaje</button>
                            <?php } else { ?>
                                <button type="submit" class="[ btn btn-primary ] [ margin-bottom ]">Send Message</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /#page-content-wrapper -->
    </div> <!-- /#dashboard -->
<?php get_footer(); ?>
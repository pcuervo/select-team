<?php
    if ( ! is_user_logged_in() ) {
        $location = site_url();
        wp_redirect( $location );
        exit;
    }
    get_header();

?>
    <div id="dashboard">
        <?php 
            if(isset($_SESSION['name'])){
                add_profile_picture($_SESSION['st_user_id'], $_SESSION['name']);
                unset($_SESSION['name']);
            }

            $address = $phone = $mob_phone = $grad_year = $high_school = $grad_date = $video_host = $video_url = '';
            $created_curriculum = false;

            $prospect_info = get_user_basic_info(get_current_user_id()); 

            if($prospect_info){
                $prospect_sport_answers = get_user_sport_answers($prospect_info->st_user_id);
                $created_curriculum= get_user_curriculum_info($prospect_info->st_user_id);
            }
            
            if (sizeof($created_curriculum)>0) {
                $address        =  $created_curriculum->address;
                $phone          =  $created_curriculum->phone;
                $mob_phone      =  $created_curriculum->mobile_phone;
                $grad_year      =  $created_curriculum->graduate_year;
                $high_school    =  $created_curriculum->high_school;
                //$grad_date      =  $created_curriculum->graduation_date;
                $grad_dateArr = explode(' ', $created_curriculum->graduation_date);
                $grad_date = $grad_dateArr[0];

                $tournament_info = get_user_tournament($prospect_info->st_user_id);
            }
        ?>
        <!-- Page Content -->
        <div id="page-content-wrapper" class="[ margin-bottom ]">
            <div class="[ container-fluid ]" id="page-content">
                <a href="#menu-toggle" id="menu-toggle" class="[ hidden-md hidden-lg ]"><i class="[ fa fa-bars fa-2x ]"></i></a>
                <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]"  id="upload_picture">
                    <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Foto de perfil</h3>
                        <?php } else { ?>
                            <h3>Profile Picture</h3>
                        <?php } ?>
                        <?php if ( $prospect_info->profile_picture != '' ) { ?>
                            <img class="profile_picture_preview" src="<?php echo THEMEPATH.'profile_pictures/'.$prospect_info->profile_picture ?>" />
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
                        
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <h3>Perfil</h3>
                        <?php } else { ?>
                            <h3>Basic Profile</h3>
                        <?php } ?>
                        <form id="userForm" role="form" class="[ row ] [ j-update-basic-profile button ]" >
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
                                    <select class="[ form-control ]" id="averageScore" value="<?php echo $prospect_sport_answers[0]->answer; ?>" name="average_score">
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
                                        <option value="yes"<?php if($prospect_sport_answers[ATP_TOURNAMENT-1]->answer=='yes')echo "selected"; ?>>Yes</option>
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
                                    <label for="">Selecciona el sitio dónde está tu video.</label>
                                <?php } else { ?>
                                    <label for="">Where is your video hosted?</label>
                                <?php } ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="video_host" id="optionsRadios1" value="vimeo" <?php if($prospect_info->video_host=='vimeo') echo " checked"; ?> >
                                        Vimeo
                                    </label>
                                </div>
                                <input type="hidden" name="sport" value="<?php echo $prospect_info->sport; ?>">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="video_host" id="optionsRadios2" value="youtube" <?php if($prospect_info->video_host=='youtube') echo " checked"; ?> >
                                        YouTube
                                    </label>
                                </div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="playerVideo">URL de tu video</label>
                                <?php } else { ?>
                                    <label for="playerVideo">Your video URL</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="playerVideo" name="video_url" value="<?php echo $prospect_info->video_url;?>">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="help-block">Pega completa la url de tu video ( www.youtube.com/watch?v=HT3diQX3i1I )</p>
                                <?php } else { ?>
                                    <p class="help-block">Paste the entire url of the video ( www.youtube.com/watch?v=HT3diQX3i1I )</p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]">Guardar cambios</button>
                                <?php } else { ?>
                                    <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]">Save changes</button>
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
                                <input type="text" class="[ form-control ]" id="address" name="curriculum_address" value="<?php echo $address; ?>">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="phone">Teléfono</label>
                                <?php } else { ?>
                                    <label for="phone">Phone</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="phone" name="curriculum_phone" value="<?php echo $phone; ?>">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="mPhone">Celular</label>
                                <?php } else { ?>
                                    <label for="mPhone">Mobile Phone</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="mPhone" name="curriculum_mobile_phone" value="<?php echo $mob_phone; ?>">
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
                                <input type="text" class="[ form-control ]" id="highSchool" name="high_school" value="<?php echo $high_school; ?>">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="help-block">Nombre de la escuela</p>
                                <?php } else { ?>
                                    <p class="help-block">School Name</p>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="midGrad" id="midGrad" name="q4">¿En qué año vas?</label>
                                    <select class="[ form-control ]" id="q4" name="grade">
                                        <option value="grado" selected disabled>Grado</option>
                                        <option value="freshman" <?php if($grad_year=='freshman') echo "selected"; ?>>3º Secundaria </option>
                                        <option value="sphomore" <?php if($grad_year=='sphomore') echo "selected"; ?>>4º Preparatoria </option>
                                        <option value="junior" <?php if($grad_year=='junior') echo "selected"; ?>>5º Preparatoria </option>
                                        <option value="senior" <?php if($grad_year=='senior') echo "selected"; ?>>6º Preparatoria </option>
                                        <option value="graduated" <?php if($grad_year=='graduated') echo "selected"; ?>>Graduado</option>
                                    </select>
                                    <?php } else { ?>
                                        <label for="midGrad" id="midGrad" name="q4" >What Class are you in?</label>
                                        <select class="[ form-control ]" id="q4" name="grade">
                                            <option value="grado" selected disabled>Class</option>
                                            <option value="freshman" <?php if($grad_year=='freshman') echo "selected"; ?>>Freshment </option>
                                            <option value="sphomore" <?php if($grad_year=='sphomore') echo "selected"; ?>>Sophomore </option>
                                            <option value="junior" <?php if($grad_year=='junior') echo "selected"; ?>>Junior </option>
                                            <option value="senior" <?php if($grad_year=='senior') echo "selected"; ?>>Senior </option>
                                            <option value="graduated" <?php if($grad_year=='graduated') echo "selected"; ?>>Already graduated</option>
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
                                <input name="high_grad" class="[ form-control ] [ .j-datepicker ]" type="date" id="datepicker-date-of-graduation" value="<?php echo $grad_date; ?>"/>
                            </div>
                            <div class="clear"></div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <h4 class="[ col-xs-12 ]">Desarrollo deportivo</h4>
                                <?php } else { ?>
                                    <h4 class="[ col-xs-12 ]">Sports Development</h4>
                                <?php } ?>
                                
                                <?php  if (sizeof($created_curriculum)>0)
                                     if(sizeof($tournament_info)>0) { ?>
                                <div class="[ form-group ] [ col-xs-12 ]">
                                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                                        <label for="tournament">Torneos</label>
                                    <?php } else { ?>
                                        <label for="tournament">Tournaments</label>
                                    <?php } ?>
                                        <?php foreach ($tournament_info as $key => $value) { ?>
                                            <div class="[ form-group ] [ col-xs-12 ] [ j-tournament_<?php echo $key;?> ]" id="tournament_<?php echo $key; ?>">
                                                <input type="hidden" value="<?php echo $tournament_info[$key]->name;?>" name="torneo">
                                                <p>
                                                    <label> <?php echo $tournament_info[$key]->name; ?> </label>
                                                    <p > <?php  $tmp= explode(' ', $tournament_info[$key]->tournament_date); echo $tmp[0];?> 
                                                    <?php echo $tournament_info[$key]->ranking; ?> </p> 
                                                    <input type="hidden" value="<?php echo $tournament_info[$key]->ranking; ?>" name="torneo-rank">
                                                    <input type="hidden" value="<?php  $tmp= explode(' ', $tournament_info[$key]->tournament_date); echo $tmp[0];?>" name="torneo-fecha">
                                                    <button class="[ btn btn-primary ] [ margin-bottom ] [ j-delete-tournament ]"> <i class="fa fa-times"></i></button>
                                                </p>
                                            </div>
                                        <?php } ?>
                                </div>
                                <?php } ?>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <p class="[ col-xs-12 ] [ help-block ]">Puedes agregar más de un torneo</p>
                                <?php } else { ?>
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
                                <?php } else { ?>
                                    <label for="tournamentDate">Date</label>
                                <?php } ?>
                                <input type="date" class="[ form-control ] [ j-datepicker ]" id="datepicker-date-of-tournament" name="tournament_date">
                            </div>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tournamentRank">Posición</label>
                                <?php } else { ?>
                                    <label for="tournamentRank">Position</label>
                                <?php } ?>
                                <input type="text" class="[ form-control ]" id="tournamentRank" name="tournament_rank">
                            </div>
                            <div class="clear"></div>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <button class="[ btn btn-primary ] [ margin-bottom ] [ j-add-tournament ] ">Agregar torneo <i class="fa fa-plus"></i></button>
                            <?php } else { ?>
                                <button class="[ btn btn-primary ] [ margin-bottom ] [ j-add-tournament ] ">Add tournament <i class="fa fa-plus"></i></button>
                            <?php } ?>
                            <div class="clear"></div>
                            <div class="[ form-group ] [ col-xs-12 ] [ j-registed-tournaments ]">
                            </div>
                            <div class="clear"></div>
                            <div class="[ tournaments-added ] [ col-xs-12 ]"></div>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <button type="submit" class="[ btn btn-primary ] [ margin-bottom ] [ j-update-curriculum<?php if(sizeof($created_curriculum)>0)echo "-update"; else echo "-create"; ?> ] ">Guardar cambios</button>
                                <?php } else { ?>
                                    <button type="submit" class="[ btn btn-primary ] [ margin-bottom ] [ j-update-curriculum<?php if(sizeof($created_curriculum)>0)echo "-update"; else echo "-create"; ?> ] ">Save changes</button>
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
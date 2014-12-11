<?php 

if ( is_user_logged_in() ) {
    $role = get_current_user_role();

    if ( $role == 'subscriber' )
         $location = site_url().'/dashboard';
    else 
         $location = site_url().'/dashboard-admin';
   
    wp_redirect( $location );
    exit;
}

get_header(); ?>
    <div id="page-content-wrapper">
        <div class="[ container-fluid ]" id="page-content">
            <div class="[ row ] [ margin-bottom ]" id="profile">
                <div class="[ col-xs-12 col-sm-7 center block ]">
                    
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <h3>Registrate</h3>
                    <?php } else { ?>
                        <h3>Register</h3>
                    <?php } ?>
                    <form id="userForm" role="form" class="[ row ] [ j-register-user ]" >
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="username">Usuario</label>
                            <?php } else { ?>
                                <label for="username">Username</label>
                            <?php } ?>
                            <input type="text" class="[ form-control ]" name="username" required>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="email">Correo electrónico</label>
                            <?php } else { ?>
                                <label for="email">Email</label>
                            <?php } 
                            $email = '';
                            if(isset($_GET['q6']))
                                $email = $_GET['q6'];
                            ?>
                            <input type="email" class="[ form-control ][ required email ]" value="<?php echo $email; ?>" name="email" > 
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="password">Contraseña</label>
                                <input type="password" class="[ form-control ]" name="password" required>
                                <p class="help-block">El password debe contener al menos 8 caracteres.</p>
                            <?php } else { ?>
                                <label for="password">Password</label>
                                <input type="password" class="[ form-control ]" name="password" required>
                                <p class="help-block">Password must be at leat 8 characters.</p>
                            <?php } ?>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="password_confirmation">Confirmar contraseña</label>
                            <?php } else { ?>
                                <label for="password_confirmation">Confirm password</label>
                            <?php } ?>
                            <input type="password" class="[ form-control ]" name="password_confirmation" required>
                            <label for="validate" id="validate"></label>
                        </div>

                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="full_name">Nombre completo</label>
                            <?php } else { ?>
                                <label for="full_name">Full name</label>
                            <?php } 
                            $full_name = '';
                            if(isset($_GET['q1']))
                                $full_name = $_GET['q1'];
                            ?>
                            <input type="text" class="[ form-control ]" id="full_name" value="<?php echo $full_name; ?>" name="full_name" required>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php 
                            $gender = '';
                            if(isset($_GET['q2'])) 
                                $gender = $_GET['q2'];
                            ?>
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="gender">Género</label>
                                <select class="[ form-control ]" id="q2" value="<?php echo $gender; ?>" name="gender" required>
                                    <option value="chooseOne">Selecciona uno</option>
                                    <option value="female" 
                                        <?php if($gender=='female') echo "selected"; ?> 
                                    >Mujger</option>
                                    <option value="male" <?php if($gender=='male') echo "selected"; ?> >Hombre</option>
                                </select>
                            <?php } else { ?>
                                <label for="gender">Gender</label>
                                <select class="[ form-control ]" id="q2" name="gender" required>
                                    <option value="chooseOne">Choose one</option>
                                    <option value="female" 
                                        <?php if($gender=='female') echo "selected"; ?> 
                                    >Female</option>
                                    <option value="male" <?php if($gender=='male') echo "selected"; ?> >Male</option>
                                </select>
                            <?php } ?>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="date_of_birth">Fecha de nacimiento</label>
                            <?php } else { ?>
                                <label for="date_of_birth">Date of birth</label>
                            <?php } 
                            $date_of_birth = '';
                            if(isset($_GET['q3']))
                                $date_of_birth = $_GET['q3'];
                            ?>
                            <input class="[ form-control ] [ .j-datepicker ]" id="datepicker-date-of-birth" name="date_of_birth"  value="<?php echo $date_of_birth; ?>" required/>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="sport">Deporte que practicas</label>
                            <?php } else { ?>
                                <label for="sport">Sport you practice</label>
                            <?php } ?>
                            <select class="[ form-control ]" id="sport" name="sport"  required>
                                <?php 
                                $sport = '';
                                if(isset($_GET['q7']))
                                    $sport = $_GET['q7'];

                                switch ($sport) {
                                    case 'tennis': ?>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <option value="chooseOne" selected disabled>Selecciona uno</option>
                                        <?php } else { ?>
                                            <option value="chooseOne" selected disabled>Choose one</option>
                                        <?php } ?>
                                        <option value="tennis" selected>Tennis</option>
                                        <option value="golf">Golf</option>
                                        <option value="soccer">Soccer</option>
                                        <option value="volleyball">Volleyball</option>                                        
                                    <?php break;

                                    case 'golf': ?>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <option value="chooseOne" selected disabled>Selecciona uno</option>
                                        <?php } else { ?>
                                            <option value="chooseOne" selected disabled>Choose one</option>
                                        <?php } ?>
                                        <option value="tennis" >Tennis</option>
                                        <option value="golf" selected>Golf</option>
                                        <option value="soccer">Soccer</option>
                                        <option value="volleyball">Volleyball</option>                                        
                                    <?php break;

                                    case 'soccer': ?>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <option value="chooseOne" selected disabled>Selecciona uno</option>
                                        <?php } else { ?>
                                            <option value="chooseOne" selected disabled>Choose one</option>
                                        <?php } ?>
                                        <option value="tennis">Tennis</option>
                                        <option value="golf">Golf</option>
                                        <option value="soccer" selected>Soccer</option>
                                        <option value="volleyball">Volleyball</option>                                        
                                    <?php break;

                                    case 'volleyball': ?>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <option value="chooseOne" selected disabled>Selecciona uno</option>
                                        <?php } else { ?>
                                            <option value="chooseOne" selected disabled>Choose one</option>
                                        <?php } ?>
                                        <option value="tennis" >Tennis</option>
                                        <option value="golf">Golf</option>
                                        <option value="soccer">Soccer</option>
                                        <option value="volleyball" selected>Volleyball</option>                                        
                                    <?php break;

                                    default: ?>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <option value="chooseOne" selected disabled>Selecciona uno</option>
                                        <?php } else { ?>
                                            <option value="chooseOne" selected disabled>Choose one</option>
                                        <?php } ?>
                                        <option value="tennis" >Tennis</option>
                                        <option value="golf">Golf</option>
                                        <option value="soccer">Soccer</option>
                                        <option value="volleyball">Volleyball</option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--GOLF-->
                        <?php if(1) { ?>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="average_score">Puntaje promedio</label>
                                <?php } else { ?>
                                    <label for="average_score">Average score</label>
                                <?php } ?>
                                <?php 
                                $average_score = '';
                                if(isset($_GET['q8']))
                                    $average_score = $_GET['q8']; ?>

                                <select class="[ form-control ]" id="averageScore" value="<?php echo $average_score; ?>" name="average_score" required>
                                    <?php switch ($average_score) {
                                        case '-66': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '66-67': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67" selected>66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '68-70': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70" selected>68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '71-73': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73" selected>71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '74-76': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76" selected>74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '77-79': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79" selected>77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '80-82': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79" >77-79</option>
                                            <option value="80-82" selected>80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '83-85': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79" >77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85" selected>83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '86-88': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79" >77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88" selected>86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                        case '89-90': ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79" >77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90" selected>89-90</option>
                                            <?php break;
                                        default: ?>
                                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                                <option value="-66" >Menor a 66</option>
                                            <?php } else { ?>
                                                <option value="-66" >Under 66</option>
                                            <?php } ?>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                            <?php break;
                                    } ?>
                                </select>
                            </div>
                            <div class="clear"></div>
                        <?php } ?>
                        <!--TENNIS-->
                        <?php 
                            $tennis_hand = '';
                            if(isset($_GET['q10']))
                                $tennis_hand = $_GET['q10']; ?>

                        <?php if(1) { ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tennis_hand">¿Zurdo o derecho?</label>
                                    <select class="[ form-control ]" id="tennisHand" name="tennis_hand" required>
                                        <option value="left" <?php if($tennis_hand=="leftHand") echo "selected"; ?>>Zurdo</option>
                                        <option value="right" <?php if($tennis_hand=="rightHand") echo "selected"; ?>>Derecho</option>
                                    </select>
                                <?php } else { ?>
                                    <label for="tennis_hand">Right or lef handed?</label>
                                    <select class="[ form-control ]" id="tennisHand" name="tennis_hand" required>
                                        <option value="left" <?php if($tennis_hand=="leftHand") echo "selected"; ?>>Left handed</option>
                                        <option value="right" <?php if($tennis_hand=="rightHand") echo "selected"; ?>>Right handed</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="tennisHand">Ranking en la FMT (solo mexicanos)</label>
                                <?php } else { ?>
                                    <label for="tennisHand">FMT ranking (mexicans only)</label>
                                <?php } 
                                    $fmtRank = '';    
                                    if(isset($_GET['q12']))  
                                        $fmtRank = $_GET['q12']; ?>

                                <input type="text" class="[ form-control ]" id="fmtRank" name="fmt_ranking" value="<?php echo $fmtRank; ?>" required>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <?php $ATPrank='';
                                    if(isset($_GET['q13']))  
                                        $ATPrank = $_GET['q13']; ?>
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="atpTournament">¿Has jugado en torneos de la ATP?</label>
                                    <select class="[ form-control ]" id="atp" name="atp_tournament" value="<?php echo $ATPrank; ?>" required>
                                        <option value="yes" <?php if($ATPrank=='yes')echo "selected"; ?> >Sí</option>
                                        <option value="no" <?php if($ATPrank=='no')echo "selected"; ?> >No</option>
                                    </select>
                                <?php } else { ?>
                                    <label for="atpTournament">Played an ATP tournament?</label>
                                    <select class="[ form-control ]" id="atp" name="atp_tournament" value="<?php echo $ATPrank; ?>" required>
                                        <option value="yes" <?php if($ATPrank=='yes')echo "selected"; ?> >Yes</option>
                                        <option value="no" <?php if($ATPrank=='no')echo "selected"; ?> >No</option>
                                    </select>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <!--SOCCER-->
                        <?php 
                            $soccer_position = '';    
                            if(isset($_GET['q14']))  
                                $soccer_position = $_GET['q14']; ?>
                        <?php if(1) { ?>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="soccer_position">Posición</label>
                                    <select class="[ form-control ]" id="q14" name="soccer_position" required>
                                        <option value="goal-keeper" <?php if($soccer_position=='goal-keeper') echo " selected"; ?> >Portero</option>
                                        <option value="defender" <?php if($soccer_position=='defender') echo " selected"; ?> >Defensa</option>
                                        <option value="midfielder" <?php if($soccer_position=='midfielder') echo " selected"; ?> >Medio</option>
                                        <option value="forward" <?php if($soccer_position=='forward') echo " selected"; ?> >Delantero</option>
                                    </select>
                                <?php } else { ?>
                                    <label for="soccer_position">Position</label>
                                    <select class="[ form-control ]" id="q14" name="soccer_position" required>
                                        <option value="goal-keeper" <?php if($soccer_position=='goal-keeper') echo " selected"; ?> >Goal keeper</option>
                                        <option value="defender" <?php if($soccer_position=='defender') echo " selected"; ?> >Defender</option>
                                        <option value="midfielder" <?php if($soccer_position=='midfielder') echo " selected"; ?> >Midfielder</option>
                                        <option value="forward" <?php if($soccer_position=='forward') echo " selected"; ?> >Forward</option>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="soccer_height">Estatura (cm)</label>
                                <?php } else { ?>
                                    <label for="soccer_height">Height (cm)</label>
                                <?php } 
                                    $soccer_height = '';    
                                    if(isset($_GET['q15']))  
                                        $soccer_height = $_GET['q15']; ?>

                                <input type="text" class="[ form-control ]" id="soccer_height" name="soccer_height" value="<?php echo $soccer_height; ?>" required>
                            </div>
                        <?php } ?>
                        <!--VOLLEYBALL-->
                        <?php 
                            $volley_position = '';    
                            if(isset($_GET['q9']))  
                                $volley_position = $_GET['q9']; ?>

                        <?php if(1) { ?>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="volleyPosition">Posición</label>
                                <?php } else { ?>
                                    <label for="volleyPosition">Position</label>
                                <?php } ?>
                                <select class="[ form-control ]" id="volleyPosition" value="<?php echo $volley_position; ?>" name="volley_position" required>
                                <?php switch ($volley_position) {
                                        case '1': ?>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                  <?php break;
                                        case '2': ?>
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                  <?php break;
                                        case '3': ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" selected>3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                  <?php break;
                                        case '4': ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected>4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                  <?php break;
                                        case '5': ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected>5</option>
                                            <option value="6">6</option>
                                  <?php break;
                                        case '6': ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6" selected>6</option>
                                    <?php break;
                                        default: ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <?php if (qtrans_getLanguage() == 'es'){ ?>
                                    <label for="volleyHeight">Estatura (cm)</label>
                                <?php } else { ?>
                                    <label for="volleyHeight">Height (cm)</label>
                                <?php }
                                    $volley_height = '';    
                                    if(isset($_GET['q10']))  
                                       $volley_height = $_GET['q10']; ?>

                                <input type="text" class="[ form-control ]" id="volleyHeight" value="<?php echo $volley_height; ?>" name="volley_height" required>
                            </div>
                        <?php } ?>
                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                            <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Registrar usuario</button>
                        <?php } else { ?>
                            <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Register user</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /#page-content-wrapper -->
<?php get_footer(); ?>
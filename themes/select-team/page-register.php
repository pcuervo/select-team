<?php include_once('send-prospects.php'); ?>
<?php get_header(); ?>
    <div id="page-content-wrapper">
        <div class="[ container-fluid ]" id="page-content">
            <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                <div class="[ col-xs-12 col-sm-7 center block ]">
                    <?php if (qtrans_getLanguage() == 'es'){ ?>
                        <h3>Register</h3>
                    <?php } else { ?>
                        <h3>Registrate</h3>
                    <?php } ?>
                    <form id="userForm" role="form" class="[ row ] [ j-register-user ]" >
                        <?php if ( ! is_user_logged_in() ) { ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="username">Username</label>
                                <input type="text" class="[ form-control ]" name="username">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="email">Email</label>
                                <input type="email" class="[ form-control ]" value="<?php echo $_GET['q6']; ?>" name="email" > 
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="password">Password</label>
                                <input type="password" class="[ form-control ]" name="password">
                                <p class="help-block">El password debe contener al menos 8 caracteres.</p>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password" class="[ form-control ]" name="password_confirmation">
                                <label for="validate" id="validate"></label>
                            </div>
                        <?php } ?>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <label for="full_name">Full name</label>
                            <input type="text" class="[ form-control ]" id="full_name" value="<?php echo $_GET['q1']; ?>" name="full_name" >
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <?php if (qtrans_getLanguage() == 'es'){ ?>
                                <label for="gender">Género</label>
                                <select class="[ form-control ]" id="q2" value="<?php echo $_GET['q2']; ?>" name="gender" >
                                    <option value="Mujer">Mujer</option>
                                    <option value="Hombre">Hombre</option>
                                </select>
                            <?php } else { ?>
                                <label for="gender">Gender</label>
                                <select class="[ form-control ]" id="q2" name="gender">
                                    <option value="female" <?php if($_GET['q2']=='female') echo "selected"; ?> >Female</option>
                                    <option value="male" <?php if($_GET['q2']=='male') echo "selected"; ?> >Male</option>
                                </select>
                            <?php } ?>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <label for="date_of_birth">Date of birth</label>
                            <input type="date" class="[ form-control ] [ .j-datepicker ]" id="datepicker-date-of-birth" name="date_of_birth"  value="<?php echo $_GET['q3']; ?>"/>
                        </div>
                        <div class="[ form-group ] [ col-xs-12 ]">
                            <label for="sport">Sport you practice</label>
                            <select class="[ form-control ]" id="sport" name="sport" >
                                <?php switch ($_GET['q7']) {
                                    case 'tennis': ?>
                                        <option value="tennis" selected>Tennis</option>
                                        <option value="golf">Golf</option>
                                        <option value="soccer">Soccer</option>
                                        <option value="volleyball">Volleyball</option>                                        
                                        <?php break;

                                    case 'golf': ?>
                                        <option value="tennis" >Tennis</option>
                                        <option value="golf" selected>Golf</option>
                                        <option value="soccer">Soccer</option>
                                        <option value="volleyball">Volleyball</option>                                        
                                        <?php break;

                                    case 'soccer': ?>
                                        <option value="tennis">Tennis</option>
                                        <option value="golf">Golf</option>
                                        <option value="soccer" selected>Soccer</option>
                                        <option value="volleyball">Volleyball</option>                                        
                                        <?php break;

                                    case 'volleyball': ?>
                                    <option value="tennis" >Tennis</option>
                                    <option value="golf">Golf</option>
                                    <option value="soccer">Soccer</option>
                                    <option value="volleyball" selected>Volleyball</option>                                        
                                        <?php break;

                                    default: ?>
                                    <option value="tennis" >Tennis</option>
                                    <option value="golf">Golf</option>
                                    <option value="soccer">Soccer</option>
                                    <option value="volleyball">Volleyball</option>                                        
                                        <?php break;
                                } ?>
                            </select>
                        </div>
                        <!--GOLF-->
                        <?php if($_GET['q7']=='golf') { ?>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <label for="golf_avg_score">Average score</label>
                                <select class="[ form-control ]" id="averageScore" value="<?php echo $_GET['q8']; ?>" name="golf_avg_score">
                                    <?php switch ($_GET['q8']) {
                                        case '-66': ?>
                                            <option value="-66" selected>Under 66</option>
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
                                            <option value="-66">Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                                            <option value="-66" >Under 66</option>
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
                        <?php if($_GET['q7']=='tennis') { ?>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="tennis_hand">Right or lef handed?</label>
                                <select class="[ form-control ]" id="tennisHand" name="tennis_hand" >
                                    <option value="left" <?php if($_GET['q10']=="leftHand") echo "selected"; ?>>Left handed</option>
                                    <option value="right" <?php if($_GET['q10']=="rightHand") echo "selected"; ?>>Right handed</option>
                                </select>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="tennisHand">FMT ranking</label>
                                <input type="text" class="[ form-control ]" id="fmtRank" name="q11" value="<?php echo $_GET['q12']; ?> ">
                            </div>
                            <div class="[ form-group ] [ col-xs-12 ]">
                                <label for="atpTournament">Played an ATP tournament?</label>
                                <select class="[ form-control ]" id="atp" name="q12" >
                                    <option value="yes" <?php if($_GET['q13']=='yes') echo "selected"; ?>>Yes</option>
                                    <option value="no" <?php if($_GET['q13']=='no') echo "selected"; ?>>No</option>
                                </select>
                            </div>
                        <?php } ?>
                        <!--SOCCER-->
                        <?php if($_GET['q7']=='soccer') { ?>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <label for="soccer_position">Position</label>
                                <select class="[ form-control ]" id="q14" name="soccer_position">
                                    <option value="goal-keeper" <?php if($_GET['q14']=='goal-keeper') echo " selected"; ?> >Goal keeper</option>
                                    <option value="defender" <?php if($_GET['q14']=='defender') echo " selected"; ?> >Defender</option>
                                    <option value="midfielder" <?php if($_GET['q14']=='midfielder') echo " selected"; ?> >Midfielder</option>
                                    <option value="forward" <?php if($_GET['q14']=='forward') echo " selected"; ?> >Forward</option>
                                </select>
                            </div>
                            <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                <label for="soccer_height">Height (cm)</label>
                                <input type="text" class="[ form-control ]" id="soccer_height" name="q15" value="<?php echo $_GET['q15']; ?>">
                            </div>
                        <?php } ?>
                        <!--VOLLEYBALL-->
                        <?php if($_GET['q7']=='volleyball') { ?>
                            <div class="[ form-group ] [ col-xs-6 ]">
                                <label for="volleyPosition">Position</label>
                                <select class="[ form-control ]" id="volleyPosition" value="<?php echo $_GET['q9']; ?>" name="q9">
                                <?php switch ($_GET['q9']) {
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
                                <label for="volleyHeight">Height (cm)</label>
                                <input type="text" class="[ form-control ]" id="volleyHeight" value="<?php echo $_GET['q10']; ?>" name="q10">
                            </div>
                        <?php } ?>
                        <button type="submit" class="[ btn btn-primary ]  [ margin-bottom ]" id="subB">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /#page-content-wrapper -->
<?php get_footer(); ?>
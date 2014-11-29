<?php 

include_once('send-prospects.php');


//print_r($_POST); 
//print_r($_GET); 
?>    
<?php get_header(); ?>
    <div id="dashboard">
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <p><i class="fa fa-cogs"></i> My Dashboard </p>
                        </li>
                        <li>
                            <a href="#accountInfo" class="[ js-page-scroll ]"><i class="fa fa-user"></i> Account Info</a>
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
                        <li>
                            <a href="#" type="download"><i class="fa fa-download"></i> Applicant manual</a>
                        </li>
                    </ul>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <div class="[ container-fluid ]" id="page-content">
                        <div class="[ row ]">
                            <a href="#menu-toggle" id="dashboard-toggle" class="[ btn btn-success ]"><i class="[ fa fa-cogs ]"></i> Dashboard</a>
                        </div>
                        <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="accountInfo">
                            <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                                <h3>Account Info</h3>
                                <form role="form" class="[ row ]">
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="userName">User name</label>
                                        <input type="text" class="[ form-control ]" id="userName" name="">
                                    </div>
                                     <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="password">Password</label>
                                        <input type="password" class="[ form-control ]" id="password" name="q20">
                                        <p class="help-block">Password must contain at least 8 characters.</p>
                                    </div>

                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" class="[ form-control ]" id="password_again" name="q21">
                                        <label for="validate" id="validate"></label>
                                    </div>
                                    <button type="submit" class="[ btn btn-primary ] " id="subB">Save changes</button>
                                </form>
                            </div>
                        </div>
                        <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="profile">
                            <div class="[ col-xs-12 col-sm-7 center block ]">
                                <h3>Basic Profile</h3>
                                <form id="userForm" role="form" class="[ row ]" action="<?php echo site_url('dashboard'); ?> " method="POST">
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="exampleInputEmail1">Full name</label>
                                        <input type="text" class="[ form-control ]" id="exampleInputEmail1" value="<?php echo $_GET['q1']; ?>" name="q1" >
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <label for="q2" value="<?php echo $_GET['q2']; ?>" name="q2" >Género</label>
                                            <select class="[ form-control ]" id="q2" name="q2">
                                                <option value="Mujer">Mujer</option>
                                                <option value="Hombre">Hombre</option>
                                            </select>
                                        <?php } else { ?>
                                            <label for="q2">Gender</label>
                                            <select class="[ form-control ]" id="q2" value="<?php echo $_GET['q2']; ?>" name="q2">
                                                <option value="female">Female</option>
                                                <option value="male">Male</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="fechaNacimiento">Date of birth</label>
                                        <input type="text" class="[ form-control ]" id="datepicker" name="q3"  value="<?php echo $_GET['q2']; ?>" name="q2"></p>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="[ form-control ]" id="email" value="<?php echo $_GET['q5']; ?>" name="q5" > 
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="sport">Sport you practice</label>
                                        <select class="[ form-control ]" id="sport" name="q6" >
                                            <?php switch ($_GET['q6']) {
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
                                    <?php if($_GET['q6']=='golf') { ?>
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="sport">Average score</label>
                                        <select class="[ form-control ]" id="q4" name="q4">
                                        <?php switch ($_GET['q7']) {
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
                                    <!--VOLLEBALL-->
                                    <?php if($_GET['q6']=='volleyball') { ?>
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="volleyPosition">Position</label>
                                        <select class="[ form-control ]" id="volleyPosition" value="<?php echo $_GET['q8']; ?>" name="q8">
                                        <?php switch ($_GET['q8']) {
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
                                        <input type="text" class="[ form-control ]" id="volleyHeight" value="<?php echo $_GET['q9']; ?>" name="q9">
                                    </div>

                                    <?php } ?>
                                    <!--TENNIS-->
                                    <?php if($_GET['q6']=='tennis') { ?>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="tennisHand">Right or lef handed?</label>
                                        <select class="[ form-control ]" id="tennisHand" name="q10" value="<?php echo $_GET['q10']; ?> ">
                                            <option value="left">Left handed</option>
                                            <option value="right">Right handed</option>
                                        </select>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="tennisHand">FMT ranking</label>
                                        <input type="number" class="[ form-control ]" id="fmtRank" name="q11" value="<?php echo $_GET['q11']; ?> ">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="atpTournament">Played an ATP tournament?</label>
                                        <select class="[ form-control ]" id="atp" name="q12" value="<?php echo $_GET['q12']; ?> ">
                                            <option value="left">Left handed</option>
                                            <option value="right">Right handed</option>
                                        </select>
                                    </div>
                                    <?php } ?>
                                    <!--SOCCER-->
                                    <?php if($_GET['q6']=='soccer') { ?>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="soccerPosition">Position</label>
                                        <select class="[ form-control ]" id="q13" name="q13">
                                            <option value="goal-keeper" <?php if($_GET['q13']=='goal-keeper') echo " selected"; ?> >Goal keeper</option>
                                            <option value="defender" <?php if($_GET['q13']=='defender') echo " selected"; ?> >Defender</option>
                                            <option value="midfielder" <?php if($_GET['q13']=='midfielder') echo " selected"; ?> >Midfielder</option>
                                            <option value="forward" <?php if($_GET['q13']=='forward') echo " selected"; ?> >Forward</option>
                                        </select>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="soccerHeight">Height (cm)</label>
                                        <input type="text" class="[ form-control ]" id="soccerHeight" name="q14" value="<?php echo $_GET['q14']; ?>">
                                    </div>
                                    <?php } ?>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="exampleInputFile">Upload your profile picture</label>
                                        <input type="file" id="exampleInputFile" name="q19">
                                        <p class="help-block">File must be 500 x 500 pixels. No larger than 400 kb.</p>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="">Where does your video is hosted?</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                Vimeo
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                Youtube
                                            </label>
                                        </div>
                                        <label for="playerVideo">Your video URL</label>
                                        <input type="text" class="[ form-control ]" id="playerVideo">
                                        <p class="help-block">Paste the entire url of the video:<br> ( www.youtube.com/watch?v=HT3diQX3i1I )</p>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="password">Cahnge Password</label>
                                        <input type="password" class="[ form-control ]" id="password" name="q20">
                                        <p class="help-block">Password must contain at least 8 characters.</p>
                                    </div>

                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" class="[ form-control ]" id="password_again" name="q21">
                                        <label for="validate" id="validate"></label>
                                    </div>
                                  <button type="submit" class="[ btn btn-primary ] " id="subB">Guardar cambios</button>
                                </form>
                            </div>
                        </div>
                        <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]" id="curriculum">
                            <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                                <h3>Curriculum</h3>
                                <p class="help-block">This section will not appear on your public profile.</p>
                                <form role="form" class="[ row ]">
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="address">Address</label>
                                        <input type="text" class="[ form-control ]" id="address" name="q22">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="[ form-control ]" id="phone" name="q23">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="mPhone">Mobile Phone</label>
                                        <input type="text" class="[ form-control ]" id="mPhone" name="q24">
                                    </div>
                                    <h4 class="[ col-xs-12 ]">Academic Carreer</h4>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="highSchool">Highschool</label>
                                        <input type="text" class="[ form-control ]" id="highSchool" name="q27">
                                        <p class="help-block">School and grade must be placed.</p>
                                    </div>
                                     <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="midGrad" id="midGrad" name="q4" value="<?php echo $_GET['q4']; ?> ">Class</label>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <span><label for="q4">¿En qué año vas?</label></span>
                                            <select class="[ form-control ]" id="q4" name="q4">
                                                <option>Grado</option>
                                                <option value="grado1">3º Secundaria </option>
                                                <option value="grado2">4º Preparatoria </option>
                                                <option value="grado3">5º Preparatoria </option>
                                                <option value="grado4">6º Preparatoria </option>
                                            </select>
                                            <?php } else { ?>
                                                <span><label for="q4">What Class are you in?</label></span>
                                                <select class="[ form-control ]" id="q4" name="q4">
                                                <option>Class</option>
                                                <option value="grado1">Freshment </option>
                                                <option value="grado2">Sophomore </option>
                                                <option value="grado3">Junior </option>
                                                <option value="grado4">Senior </option>
                                            </select>
                                         <?php } ?>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="highGrad" id="highGrad" name="q3" value="<?php echo $_GET['q3']; ?> ">Graduation Year</label>
                                        <?php if (qtrans_getLanguage() == 'es'){ ?>
                                            <span><label for="q3">¿Cuándo te vas a graduar?</label></span>
                                        <?php } else { ?>
                                            <span><label for="q3">When are you graduating?</label></span>
                                        <?php } ?>
                                        <input name="q3" class="[ form-control ]" type="number" id="datepicker2"/>
                                    </div>
                                    <div class="clear"></div>
                                    <h4 class="[ col-xs-12 ]">Sports Development</h4>
                                    <p class="[ col-xs-12 ] [ help-block ]">You can add more than one tournament.</p>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="tournament">Tournament</label>
                                        <input type="text" class="[ form-control ]" id="tournament" name="q29">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="tournamentDate">Date</label>
                                        <input type="text" class="[ form-control ]" id="tournamentDate">
                                        <p class="help-block">mm-yy</p>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="tournamentRank">Ranking</label>
                                        <input type="text" class="[ form-control ]" id="tournamentRank">
                                    </div>
                                    <div class="clear"></div>
                                    <button class="[ btn btn-primary ] [ margin-bottom ]">Add <i class="fa fa-plus"></i></button>
                                    <div class="clear"></div>
                                    <div class="[ tournaments-added ] [ col-xs-12 ]"></div>
                                    <button type="submit" class="[ btn btn-primary ] [ margin-bottom ]">Save changes</button>
                                </form>
                            </div>
                        </div>
                        <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]"  id="messages">
                            <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                                <h3>Messages</h3>
                                <p class="help-block">Send a message to one of our managers.</p>
                                <form role="form" class="[ row ]">
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="messageName">Name</label>
                                        <input type="text" class="[ form-control ]" id="messageName">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="messageEmail">Email</label>
                                        <input type="email" class="[ form-control ]" id="messageEmail">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="message">Your message</label>
                                        <textarea class="form-control" rows="3" id="message"></textarea>
                                    </div>
                                    <button type="submit" class="[ btn btn-primary ] [ margin-bottom ]">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>
            <!-- /#dashboard -->
        </div>
<?php get_footer(); ?>
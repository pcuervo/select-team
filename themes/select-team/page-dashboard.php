 <?php

//$args = array('redirect' => get_permalink( get_page( $page_id_of_member_area ) ) );
//$args = array( 'redirect' => site_url() );
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
                            <a href="#"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-o"></i> Curriculum</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o"></i> Messages</a>
                        </li>
                    </ul>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <div class="[ container-fluid ]">
                        <div class="[ row ]">
                            <a href="#menu-toggle" id="dashboard-toggle" class="[ btn btn-success ]"><i class="[ fa fa-cogs ]"></i> Dashboard</a>
                        </div>
                        <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]">
                            <div class="[ col-xs-12 col-sm-7 center block ]">
                                <h3>Basic Profile</h3>
                                <form role="form" class="[ row ]">
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="exampleInputEmail1">Full name</label>
                                        <input type="text" class="[ form-control ]" id="exampleInputEmail1">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="fechaNacimiento">Date of birth</label>
                                        <input type="text" class="[ form-control ]" id="fechaNacimiento">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="[ form-control ]" id="email">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="sport">Sport you practice</label>
                                        <select class="[ form-control ]" id="q3" name="q3">
                                            <option value="sport"selected disabled>Sport</option>
                                            <option value="tennis">Tennis</option>
                                            <option value="golf">Golf</option>
                                            <option value="soccer">Soccer</option>
                                            <option value="volleyball">Volleyball</option>
                                        </select>
                                    </div>
                                    <!--GOLF-->
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="sport">Average score</label>
                                        <select class="[ form-control ]" id="q4" name="q4">
                                            <option value="-66">Under 66</option>
                                            <option value="66-67">66-67</option>
                                            <option value="68-70">68-70</option>
                                            <option value="71-73">71-73</option>
                                            <option value="74-76">74-76</option>
                                            <option value="77-79">77-79</option>
                                            <option value="80-82">80-82</option>
                                            <option value="83-85">83-85</option>
                                            <option value="86-88">86-88</option>
                                            <option value="89-90">89-90</option>
                                        </select>
                                    </div>
                                    <div class="clear"></div>
                                    <!--VOLLEBALL-->
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="volleyPosition">Position</label>
                                        <select class="[ form-control ]" id="volleyPosition" name="q8">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-6 ]">
                                        <label for="volleyHeight">Height (cm)</label>
                                        <input type="text" class="[ form-control ]" id="volleyHeight">
                                    </div>
                                    <!--TENNIS-->
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="tennisHand">Right or lef handed?</label>
                                        <input type="text" class="[ form-control ]" id="tennisHand">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="tennisHand">FTP ranking</label>
                                        <input type="text" class="[ form-control ]" id="tennisHand">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="atpTournament">Played an ATP tournament?</label>
                                        <input type="text" class="[ form-control ]" id="atpTournament">
                                    </div>
                                    <!--SOCCER-->
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="soccerPosition">Position</label>
                                        <select class="[ form-control ]" id="q13" name="q13">
                                            <option value="goal-keeper">Goal keeper</option>
                                            <option value="defender">Defender</option>
                                            <option value="midfielder">Midfielder</option>
                                            <option value="forward">Forward</option>
                                        </select>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="soccerHeight">Height (cm)</label>
                                        <input type="text" class="[ form-control ]" id="soccerHeight">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="exampleInputFile">Upload your profile picture</label>
                                        <input type="file" id="exampleInputFile">
                                        <p class="help-block">File must be 500 x 500 pixels. No larger than 400 kb.</p>
                                    </div>
                                  <button type="submit" class="[ btn btn-primary ]">Guardar cambios</button>
                                </form>
                            </div>
                        </div>
                        <div class="[ row ] [ dashboard-profile ] [ margin-bottom ]">
                            <div class="[ col-xs-12 col-sm-7 ] [ center block ]">
                                <h3>Curriculum</h3>
                                <p class="help-block">This section will not appear on your public profile.</p>
                                <form role="form" class="[ row ]">
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="address">Address</label>
                                        <input type="text" class="[ form-control ]" id="address">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="[ form-control ]" id="phone">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 col-sm-6 ]">
                                        <label for="mPhone">Mobile Phone</label>
                                        <input type="text" class="[ form-control ]" id="mPhone">
                                    </div>
                                    <h4 class="[ col-xs-12 ]">Academic Carreer</h4>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="midSchool">Middle School</label>
                                        <input type="text" class="[ form-control ]" id="midSchool">
                                        <p class="help-block">School and grade must be placed.</p>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="midGrad">Graduate Year</label>
                                        <input type="text" class="[ form-control ]" id="midGrad">
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="highSchool">Highschool</label>
                                        <input type="text" class="[ form-control ]" id="highSchool">
                                        <p class="help-block">School and grade must be placed.</p>
                                    </div>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="highGrad">Graduate Date</label>
                                        <input type="text" class="[ form-control ]" id="highGrad">
                                        <p class="help-block">ex: February, 2015</p>
                                    </div>
                                    <div class="clear"></div>
                                    <h4 class="[ col-xs-12 ]">Sports Development</h4>
                                    <p class="help-block">You can add more than one tournament.</p>
                                    <div class="[ form-group ] [ col-xs-12 ]">
                                        <label for="tournament">Tournament</label>
                                        <input type="text" class="[ form-control ]" id="tournament">
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
                                    <button class="[ btn btn-primary ] [ margin-bottom ]">Add <i class="fa fa-plus"></i></button>
                                    <div class="tournaments-added"></div>
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
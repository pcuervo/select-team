 <?php

//$args = array('redirect' => get_permalink( get_page( $page_id_of_member_area ) ) );
//$args = array( 'redirect' => site_url() );
?>
    
<?php get_header(); ?>
    <div class="[ grid ]">
        <figure class="[ effect-sadie ] [ col-xs-6 ] [ bg-prospect ]" data-cards="prospect">
            <div class="[ screen ]"></div>
            <figcaption>
                <h2 class="">Become a prospect</h2>
                <a href="#"></a>
            </figcaption>
        </figure>
        <figure class="[ effect-sadie ] [ col-xs-6 ] [ bg-coach ]" data-cards="coach">
            <div class="[ screen ]"></div>
            <figcaption>
                <h2 class="[ center block ] [  ]">I am a coach</h2>
                <a href="#"></a>
            </figcaption>
        </figure>
    </div>
    <div class="[ cards cards-prospect cards-xs ] [ is-closed ]">
        <div class="card-close">
            <i class="fa fa-times"></i>
        </div>
        <div class="[ card card-2 ] [ is-closed ]">
            <form id="theForm" class="[ simform ] [ center block ]" autocomplete="off">
                <div class="simform-inner">
                    <ol class="questions">
                        <li>
                            <span><label for="q1">What's your name?</label></span>
                            <input id="q1" name="q1" type="text"/>
                        </li>
                        <li>
                            <span><label for="q2">When were you born?</label></span>
                            <input id="q2" name="q2" type="text"/>
                        </li>
                        <li>
                            <span><label for="q3">When are you graduating?</label></span>
                            <input id="q3" name="q3" type="text"/>
                        </li>
                        <li>
                            <span><label for="q4">What year are you studying?</label></span>
                            <input id="q4" name="q4" type="text"/>
                        </li>
                        <li>
                            <span><label for="q5">What's your email address?</label></span>
                            <input id="q5" name="q5" type="email"/>
                        </li>
                        <li>
                            <span><label for="q6">What sport do you practice?</label></span>
                            <select class="[ form-control ]" id="q6" name="q6">
                                <option>Sport</option>
                                <option value="tennis">Tennis</option>
                                <option value="golf">Golf</option>
                                <option value="soccer">Soccer</option>
                                <option value="volleyball">Volleyball</option>
                            </select>
                        </li>
                        <!-- GOLF -->
                        <li class="[ js-sport js-golf ]">
                            <span><label for="q7">What's your average score?</label></span>
                            <select class="[ form-control ]" id="q7" name="q7">
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
                        </li>
                        <!-- VOLLEYBALL -->
                        <li class="[ js-sport js-volleyball ]">
                            <span><label for="q8">What's your position?</label></span>
                            <select class="[ form-control ]" id="q8" name="q8">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </li>
                        <li class="[ js-sport js-volleyball ]">
                            <span><label for="q9">What's your height? (in centimeters)</label></span>
                            <input id="q9" name="q9" type="text"/>
                        </li>
                        <!-- TENNIS -->
                        <li class="[ js-sport js-tennis ]">
                            <span><label for="q10">Are you left or right handed?</label></span>
                            <input id="q10" name="q10" type="text"/>
                        </li>
                        <li class="[ js-sport js-tennis ]">
                            <span><label for="q11">What's your FMT ranking? (Mexican players only)</label></span>
                            <input id="q11" name="q11" type="text"/>
                        </li>
                        <li class="[ js-sport js-tennis ]">
                            <span><label for="q12">Have you ever played an ATP tournament?</label></span>
                            <input id="q12" name="q12" type="text"/>
                        </li>
                        <!-- SOCCER -->
                        <li class="[ js-sport js-soccer ]">
                            <span><label for="q13">What's your position?</label></span>
                            <select class="[ form-control ]" id="q13" name="q13">
                                <option value="goal-keeper">Goal keeper</option>
                                <option value="defender">Defender</option>
                                <option value="midfielder">Midfielder</option>
                                <option value="forward">Forward</option>
                            </select>
                        </li>
                        <li class="[ js-sport js-soccer ]">
                            <span><label for="q14">What's your height? (in centimeters)</label></span>
                            <input id="q14" name="q14" type="text"/>
                        </li>
                    </ol><!-- /questions -->
                    <button class="submit" type="submit">Send</button>
                    <div class="controls">
                        <div class="progress"></div>
                        <button class="[ next ] [ right ]"></button>
                        <span class="number">
                            <span class="number-current"></span>
                            <span class="number-total"></span>
                        </span>
                        <span class="error-message"></span>
                    </div><!-- / controls -->
                </div><!-- /simform-inner -->
                <span class="final-message"></span>
            </form><!-- /simform -->
        </div>
        <div class="card">
            <p class="simform">As a prospect, your profile will be listed in Select Team for coaches to view, get in touch, and talk about sport scholarships at their universities in the United States.</p>
            <button class="[ btn btn-primary ][ btn-card-next ] [ js-next-card ]" data-card="card-2">Next <i class="fa fa-arrow-right"></i></button>
        </div>
    </div><!-- cards prospect -->
    <div class="[ cards cards-coach cards-xs ] [ is-closed ]">
        <div class="card-close">
            <i class="fa fa-times"></i>
        </div>
        <div class="[ card card-2 ] [ is-closed ]">
            <form id="theForm2" class="[ simform ] [ center block ]" autocomplete="off">
                <div class="simform-inner">
                    <ol class="questions">
                        <li>
                            <span><label for="q1">What's your name?</label></span>
                            <input id="q1" name="q1" type="text"/>
                        </li>
                        <li>
                            <span><label for="q2">What's your email address?</label></span>
                            <input id="q2" name="q2" type="text"/>
                        </li>
                        <li>
                            <span><label for="q3">Which sport are you interested in?</label></span>
                            <select class="[ form-control ]" id="q3" name="q3">
                                <option>Sport</option>
                                <option value="tennis">Tennis</option>
                                <option value="golf">Golf</option>
                                <option value="soccer">Soccer</option>
                                <option value="volleyball">Volleyball</option>
                            </select>
                        </li>
                        <!-- GOLF -->
                        <li class="[ js-sport js-golf ]">
                            <span><label for="q4">What's the average score you are looking for?</label></span>
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
                        </li>
                        <!-- VOLLEYBALL -->
                        <li class="[ js-sport js-volleyball ]">
                            <span><label for="q5">What position does the player have to play?</label></span>
                            <select class="[ form-control ]" id="q5" name="q5">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </li>
                        <!-- TENNIS -->
                        <li class="[ js-sport js-tennis ]">
                            <span><label for="q6">Do you prefer a left or right handed player?</label></span>
                            <input id="q6" name="q6" type="text"/>
                        </li>
                        <li class="[ js-sport js-tennis ]">
                            <span><label for="q7">What FMT ranking are you looking for? (for mexican players only)</label></span>
                            <input id="q7" name="q7" type="text"/>
                        </li>
                        <!-- SOCCER -->
                        <li class="[ js-sport js-soccer ]">
                            <span><label for="q8">What position does the player have to play?</label></span>
                            <select class="[ form-control ]" id="q8" name="q8">
                                <option value="goal-keeper">Goal keeper</option>
                                <option value="defender">Defender</option>
                                <option value="midfielder">Midfielder</option>
                                <option value="forward">Forward</option>
                            </select>
                        </li>
                        <!-- SOCCER -->
                    </ol><!-- /questions -->
                    <button class="submit" type="submit">Send</button>
                    <div class="controls">
                        <div class="progress"></div>
                        <button class="[ next ] [ right ]"></button>
                        <span class="number">
                            <span class="number-current"></span>
                            <span class="number-total"></span>
                        </span>
                        <span class="error-message"></span>
                    </div><!-- / controls -->
                </div><!-- /simform-inner -->
                <span class="final-message"></span>
            </form><!-- /simform -->
        </div>
        <div class="[ card ]">
            <p class="simform">As a coach, you will be able to view the listed prospect’s profile and ask for additional information according to the position to fill in the university’s sports team.</p>
            <button class="[ btn btn-success ][ btn-card-next ] [ js-next-card ]" data-card="card-2">Next <i class="fa fa-arrow-right"></i></button>
        </div>
    </div><!-- cards -->
<?php get_footer(); ?>
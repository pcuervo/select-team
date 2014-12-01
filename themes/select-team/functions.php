<?php
// CONSTANTS /////////////////////////////////////
// mensajes de error al registrar usuario
define('USUARIO_INVALIDO', -1);
define('EMAIL_INVALIDO', -2);
define('PASSWORD_INVALIDO', -3);
define('PASSWORD_DIFERENTE', -4);
// deportes
define('TENNIS', 1);
define('SOCCER', 2);
define('GOLF', 3);
define('VOLLEYBALL', 4);
// id preguntas tennis
define('TENNIS_HAND', 1);
define('FMT_RANKING', 2);
define('ATP_TOURNAMENT', 3);
// id preguntas soccer
define('SOCCER_POSITION', 4);
define('SOCCER_HEIGHT', 5);
// id preguntas golf
define('AVERAGE_SCORE', 6);
// id preguntas volley
define('VOLLEY_POSITION', 7);
define('VOLLEY_HEIGHT', 8);






// Block access to the admin area. ////////////////////////////////////////////////////////////////////////
function restrict_admin()
{
	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
                wp_redirect( site_url() );
	}
}
add_action( 'admin_init', 'restrict_admin', 1 );

// Redirect back to the custom login page on a failed login attempt.. /////////////////////////////////////
function pu_login_failed( $user ) {
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	// check that were not on the default login page
	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
		// make sure we don't already have a failed login attempt
		if ( !strstr($referrer, '?login=failed' )) {
			// Redirect to the login page and append a querystring of login failed
	    	wp_redirect( $referrer . '?login=failed');
	    } else {
	      	wp_redirect( $referrer );
	    }

	    exit;
	}
}
add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login


// check that the username and password are not empty. ///////////////////////////
function pu_blank_login( $user ){
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	$error = false;

  	if($_POST['log'] == '' || $_POST['pwd'] == '')
  	{
  		$error = true;
  	}

  	// check that were not on the default login page
  	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

  		// make sure we don't already have a failed login attempt
    	if ( !strstr($referrer, '?login=failed') ) {
    		// Redirect to the login page and append a querystring of login failed
        	wp_redirect( $referrer . '?login=failed' );
      	} else {
        	wp_redirect( $referrer );
      	}

    exit;

  	}
}
//add_action( 'authenticate', 'pu_blank_login');

// DEFINIR LOS PATHS A LOS DIRECTORIOS DE JAVASCRIPT Y CSS ///////////////////////////

	define( 'JSPATH', get_template_directory_uri() . '/js/' );

	define( 'CSSPATH', get_template_directory_uri() . '/css/' );

	define( 'THEMEPATH', get_template_directory_uri() . '/' );

	define( 'SITEURL', site_url('/') );


// FRONT END SCRIPTS AND STYLES //////////////////////////////////////////////////////


	add_action( 'wp_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'bootstrap', JSPATH.'bootstrap.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'jquery-ui-datepicker');
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'classie', JSPATH.'classie.js', array('plugins'), '1.0', true );
		wp_enqueue_script( 'modernizer', JSPATH.'modernizr.custom.js', array('classie'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('modernizer'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url() );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});


// FRONT END SCRIPTS FOOTER //////////////////////////////////////////////////////
	function footerScripts(){
		if( wp_script_is( 'functions', 'done' ) ) {
			if (is_home()) { ?>
		        <script type="text/javascript">
		            (function( $ ) {
		                "use strict";
		                $(function(){
		                    //On load
		                    $( "#datepicker" ).datepicker({
		                    	dateFormat: 'yy-mm-dd',
		                    	changeMonth: true,
      							changeYear: true
		                    });
		                    $( "#datepicker" ).datepicker('setDate', '01-01-1995');
		                    $( "#datepicker2" ).datepicker({
		                    	dateFormat: 'yy-mm-dd',
		                    	changeMonth: true,
      							changeYear: true
		                    });

		                    urlAbre();
		                    var ancho = $(window).outerWidth();
		                    toggleClassCards(ancho);
		                    setAlturaWindowMenosHeader('figure');
		                    setAlturaWindowMenosHeader('.cards');
		                    setTimeout(function(){
		                        setAlturaWindowMenosHeader('figure');
		                        setAlturaWindowMenosHeader('.cards');
		                    }, 500);

		                    //On click/change/etc
		                    filterQuestions();
		                    var theForm = document.getElementById( 'theForm' );
		                    new stepsForm( theForm, {
		                        onSubmit : function( form ) {
		                        	var current_url = document.getElementById('current_url').value;
		                        	//console.log(current_url);
		                            // hide form
		                            classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );
		                           	var messageEl = theForm.querySelector( '.final-message' );
	                                messageEl.innerHTML = 'Loading...';
	                                classie.addClass( messageEl, 'show' );
		                            location.replace(current_url+"/register?"+ $("#theForm").serialize());
		                            return false;
		                        }
		                    } );
		                    var theForm2 = document.getElementById( 'theForm2' );
		                    new stepsForm( theForm2, {
		                        onSubmit : function( form ) {
		                            classie.addClass( theForm2.querySelector( '.simform-inner' ), 'hide' );
		                            $.post("send-coach.php", $("#theForm2").serialize(), function(response) {
		                                console.log('ajax done');
		                                var messageEl = theForm2.querySelector( '.final-message' );
		                                messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
		                                classie.addClass( messageEl, 'show' );
		                            });
		                        }
		                    } );
		                    $('figure').on('click', function(){
		                        abrirCards( $(this) );
		                    });
		                    $('.cards-prospect .js-next-card').on('click', function(){
		                        siguienteCardProspect($(this));
		                    });
		                    $('.cards-coach .js-next-card').on('click', function(){
		                        siguienteCardCoach($(this));
		                    });
		                    $('.card-close').on('click', function(){
		                        cerrarCards( $(this) );
		                    });
		                    //Responsive
		                    $(window).resize(function(){
		                        //On Load
		                        var ancho = $(window).outerWidth();
		                        toggleClassCards(ancho);
		                        setAlturaWindowMenosHeader('figure');
		                        setAlturaWindowMenosHeader('.cards');
		                    });
		                });
		            }(jQuery));
		        </script>
			<?php } elseif ( get_post_type() == 'prospecto') { ?>
				<script type="text/javascript">
				      correIsotope('.isotope-container-sports', '.player', 'masonry');
				      filtrarIsotopeDefault('.isotope-container', 'none');
				      $('.isotope-filters button').on( 'click', function(e) {
				        filtrarIsotope($(this), '.isotope-container', '.isotope-filters button' );
				      });
				      $('#sportAll button').on('click', function(){
				        var sport = $(this).attr('data-filter');
				        //console.log(sport);
				        $('#sportAll').attr('data-active', sport);
				        reorder($(this), '.isotope-container-sports');
				        return false;
				      });
				      $('#genderAll button').on('click', function(){
				        var gender = $(this).attr('data-filter');
				        //console.log(gender);
				        $('#genderAll').attr('data-active', gender);
				        reorder($(this), '.isotope-container-sports');
				        return false;
				      });
				</script>
			<?php } elseif ( get_the_title()=='Dashboard Admin') { ?>
				<script type="text/javascript">
				      correIsotope('.isotope-container-sports', '.player', 'masonry');
				      filtrarIsotopeDefault('.isotope-container', 'none');
				      $('.isotope-filters button').on( 'click', function(e) {
				        filtrarIsotope($(this), '.isotope-container', '.isotope-filters button' );
				      });
				      $('#sportAll button').on('click', function(){
				        var sport = $(this).attr('data-filter');
				        console.log(sport);
				        $('#sportAll').attr('data-active', sport);
				        reorder($(this), '.isotope-container-sports');
				        return false;
				      });
				      $('#genderAll button').on('click', function(){
				        var gender = $(this).attr('data-filter');
				        //console.log(gender);
				        $('#genderAll').attr('data-active', gender);
				        reorder($(this), '.isotope-container-sports');
				        return false;
				      });
				</script>
			<?php } elseif (get_the_title()=='Dashboard' OR get_the_title()=='Admin Prospect Single') { ?>
				<script type="text/javascript">
					$( function() {						
						$("#datepicker-date-of-birth").datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: 'mm-dd-yy',
							yearRange: "-100:+0"
						});
						$( "#datepicker-date-of-graduation" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: 'mm-dd-yy',
							yearRange: "-0:+10",
						});
						$( "#datepicker-date-of-tournament" ).datepicker({
							changeMonth: true,
							changeYear: true,
							showButtonPanel: true,
							dateFormat: 'mm-yy',
							onClose: function(dateText, inst) { 
								var month = $("#datepicker-date-of-tournament .ui-datepicker-month :selected").val();
								var year = $("#datepicker-date-of-tournament .ui-datepicker-year :selected").val();
								$(this).datepicker('setDate', new Date(year, month, 1));
							}
						});
					});
				</script>
			<?php } elseif (get_the_title()=='Register') { ?>
				<script type="text/javascript">
					$( function() {
						$('.j-register-user button').on('click', function(e){
							e.preventDefault();
							console.log('registrando usuario...');
							registerUser();
						});
						$("#datepicker-date-of-birth").datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: 'yy-mm-dd',
							yearRange: "-100:+0"
						});
						$( "#datepicker-date-of-graduation" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: 'yy-mm-dd',
							yearRange: "-0:+10",
						});
						$( "#datepicker-date-of-tournament" ).datepicker({
							changeMonth: true,
							changeYear: true,
							showButtonPanel: true,
							dateFormat: 'yy-mm',
							onClose: function(dateText, inst) { 
								var month = $("#datepicker-date-of-tournament .ui-datepicker-month :selected").val();
								var year = $("#datepicker-date-of-tournament .ui-datepicker-year :selected").val();
								$(this).datepicker('setDate', new Date(year, month, 1));
							}
						});
					});
				</script>
			<?php } ?>
    	<?php } }
    add_action( 'wp_footer', 'footerScripts', 21 );



// ADMIN SCRIPTS AND STYLES //////////////////////////////////////////////////////////



	add_action( 'admin_enqueue_scripts', function(){

		// scripts
		wp_enqueue_script( 'admin-js', JSPATH.'admin.js', array('jquery'), '1.0', true );

		// localize scripts
		wp_localize_script( 'admin-js', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'admin-css', CSSPATH.'admin.css' );

	});



// FRONT PAGE DISPLAYS A STATIC PAGE /////////////////////////////////////////////////



	/*add_action( 'after_setup_theme', function () {

		$frontPage = get_page_by_path('home', OBJECT);
		$blogPage  = get_page_by_path('blog', OBJECT);

		if ( $frontPage AND $blogPage ){
			update_option('show_on_front', 'page');
			update_option('page_on_front', $frontPage->ID);
			update_option('page_for_posts', $blogPage->ID);
		}
	});*/



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});



// CAMBIAR EL CONTENIDO DEL FOOTER EN EL DASHBOARD ///////////////////////////////////



	add_filter( 'admin_footer_text', function() {
		echo 'Creado por <a href="http://pcuervo.com">Pequeño Cuervo</a>. ';
		echo 'Powered by <a href="http://www.wordpress.org">WordPress</a>';
	});



// POST THUMBNAILS SUPPORT ///////////////////////////////////////////////////////////



	if ( function_exists('add_theme_support') ){
		add_theme_support('post-thumbnails');
	}

	if ( function_exists('add_image_size') ){

		// add_image_size( 'size_name', 200, 200, true );

		// cambiar el tamaño del thumbnail
		/*
		update_option( 'thumbnail_size_h', 100 );
		update_option( 'thumbnail_size_w', 200 );
		update_option( 'thumbnail_crop', false );
		*/
	}



// POST TYPES, METABOXES, TAXONOMIES AND CUSTOM PAGES ////////////////////////////////



	require_once('inc/post-types.php');


	require_once('inc/metaboxes.php');


	require_once('inc/taxonomies.php');


	require_once('inc/pages.php');


	require_once('inc/users.php');



// MODIFICAR EL MAIN QUERY ///////////////////////////////////////////////////////////



	add_action( 'pre_get_posts', function($query){

		if ( $query->is_main_query() and ! is_admin() ) {

		}
		return $query;

	});



// THE EXECRPT FORMAT AND LENGTH /////////////////////////////////////////////////////



	/*add_filter('excerpt_length', function($length){
		return 20;
	});*/


	/*add_filter('excerpt_more', function(){
		return ' &raquo;';
	});*/



// REMOVE ACCENTS AND THE LETTER Ñ FROM FILE NAMES ///////////////////////////////////



	add_filter( 'sanitize_file_name', function ($filename) {
		$filename = str_replace('ñ', 'n', $filename);
		return remove_accents($filename);
	});


// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////



	/**
	 * Print the <title> tag based on what is being viewed.
	 * @return string
	 */
	function print_title(){
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		// Add a page number if necessary
		if ( $paged >= 2 || $page >= 2 ){
			echo ' | ' . sprintf( __( 'Página %s' ), max( $paged, $page ) );
		}
	}



	/**
	 * Imprime una lista separada por commas de todos los terms asociados al post id especificado
	 * los terms pertenecen a la taxonomia especificada. Default: Category
	 *
	 * @param  int     $post_id
	 * @param  string  $taxonomy
	 * @return string
	 */
	function print_the_terms($post_id, $taxonomy = 'category'){
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( $terms and ! is_wp_error($terms) ){
			$names = wp_list_pluck($terms ,'name');
			echo implode(', ', $names);
		}
	}


	/**
	 * Regresa la url del attachment especificado
	 * @param  int     $post_id
	 * @param  string  $size
	 * @return string  url de la imagen
	 */
	function attachment_image_url($post_id, $size){
		$image_id   = get_post_thumbnail_id($post_id);
		$image_data = wp_get_attachment_image_src($image_id, $size, true);
		echo isset($image_data[0]) ? $image_data[0] : '';
	}



	/**
	 * Imprime active si el string coincide con la pagina que se esta mostrando
	 * @param  string $string
	 * @return string
	 */
	function nav_is($string = ''){
		$query = get_queried_object();

		if( isset($query->slug) AND preg_match("/$string/i", $query->slug)
			OR isset($query->name) AND preg_match("/$string/i", $query->name)
			OR isset($query->rewrite) AND preg_match("/$string/i", $query->rewrite['slug'])
			OR isset($query->post_title) AND preg_match("/$string/i", remove_accents(str_replace(' ', '-', $query->post_title) ) ) )
			echo 'active';
	} 

	/**
	 * Registra un usuario nuevo
	 * @param  string  $username
	 * @param  string  $password 
	 * @param string  $email
	 * @return boolean
	 */
	function register_user(){

		$is_valid = validate_user_data();
		switch ($is_valid) {
			case USUARIO_INVALIDO:
				echo json_encode(array("error" => "Nombre de usuario inválido"), JSON_FORCE_OBJECT ); 
				break;
			case EMAIL_INVALIDO:
				echo json_encode(array("error" => "Email inválido"), JSON_FORCE_OBJECT ); 
				break;
			case PASSWORD_INVALIDO:
				echo json_encode(array("error" => "Password inválido"), JSON_FORCE_OBJECT ); 
				break;
			case PASSWORD_DIFERENTE:
				echo json_encode(array("error" => "Passwords diferentes"), JSON_FORCE_OBJECT ); 
				break;
			default:
				//var_dump($_POST);
				// Create wp_user
				$username =  $_POST['username'];
				$password =  wp_hash_password( $_POST['password'] );
				$email =  $_POST['email'];
				$user_id = wp_create_user( $username, $password, $email );
				//$user_id = 8;
				if(is_wp_error($user_id)){
					echo json_encode(array("wp-error" => $user_id->get_error_codes()), JSON_FORCE_OBJECT );
					die();
				}

				// Create st_user
				$full_name = $_POST['full_name'];
				$gender = $_POST['gender'];
				$date_of_birth = $_POST['date_of_birth'];
				$sport = $_POST['sport'];

				switch ($sport) {
					case 'tennis':
						$sport_id = TENNIS;
						$sport_data = array(
							TENNIS_HAND 	=> $_POST['tennis_hand'],
							FMT_RANKING		=> $_POST['fmt_ranking'],
							ATP_TOURNAMENT	=> $_POST['atp_tournament'],
							);
						break;
					case 'soccer':
						$sport_id = SOCCER;
						$sport_data = array(
							SOCCER_POSITION => $_POST['soccer_position'],
							SOCCER_HEIGHT	=> $_POST['soccer_height'],
							);
						break;
					case 'golf':
						$sport_id = GOLF;
						$sport_data = array(
							AVERAGE_SCORE => $_POST['average_score']
							);
						break;
					case 'volleyball':
						$sport_id = VOLLEYBALL;
						$sport_data = array(
							VOLLEY_POSITION => $_POST['volley_position'],
							VOLLEY_HEIGHT	=> $_POST['volley_height'],
							);
						break;
				}// switch

				$st_user_data = array(
					'wp_user_id'	=> $user_id,
					'full_name'		=> $full_name,
					'gender'		=> $gender,
					'date_of_birth'	=> $date_of_birth,
					'sport_id'		=> $sport_id,
					'video_host'	=> '-',
					'video_url'		=> '-',
					);

				$st_user_id = add_st_user($st_user_data);
				add_sport_answers($st_user_id, $sport_data);
				login_user($username, $password);
				$msg = array(
					"success" => "Usuario registrado"
					);
				echo json_encode( $msg, JSON_FORCE_OBJECT ); 
				break;
		}// switch

		die();
	} // register_user
	add_action("wp_ajax_nopriv_register_user", "register_user");

	/**
	 * Valida que los datos del usuario ha registrar sean correctos.
	 * @return 1 si no hay errores, -1 username vacío, -2 email vacío, -3 password inválido, -4 passwords no son iguales
	 */
	function validate_user_data(){
		if($_POST['username'] == '')
			return USUARIO_INVALIDO; 

		if($_POST['email'] == '')
			return EMAIL_INVALIDO; 

		if($_POST['password'] == '' || $_POST['password_confirmation'] == '' )
			return PASSWORD_INVALIDO; 

		if($_POST['password'] != $_POST['password_confirmation'])
			return PASSWORD_DIFERENTE; 

		return 1;
	}// validate_user_data

	/**
	 * Loggear al usuario a la plataforma.
	 * @param string $username, string $password
	 * @return boolean
	 */
	function login_user($username, $password){
		$creds = array();
		$creds['user_login'] = $username;
		$creds['user_password'] = $password;
		$creds['remember'] = true;
		$user = wp_signon( $creds, false );
		if ( is_wp_error($user) ){
			echo $user->get_error_message();
			return 0;
		}
		echo 'success!';
		return 1;
	}// login_user

// CUSTOM TABLE FUNCTIONS //////////////////////////////////////////////////////
	
	add_action( 'init', 'st_register_users_table', 1 );
	function st_register_users_table() {
	    global $wpdb;
	    $wpdb->st_users = "st_users";
	}// st_register_users_table

	add_action( 'init', 'st_register_answers_table', 1 );
	function st_register_answers_table() {
	    global $wpdb;
	    $wpdb->st_answers = "st_answers";
	}// st_register_answers_table

	/**
	 * Inserta un usuario a la tabla st_users
	 * @param string $st_user_data
	 * @return int $st_user_id or FALSE
	 */
	function add_st_user($st_user_data){
		global $wpdb;
		$inserted = $wpdb->insert(
			$wpdb->st_users,
			$st_user_data,
			array (
				'%d',
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
				'%s',
			)
		);

		if( $inserted ){
			$st_user_id = $wpdb->insert_id;
			return $st_user_id;
		}
		
		return 0;
	}// add_st_user

	/**
	 * Inserta las respuestas del deporte que práctica el usuario.
	 * @param int $user_id, string $sport_data
	 * @return int $st_user_id or FALSE
	 */
	function add_sport_answers($st_user_id, $sport_data){
		foreach ($sport_data as $question_id => $answer) {
			$answer_data = array(
				'st_user_id'	=> $st_user_id,
				'question_id'	=> $question_id,
				'answer'		=> $answer
				);
			add_sport_answer($answer_data);
		}
	}// add_sport_answers

	/**
	 * Inserta una respuesta del deporte que práctica el usuario.
	 * @param mixed $answer_data
	 * @return boolean
	 */
	function add_sport_answer($answer_data){
		global $wpdb;
		
		$inserted = $wpdb->insert(
			$wpdb->st_answers,
			$answer_data,
			array (
				'%d',
				'%d',
				'%s',
			)
		);

		if( $inserted ){
			$answer_id = $wpdb->insert_id;
			return 1;
		}
		return 0;
	}// add_sport_answer


// ZUROL  //////////////////////////////////////////////////////

 $args = array(
        'echo' => true,
        //'redirect' => site_url(),
        'form_id' => 'form',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false );

//wp_login_form( $args );
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myStartSession');

function myStartSession() {
    if(!session_id()) {
    	echo session_id();
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}

//if(isset($_GET['login']) && $_GET['login'] == 'failed' && $user==''){
if(isset($_GET['login']) && $_GET['login'] == 'failed' && session_id()!='' ){
	echo '
		<div id="login-error" style="background-color: #FFEBE8;border:1px solid #C00;padding:5px;">
			<p>Login failed: You have entered an incorrect Username or password, please try again.</p>
		</div>
	';
}

	/**
	 * Manda un correo a las personas relacionadas.
	 * @param string $email, string $name
	 * @return int TRUE or FALSE
	 */
function send_mail($email_to, $name, $message){

	$current_user = wp_get_current_user();
	$user_id= $current_user->ID;
	
    global $wpdb;
    $query = "SELECT full_name FROM st_users WHERE wp_user_id ='".$user_id."';";
    $myrows = $wpdb->get_results($query);

	$subject = 'Select team message ';
	$body_message = $message;
	
	$headers = 'From: '.$myrows[0]->full_name."\r\n";
	$headers .= 'Reply-To: '.$current_user->user_email."\r\n";

	$mail_status = mail($mail_to, $subject, $body_message, $headers);

}

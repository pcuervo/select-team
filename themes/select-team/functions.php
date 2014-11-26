<?php
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
		wp_enqueue_script( 'plugins', JSPATH.'plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'classie', JSPATH.'classie.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'modernizer', JSPATH.'modernizr.custom.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'stepsForm', JSPATH.'stepsForm.js', array('plugins'), '1.0', true );
		wp_enqueue_script( 'functions', JSPATH.'functions.js', array('jquery'), '1.0', true );


		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});



// FRONT END SCRIPTS FOOTER //////////////////////////////////////////////////////
	function footerScripts(){
		if( wp_script_is( 'functions', 'done' ) ) { ?>
        <script type="text/javascript">
            (function( $ ) {
                "use strict";
                $(function(){
                    //On load
                    urlAbre();
                    var ancho = $(window).outerWidth();
                    toggleClassCards(ancho);
                    setAlturaWindowMenosHeader('figure');
                    setAlturaWindowMenosHeader('.cards');
                    setTimeout(function(){
                        console.log('ya');
                        setAlturaWindowMenosHeader('figure');
                        setAlturaWindowMenosHeader('.cards');
                    }, 500);

                    //On click/change/etc
                    filterQuestions();
                    var theForm = document.getElementById( 'theForm' );
                    new stepsForm( theForm, {
                        onSubmit : function( form ) {
                            // hide form
                            classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );
                            $.post("send-prospects.php", $("#theForm").serialize(), function(response) {
                                console.log('ajax done');
                                var messageEl = theForm.querySelector( '.final-message' );
                                messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
                                classie.addClass( messageEl, 'show' );
                            });
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

// HELPER METHODS AND FUNCTIONS //////////////////////////////////////////////////////
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

if(isset($_SESSION['myKey'])) {
    $value = $_SESSION['myKey'];
} else {
    $value = '';
}


echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

$index =0;
$id_key="";
$usuario="";
foreach ($_COOKIE as $key => $value) {
	$id_key=substr($key, 0, 20 );
	if($id_key=='wordpress_logged_in_'){
		setcookie("cookie_nom", $key);
		$usuario=explode("|", $_COOKIE[$key]);
	}
	$index++;
}
$user = $usuario[0];

setcookie("user-qwertyui", $user);

if($user!='WP Cookie check')
	echo 'Usuario:' .$user.'<br/>';
else {
	echo 'Usuario no logeado';
}


if(isset($_GET['login']) && $_GET['login'] == 'failed' && $user=='WP Cookie check'){
echo '
	<div id="login-error" style="background-color: #FFEBE8;border:1px solid #C00;padding:5px;">
		<p>Login failed: You have entered an incorrect Username or password, please try again.</p>
	</div>
';
}

///////////////////////////////////////////////////////////////-
//session_start();

//session_destroy ();
//echo "string";
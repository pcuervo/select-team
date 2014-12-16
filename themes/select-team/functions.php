<?php
// CONSTANTS /////////////////////////////////////
// mensajes de error al registrar usuario
define('USUARIO_INVALIDO', -1);
define('EMAIL_INVALIDO', -2);
define('PASSWORD_INVALIDO', -3);
define('PASSWORD_DIFERENTE', -4);
// mensajes de error al registrar/modificar un curriculum
define('DIRECCION_INVALIDA', -1);
define('ESCUELA_INVALIDA', -2);
define('GRADO_INVALIDO', -3);
define('TELEFONO_INVALIDO', -4);
define('CELULAR_INVALIDO', -5);
define('FECHA_GRAD_INVALIDA', -6);
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

		if (get_the_title()=='Register' || get_the_title()=='Contacto')
			wp_enqueue_script( 'validate', JSPATH.'validate.min.js', array('plugins'), '1.0', true );

		if (get_the_title()=='Dashboard Admin')
			wp_enqueue_script( 'validate', JSPATH.'validate.min.js', array('plugins'), '1.0', true );
        
        if (get_the_title()=='Dashboard')
			wp_enqueue_script( 'validate', JSPATH.'validate.min.js', array('plugins'), '1.0', true );

		if (is_home())
			wp_enqueue_script( 'validate', JSPATH.'validate.min.js', array('plugins'), '1.0', true );

		// localize scripts
		wp_localize_script( 'functions', 'ajax_url', admin_url('admin-ajax.php') );
		wp_localize_script( 'functions', 'site_url', site_url() );

		// styles
		wp_enqueue_style( 'styles', get_stylesheet_uri() );

	});


// FRONT END SCRIPTS FOOTER //////////////////////////////////////////////////////
	function footerScripts(){
		if( wp_script_is( 'functions', 'done' ) ) {
			if ( is_home() ) { ?>
				<script type="text/javascript">
					(function( $ ) {
						"use strict";
						$(function(){
							//On load
							$( "#datepicker" ).datepicker({
								dateFormat: 'yy-mm-dd',
								changeMonth: true,
								changeYear: true,
								yearRange: "-100:+0"
		                    });
		                    $( "#datepicker" ).datepicker('setDate', '1995-01-01');
		                    $( "#datepicker2" ).datepicker({
		                    	dateFormat: 'yy-mm-dd',
		                    	changeMonth: true,
								changeYear: true,
		                    	yearRange: "+0:+20"
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
		                    if(window.location.href.indexOf("reg=1") > -1) {
								$('#login').modal('show'); 
							}

		                    //On click/change/etc
		                    filterQuestions();
		                    var theForm = document.getElementById( 'theForm' );
		                    new stepsForm( theForm, {
		                        onSubmit : function( form ) {
		                        	var current_url = document.getElementById('current_url').value;
		                            // hide form
		                            classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );
		                           	var messageEl = theForm.querySelector( '.final-message' );
		                           	<?php if (qtrans_getLanguage() == 'es'){ ?>
		                           			messageEl.innerHTML = 'Cargando...';
									<?php } else { ?>
											messageEl.innerHTML = 'Loading...';
									<?php } ?>
	                                classie.addClass( messageEl, 'show' );
		                            location.replace(current_url+"/register?"+ $("#theForm").serialize());
		                            return false;
		                        }
		                    } );
		                    var theForm2 = document.getElementById( 'theForm2' );
		                    new stepsForm( theForm2, {
		                        onSubmit : function( form ) {
		                            classie.addClass( theForm2.querySelector( '.simform-inner' ), 'hide' );
		                            var messageEl = theForm2.querySelector( '.final-message' );
		                            <?php if (qtrans_getLanguage() == 'es'){ ?>
		                            		messageEl.innerHTML = 'Gracias. Nos pondremos en contacto.';
									<?php } else { ?>
										messageEl.innerHTML = 'Thank you. We\'ll be in touch.';
									<?php } ?>
	                                classie.addClass( messageEl, 'show' );
	                                console.log('ajax done');
		                            sendMail();
		                        }
		                    } );
		                    $('figure').not('.j-already-prospect').on('click', function(){
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
							
	   						/*$('.j-login button').on('click', function(e){
								e.preventDefault();
								login();//addTournament();
							});*/

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
				    $('.j-delete-prospect').on('click', function(e){
						e.preventDefault();
						if(confirm("Are you sure?")){
							deleteProspect($('.p_id').val());
						}
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
					$('.j-register-advisor .btn-agregar').on('click', function(e){
						formValidation('.j-register-advisor');
					});
					$('.j-register-advisor .btn-editar').on('click', function(e){
						formValidation('.j-update-advisor');
					});
					$('.hide-form-advisor').hide();
					$('.btn-registrar-nuevo').on('click', function(){
						$('.j-register-advisor ').trigger("reset");
						$('.hide-form-advisor').hide();
						$('.hide-form-advisor').show('slow');
						$('.j-register-advisor input[name="username"]').removeAttr('disabled');
						$('.j-register-advisor input[name="email"]').removeAttr('disabled');
						$('.btn-editar').hide();
						$('.btn-agregar').show();
					});
					$('.btn-guardar-profile').on('click', function(){
						updateBasicProfile();
					});
					$('.btn-editar').hide();
					$('.edit-advisor').on('click', function(e){
						e.preventDefault();
						$('.hide-form-advisor').hide();
						$('.hide-form-advisor').show('slow');
						var id = $(this).data('id');
						getAdvisorBasicInfo(id);
						$('.j-register-advisor input[name="username"]').attr('disabled', 'disabled');
						$('.j-register-advisor input[name="email"]').attr('disabled', 'disabled');
					});
					$('.delete-advisor').on('click', function(e){
						e.preventDefault();
						if(confirm("Are you sure?")){
								var id = $(this).data('id');
								$(this).parent().hide();
								deleteAdvisor(id);
							}
				    });
				</script>
			<?php } elseif (get_the_title()=='Dashboard' OR get_the_title()=='Admin Prospect Single') { ?>
				<script type="text/javascript">
					$( function() {
						$('.j-mensaje-advisor').on('click', function(e) {
							formValidation('.j-form-message-advisor');
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
							dateFormat: 'yy-mm-dd',
							onClose: function(dateText, inst) { 
								var month = $("#datepicker-date-of-tournament .ui-datepicker-month :selected").val();
								var year = $("#datepicker-date-of-tournament .ui-datepicker-year :selected").val();
								$(this).datepicker('setDate', new Date(year, month, 1));
							}
						});
						$('.j-update-basic-profile button').on('click', function(e){
							e.preventDefault();
							console.log('actualizando perfil...');
							updateUserInfo();
						});
						
						$('.j-update-curriculum-update').on('click', function(e){
							e.preventDefault();
							console.log('actualizando curriculum...');
							updateAllCurriculum();
						});

						$('.j-add-tournament').on('click', function(e){
							e.preventDefault();
							addTournament();
						});

						$('.j-delete-tournament').on('click', function(e){
							e.preventDefault();
							deleteTournament(e);
						});

						$('.j-add-academic').on('click', function(e){
							e.preventDefault();
							console.log('add academic');
							addAcademic();
						});

						$('.j-delete-academic').on('click', function(e){
							//console.log('delete academic');
							deleteAcademic($(this).parent());
						});

						$('.j-update-curriculum-create').on('click', function(e){
							e.preventDefault();
							console.log('creando curriculum...');
							createCurriculum();  //Llamar a func que haga el INSERT
						});
                        $(".profile_picture_preview").load(function() {
							var width_picture = $(this).width();
							var height_picture = $(this).height();
							if (width_picture > 300) {
								$(".profile_picture_preview").css("width", "300px");
								$(".profile_picture_preview").css("border", "1px solid #002147");
							} else {
								$(".profile_picture_preview").css("height", "300px");
								$(".profile_picture_preview").css("border", "1px solid #002147");
							}
                        });
					});
				</script>
			<?php } elseif (get_the_title()=='Register') { ?>
				<script type="text/javascript">
					$( function() {
						$('.j-register-user button').on('click', function(e){
							formValidation('.j-register-user');
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
						$('#sport').on('change', function(e){
							e.preventDefault();
							elegirDeporte($('#sport').val());
						});

						$('body').on('DOMNodeInserted', function(e){
							e.preventDefault();
							elegirDeporte('');
							elegirDeporte($('#sport').val());
						});
						elegirDeporte('');
						elegirDeporte($('#sport').val());
					});
				</script>
			<?php } elseif (get_the_title()=='Contacto') { ?>
				<script type="text/javascript">
					$( function() {
						$('.j-contact-button').on('click', function(e){
							formValidation('.j-contact-message');
						});
					});
				</script>
			<?php } ?>
			<?php if( !is_page('dashboard') AND !is_page('dashboard-admin') AND !is_page('register-advisor') AND !is_page('admin-advisor-single') AND !is_home() ) { ?>
				<script>
					footerBottom();
				</script>
			<?php } ?>
    		<script>
				if(window.location.href.indexOf("login=failed") > -1) {
					$('#login').modal('show'); 
					var html_error = '<div class="text-center alert" role="alert"><p>Nombre de usuario o contraseña inválidos.</p></div>';
					$(html_error).prependTo('.modal-footer');
				}
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



// REMOVE ADMIN BAR FOR NON ADMINS ///////////////////////////////////////////////////



	add_filter( 'show_admin_bar', function($content){
		return ( current_user_can('administrator') ) ? $content : false;
	});
	
	
	function pc_hide_admin_bar() {
		show_admin_bar(false);
	}
	add_action('set_current_user', 'pc_hide_admin_bar');



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
	


	function update_advisor(){
		
		// Create wp_user
		if(isset($_POST['id']))
			$id_user =  $_POST['id'];
		else
			$id_user =  get_current_user_id();
		if(isset($_POST['password']))
			$password =  $_POST['password'];
		else
			$password = '';
			
		$full_name = $_POST['full_name'];
		
		if(!empty($password)){
			
			$user_id = wp_update_user( array( 'ID' => $id_user, 'user_pass' => $password ) );

			if ( !is_wp_error( $user_id ) ) {

				update_advisor_user($full_name, $id_user);

				$msg = array(
					"success" 	=> "Usuario registrado",
					"error"	  	=> 0
				);
				echo json_encode( $msg); 
			}else{
				$msg = array(
					"msg" => "Usuario duplicado",
					"error"	  	=> 1
				);
				echo json_encode( $msg ); 
			}
		}else{
			
			update_advisor_user($full_name, $id_user);
			
			$msg = array(
				"success" 	=> "Usuario registrado",
				"error"	  	=> 0
			);
			echo json_encode( $msg); 
		}
		die();
	} // register_advisor
	add_action("wp_ajax_update_advisor", "update_advisor");

	function delete_advisor(){
		global $wpdb;
		$id=$_POST['id'];
		$deleted = $wpdb->delete(
			$wpdb->st_advisors,
				array(
					'wp_user_id'=> $id
				),
				array('%d')
		);
		die();
	} // register_advisor
	add_action("wp_ajax_delete_advisor", "delete_advisor");


	function delete_prospect(){
		global $wpdb;
		$id=$_POST['id'];

		$deleted = $wpdb->delete(
		    $wpdb->wp_users,
			    array(
			    	'ID'=> $id
			    	),
			    array('%d')
		);
	
		die();
	} // register_advisor
	add_action("wp_ajax_delete_prospect", "delete_prospect");


	/**
	 * Registra un usuario advisor
	 * @param  string  $username
	 * @param  string  $password 
	 * @param string  $email
	 * @return boolean
	 */
	function register_advisor(){
		// Create wp_user
		$username =  $_POST['username'];
		$password =  $_POST['password'];
		$email =  $_POST['email'];
		$full_name = $_POST['full_name'];
		
		$userdata = array(
		    'user_login'  	=> $username,
		    'user_pass'   	=> $password, 
		    'user_email'	=> $email,
		    'role'			=> 'author'
		);

		$user_id = wp_insert_user( $userdata ) ;
		if( !is_wp_error($user_id) ) {
			// Create st_user
			$full_name = $_POST['full_name'];

			$advisor_data = array(
			'wp_user_id'	=> $user_id,
			'full_name'		=> $full_name,
			);
			$st_user_id = add_advisor_user($advisor_data);
			$msg = array(
				"success" 	=> "Usuario registrado",
				"id"		=> $st_user_id,
				"error"	  	=> 0
				);
			echo json_encode( $msg); 
		}else{
			$msg = array(
				"msg" => "Usuario duplicado",
				"error"	  	=> 1
				);
			echo json_encode( $msg ); 
		}
		die();
	} // register_advisor
	add_action("wp_ajax_register_advisor", "register_advisor");
	
	/**
	 * Registra una conversacion
	 * @param  string  $para quien
	 * @param  string  $password 
	 * @param string  $email
	 * @return boolean
	 */
	function register_conversacion($from_id,$to_id ){
		$created_date = date("Y-m-d H:i:s");
		$conversation_data = array(
		    'from_id'  	=> $from_id,
		    'to_id'   	=> $to_id
		);

		$conversation_id = add_conversation( $conversation_data ) ;
		if($conversation_id)
			return $conversation_id;
		else
			return -1;
	} // register_advisor

	/**
	 * Registra un mensaje
	 * @param  string  $username
	 * @param  string  $password 
	 * @param string  $email
	 * @return boolean
	 */
	function register_mensaje($message,$from_id,$to_id){
		
		$conversation_id = register_conversacion($from_id,$to_id );
		
		if ( $conversation_id != -1 )
		{
			$created_date = date("Y-m-d H:i:s");
			$mensajedata = array(
				'message'  	=> $message,
				'conversation_id'   	=> $conversation_id, 
				'read'	=> 0,
				'date'			=> $created_date,
				'receptor' => $to_id
			);

			$user_id = add_message( $mensajedata ) ;
			if($user_id)
				return true;
			else
				return false;
		}else
			return false;
	} // register_advisor
	
	/**
	 * Jalar "basic profile" de todos los usuarios
	 * @return mixed $users_basic_info
	 */
	function get_advisors_basic_info(){
	    global $wpdb;

	    $query = "SELECT WU.* ,A.full_name  FROM st_advisors A INNER JOIN wp_users WU ON A.wp_user_id = WU.id";
	    $users = $wpdb->get_results($query);
		
		return $users;
	}// get_users_basic_info

	/**
	 * Jalar "basic profile" de todos los usuarios
	 * @return mixed $users_basic_info
	 */
	function get_info_advisor(){
		$user_id= $_POST['id'];

	    global $wpdb;

	    $query = "SELECT WU.* ,A.full_name  FROM st_advisors A INNER JOIN wp_users WU ON A.wp_user_id = WU.id WHERE WU.ID ='".$user_id."' LIMIT 1";
	    $users = $wpdb->get_results($query);
		
		echo json_encode($users[0], JSON_FORCE_OBJECT);
	}// get_users_basic_info
    add_action("wp_ajax_get_info_advisor", "get_info_advisor");
	

	function get_info_current_advisor(){
		$user_id= get_current_user_id();

	    global $wpdb;

	    $query = "SELECT WU.* ,A.full_name  FROM st_advisors A INNER JOIN wp_users WU ON A.wp_user_id = WU.id WHERE WU.ID ='".$user_id."' LIMIT 1";
	    $users = $wpdb->get_results($query);
		
		if ( $users != null )
			return $users[0];
		else
			return null;
	}
	/**
	 * Inserta un usuario a la tabla st_advisors
	 * @param string $advisor_data
	 * @return int $advisor_id or FALSE
	 */
	function add_advisor_user($advisor_data){
		global $wpdb;
		$inserted = $wpdb->insert(
			$wpdb->st_advisors,
			$advisor_data,
			array (
				'%d',
				'%s',
			)
		);

		if( $inserted ){
			$st_user_id = $wpdb->insert_id;
			return $st_user_id;
		}
		
		return 0;
	}// add_advisor_user
	
	function add_conversation( $conversation_data )
	{
		global $wpdb;
		$inserted = $wpdb->insert(
			$wpdb->st_conversations,
			$conversation_data,
			array (
				'%d',
				'%d'
			)
		);

		if( $inserted ){
			$st_conversation_id = $wpdb->insert_id;
			return $st_conversation_id;
		}
		
		return 0;
	}
	/**
	 * Inserta mensaje tabla st_messages
	 * @param string $message_data
	 * @return int $message_id or FALSE
	 */
	function add_message($message_data){
		global $wpdb;
		$inserted = $wpdb->insert(
			$wpdb->st_messages,
			$message_data,
			array (
				'%s',
				'%d',
				'%d',
				'%s'
			)
		);

		if( $inserted ){
			$st_message_id = $wpdb->insert_id;
			return $st_message_id;
		}
		
		return 0;
	}// add_advisor_user
	
	function update_advisor_user($full_name, $id_user){
		global $wpdb;
		
		$query = $wpdb->prepare("SELECT * FROM st_advisors  WHERE wp_user_id = %d", intval($id_user));
	    $user_advisors = $wpdb->get_results($query);

	    if($user_advisors){
			$updated = $wpdb->update(
			$wpdb->st_advisors,
				array(
					'full_name' 	=> $full_name
				),
				array('wp_user_id' => $id_user),
				array(
					'%s'
				)
			);
		}else{
			$advisor_data = array(
				'wp_user_id'	=> $id_user,
				'full_name'		=> $full_name,
			);
			$st_user_id = add_advisor_user($advisor_data);
		}

		return 0;
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
				// Create wp_user
				$username =  $_POST['username'];
				$password =  $_POST['password'];
				$email =  $_POST['email'];

				$userdata = array(
				    'user_login'  	=> $username,
				    'user_pass'   	=> $password, 
				    'user_email'	=> $email,
				    'role'			=> 'subscriber',
				);

				$user_id = wp_insert_user( $userdata ) ;

				$mail_status = register_email($email, $username, $password);
				var_dump($mail_status);
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
					'wp_user_id'		=> $user_id,
					'full_name'			=> $full_name,
					'gender'			=> $gender,
					'date_of_birth'		=> $date_of_birth,
					'sport_id'			=> $sport_id,
					'video_host'		=> '-',
					'video_url'			=> '-',
					'profile_picture'	=> '-',
					);

				$st_user_id = add_st_user($st_user_data);
				add_sport_answers($st_user_id, $sport_data);
				$msg = array(
					"success" => "Usuario registrado",
					"error"	  => 0
					);
				echo json_encode( $msg, JSON_FORCE_OBJECT ); 
		}// switch
	} // register_user
	add_action("wp_ajax_nopriv_register_user", "register_user");

	/**
	 * Actualiza los datos del curriculum del usuario.
	 * @param  string  $address
	 * @param  string  $phone
	 * @param string  $mobile_phone
	 * @param string  $high_school
	 * @param string  $grade
	 * @param string  $high_grad
	 * @return boolean
	 */

	function update_curriculum(){
		global $wpdb;

	   	$address 		= $_POST['address'];
	   	$phone 			= $_POST['phone'];
	   	$mobile_phone	= $_POST['mobile_phone'];
	   	$high_school	= $_POST['high_school'];
	   	$grade 			= $_POST['grade'];
	   	$high_grad		= $_POST['high_grad'];

	   	
	   	$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;

		$updated = $wpdb->update(
		    $wpdb->st_curriculum,
			    array(
			     	'address' 			=> $address,
			     	'phone' 			=> $phone,
			     	'mobile_phone' 		=> $mobile_phone,
			     	'graduate_year' 	=> $grade,
			     	'high_school' 		=> $high_school,		     
			     	'graduation_date' 	=> $high_grad
		 		),
			    array('st_user_id' => $st_users_id),
			    array(
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s'
			     )
		);
		die();
	}
	add_action("wp_ajax_nopriv_update_curriculum", "update_curriculum");
	add_action("wp_ajax_update_curriculum", "update_curriculum");
	
	/**
	 * Introduce los datos del curriculum del usuario.
	 * @param  string  $address
	 * @param  string  $phone
	 * @param string  $mobile_phone
	 * @param string  $high_school
	 * @param string  $grade
	 * @param string  $high_grad
	 * @return boolean
	 */

	function create_curriculum(){
		global $wpdb;

	   	$address 		= $_POST['address'];
	   	$phone 			= $_POST['phone'];
	   	$mobile_phone	= $_POST['mobile_phone'];
	   	$high_school	= $_POST['high_school'];
	   	$grade 			= $_POST['grade'];
	   	$high_grad		= $_POST['high_grad'];

	   	
	   	$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;
		
		$inserted = $wpdb->insert(
		    $wpdb->st_curriculum,
			    array(
			    	'st_user_id' 		=> $st_users_id,
			     	'address' 			=> $address,
			     	'phone' 			=> $phone,
			     	'mobile_phone' 		=> $mobile_phone,
			     	'graduate_year' 	=> $grade,
			     	'high_school' 		=> $high_school,		     
			     	'graduation_date' 	=> $high_grad
		 		),
			    array(
			    	'%d',
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s'
			     )
		);
		die();
	}
	add_action("wp_ajax_nopriv_create_curriculum", "create_curriculum");
	add_action("wp_ajax_create_curriculum", "create_curriculum");

	/**
	 * Elimina un torneo.
	 * @param  string  $tournament_name
	 * @param  string  $tournament_date
	 * @param  string  $tournament_rank
	 * @return boolean
	 */
	function delete_tournament(){
		global $wpdb;
		
		$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;
		
        $tournament_name = $_POST['tournament_name'];
        $tournament_date = $_POST['tournament_date'];
        $tournament_rank = $_POST['tournament_rank'];

		$deleted = $wpdb->delete(
		    $wpdb->st_tournament,
			    array(
			    	'st_user_id'		=> $st_users_id,
			    	'name'				=> $tournament_name,
			    	//'tournament_date'	=> $tournament_date,
			    	'ranking'	=> $tournament_rank
			    	),
			    array('%d')
		);
		die();
	}
	add_action("wp_ajax_nopriv_delete_tournament", "delete_tournament");
	add_action("wp_ajax_delete_tournament", "delete_tournament");

	/**
	 * Crea un torneo.
	 * @param  string  $tournament_name
	 * @param  string  $tournament_date
	 * @param  string  $tournament_rank
	 * @return boolean
	 */

	function register_tournament(){
		global $wpdb;
		
		$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;
		
        $tournament_name = $_POST['tournament'];
        $tournament_date = $_POST['tournament_date'];
        $tournament_rank = $_POST['tournament_rank'];

        for ($t=0; $t < sizeof($tournament_name); $t++) { 

	        $inserted = $wpdb->insert(
			    $wpdb->st_tournament,
				    array(
				    	'st_user_id'		=> $st_users_id,
				    	'name'				=> $tournament_name[$t],
				    	'tournament_date'	=> $tournament_date[$t],
				    	'ranking'	=> $tournament_rank[$t]
				    	),
				    array(
				    	'%d', 
				    	'%s',
				    	'%s',
				    	'%s'
				    	)
			);
        }

		die();
	}
	add_action("wp_ajax_nopriv_register_tournament", "register_tournament");
	add_action("wp_ajax_register_tournament", "register_tournament");


	/**
	 * Crea un torneo.
	 * @param  string  $tournament_name
	 * @param  string  $tournament_date
	 * @param  string  $tournament_rank
	 * @return boolean
	 */

	function addAcademic($info){
		global $wpdb;
		
		$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;
		
        $high_school = $info['high_school'];
        $high_grad = $info['high_grad'];
        $country = $info['country'];
        $country = $info['country'];
        $city = $info['city'];

	        $inserted = $wpdb->insert(
			    $wpdb->st_academic,
				    array(
				    	'st_user_id'		=> $st_users_id,
				    	'high_school'		=> $high_school,
				    	'graduation_date'	=> $high_grad,
				    	'country'			=> $country,
				    	'city'				=> $city
				    	),
				    array(
				    	'%d', 
				    	'%s',
				    	'%s',
				    	'%s',
				    	'%s'
				    	)
			);
		die();
	}

	function deleteAcademic($info){
		global $wpdb;
		$id=$info['del'];
		$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;

		$deleted = $wpdb->delete(
			$wpdb->st_academic,
				array(
					'st_user_id'=> $st_users_id,
					'id'=> $id
				),
				array('%d')
		);
		die();
	}
	/**
	 * Actualiza los datos del perfil del usuario.
	 * @param  string  $address
	 * @param  string  $phone
	 * @param string  $mobile_phone
	 * @param string  $high_school
	 * @param string  $grade
	 * @param string  $high_grad
	 * @return boolean
	 */
	function update_user(){
		global $wpdb;
	   	
	   	$full_name 	= $_POST['full_name'];
	   	$video_host = $_POST['video_host'];
	   	$video_url	= $_POST['video_url'];

		$updated = $wpdb->update(
		    $wpdb->st_users,
			    array(
			     	'full_name' 	=> $full_name,
			     	'video_host'	=> $video_host,
			     	'video_url' 	=> $video_url
		 		),
			    array('wp_user_id' => get_current_user_id()),
			    array(
			    	'%s',
			    	'%s',
			    	'%s'
			     )
		);


		$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;

		$sport	= $_POST['sport'];
		
		switch ($sport) {
			case 'soccer':
				$updated = $wpdb->update(
				    $wpdb->st_answers,
					    array('answer' 	=> $_POST['soccer_position']),
					    array(
					    	'st_user_id' => $st_users_id,
					    	'question_id'=> '4'
					    	),
					    array('%s')
					);	
				break;
			case 'volleyball':
				$updated = $wpdb->update(
				    $wpdb->st_answers,
					    array('answer' 	=> $_POST['volley_position']),
					    array(
					    	'st_user_id' => $st_users_id,
					    	'question_id'=> '7'
					    	),
					    array('%s')
					);	
				break;
			case 'golf':
				$updated = $wpdb->update(
				    $wpdb->st_answers,
					    array('answer' 	=> $_POST['average_score']),
					    array(
					    	'st_user_id' => $st_users_id,
					    	'question_id'=> '6'
					    	),
					    array('%s')
				);	
				break;
			case 'tennis':
				$updated = $wpdb->update(
				    $wpdb->st_answers,
					    array('answer' 	=> $_POST['fmt_ranking']),
					    array(
					    	'st_user_id' => $st_users_id,
					    	'question_id'=> '2'
					    	),
					    array('%s')
				);
				$updated = $wpdb->update(
					    $wpdb->st_answers,
						    array('answer' 	=> $_POST['atp_tournament']),
						    array(
						    	'st_user_id' => $st_users_id,
						    	'question_id'=> '3'
						    	),
						    array('%s')
					);
				break;		
			default:
				# code...
				break;
		}

		die();

	}
	add_action("wp_ajax_nopriv_update_user", "update_user");
	add_action("wp_ajax_update_user", "update_user");


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
	 * Agrega foto de perfil de usuario.
	 * @param int $wp_user_id, string $profile_pic
	 * @return 1 si no hay errores, -1 username vacío, -2 email vacío, -3 password inválido, -4 passwords no son iguales
	 */
	function add_profile_picture($wp_user_id, $profile_pic){
		global $wpdb;
		$updated = $wpdb->update(
		     $wpdb->st_users,
		     array('profile_picture' => $profile_pic),
		     array('id' => $wp_user_id),
		     array( '%s'),
		     array( '%d')
		 );
	}// add_profile_picture

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
			return $user->get_error_message();
		}
		return 1;
	}// login_user

	/**
	 * Loggear a un usuario a la plataforma desde la página.
	 * @return boolean
	 */
	function site_login(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$logged_in = login_user($username, $password);
		if($logged_in == '1'){
			echo 1;
		} else
			echo 0;
		die();
	}// site_login
	add_action("wp_ajax_nopriv_site_login", "site_login");
	
	function site_login_post($username, $password){

		$logged_in = login_user($username, $password);
		if($logged_in == '1'){
			return 1;
		} else
			return 0;
	}// site_login

	/**
	 * Loggear a un usuario a la plataforma desde la página.
	 * @return boolean
	 */
	function get_user_role(){
		$role = get_current_user_role();
		echo $role;

		die();
	}// get_user_role
	add_action("wp_ajax_nopriv_get_user_role", "get_user_role");
	add_action("wp_ajax_get_user_role", "get_user_role");

	/**
	 * Obtener el rol del usuario.
	 * @return $role
	 */
	function get_current_user_role(){
		global $wpdb;

		$user = get_userdata( get_current_user_id() );
	    $capabilities = $user->{$wpdb->prefix . 'capabilities'};

	    if ( !isset( $wp_roles ) )
	        $wp_roles = new WP_Roles();

	    foreach ( $wp_roles->role_names as $role => $name ) :

	        if ( array_key_exists( $role, $capabilities ) )
	            return $role;

	    endforeach;
	}// site_login

	/**
	 * Devuelve la url del video de acuerdo al host.
	 * @param string $advisor_data
	 * @return int $advisor_id or FALSE
	 */
	function get_video_src($url, $host){
		if($url == '-')
			return 0;
		if($host == 'vimeo'){
			$id = (int) substr(parse_url($url, PHP_URL_PATH), 1);
			return '//player.vimeo.com/video/'.$id;
		}

		$id = explode('v=', $url)[1];
		$ampersand_position = strpos($id, '&');
		if( $ampersand_position > 0 )
			$id = substr($id, $ampersand_position);

		parse_str( parse_url( $url, PHP_URL_QUERY ), $url_array );
		$id = $url_array['v']; 
		return '//www.youtube.com/embed/'.$id;
	}// get_video_src


// CUSTOM TABLE FUNCTIONS //////////////////////////////////////////////////////
	
	add_action( 'init', 'st_register_tournament_table', 1 );
	function st_register_tournament_table() {
	    global $wpdb;
	    $wpdb->st_tournament = "st_tournament";
	}// st_register_tournament_table

	add_action( 'init', 'st_register_curriculum_table', 1 );
	function st_register_curriculum_table() {
	    global $wpdb;
	    $wpdb->st_curriculum = "st_curriculum";
	}// st_register_curriculum_table

	add_action( 'init', 'st_register_academic_table', 1 );
	function st_register_academic_table() {
	    global $wpdb;
	    $wpdb->st_academic = "st_academic";
	}// st_register_curriculum_table

	add_action( 'init', 'st_register_users_table', 1 );
	function st_register_users_table() {
	    global $wpdb;
	    $wpdb->st_users = "st_users";
	}// st_register_users_table

	add_action( 'init', 'st_wp_users_table', 1 );
	function st_wp_users_table() {
	    global $wpdb;
	    $wpdb->wp_users = "wp_users";
	}// st_register_users_table

	add_action( 'init', 'st_register_advisors_table', 1 );
	function st_register_advisors_table() {
	    global $wpdb;
	    $wpdb->st_advisors = "st_advisors";
	}// st_register_st_advisors_table

	add_action( 'init', 'st_register_messages_table', 1 );
	function st_register_messages_table() {
	    global $wpdb;
	    $wpdb->st_messages = "st_messages";
	}// st_register_messages_table

	add_action( 'init', 'st_register_conversations_table', 1 );
	function st_register_conversations_table() {
	    global $wpdb;
	    $wpdb->st_conversations = "st_conversations";
	}// st_register_messages_table

	add_action( 'init', 'st_register_basic_profile_view', 1 );
	function st_register_basic_profile_view() {
	    global $wpdb;
	    $wpdb->v_basic_profile = "v_basic_profile";
	}// st_register_basic_profile_view

	add_action( 'init', 'st_register_st_answers', 1 );
	function st_register_st_answers() {
	    global $wpdb;
	    $wpdb->st_answers = "st_answers";
	}// st_register_st_answers
	
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

	/**
	 * Jalar "basic profile" de todos los usuarios
	 * @return mixed $users_basic_info
	 */
	function get_users_basic_info(){
	    global $wpdb;

	    $query = "SELECT id, full_name, sport, gender, profile_picture FROM v_basic_profile";
	    $users = $wpdb->get_results($query);
		
		return $users;
	}// get_users_basic_info

	/**
	 * Jalar "basic profile" de un usuario
	 * @param int $wp_user_id
	 * @return mixed $user_basic_info
	 */
	function get_user_basic_info($wp_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT * FROM v_basic_profile WHERE id = %d", intval($wp_user_id));
	    $user_basic_info = $wpdb->get_results($query);
		
		return $user_basic_info[0];
	}// get_users_basic_info

	/**
	 * Jalar "basic profile" de un advisor/admin
	 * @param int $wp_user_id
	 * @return mixed $user_basic_info
	 */
	function get_advisor_basic_info($wp_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT * FROM wp_users WHERE id = %d", intval($wp_user_id));
	    $user_basic_info = $wpdb->get_results($query);
		
		return $user_basic_info[0];
	}// get_users_basic_info

	/**
	 * Jalar curriculum de usuario
	 * @param int $st_user_id
	 * @return mixed $user_basic_info
	 */
	function get_user_curriculum($st_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT * FROM st_curriculum WHERE st_user_id = %d", intval($st_user_id));
	    $user_curriculum = $wpdb->get_results($query);

	    if($user_curriculum) return $user_curriculum[0];

	    return 0;
	}// get_user_curriculum

	/**
	 * Jalar respuestas por deporte de un usuario
	 * @param int $wp_user_id
	 * @return mixed $user_answers
	 */
	function get_user_sport_answers($wp_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT * FROM st_answers WHERE st_user_id = %d", $wp_user_id);
	    $user_answers = $wpdb->get_results($query);

	    if($user_answers) return $user_answers;
	     return 0;
	}// get_user_sport_answers

	/**
	 * Jalar curriculum de un usuario
	 * @param int $wp_user_id
	 * @return mixed $user_curriculum, 0 en caso de no encontrar resultados.
	 */
	function get_user_curriculum_info($wp_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT * FROM st_curriculum WHERE st_user_id = %d", $wp_user_id);
	    $user_curriculum = $wpdb->get_results($query);
		if (sizeof($user_curriculum)>0) {
			return $user_curriculum[0];
		}
		else
			return $user_curriculum;
	}// get_user_curriculum_info

	/**
	 * Jalar el historial academico de un usuario
	 * @param int $wp_user_id
	 * @return mixed $user_curriculum, 0 en caso de no encontrar resultados.
	 */
	function get_user_academic_info($wp_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT * FROM st_academic WHERE st_user_id = %d", $wp_user_id);
	    $user_curriculum = $wpdb->get_results($query);
		return $user_curriculum;
	}// get_user_academic_info


	/**
	 * Jalar de los torneos de un usuario
	 * @param int $wp_user_id
	 * @return mixed $user_tournaments_info
	 */
	function get_user_tournament($wp_user_id){
	    global $wpdb;
	    $query = $wpdb->prepare("SELECT name, tournament_date, ranking FROM st_tournament WHERE st_user_id = %d", $wp_user_id);
	    $user_tournaments_info = $wpdb->get_results($query);
		
		return $user_tournaments_info;
	}// get_user_tournament


	/**
	 * Manda un correo a las personas relacionadas.
	 * @param string $email_to, $message
	 * @return int TRUE or FALSE
	 */
	function send_email($mail_to, $message){

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
		return $mail_status;
	}// send_email

	/**
	 * Manda un correo con las credenciales del registro.
	 * @param string $email_to, $message
	 * @return int TRUE or FALSE
	 */
	function register_email($mail_to, $username, $password){
		$st_mail="zurol@pcuervo.com";

		$subject = "Select team register message \r\n";
		$body_message = ".......\r\n";
		$body_message .= "USER:".$username."\r\n";
		$body_message .= "PASSWORD:".$password."\r\n";
		
		$headers = "From: Select Team\r\n";
		$headers .= "Reply-To: ".$st_mail."\r\n";

		$mail_status = mail($mail_to, $subject, $body_message, $headers);
		return $mail_status;
	}// register_email


	/**
	 * Crea un torneo.
	 * @param  string  $tournament_name
	 * @param  string  $tournament_date
	 * @param  string  $tournament_rank
	 * @return boolean
	 */

	function register_academic(){
		global $wpdb;
		
		$prospect_info = get_user_basic_info(get_current_user_id()); 
        $st_users_id=$prospect_info->st_user_id;
		
        $academic_name = $_POST['name'];
        $academic_date = $_POST['date'];
        $academic_country = $_POST['country'];
        $academic_city = $_POST['city'];

        $inserted = $wpdb->insert(
		    $wpdb->st_academic,
			    array(
			    	'st_user_id'		=> $st_users_id,
			    	'high_school'		=> $academic_name,
			    	'graduation_date'	=> $academic_date,
			    	'country'			=> $academic_country,
			    	'city'				=> $academic_city
			    	),
			    array(
			    	'%d', 
			    	'%s',
			    	'%s',
			    	'%s',
			    	'%s'
			    	)
		);

		die();
	}
	add_action("wp_ajax_register_academic", "register_academic");


	/**
	 * Manda un correo sobre las preferencias del coach. // Basada en el archivo maqueta/send-coach.php
	 * @param string $email_to, string $message
	 * @return int TRUE or FALSE
	 */

	function send_coach_email(){
		$sent=send_coach_emailX("luis.mendoza@selectteam.com", $_POST);
	}

	add_action("wp_ajax_nopriv_send_coach_email", "send_coach_email");
	add_action("wp_ajax_send_coach_email", "send_coach_email");


	function send_contact_email($name, $email_address, $comment){
		$mail_to = 'zurol@pcuervo.com, raul@pcuervo.com, alejandro@pcuervo.com'; //Comentar luego.

		$body_message = "";
		$subject = 'Select team coach - Comment';

		$body_message = "Name: ".$name."\n";
		$body_message .= "Email: ".$email_address."\n\n";

		$body_message .= "".$comment;

		$headers = 'From: '.$name."\r\n";
		$headers .= 'Reply-To: '.$email_address."\r\n";
		
		$mail_status = mail($mail_to, $subject, $body_message, $headers);

		return $mail_status;
	}//send_coach_email


	function contact_message(){
		var_dump($_POST);
		$name = $_POST['name'];
		$email_address = $_POST['email'];
		$comment = $_POST['message'];
		send_contact_email($name, $email_address, $comment);
		die();
	} // register_advisor
	add_action("wp_ajax_nopriv_contact_message", "contact_message");
	add_action("wp_ajax_contact_message", "contact_message");


	function send_coach_emailX($mail_to, $form_info){
		$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = $q8 = $q9 = $q10 = '';

		$body_message = "";

		$q1 	= ( isset($form_info['name']) ) ? $form_info['name'] : ''; //What's your name?
		$q2 	= ( isset($form_info['email']) ) ? $form_info['email'] : ''; //What's your email address?
		$q3 	= ( isset($form_info['sport']) ) ? $form_info['sport'] : ''; //Which sport are you interested in?
		$q4 	= ( isset($form_info['average_score']) ) ? $form_info['average_score'] : ''; //What's the average score you are looking for?
		$q5 	= ( isset($form_info['soccer_position']) ) ? $form_info['soccer_position'] : ''; //What position does the player have to play?
		$q7 	= ( isset($form_info['tennis_hand']) ) ? $form_info['tennis_hand'] : ''; //Do you prefer a left or right handed player?
		$q8 	= ( isset($form_info['fmt_ranking']) ) ? $form_info['fmt_ranking'] : ''; //What FMT ranking are you looking for? (for mexican players only)
		$q9 	= ( isset($form_info['volley_position']) ) ? $form_info['volley_position'] : ''; //What position does the player have to play?

		//$mail_to = 'raul@pcuervo.com, alejandro@pcuervo.com'; //Comentar luego.
		$subject = 'Select team coach '.$q1;
		echo $q1;
		if ( $q1 !== '' ){
			$body_message = "What's your name?: ".$q1."\n";
		}
		if ( $q2 !== '' ){
			$body_message .= "What's your email address?: ".$q2."\n";
		}
		if ( $q3 !== '' ){
			$body_message .= "Which sport are you interested in?: ".$q3."\n";
		}
		if ( $q4 !== '' ){
			$body_message .= "What's the average score you are looking for?: ".$q4."\n";
		}
		if ( $q5 !== '' ){
			$body_message .= "What position does the player have to play?: ".$q5."\n";
		}
		if ( $q6 !== '' ){
			$body_message .= "Are you left or right handed?: ".$q6."\n";
		}
		if ( $q7 !== '' ){
			$body_message .= "Do you prefer a left or right handed player?: ".$q7."\n";
		}
		if ( $q8 !== '' ){
			$body_message .= "What FMT ranking are you looking for?: ".$q8."\n";
		}
		if ( $q9 !== '' ){
			$body_message .= "What position does the player have to play?: ".$q9."\n";
		}
		$body_message .= "";

		$headers = 'From: '.$q1."\r\n";
		$headers .= 'Reply-To: '.$q2."\r\n";
		
		$mail_status = mail($mail_to, $subject, $body_message, $headers);

		return $mail_status;
	}//send_coach_email


	/**
	 * Manda un correo sobre las características del prospecto. // Basada en el archivo maqueta/send-prospects.php
	 * por el momento está comentada pero tengo entendido que se usaría al caer en el Dashboard, luego de crear un nuevo usuario.
	 * @param string $email_to, string $message
	 * @return int TRUE or FALSE
	 */

	function send_prospects_email($mail_to, $form_info){
		$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = $q8 = $q9 = $q10 = $q11 = $q12 = $q13 = $q14 = $q15 = '';

		$q1 	= ( isset($form_info['q1']) ) ? $form_info['q1'] : ''; //What's your name?
		$q2 	= ( isset($form_info['q2']) ) ? $form_info['q2'] : ''; //Gender
		$q3 	= ( isset($form_info['q3']) ) ? $form_info['q3'] : ''; //When were you born?
		$q4 	= ( isset($form_info['q4']) ) ? $form_info['q4'] : ''; //When are you graduating?
		$q5 	= ( isset($form_info['q5']) ) ? $form_info['q5'] : ''; //What year are you studying?
		$q6 	= ( isset($form_info['q6']) ) ? $form_info['q6'] : ''; //What's your email address?
		$q7 	= ( isset($form_info['q7']) ) ? $form_info['q7'] : ''; //What sport do you practice?
		// - Golf -
		$q8 	= ( isset($form_info['q8']) ) ? $form_info['q8'] : ''; //What's your average score?
		// - Volleyball -
		$q9 	= ( isset($form_info['q9']) ) ? $form_info['q9'] : ''; //What's your position?
		$q10 	= ( isset($form_info['q10']) ) ? $form_info['q10'] : ''; //What's your height?
		// - Tennis -
		$q11 	= ( isset($form_info['q11']) ) ? $form_info['q11'] : ''; //Are you left or right handed?
		$q12 	= ( isset($form_info['q12']) ) ? $form_info['q12'] : ''; //What's your FMT ranking?
		$q13 	= ( isset($form_info['q13']) ) ? $form_info['q13'] : ''; //Have you ever played an ATP tournament?
		// - Soccer -
		$q14 	= ( isset($form_info['q13']) ) ? $form_info['q14'] : ''; //What's your position?
		$q15 	= ( isset($form_info['q15']) ) ? $form_info['q15'] : ''; //What's your height?

		//$mail_to = 'raul@pcuervo.com, alejandro@pcuervo.com';
		$subject = 'Select team prospect '.$q1;

		if ( $q1 !== '' ){
			$body_message = "What's your name?: ".$q1."\n";
		}
		if ( $q2 !== '' ){
			$body_message .= "When were you born?: ".$q2."\n";
		}
		if ( $q3 !== '' ){
			$body_message .= "When are you graduating?: ".$q3."\n";
		}
		if ( $q4 !== '' ){
			$body_message .= "What year are you studying?: ".$q4."\n";
		}
		if ( $q5 !== '' ){
			$body_message .= "What's your email address?: ".$q5."\n";
		}
		if ( $q6 !== '' ){
			$body_message .= "What sport do you practice?: ".$q6."\n";
		}
		if ( $q7 !== '' ){
			$body_message .= "What's your average score?: ".$q7."\n";
		}
		if ( $q8 !== '' ){
			$body_message .= "What's your position?: ".$q8."\n";
		}
		if ( $q9 !== '' ){
			$body_message .= "What's your height?: ".$q9."\n";
		}
		if ( $q10 !== '' ){
			$body_message .= "Are you left or right handed?: ".$q10."\n";
		}
		if ( $q11 !== '' ){
			$body_message .= "What's your FMT ranking?: ".$q11."\n";
		}
		if ( $q12 !== '' ){
			$body_message .= "Have you ever played an ATP tournament?: ".$q12."\n";
		}
		if ( $q13 !== '' ){
			$body_message .= "What's your position?: ".$q13."\n";
		}
		if ( $q14 !== '' ){
			$body_message .= "What's your height?: ".$q14."\n";
		}
		$body_message .= "";

		$headers = 'From: '.$q1."\r\n";
		$headers .= 'Reply-To: '.$q6."\r\n";

		$mail_status = mail($mail_to, $subject, $body_message, $headers);
	} //send_prospects_email



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


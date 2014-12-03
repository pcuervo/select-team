(function( $ ) {
  "use strict";
  $(function(){

    /*
    ** Para el video cuando se cierra el modal
    */
    $('.modal').each(function(){
      var src = $(this).find('iframe').attr('src');
      $(this).on('click', function(){
        $(this).find('iframe').attr('src', '');
        $(this).find('iframe').attr('src', src);
      });
    });
  });


}(jQuery));

//PANTALLA INICIAL

setTimeout(function(){
  $('.start-screen').fadeOut(800);},
  3000);

//ISOTOPE
var $=jQuery.noConflict();
function correIsotope(contenedor, item, layoutMode){
  var $container = $('.sportContainer');
  $container.imagesLoaded(function(){
    $container.isotope({
      itemSelector: item,
      layoutMode: layoutMode
    });
  });
}

function filtrarIsotopeDefault(contenedor, filterDefault){
  var $container = $(contenedor);
  $container.isotope({ filter: filterDefault });
}

function filtrarIsotope(este, contenedor, elemento){
  var filterValue = este.data('filter');
  var $container = $(contenedor);
  $container.isotope({ filter: filterValue });
  $(elemento).removeClass('active');
  este.addClass('active');
}

function reorder(este, contenedor){
  var sport = $('#sportAll').attr('data-active');
  var gender = $('#genderAll').attr('data-active');
  if (typeof sport === 'undefined') {
      sport = "";
  }
  if (typeof gender === 'undefined') {
      gender = "";
  }
  var filterString = sport+gender;
  if(filterString=="**"){
      filterString = "*";
  }
  este.parents('.button-group').find('.active').removeClass('active');
  este.addClass('active');
  var $container = $(contenedor);
  $container.isotope({
      filter: filterString,
      animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false,
      }
  });
}

function setAlturaWindowMenosHeader(element){
  var alturaHeader = $('header').outerHeight();
  var alturaWindow = $(window).outerHeight();
  var alturaTotal = alturaWindow - alturaHeader;
  $(element).height(alturaTotal);
}

function setAlturaWindow(element){
  var alturaWindow = $(window).height();
  $(element).height(alturaWindow);
}

function filterQuestions(){
  $('#theForm #q7').on('change', function() {
    var sport = $(this).val();
    $('#theForm .js-sport:not(".js-'+sport+'")').remove();
  });
  $('#theForm2 #q3').on('change', function(event) {
    var sport = $(this).val();
    $('#theForm2 .js-sport:not(".js-'+sport+'")').remove();
  });
}

function toggleClassCards(ancho){
  if( ancho > 767 ){
    $('.cards').removeClass('cards-xs');
  } else {
    $('.cards').addClass('cards-xs');
  }
}

function abrirCards(element){
  var cards = element.data('cards');
  if ( cards == 'prospect' ){
      $('.grid').css({
        'left':'50%',
        'right':'auto'
      });
  }
  if ( cards == 'coach' ){
      $('.grid').css({
        'right':'50%',
        'left':'auto'
      });
  }

  $('.cards').removeClass('is-opened').addClass('is-closed');
  $('.cards.cards-'+cards).removeClass('is-closed').addClass('is-opened');
}

function cerrarCards(element){
  var papa = element.parent('.cards');
  if ( papa.hasClass('cards-prospect') ){
    $('.cards-prospect').removeClass('is-opened').addClass('is-closed');
    $('.grid').css({
      'left':'0',
      'right':'auto'
    });
  }
  if ( papa.hasClass('cards-coach') ){
    $('.cards-coach').removeClass('is-opened').addClass('is-closed');
    $('.grid').css({
      'right':'0',
      'left':'auto'
    });
  }
}

function siguienteCardProspect(element){
  var card = element.data('card');
  $('.cards-prospect .card').removeClass('is-opened').addClass('is-closed');
  $('.cards-prospect .'+card).removeClass('is-closed').addClass('is-opened');
}

function siguienteCardCoach(element){
  var card = element.data('card');
  $('.cards-coach .card').removeClass('is-opened').addClass('is-closed');
  $('.cards-coach .'+card).removeClass('is-closed').addClass('is-opened');
}

function urlAbre(){
  var url = location.pathname;
  if (window.location.href.indexOf("prosprectOpen") > -1)  {
    console.log('url');
    $('.grid').css({
      'left':'50%',
      'right':'auto'
    });
    $('.cards').removeClass('is-opened').addClass('is-closed');
    $('.cards.cards-prospect').removeClass('is-closed').addClass('is-opened');
  }
}

/* DASHBOARD */
$("#dashboard .sidebar-nav li").click(function(e) {
    if ( $(this).hasClass('sidebar-brand') || $(this).hasClass('j-download') ){
        $('#dashboard .sidebar-nav li').removeClass('active');
    } else {
        $('#dashboard .sidebar-nav li').removeClass('active');
        $(this).addClass('active');
    }
});

$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#dashboard, #sidebar-wrapper").toggleClass("toggled");
    });



function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}


function addTournament(){
  
  $tournament_name= $('.j-user_curriculum input[name="tournament"]').val();
  $tournament_date= $('.j-user_curriculum input[name="tournament_date"]').val();
  $tournament_rank= $('.j-user_curriculum input[name="tournament_rank"]').val();

  $('.j-user_curriculum').append('<input type="hidden" name="tournament_data[]" value="'+$tournament_name+'"/> ');
  $('.j-user_curriculum').append('<input type="hidden" name="tournament_date_data[]" value="'+$tournament_date+'"/> ');
  $('.j-user_curriculum').append('<input type="hidden" name="tournament_rank_data[]" value="'+$tournament_rank+'"/> ');

  $('.j-registed-tournaments').append('<p>Tournament: '+$tournament_name+'</p>');
  $('.j-registed-tournaments').append('<p>Date: '+$tournament_date+'   Position: '+$tournament_rank+'</p>');

  $('.j-user_curriculum input[name="tournament"]').val("");
  $('.j-user_curriculum input[name="tournament_date"]').val("");
  $('.j-user_curriculum input[name="tournament_rank"]').val("");

}


function registerUser() {
    var user_data = {};

    user_data['action'] = 'register_user';
    user_data['username'] = $('.j-register-user input[name="username"]').val();
    user_data['password'] = $('.j-register-user input[name="password"]').val();
    user_data['password_confirmation'] = $('.j-register-user input[name="password_confirmation"]').val();
    user_data['email'] = $('.j-register-user input[name="email"]').val();
    user_data['gender'] = $('.j-register-user select[name="gender"]').val();
    user_data['full_name'] = $('.j-register-user input[name="full_name"]').val();
    user_data['date_of_birth'] = $('.j-register-user input[name="date_of_birth"]').val();
    user_data['sport'] = $('.j-register-user select[name="sport"]').val();

    switch(user_data['sport']){
        case 'tennis': 
            user_data['tennis_hand'] = $('.j-register-user select[name="tennis_hand"]').val();
            user_data['fmt_ranking'] = $('.j-register-user input[name="fmt_ranking"]').val();
            user_data['atp_tournament'] = $('.j-register-user select[name="atp_tournament"]').val();
            break;
        case 'golf':
            user_data['average_score'] = $('.j-register-user select[name="average_score"]').val();
            break;
        case 'soccer':
            user_data['soccer_position'] = $('.j-register-user select[name="soccer_position"]').val();
            user_data['soccer_height'] = $('.j-register-user input[name="soccer_height"]').val();
            break;
        case 'volleyball':
            user_data['volley_position'] = $('.j-register-user select[name="volley_position"]').val();
            user_data['volley_height'] = $('.j-register-user input[name="volley_height"]').val();
    }
    console.log(user_data);
    $.post(
        ajax_url,
        user_data,
        function(response){
            console.log(response);
            window.location = site_url + '/dashboard';
            //window.location = site_url + '/dashboard?' + $("#j-register-user").serialize();
        }// response
    ); 
}// registerUser


function createCurriculum() {
  var user_curriculum_data = {};

  user_curriculum_data['action'] = 'register_curriculum';
  user_curriculum_data['address'] = $('.j-user_curriculum input[name="curriculum_address"]').val();
  user_curriculum_data['phone'] = $('.j-user_curriculum input[name="curriculum_phone"]').val();
  user_curriculum_data['mobile_phone'] = $('.j-user_curriculum input[name="curriculum_mobile_phone"]').val();
  user_curriculum_data['high_school'] = $('.j-user_curriculum input[name="high_school"]').val();
  user_curriculum_data['grade'] = $('.j-user_curriculum select[name="grade"]').val();
  user_curriculum_data['high_grad'] = $('.j-user_curriculum input[name="high_grad"]').val();
  
  //Sports Development
  user_curriculum_data['tournament_data'] = $('.j-user_curriculum input[name="tournament_data"]').val();
  user_curriculum_data['tournament_date_data'] = $('.j-user_curriculum select[name="tournament_date_data"]').val();
  user_curriculum_data['tournament_rank_data'] = $('.j-user_curriculum select[name="tournament_rank_data"]').val();

  var tournament_data = new Array();
  var values = $("input[name='tournament_data\[\]']").each(function() {
    tournament_data.push($(this).val());
  });
  user_curriculum_data['tournament']= tournament_data;
  
  var tournament_date_data = new Array();
  var values = $("input[name='tournament_date_data\[\]']").each(function() {
    tournament_date_data.push($(this).val());
  });
  user_curriculum_data['tournament_date']= tournament_date_data;

  var tournament_rank_data = new Array();
  var values = $("input[name='tournament_rank_data\[\]']").each(function() {
    tournament_rank_data.push($(this).val());
  });
  user_curriculum_data['tournament_rank']= tournament_rank_data;


  console.log(user_curriculum_data);
//  $.post(
//      ajax_url,
//      user_curriculum_data,
//      function(response){
//          console.log(response);
//          window.location = site_url + '/dashboard';
//      } //response
//  ); 
}// createCurriculum


function updateCurriculum() {
  var user_curriculum_data = {};

  user_curriculum_data['action'] = 'update_curriculum';
  user_curriculum_data['address'] = $('.j-user_curriculum input[name="curriculum_address"]').val();
  user_curriculum_data['phone'] = $('.j-user_curriculum input[name="curriculum_phone"]').val();
  user_curriculum_data['mobile_phone'] = $('.j-user_curriculum input[name="curriculum_mobile_phone"]').val();
  user_curriculum_data['highSchool'] = $('.j-user_curriculum input[name="highSchool"]').val();
  user_curriculum_data['class'] = $('.j-user_curriculum select[name="class"]').val();
  user_curriculum_data['highGrad'] = $('.j-user_curriculum input[name="highGrad"]').val();
  
  //Sports Development
  user_curriculum_data['tournament'] = $('.j-user_curriculum input[name="tournament"]').val();
  user_curriculum_data['tournamentDate'] = $('.j-user_curriculum select[name="tournamentDate"]').val();

  console.log(user_curriculum_data);
  //$.post(
    //  ajax_url,
      //user_curriculum_data,
  //    function(response){
  //        console.log(response);
  //        window.location = site_url + '/dashboard';
  //    }// response
//  ); 
}// updateCurriculum



function updateUser() {
    // var user_data = {};

    // user_data['action'] = 'update_user';
    // user_data['username'] = $('.j-register-user input[name="username"]').val();
    // user_data['password'] = $('.j-register-user input[name="password"]').val();
    // user_data['password_confirmation'] = $('.j-register-user input[name="password_confirmation"]').val();
    // user_data['email'] = $('.j-register-user input[name="email"]').val();
    // user_data['gender'] = $('.j-register-user select[name="gender"]').val();
    // user_data['full_name'] = $('.j-register-user input[name="full_name"]').val();
    // user_data['date_of_birth'] = $('.j-register-user input[name="date_of_birth"]').val();
    // user_data['sport'] = $('.j-register-user select[name="sport"]').val();

    // switch(user_data['sport']){
    //     case 'tennis': 
    //         user_data['tennis_hand'] = $('.j-register-user select[name="tennis_hand"]').val();
    //         user_data['fmt_ranking'] = $('.j-register-user input[name="fmt_ranking"]').val();
    //         user_data['atp_tournament'] = $('.j-register-user select[name="atp_tournament"]').val();
    //         break;
    //     case 'golf':
    //         user_data['average_score'] = $('.j-register-user select[name="average_score"]').val();
    //         break;
    //     case 'soccer':
    //         user_data['soccer_position'] = $('.j-register-user select[name="soccer_position"]').val();
    //         user_data['soccer_height'] = $('.j-register-user input[name="soccer_height"]').val();
    //         break;
    //     case 'volleyball':
    //         user_data['volley_position'] = $('.j-register-user select[name="volley_position"]').val();
    //         user_data['volley_height'] = $('.j-register-user input[name="volley_height"]').val();
    // }
    // console.log(user_data);
    // $.post(
    //     ajax_url,
    //     user_data,
    //     function(response){
    //         console.log(response);
    //         window.location = site_url + '/dashboard';
    //     }// response
    // ); 
}// updateUser




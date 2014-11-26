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

var $=jQuery.noConflict();
function correIsotope(contenedor, item, layoutMode){
  var $container = $(contenedor);
  $container.isotope({
    itemSelector: item,
    layoutMode: layoutMode
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
  $('#theForm #q6').on('change', function() {
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
//esconderLoginLogout();

function esconderLoginLogout(){
  user= getCookie('user-qwertyui');
  console.log(user);
  if(user!='WP+Cookie+check'){
    $('#j-login').hide();
    $('#j-logout').show(); 
  }
  else{
    $('#j-login').show();
   $('#j-logout').hide(); 
  }

}


function cerrarSesion(){
  $('#j-logoutLink').on('click', function(e){
    e.preventDefault();
    Delete_Cookie('cookie_nom');
  });
}


function Delete_Cookie( name ) {
//var name = getCookie('cookie_nom');
var path = window.location.pathname;
var domain = document.domain;
console.log(name, path, domain);
if ( getCookie( name ) ) document.cookie = name + "=" +
( ( path ) ? ";path=" + path : "") +
( ( domain ) ? ";domain=" + domain : "" ) +
";expires=Thu, 01-Jan-1970 00:00:01 GMT";
}
cerrarSesion();
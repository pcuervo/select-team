$(document).ready(function(){
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
  var alturaHeader = $('header').height();
  var alturaWindow = $(window).height();
  var alturaTotal = alturaWindow - alturaHeader;
  $(element).height(alturaTotal); 
}

function setAlturaWindow(element){
  var alturaWindow = $(window).height();
  $(element).height(alturaWindow); 
}






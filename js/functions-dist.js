function correIsotope(s,e,a){var r=$(s);r.isotope({itemSelector:e,layoutMode:a})}function filtrarIsotopeDefault(s,e){var a=$(s);a.isotope({filter:e})}function filtrarIsotope(s,e,a){var r=s.data("filter"),t=$(e);t.isotope({filter:r}),$(a).removeClass("active"),s.addClass("active")}function reorder(s,e){var a=$("#sportAll").attr("data-active"),r=$("#genderAll").attr("data-active");"undefined"==typeof a&&(a=""),"undefined"==typeof r&&(r="");var t=a+r;"**"==t&&(t="*"),s.parents(".button-group").find(".active").removeClass("active"),s.addClass("active");var o=$(e);o.isotope({filter:t,animationOptions:{duration:750,easing:"linear",queue:!1}})}function setAlturaWindowMenosHeader(s){var e=$("header").outerHeight(),a=$(window).outerHeight(),r=a-e;$(s).height(r)}function setAlturaWindow(s){var e=$(window).height();$(s).height(e)}function filterQuestions(){$("#q5").on("change",function(){var s=$(this).val();$('.js-sport:not(".js-'+s+'")').remove()})}function toggleClassCards(s){s>767?(console.log("if"),$(".cards").removeClass("cards-xs")):(console.log("else"),$(".cards").addClass("cards-xs"))}function abrirCards(s){var e=s.data("cards");"prospect"==e&&$(".grid").css("left","50%"),$(".cards").removeClass("is-opened").addClass("is-closed"),$(".cards.cards-"+e).removeClass("is-closed").addClass("is-opened")}function cerrarCards(s){var e=s.parent(".cards");e.hasClass("cards-prospect")&&($(".cards-prospect").removeClass("is-opened").addClass("is-closed"),$(".grid").css("left","0%")),e.hasClass("cards-coach")&&$(".cards-coach").removeClass("is-opened").addClass("is-closed")}function siguienteCard(s){var e=s.data("card");$(".card").removeClass("is-opened").addClass("is-closed"),$("."+e).removeClass("is-closed").addClass("is-opened")}$(document).ready(function(){$(".modal").each(function(){var s=$(this).find("iframe").attr("src");$(this).on("click",function(){$(this).find("iframe").attr("src",""),$(this).find("iframe").attr("src",s)})})});

        </div><!--CONTENT-->
        <!-- MODALS -->
        <!-- LOGIN -->
        <div class="[ modal fade ]" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="[ modal-dialog ]">
                <div class="[ modal-content ]">
                    <div class="[ modal-header ]">
                        <button type="button" class="[ close ]" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="[ modal-title ] [ center-text ]" id="myModalLabel">Login</h4>
                    </div>
                    <div class="[ modal-body ]">
                        <form role="form">
                            <div class="[ input-group ] [ margin-bottom-sm ]">
                                <span class="[ input-group-addon ]"><i class="fa fa-envelope"></i></span>
                                <input class="[ form-control ]" type="text" placeholder="Email address">
                            </div>
                            <div class="[ input-group ]">
                                <span class="[ input-group-addon ]"><i class="fa fa-lock"></i></span>
                                <input class="[ form-control ]" type="password" placeholder="Password">
                            </div>
                        </form>
                    </div>
                    <div class="[ modal-footer ]">
                        <button type="button" class="[ btn btn-success ] [ center block ]">Enter</button>
                        <p>If you are not a member yet, please click on become a prospect. </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--CONTAINER-FLUID-->
	<?php wp_footer(); ?>
    <script src="<?php echo THEMEPATH; ?>js/bootstrap.min.js"></script>
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
                        // hide form
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
  </body>
</html>
<?php get_header(); ?>
    <div class="container contact clearfix">
        <div class="col-xs-12 margin-bottom">
            <?php if (qtrans_getLanguage() == 'es'){ ?>
                <h2 class="red">Contacto</h2>
                <p>Es tiempo de realizar tu sueño, contáctanos y cuéntanos qué deporte practicas y nos asegurarémos de que un "consejero" se ponga ne contacto contigo</p>
                <p>Deja que Select Team haga tu sueño realidad</p>
            <?php } else { ?>
                <h2 class="red">Contact</h2>
                <p>It's time to start fulfilling your dream, contact us and tell us what sport you practice, and we will make sure that an advisor gets in touch with you.</p>
                <p>Let Select Team help to make your dream come true.</p>
            <?php } ?>
            
            
        </div>
        <div class="col-xs-12 col-sm-6 margin-bottom">
            <h3 class="red">Select Team Headquarters</h3>
            <p><a href="https://www.facebook.com/pages/Select-Team-Becas/471870126241459" target="_blank"><i class="fa fa-facebook"></i> /Select-Team</a></p>
            <!-- <p><a href="#" target="_blank"><i class="fa fa-twitter"></i> @selectteam</a></p> -->
            <hr>
            <div>
                <p><b>Luis Mendoza (President)</b></p>
                <p><i class="fa fa-phone"></i> 7773067947</p>
                <p><i class="fa fa-envelope"></i> <a href="mailto:luis.mendoza@selectteam.com">luis.mendoza@selectteam.com</a></p>
            </div>
            <hr>
            <div>
                <p><b>Nair Tolomeo (Vicepresident)</b></p>
                <!-- <p><i class="fa fa-phone"></i> </p> -->
                <p><i class="fa fa-envelope"></i> <a href="mailto:info@selectteam.com">info@selectteam.com</a></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 margin-bottom">
            <h3 class="red">Leave a comment</h3>
            <form role="form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="mail">Email address</label>
                    <input type="email" class="form-control" id="mail" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="mail">Write your comment</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary right">Submit</button>
            </form>
        </div>
    </div>
<?php get_footer(); ?>
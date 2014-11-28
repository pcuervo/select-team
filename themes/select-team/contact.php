        <div class="col-xs-12 margin-bottom">
          <h2 class="red">Contact us</h2>
          <p>It's time to start fulfilling your dream, contact us and tell us what sport you practice, and we will make sure that an advisor gets in touch with you.</p>
          <p>Let Select Team help to make your dream come true.</p>
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





      <!---------------------------MODALS----------------------- >
        <!-- LOGIN -->
        <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title center-text" id="myModalLabel">Login</h2>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input class="form-control" type="text" placeholder="Email address">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input class="form-control" type="password" placeholder="Password">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Free Assesment
                    </label>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary center block">Enter</button>
              </div>
            </div>
          </div>
        </div>

        <!-- REGISTRO -->
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title center-text" id="myModalLabel">Register</h2>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group">
                    <label for="coachName">Name</label>
                    <input type="text" class="form-control" id="coachName">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group clearfix">
                    <label for="exampleInputEmail1">Select a sport</label>
                    <div class="[ isotope-filters ]">
                      <button data-filter=".tennis-register" type="button" class="btn btn-primary">Tennis</button>
                      <button data-filter=".golf-register" type="button" class="btn btn-primary">Golf</button>
                      <button data-filter=".soccer-register" type="button" class="btn btn-primary">Soccer</button>
                      <button data-filter=".volleyball-register" type="button" class="btn btn-primary">Volleyball</button>
                    </div><!-- isotope-filters -->
                    <div class="[ isotope-container ]">
                      <div class="[ golf-register ] [ isotope-item ]">
                        <div class="form-group">
                          <label for="average-score">Average score:</label>
                          <select class="form-control" id="average-score">
                            <option>under 66</option>
                            <option>66-69</option>
                            <option>70-73</option>
                            <option>74-77</option>
                            <option>78-80</option>
                            <option>81-84</option>
                            <option>85-88</option>
                            <option>88-90</option>
                          </select>
                        </div>
                      </div>
                      <div class="[ volleyball-register ] [ isotope-item ]">
                        <div class="form-group">
                          <label for="volley-position">Position</label>
                          <select class="form-control" id="volley-position">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="volley-height">Height</label>
                          <input type="number" name="height" min="140" max="235" class="form-control" id="volley-height" placeholder="140">
                          <p class="help-block">Height must be in centimeters. ex: 180.</p>
                        </div>
                      </div>
                      <div class="[ tennis-register ] [ isotope-item ]">
                        <div class="form-group">
                          <label for="volley-position">Hand</label>
                          <select class="form-control" id="volley-position">
                            <option>Left-handed</option>
                            <option>Right-handed</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="fmt-ranking">FMT ranking (for mexican players only)</label>
                          <input type="number" name="ranking" class="form-control" id="fmt-ranking">
                        </div>
                        <div class="form-group clearfix">
                          <label for="atp-tournament" class="col-xs-12">Have you ever played an ATP tournament?</label>
                          <div class="radio col-xs-6 col-sm-3" id="atp-tournament">
                            <label>
                              <input type="radio" name="optionsRadios" id="atp-yes" value="option1">
                              Yes
                            </label>
                            <label>
                              <input type="radio" name="optionsRadios" id="atp-no" value="option1">
                              No
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="[ soccer-register ] [ isotope-item ]">
                        <div class="form-group">
                          <label for="soccer-position">Position</label>
                          <select class="form-control" id="soccer-position">
                            <option>Goal keeper</option>
                            <option>Defender</option>
                            <option>Midfielder</option>
                            <option>Forward</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="volley-height">Height</label>
                          <input type="number" name="height" min="140" max="235" class="form-control" id="volley-height" placeholder="140">
                          <p class="help-block">Height must be in centimeters.</p>
                        </div>
                      </div>
                    </div><!-- isotope-container -->
                </form>
              </div><!-- MODAL BODY-->
              <div class="modal-footer">
                <button type="button" class="btn btn-primary center block">Submit register</button>
              </div>
            </div>
          </div>
        </div><!--REGISTRO-->

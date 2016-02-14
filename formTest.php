<div class="bs-example">
      <form data-toggle="validator" role="form">
        <div class="form-group">
          <label for="inputEmail" class="control-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="control-label">Password</label>
          <div class="form-inline row">
            <div class="form-group col-sm-6">
              <input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
              <span class="help-block">Minimum of 6 characters</span>
            </div>
            <div class="form-group col-sm-6">
              <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="radio">
            <label>
              <input type="radio" name="underwear" required>
              Boxers
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="underwear" required>
              Briefs
            </label>
          </div>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
              Check yourself
            </label>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div> <!-- /example -->
    
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="http://platform.twitter.com/widgets.js"></script>
<script src="assets/js/application.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
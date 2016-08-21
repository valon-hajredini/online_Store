
<div class="col-sm-4 col-sm-offset-1">
    <div class="login-form"><!--login form-->
        <h2>Login to your account</h2>
        <form action="controllers/login_register_controller.php" method="post">
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
            <button type="submit" name="login_submit" class="btn btn-default">Login</button>
            <a href="#" class="btn btn-default" style="float:right"><i class="fa fa-facebook" aria-hidden="true"></i> Login with facebook </a>
        </form>
    </div><!--/login form-->
</div>

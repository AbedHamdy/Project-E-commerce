    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="./?page=index-2">home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <?php 
        if(isset($_SESSION["errors"])) :
            foreach($_SESSION["errors"] as $error) :
    ?>
                <div class='alert alert-danger'><?= $error ?></div>
    <?php 
            endforeach;
        endif;
            unset($_SESSION["errors"]);
    ?>
    <!--breadcrumbs area end-->
	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Login now</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="index.php?page=login-user" method="POST">
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id = "email" placeholder="Enter your Email">
                                        </div>
                                        <?php 
                                            if(isset($_GET["comeFrom"])) :
                                        ?>
                                                <input type="hidden" name="comeFrom" value="<?= $_GET["comeFrom"]; ?>">
                                        <?php 
                                            endif;
                                        ?>
                                            <div class="single-acc-field">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id = "password" placeholder="Enter your password">
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Login Account</button>
                                        </div>
                                        <a href="./?page=forget-password">Forget Password?</a>
                                        <a href="./?page=register">Not Account Yet?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>


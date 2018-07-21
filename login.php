<?php
	try
	{
		require_once(__DIR__ . '/includes/header.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>


<div class="login">
    <div class="row">
        <!-- login panel image -->
        <div class="login-panel-container">
            <img src="images/auth/login/login-panel.png" alt="panel-img" class="login-panel-img">
            <div class="form-and-links-container">
                <form class="form login-panel-form" method="POST" id="login" action="#">
                    <h3 class="login-header">LOG IN</h3>
                    <!-- Email -->
                    <div class="form-group">
                            <input id="email login-username" type="email" placeholder="Username" class="input email-input" name="email" required autofocus>
                    </div>
                    <!-- Password -->
                    <div class="form-group">                                   
                            <input id="password login-password" type="password" placeholder="Password" class="input password-input form-control" name="password" required>
                    </div>
                    <!-- Buttons -->
                    <div class="form-group">
                        <div class="">
                            <!-- login -->
                            <button type="submit" name="login_submit" class="login-btn">
                                <img src="images/auth/login/btn-enter.png" alt="" class="login-btn-img">                            
                            </button>
                            <!-- Forgot Password? -->
                            <!-- <a class="forgot-link" href="#">
                                Forgot Your Password?
                            </a> -->
                        </div>
                    </div>
                </form>
                <div class="login-panel-links-container">
                    <ul class="links-ul">
                        <li> <img src="images/auth/login/right-arrow.svg" alt="" class="right-arrow"> <a href="/graphic-novel">GRAPHIC NOVEL</a></li>
                        <li> <img src="images/auth/login/right-arrow.svg" alt="" class="right-arrow"> <a href="/underconstruction">STARPORT</a></li>
                    </ul>
                </div>
            </div>
        </div>   
    </div>
</div>

<script>
    document.body.style.overflow = "hidden";
</script>

<?php
	try
	{
		require_once(__DIR__ . '/views/partials/footer.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>
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

<div class="register">
    <div class="row">
        <h1 class="form-header header-shadow">PICK YOUR planet. Name your Virtual Starport. <br>
            Build It. Own it! <Span class="white">Sign Up Now. It's Free</Span>
        </h1>
        <div class="content-container">
            <img src="images/auth/registration/bg.png" alt="" class="form-bg">
            <form method="POST" class="form" action="#" name="sign-up" id="sign-up">
                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="label">Name</label>
                        <input id="name" type="text" class="input-text" name="name" required autofocus>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="label">Email Address</label>
                        <input id="email" type="email" class="input-text" name="email" required>
                </div>
                <!-- username -->
                <div class="form-group">
                    <label for="user_name" class="label">User Name</label>
                        <input id="user_name" type="user_name" class="input-text" name="user_name" required>
                </div>
                <!-- password -->
                <div class="form-group">
                    <label for="password" class="label">Password</label>
                        <input id="password" type="password" class="input-text" name="password" required>
                </div>
                <!-- password confirm -->
                <div class="form-group">
                    <label for="password-confirm" class="label">Retype Password</label>                   
                        <input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" required>
                </div>
                 <!-- Pick Your Planet -->
                 <div class="form-group">
                    <label for="planet" class="label">Pick Your Planet</label>
                    <select name="planets" class="input-select" value="" required>
                        <option value=""></option>
                        <option value="mars">ARANGO</option>
                        <option value="earth">BANNOO</option>
                        <option value="venus">CHUPANZI</option>
                        <option value="pluto">DEVO</option>
                    </select>                     
                </div>
                <!-- Select A City -->
                 <div class="form-group">
                    <label for="city" class="label">Select your City</label>
                    <select name="city" class="input-select" value="" required>
                        <option value=""></option>
                        <option value="detroit">DADE</option>
                        <option value="new_york">DEADMANS CROSSING</option>
                        <option value="johnson_city">ALM</option>
                        <option value="knoxvile">SYTRES</option>
                    </select>                        
                </div>
                 <!-- Starport Name -->
                 <div class="form-group">
                    <label for="starport_name" class="label">Name your starport</label>
                        <input id="starport_name" type="starport_name" class="input-text" name="starport_name" required>
                </div>
                <!-- checkbox -->
                <div class="form-group checkbox-group">
                    <input type="checkbox" class="checkbox" name="terms-agreement" value="yes" required> <span class="checkbox-text">I agree to the Terms and Conditions</span>
                    <!-- used to break to new like @media 646 -->
                    <span class="break"></span>
                    <input type="checkbox" class="checkbox" name="robot" value="no" required> <span class="checkbox-text">I am Not a robot</span> 
                </div>
                <!-- submit -->
                <div class="form-group submit-container">        
                    <button  id="sign-up-btn" type="submit" class="submit">
                        JOIN
                    </button>
                </div>
            </form>
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
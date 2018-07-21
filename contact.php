<?php
	try
	{
		require_once(__DIR__ . '/views/partials/header.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>
<section class="contact container">
    <img src="images/power.png" alt="power img" class="logo">
    <div class="row">
        <form action="" class="col-1 contact-form">
            <div class="form-group">
                <label for="profile_name" class="label">Profile Name</label>
                <input type="text" name="profile_name" class="input">
            </div>
            <div class="form-group">
                <label for="Real_Name" class="label">Real Name</label>
                <input type="text" name="Real_Name" class="input">
            </div>
            <div class="form-group">
                <label for="country" class="label">Country</label>
                <input type="text" name="country" class="input">
            </div>
            <div class="form-group">
                <label for="state" class="label">State / Providence</label>
                <input type="text" name="state" class="input">
            </div>
            <div class="form-group">
                <label for="message" class="label-textarea">Talk To Us</label>
                <textarea  name="message" class="textarea"> </textarea>
                <input type="submit" class="submit" value="SUBMIT">
            </div>
        </form> 
        <div class="col-2">
            <p class="company-info"> 
                POWER62 GAMES LLC <br>
                south jones blvd <br>
                suite 200-3952 <br>
                las vegas. nv 89146 
                <span class="spacing">email</span>
                customerservice@power62.com
            </p>
        </div>
        <div class="full-col">
            <p class="greeting">
                We always love to hear from our customers! However, before you submit any idea or suggestion to us, please read this disclaimer carefully. 
                Anything you disclose or offer through our websites (www.power62.com and support@skybelltechnologies.zendesk.com), including but not limited to 
                e-mails or postings on interactive portions of our website (or any website hosted by SkyBell), or anything you disclose or offer through our page on 
                a social media platform (including but not limited to) Twitter, Pinterest, Instagram or Facebook (collectively the, “Communications”), shall be deemed  
                to be and shall remain the sole and exclusive property of Power62 Games LLC.
            </p>
        </div>
    </div>
</section>
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
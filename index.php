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

<!-- Navbar-->
<div class="nav-container">
	<nav class="home-nav">
		<div class="row">
			<ul class="navbar-links">
				<li><a href="#">Home</a></li>
				<li><a href="/underconstruction.php">1.0</a></li>
				<!-- <li><a href="/underconstruction">Starport</a></li> -->
				<li><a href="/contact.php">Contact Us</a></li>
			</ul>
			<!-- Login button -->
			<div class="navbar-starport_login">
				<ul class="navbar-starport_login-links">
					<li><a href="/underconstruction.php" class="starport-link">starport</a></li> 
					<li><a href="/login.php" class="login-link">login</a></li>
				</ul>
				<img class="navbar-starport_login-image" src="images/1/log-in2.png" alt="Homepage">
			</div>		
		</div>	
	</nav> <!-- end s-header --> 
</div> <!-- end nav-container --> 

<!-- Section 1 -->
<header class="home">
	<div class="row">
	<p class="trade-mark">©2014-2018 POWER62 GAMES LLC. ALL RIGHTS RESERVED. POWER62 IS A TRADEMARK OF POWER62 GAMES LLC</p>
	</div>
    <div class="home-content">
        <div class="row home-content-main">
			<h1 class="h3">A HYBRID STARTEGIC GAME THAT IS OUT OF THIS WORLD</h1>
			<img class="home-content-img" src="images/1/power.png" alt="Power">
        </div>
    </div> <!-- end home-content -->
</header> <!-- end section 1 -->

<!-- Section: 2 -->
<section class="section-2">
    <div class="row">
        <h1 class="header-shadow section-2-header">WHAT’S A HYBRID GAME?</h3>
        <p class="section-2-subline">It’s a Board Game that rewards XP for our Online Game <span class="black">STARPORT</span><sup>sm</sup><span class="black">1.0</span></p>
		
		<h1 class="header-shadow section-2-header">POWER<span class="red">62</span><sup class="small-font-size">TM</sup> <span class="gray">1.0</span><span class="s-about-sm-h"> The Strategic Board Game.</span></h1>
        <p class="section-2-subline"><span class="bold">POWER62</span><sup class="small-font-size">TM</sup><span class="gray"> 1.0 is a Hybrid Strategic Game with infinite moves and challenges. It’s a new game
		every time you play. BTW, avoiding the black Hole is a good move. </p>
		
		<div class="section-2-img-container">
			<img class="section-2-xp-img" src="images/1/p2_img1.png" alt="REWARD XP">
			<span class="section-2-img-caption">XP IS AWARDED BY WINNING THE POWER62 1.0 BOARD GAME.</span>
		</div>
		
		<h1 class="header-shadow section-2-header"><span class="blue">STARPORT</span><sup class="small-font-size">SM</sup><span class="blue">1.0</span> <span class="header-skinny">A new kind of Space Adventure.</span></h1>
        <p class="section-2-subline">Your Board Game experience contunues to a free Online Game where you can Name and Own your Virtual
		StarPort. You will use the XP from the Board Game to build your <span class="bold">STARPORT</span><sup>SM</sup><span class="bold"> 1.0</span> for a future 2.0 online game.</p>
    </div> <!-- end about-stats -->
</section> <!-- end Section 2 -->

<!-- Section: 3-->
<section class="section-3">
	<div class="row">
        <h1 class="section-3-header header-shadow">READY TO LEAVE EARTH?</h1>
		<h2 class="section-3-sub-header red small-font">TO STAR SYSTEM 62</h2>
		<div class="section-3-img-container">
			<!-- Step 1 button -->
			<a class="section-3-link" href="/videos-1.php">STEP 1</a>
			<img class="section-3-img" src="images/1/p3_butn.png" alt="step1">
		</div>
    </div>
</section> <!-- End Section: 3 -->

<!-- Section: 4 -->
<section class="section-4">
	<div class="row">
		<h1 class="section-4-header header-shadow">NAME AND YOUR STARPORT.&nbsp OWN IT.</h1>
		<h2 class="section-4-header-secondary">All from the comfort of your own HOME.</h2>
		<p class="section-4-descr">
			It’s easy, <span class="bold">(1) </span>Choose your favorite planet. <span class="bold">(2)</span> Name it. <span class="bold">(3)</span> YOU own your virtual STARPORT<sub>SM</sub>.
			<br> In STARPORT<sub>SM</sub><span class="bold">2.0</span> you can start building your STARPORT<sub>SM</sub> with award points from the Power62<sub>TM</sub> Board Game.
			<br> In R&D, Power62<sub>TM</sub> <span class="bold">4.0</span>‘s online/app play will allow you to build a StarGarrison<sub>SM</sub>.
			<br>
			StarGarrisonSM will allow you to turn it into a battle zone for future combat.
			<br>
			Just imagine, playing your opponent in your StarGarrison<sub>SM</sub>. RAD!
		</p>
	</div>	
	<div class="row">
		<!-- Arango -->
        <div class="section-4-world-card">
			<a href="/worlds/arango.php" class="section-4-world-card-link">
				<img class="section-4-world-card-img" src="./images/worlds/arango.jpg">
				<h3 class="section-4-world-card-header">ARANGO:</h3>
			</a>
			<p class="section-4-world-card-desc">Yo Ho, Yo Ho, a Pirates’ Paradise for me!</p> 
		</div>
		<!-- bannoo -->
        <div class="section-4-world-card">
			<a href="/worlds/bannoo.php" class="section-4-world-card-link">
				<img class="section-4-world-card-img" src="./images/worlds/bannoo.jpg">
				<h3 class="section-4-world-card-header">BANNOO:</h3>
			</a>
			<p class="section-4-world-card-desc">An earth-like planet once destroyed and now home to the Techno Ninjas.</p>
		</div>
		<!-- chupanzi -->
        <div class="section-4-world-card">
			<a href="/worlds/chupanzi.php" class="section-4-world-card-link">
				<img class="section-4-world-card-img" src="./images/worlds/chupanzi.PNG">
				<h3 class="section-4-world-card-header">CHUPANZI: </h3>
			</a>
			<p class="section-4-world-card-desc">Dinosaurs rule once again.It’s like Jurassicmeets Present Day.</p>
		</div>
		<!-- This separetor helps keep grid in line at media 960px -->
		<div class="separator"></div>
		<!-- devo --> 
           <div class="section-4-world-card">
			<a href="/worlds/devo.php" class="section-4-world-card-link">
				<img class="section-4-world-card-img devo" src="./images/worlds/devo.PNG">
				<h3 class="section-4-world-card-header devo-header">DEVO:</h3>
			</a>
			<p class="section-4-world-card-desc">The Land of No Land.Up in the cloud.</p>
		</div>
		<!-- erax -->
        <div class="section-4-world-card">
			<a href="/worlds/erax.php" class="section-4-world-card-link">
				<img class="section-4-world-card-img" src="./images/worlds/erax.PNG">
				<h3 class="section-4-world-card-header">ERAX:</h3>
			</a>		
			<p class="section-4-world-card-desc">The Sandoonians have perfected the EPC and are on the brink of weaponizing.</p>
		</div>
		<!-- fodo -->
        <div class="section-4-world-card">
			<a href="/worlds/fodo.php" class="section-4-world-card-link">
				<img class="section-4-world-card-img fodo" src="./images/worlds/fodo.PNG">
				<h3 class="section-4-world-card-header fodo-header">FODO:</h3>
			</a>
			<p class="section-4-world-card-desc">The wonderful mother Earth.Or not.</p>
		</div>
		
	</div> 
	<div class="step-2-container">
			<img class="circle" src="images/1/p4_step2_img.png" alt="step 2 img" >
			<img class="btn" src="images/1/signup.png" alt="" >
			<a class="signup-link" href="/register.php" >SIGNUP FOR FREE</a>
		</div>
</section> <!-- End Section: 4 -->

<!-- Section: 5 -->
<section class="section-5">
	<div class="row">
		<p class="section-5-eranium-caption">
			EPC ERANIUM PROCESSOR CORE 
		</p>
		<div class="section-5-left-section">
			<h1 class="section-5-section-header">THE GAME comes to life</h1> 
			<p class="p">As an Online Graphic Novel...In the year of 2018 B.D.(Before Discovery) ERAX, in the fifth planet of the
			Star System 62, had discovered a mineral named Eranium. Through a series of experiment the scientists
			were able to generate only a small amount of power. But the continuing experiment caused the atmosphere
			to collapsed...to survive, the entire population had to move underground. In this unsettling environment
			came the first Ruler of the underground, Grand Poohpa.</p>
			<p class="p">In the pursue of generating power for the underground, Grand Poohpa put out all his resources to
			enrich the Eranium. But there is a problem, radiation containment. It took scientists four thousand
			and nine hundred years to get to point where they can create power without radiation.
			The mechanism for this process is called the <b>EPC</b> (Eranium Processor Core).</p>
			<p class="p">In 2018 A.D.(After Discovery), Grand Poohpa 49 has decided to weaponized the <b>EPC</b> to rule
			the Star System and beyond. But when the good twin...Delaney, learned about the Plan
			she has decided to steal the EPC from the Omega Sector and then share it with the rest of the
			allied planets. Another valuable use for the EPC is to produce  water, a commodity for the living.</p>
			<p class="p">And now, the journey begins...in the Free Online Graphic Novel for StarPort Citizens only!</p>	
			<div class="btn-signup">
				<a class="btn-signup-link" href="/register.php">SIGNUP FOR FREE</a>
				<img class="btn-signup-img" src="images/1/p5_signup_bg.png" alt="sign-up">
			</div>
		</div>
		<div class="section-5-right-section">
			<div class="section-5-sondoonin-logo">SANDOONIAN LOGO</div>
			<img class="section-5-robot-img" src="images/1/p5_left_img.png" alt="EPC ERANIUM PROCESSOR CORE">
			<a href="/videos/2.php"> 
				<img class="section-5-step2-btn" src="images/1/p5_step2_btn.png" alt="step-3">
			</a>
		</div>
	</div>
</section> <!-- End Section: 5 -->
	
<!--  Section 6 -->
<section class="section-6">
    <div class="row" >
		<h1 class="section-6-header header-shadow">Power62 <span class="small-font">TM</span>Game v 1.0
		<a class="section-6-youtube-link"href="/underconstruction"><ion-icon class="section-6-youtube-icon" name="logo-youtube"></ion-icon>Play The Game</a>
		</h1>
		<div class="section-6-col-1">
			<img class= "section-6-picture-group" src="../images/home/section-6/left-picture-group.PNG" alt="picture group">
		</div>
		<div class="section-6-col-2">
			<div class="section-6-description">  
				<p> POWER62TM is a Strategic Board Game that is out of this world. The objective is capturing the opponent’s EPC (Eranium Proceesor Core). Players/Teams will
				start by placing their characters, EPC and PTx(Periodic Element Creatures) pieces in a preset order on the Game Tile. From there they will take turn by using 
				the Move and Power Cards to strategize their opponent. The Black Hole will be an obstacle that each player must overcome. <br> <span class="red">Why is every game different?</span>
				Even when you play the same deck multiple times, the outcome will be different. “Luck-of-the-Draw” on the Move and Power Cards has a huge factor in
				whether your strategy works or crumbles. The challenge is to re-strategize according to your draw.
				If you are up for a fun and challenging game play, it’s the POWER62TMGAMEv1.0  But wait, there’s more! When you win, you will rescan your opponent’s EPC, 
				which has an embedded NFC chip, and receive a preset XP for you to 
				go online and build your StarPortv1.0. Not to mention we’re in R&D to 
				turn your StarPort into a combat map for online play in v2.0. <span class="red">RAD!</span> 
				</p>	
			</div>
			<img src="../images/home/section-6/figure.PNG" alt="figure" class="section-6-figure">	
			<img class="section-6-main-img" src="../images/home/section-6/main-picture.PNG" alt="main picture" class="section-6-main-picture">
	</div>
	<div class="btn-position-container">
				<div class="section-6-btn-buyhere">
					<a class="btn-pill section-6-btn-buyhere-text" href="/shop">BUY HERE</a>
					<img class="section-6-btn-buyhere-img" src="../images/1/signup.png" alt="">
				</div>
			</div>
		</div>
</section> <!-- End Section: 6 -->
	
<!-- Section 7 -->
<section  class="section-7" >
    <div class="row">
        <h1 class="section-7-header header-shadow"><span class="bold">BE THERE.</span>
			<span class="thin">Play POWER62 1.0 & Get An Exclusive PowerCard.</span>
	   </h1>
	</div>
    <div class="row">
		<div class="section-7-gencon-img-container">
			<img class="section-7-gencon-img"src="images/home/section-7/gencon.png" alt="Robot" >
		</div>
        <div class="section-7-gencon-description-container">
			<p>Gen Con is a one-of-a-kind cultrual event that energized our city
				and drives about $71 million in annual economic impact. Central Indiana’s
				hospitality community looks forward to the “Best Four Days In Gaming”
				all year and we are proud to be the event’s host city for the 14th time.
				We congratulate Gen Con’s leadership team on setven straight years of
				record-setting attendance in Indy!
			--Leonard Hoops, President CEO of Visit Indy.</p>
			<p>Gen Con keeps getting better ad better. From the unparalleled number
				of multi-day attendees to the hospitality of the people of Indianaoplis,
				Gen Con is the essential annual gaming event, an unmissable opportunity
				to debut new products as well as connect with lifelong friends.<br/>
			<span class="align-right">--Erik Mona, Paizo Publisher and Chief Creative Officer</span></p>
		</div>
	</div><!-- End Row --> 
	<div class="row">
		<div class="col-6-of-12">
			<h3>PLAY</h3> 
			<img  class="logo" src="images/home/section-7/logo.png">
			<div class="col-3-of-6">
				<img class="power-box" src="images/home/section-7/power-box.png">
				<div class="power-box-text">*WE WILL ANNOUNCE THE WINNER IN THE POWER62 WEBSITE.</div>
			</div>
			<div class="col-3-of-6">
				<p class="power-box-description">AT GEN CON 2018 YOU CAN PLAY POWER62 1.0
					AND ENTER INTO A DAILY RAFFLE.
					WE WILL GIVE AWAY A SIGNED PROTOTYPE
					1.0 GAME DAILY AT GEN CON 2018*.
					NO PURCHASE NECESSARY.</p>
			</div>
				<div class="section-7-btn-buyhere">
					<a class="btn-pill section-7-btn-buyhere-text" href="/register.php">SIGNUP FOR FREE</a>
					<img class="section-7-btn-buyhere-img" src="../images/1/signup.png" alt="">
				</div>
		</div>
	</div><!-- End Row --> 		
</section> <!-- End Section: 7 -->

<?php
	try
	{
		require_once(__DIR__ . '/views/partials/home-footer.php');
	}
	catch(Exception $e)
	{
		echo "Failed to include Header.<br/>Error: " . $e;
	}
?>

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

<div class="contract">  
    <div class="row">
        <img src="images/power.png" alt="power img" class="logo">
        <h2 class="secondary-header">TERMS OF USE AND PRIVACY</h2>
        
        <div class="contract-container">
            <h1 class="contract-header">Power62 Terms of Use</h1>
            
            <hr class="hr">
            <h2 class="contract-header-secondary">Terms of Use ("Terms")</h2>
            

            <br>Last updated: July 1, 2018 <br><br>

            Please read these Terms of Use ("Terms", "Terms of Use") carefully before using the http://www.power62.com website operated by power62 ("us", "we", or "our").

            Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.
            <br><br>
            <span class="bold">
            By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.
            </span>
            <span class="bold">Purchases</span> 

            If you wish to purchase any product or service made available through the Service ("Purchase"), you may be asked to supply certain information relevant to your Purchase.

            <span class="bold">Termination</span>
            

            We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
            <br><br>
            All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.


            <span class="bold">Links To Other Web Sites</span>

            Power62 has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that Power62 shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.

            <span class="bold">Changes</span> 

            We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 10 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.


            <span class="bold">Limitations of Liability</span> 

            UNDER NO CIRCUMSTANCES SHALL POWER62 OR ITS AFFILIATES, PARTNERS, SUPPLIERS OR LICENSORS BE LIABLE FOR ANY INDIRECT, INCIDENTAL, CONSEQUENTIAL, SPECIAL OR EXEMPLARY DAMAGES ARISING OUT OF OR IN CONNECTION WITH YOUR ACCESS OR USE OF OR INABILITY TO ACCESS OR USE THE APPLICATION AND ANY THIRD-PARTY CONTENT AND SERVICES, WHETHER OR NOT THE DAMAGES WERE FORESEEABLE AND WHETHER OR NOT COMPANY WAS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. WITHOUT LIMITING THE GENERALITY OF THE FOREGOING, COMPANY’S AGGREGATE LIABILITY TO YOU (WHETHER UNDER CONTRACT, TORT, STATUTE OR OTHERWISE) SHALL BE SHALL NOT EXCEED THE AMOUNT OF TEN DOLLARS ($10.00). THE FOREGOING LIMITATIONS WILL APPLY EVEN IF THE ABOVE STATED REMEDY FAILS OF ITS ESSENTIAL PURPOSE.


            <span class="bold">Contact Us</span>  

            If you have any questions about these Terms, please contact us.

        </div>

        <form action="" class="contract-form">
            <input class="checkbox" name="checkbox"type="checkbox">
                <label for="checkbox" class="checkbox-label"> I HAVE READ AND AGREE TO THE 
                        <span class="blue">TERMS OF USE</span>
                        AND <span class="blue">PRIVATE POLICY</span>
                </label>
            <input class="submit"type="submit" value="continue">  
        </form>
    </div>
</div>

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
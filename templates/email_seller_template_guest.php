<div id=middle>

<form method="post" action="email_seller.php">

			<div class="control-group">
				<label for="email"><strong>Email: <em>*</em></strong></label>
				<input type="text" name="buyer_email" id="buyer_email" class="required email" role="input" aria-required="true"/>		
			</div>

            <?php $listing = $_SESSION['listinginfo'];?>
			<div class="control-group">
				<label for="message"><strong>Message: <em>*</em></strong></label>
				<textarea rows="11" name="message" id="message" class="input-xxlarge" role="textbox" aria-required="true">
Hello!

I am interested in buying the book <?php echo $listing[0]["name"]?> (Edition <?php echo $listing[0]["edition"]?>) by <?php echo $listing[0]["author"]?>. I understand you are requesting $<?php echo $listing[0]["price"]?> for the book.

If the book is still for sale, please email me back to arrange a time and place for the transaction.

Thank you very much!
				</textarea>
								
			<p class="requiredNote"><em>*</em> Denotes a required field.</p>
			
			<div class="control-group">
			<input type="submit" value="Send Message" name="submit" class="btn" id="submitButton" title="Click here to submit your message!" />
		    </div>
		</form>

</div>  

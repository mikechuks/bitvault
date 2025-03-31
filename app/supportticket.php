<?php include "include/header.php";?>

<div class="card card-style">
<form onsubmit="supportajax()">
<span id="support_message"></span>
<div class="content mb-0">
<div class="pt-3"></div>
<div class="form-custom form-label form-icon">
<i class="bi bi-code font-14"></i>
<input type="text" class="form-control rounded-xs" name="title" placeholder="Enter Title">
<label for="c31" class="color-highlight form-label-always-">Title</label>
<span>(required)</span>
</div>
<div class="pb-2"></div>
<div class="form-custom form-label form-icon">
<i class="bi bi-building font-13"></i>
<select class="form-select rounded-xs" name="priority">
<option value="0" disabled="" selected="">Select Priority</option>
<option value="High">High</option>
<option value="Medium">Medium</option>
<option value="Low">Low</option>
</select>
<label for="c61" class="color-highlight form-label-always-">Select Provider</label>
</div>
<div class="pb-2"></div>
<div class="form-custom form-label form-icon">
<i class="bi bi-code font-14"></i>
<textarea type="text" class="form-control rounded-xs" name="message" placeholder="Message"></textarea>
<label for="c31" class="color-highlight form-label-always-">Message</label>
<span>(required)</span>
</div>

<div class="pb-3"></div>
<button type="submit" id='supportbtn' class="btn btn-full gradient-green rounded-s shadow-bg shadow-bg-s mb-4">Send</button>
</div>
</form>
</div>
</div>
</div>

<script>
    function supportajax() {
        
    	event.preventDefault();
    
    	  $('#supportbtn').html('<span class="spinner-grow spinner-grow-sm"></span> Initializing...');
    		$('#supportbtn').prop('disabled',true);
    
			  $.ajax({
				type: 'POST',
				url: 'logic/supportticket.php',   
				data: $('form').serialize(),
				success: function (data) {
    
        	  $('#supportbtn').prop('disabled',false);
        	  $('#supportbtn').html('Send');
        
        	  $("#support_message").html(data);
				  
				}
			});
    
    	}
</script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body></html>
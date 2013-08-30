<?php 

if(!isset($title))
{
	$title = 'Specification By Example';
	$keywords = "test, testing, acceptance, specification, example, contact";
	$description = "A simple page on specification by example that uses the bootstrap " .
			"framework, a google calendar and a contact form";
	$project = 'Specification By Example';
	include('_layout.php');
	return;
}


?>
<form class="form-horizontal">  
        <fieldset>  
          <legend>Contact Me For a Workshop</legend>  
          <div class="control-group">  
            <label class="control-label" for="input01">Your Email</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="input01">  
              <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>  
            </div>  
          </div>  
          <div class="control-group">  
            <label class="control-label" for="textarea">Message</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" rows="10"></textarea>  
            </div>  
          </div>  
          <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Submit</button>  
            <button class="btn">Cancel</button>  
          </div>  
        </fieldset>  
</form>  
<!-- See more at: http://www.w3resource.com/twitter-bootstrap/forms-tutorial.php#sthash.H1VjCbN9.dpuf -->
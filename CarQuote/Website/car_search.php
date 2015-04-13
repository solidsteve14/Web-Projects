<?php 
#echo '<h1>Car Search Page</h1>';
?>
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) 
            return false;
        return true;
        
    }
</script>
<div class="bs-callout bs-callout-warning">
    <h1>Car Search</h1>
    <p>Search our vast database of cars! Just enter in the make, model, and year of the car you would like to see information about. </p>
</div>
<form class="form-signin" role="form" action="cars.php" method='get'>
	<div class="input-group" style='margin-bottom: 5px;'>
    	<label class="sr-only">Enter Make:</label>
    	<input type="text" name="make" class="form-control" placeholder="All makes"/>
		<div class="input-group-addon">e.g. Toyota.</div>
	</div>
	<div class="input-group" style='margin-bottom: 5px;'>
    	<label class="sr-only">Enter Model:</label>
    	<input type="text" name="model" class="form-control" placeholder="All models" />
		<div class="input-group-addon">e.g. Camry.</div>
	</div>
	<div class="input-group" style='margin-bottom: 5px;'>
    	<label class="sr-only">Enter Year:</label>			
    	<input type="text" name="year" class="form-control" placeholder="All years"/>
		<div class="input-group-addon">e.g. 2004.</div>
	</div>
	<div class="pull-left">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
	</div>
	<input type="hidden" name="action" value="list" />
</form>

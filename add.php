<style>
	
	.container{
		margin:20px 50px;
		width:500px;
	}

	input{
		width:100%;
	}
	label{
		display:inline-block;
	}
	.form-control-wrapper{
		text-align:left;
		margin-bottom:0.5rem;
	}
</style>
<center>
<div class="container">
<form action="<?= $_SERVER['PHP_SELF']?>">

	<div class="form-control-wrapper">
		<label>
			Name:
		</label>
			<input type="text" name="name" />
		
	</div>
	<div class="form-control-wrapper">
		<label>
			Mobile:
		</label>	
			<input type="text" name="mobile" />
		
	</div>
	<div class="form-control-wrapper">
		<button type="submit" name="submit">SUBMIT</button>
		<button type="reset" name="reset">RESET</button>
	</div>
</form>
</div>
</center>
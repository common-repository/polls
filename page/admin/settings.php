<?php
$limit = get_option('sp_limit');
if (isset($_POST['submit'])) {
	if ($_POST['limit'] == 'yes') {
		update_option('sp_limit', 'yes');
		$message = 'Limited to only one submission per computer';
	} else if ($_POST['limit'] == 'no') {
		update_option('sp_limit', 'no');
		$message = 'Not limited to only one submission per computer';
	}
}
?>

<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div> 
	<h2>
		Global Poll Settings
	</h2>
	
	<?php if(isset($message)) : ?>
		
		<p><?php echo $message; ?></p>
		
		<p><a href="<?php admin_url(); ?>admin.php?page=sp-settings">Go back</a></p>
		
	<?php else : ?>
		
		<form method="post">
			<p>Limit to one submission per computer?</p>
			<p><input type="radio" name="limit" value="yes" id="limityes" <?php if($limit == 'yes') { echo 'checked="checked"'; } ?> />&nbsp;<label for="limityes">Yes</label></p>
			<p><input type="radio" name="limit" value="no" id="limitno" <?php if ($limit == 'no') { echo 'checked="checked"'; } ?> />&nbsp;<label for="limitno">No</label></p>
			<p><input type="submit" name="submit" value="Submit" /></p>
			
		</form>
		
	<?php endif; ?>

</div>
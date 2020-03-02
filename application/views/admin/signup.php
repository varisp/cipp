<?php include('header.php');?>

<div class="container" style="margin-top:20px;">
	<h1>Admin singup</h1>
	<?php echo form_open('admin/signup');?>
  <div class="form-group">
    <label for="uname">User Name:</label>
    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo set_value('uname');?>">
	<?php echo form_error('uname'); ?>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" id="pwd" value="<?php echo set_value('pwd');?>">
	<?php echo form_error('pwd',"<div class='text-danger'>","</div>");?>
  </div>
  <div class="form-group">
    <label for="email">email:</label>
    <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>">
	<?php echo form_error('email',"<div class='text-danger'>","</div>");?>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <h2>All ready registered?</h2><?php echo anchor('admin/index','login','login')?>
</div>
<?php include('footer.php');?>
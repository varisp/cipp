<?php include('header.php');?>

<div class="container" style="margin-top:20px;">
	<h1>Admin Login</h1>
	<?php echo form_open('admin/index');?>
  <?php if( $success = $this->session->flashdata('userreg')):?>
  <div class="form-group">
    <div class="alert alert-danger">
      <?= $success; ?>
  </div>
<?php endif;?>
  <?php if($error=$this->session->flashdata('Login_Failed')): ?>
  <div class="form-group">
    <div class="alert alert-danger">
      <?= $error; ?>
  </div>
  <?php endif; ?>
  <div class="form-group">
    <label for="email">User Name:</label>
    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo set_value('uname');?>">
	<?php echo form_error('uname'); ?>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" id="pwd" value="<?php echo set_value('pwd');?>">
	<?php echo form_error('pwd',"<div class='text-danger'>","</div>");?>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <?php echo anchor('admin/signup','Sing up','signup')?>
</div>
<?php include('footer.php');?>
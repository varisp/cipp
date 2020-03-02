<?php include('header.php');?>

<div class="container">
  <h2>Feed back form</h2>
  <form action="addfeedback" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo set_value('email');?>">
      	<?php echo form_error('email'); ?>
    </div>
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo set_value('name');?>">
      <?php echo form_error('name'); ?>
    </div>
    <div class="form-group">
      <label for="feedback1">feed back:</label>
      <textarea class="form-control" id="feedback1" placeholder="Enter feedback" name="feedback1"><?php echo set_value('feedback1');?></textarea>
      <?php echo form_error('feedback1'); ?>
    </div>  
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <?php include('footer.php');?>
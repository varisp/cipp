<?php include('header.php');?>

<div class="container" style="margin-top:20px;">
  <?php echo $this->session->flashdata('articleadding') ;?>
	<h1>Add articles</h1>
	<?php echo form_open_multipart('admin/addarticle');?>
  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id'); ?>">
  <input type="hidden" class="form-control" name="created_at" id="created_at" value="<?php echo Date('Y M D H:i:sa');?>">
  <div class="form-group">
    <label for="title">Article Title:</label>
    <input type="text" class="form-control" name="article_title" id="article_title" value="<?php echo set_value('article_title');?>">
	<?php echo form_error('article_title'); ?>
  </div>
  <div class="form-group">
    <label for="article_body">Article body:</label>
    <textarea rows="5" class="form-control" name="article_body" id="article_body" value=""><?php echo set_value('article_body');?></textarea>
	<?php echo form_error('article_body',"<div class='text-danger'>","</div>");?>
  </div>
  <div class="form-group">
    <label for="article_img">Article image:</label>
    <input type="file" name="article_img" id="article_img">
    <?php if(isset($upload_error)) {echo $upload_error; }?>
    <button type="reset" class="btn btn-primary">reset</button>
  <button type="submit" class="btn btn-success">Submit</button>
</div>
<?php include('footer.php');?>
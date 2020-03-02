<?php include('header.php');?>

<div class="container" style="margin-top:20px;">
  <?php echo $this->session->flashdata('articleadding') ;?>
	<h1>Edit articles</h1>
	<?php echo form_open('admin/updatearticle');?>
  <?php echo form_hidden('id',$article->id);?>
  <div class="form-group">
    <label for="title">Article Title:</label>
    <input type="text" class="form-control" name="article_title" id="article_title" value="<?php echo set_value('article_title',$article->article_title);?>">
	<?php echo form_error('article_title'); ?>
  </div>
  <div class="form-group">
    <label for="article_body">Article body:</label>
    <textarea  class="form-control" name="article_body" id="article_body"><?php echo set_value('article_body',$article->article_body);?></textarea>
	<?php echo form_error('article_body',"<div class='text-danger'>","</div>");?>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</div>
<?php include('footer.php');?>
<?php include('header.php');?>
<?php $msg = $this->session->flashdata('articleadding'); ?>
<?php $msg_class = $this->session->flashdata('msg_class'); ?>
<div class="form-group">
    <div class="alert <?php echo $msg_class; ?>">
      <?= $msg; ?>
</div>
<div class="container" style="margin-top:20px;">
	<div class="table">
	<table>
	<thead>
	<tr>
	<th>ID</th>
	<th>TITLE</th>
	<th>EDIT</th>
	<th>DELETE</th>
	</tr>
	</thead>
	<?php echo PHP_VERSION ?>
	<!--<?php print_r($articles);?>-->
	<?php if(count($articles)) : ?>
	<?php foreach ($articles as $art) : ?>
	<tr>
		<td><?php echo $art->id; ?></td>
	<td><?php echo $art->article_title; ?></td>
	<td><?= anchor("admin/editarticle/{$art->id}",'edit',['class'=>'btn btn-default']); ?></td>
	<td>
		<?php echo form_open('admin/articledelet'),
		       form_hidden('id',$art->id),
		       form_submit(['name'=>'submit','value'=>'delete', 'class'=>'btn btn-danger']),
		       form_close();
		       ?>


	</td>
	</tr>
<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="3">no data available</td>
		</tr>
			<?php endif; ?>
	</table>
	<?php echo $this->pagination->create_links(); ?>
	</div>
</div>
<?php include('footer.php');?>
<?php include('header.php');?>
<div class="container">
	<?php echo $this->session->flashdata('feedback'); ?>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>feedback</th>
        <th>edit</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
    	<?php $count = 0;?>
    	
    	<?php foreach($data as $a): ?>
    		<?php $count++;?>
      <tr>
        <td><?= $count;?></td>
        <td><?= $a->name;?></td>
        <td><?= $a->email;?></td>
        <td><?= $a->feedback1;?></td>
        <td><?= anchor("users/editfeedback/{$a->id}",'Edit',['class'=>'btn btn-primary']);?></td>
        <td><?= anchor("users/deletefeed/{$a->id}", 'Delete',['class'=>'btn btn-danger']);?></td>
      </tr>
      <?php endforeach;?>

    </tbody>
  </table>
</div>
<?php echo anchor('users/addfeedback', 'Add feed back', ['class'=>'btn btn-primary']); ?> 
<?php echo anchor('users/export', 'Export to excel', ['class'=>'btn btn-primary']); ?>

</div>

<?php include('footer.php');?>
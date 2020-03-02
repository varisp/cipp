<?php include('header.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup",function(){
      var value= $(this).val().toLowerCase();
      $("#myTable tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
      });
    });
  });
  </script>
<form class="form-inline">
  <input class="form-control" type="search" placeholder="search" aria-label="search" id="myInput">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="container">                                                                                      
  <div class="table-responsive">          
  <table class="table" >
    <thead>
      <tr>
        <th>sl.no.</th>
        <th>article title</th>
        <th>article data</th>
        <th>article image</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody id="myTable">
    	<?php foreach ($data as $a) :?>
      <tr>
        <td><?php echo $a->id;?></td>
        <td><?php echo $a->article_title;?></td>
        <td><?php echo $a->article_body;?></td>
        <td><img width="200" hight="200" src="<?php echo $a->image_path;?>"></td>
        <td><?php  echo date('y M D h:i:sa',strtotime($a->created_at));?></td>        
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  </div>
</div>


<?php echo anchor('users/feedback','View Feedback',['class'=>'btn btn-primary']);?>
<?php include('footer.php');?>
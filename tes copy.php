<!DOCTYPE html>
<html lang="en">
<?php  include('config.php'); //file database yang sudah di buat

if (isset($_POST['simpan'])) {
 $jurusan= $_POST['jurusan'];

 $query= mysqli_query($con,"insert into jurusan values ('','$jurusan')") or die(mysql_error());
  echo "<script> alert ('Data Behasil di Tambahkan');
  document.location='tes.php';

  </script>";
 
}

elseif (isset($_POST['update'])) {
 $id= $_POST['id_jurusan'];
 $jurusan= $_POST['jurusan'];

 $query= mysqli_query($con,"update jurusan set id_jurusan='$id',jurusan='$jurusan' where id_jurusan='$id' ") or die(mysql_error());
  echo "<script> alert ('Data Behasil di Update');
  document.location='tes.php';

  </script>";
 
}
elseif (isset($_POST['hapus'])) {
 $id= $_POST['hapus'];
 

 $query= mysqli_query($con,"delete from jurusan where id_jurusan='$id' ") or die(mysql_error());
  echo "<script> alert ('Data Behasil di Hapus');
  document.location='tes.php';

  </script>";
 
}


 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>  
</head>
<body>
<div class="panel panel-danger">
   <div class="panel-heading">
   <h3 class="panel-title">Master Jurusan</h3>
   </div>
   <div class="panel-body">
   

<!-- Button Modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button>

<!-- Modal Tambah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Tambah Jurusan</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
         
        
         <div class="form-group">
          <label for="">Jurusan</label>
          <input type="text" name="jurusan" class="form-control" id="" placeholder="Input field">
         </div>
        
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
       </form>
      </div>
    </div>
  </div>
</div>

<br>
 <table class="table table-striped table-bordered data">
  <thead>
   <tr>
    
    <th>Id</th>
    <th>Jurusan</th>
    <th>Aksi</th>
    
   </tr>
  </thead>
  <tbody>
   <?php $query = mysqli_query($con,"select * from jurusan");
    while ($data= mysqli_fetch_row($query)) {
     

    ?>
   <tr>
    
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
    
    <td>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my<?php echo $data[0]; ?>">
  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
</button>

<!-- Modal UPDATE -->
<div class="modal fade" id="my<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Update Jurusan</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
         
         
         <div class="form-group">
          
          <input type="hidden" name="id_jurusan" class="form-control" value="<?php echo $data[0]; ?>" id="" placeholder="Input field">
         </div>

         <div class="form-group">
          <label for="">Jurusan</label>
          <input type="text" name="jurusan" class="form-control" value="<?php echo $data[1]; ?>" id="" placeholder="Input field">
         </div>
        
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
       </form>
      </div>
    </div>
  </div>
</div>
 
 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myy<?php echo $data[0]; ?>">
  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>

<!-- Modal HAPUS -->
<div class="modal fade" id="myy<?php echo $data[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Delete Jurusan</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
         
         
         Apakah Anda Ingin Menghapus Data <?php echo $data[1]; ?>
        
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="hapus" value="<?php  echo $data[0]; ?>" class="btn btn-primary">Hapus</button>
       </form>
      </div>
    </div>
  </div>
</div>

    </td>

   </tr>
   <?php
    }
    $data++;
   ?>
  </tbody>
 </table>

   </div>
</div>
</body>
</html>
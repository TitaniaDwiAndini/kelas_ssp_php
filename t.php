<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <?php
    //koneksi
    $con=mysqli_connect("localhost","root","","kelas_ssp") or die("koneksi gagal");
    error_reporting(0);
    $sql="select * from tblbarang";
    $hasil=mysqli_query($con,$sql);
?>
<style>
.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>
  <body>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
  <div class="row">
  <div class="col-sm-12">
      <h1 align="center">Tabel Barang</h1>
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_brg"><i class="fa fa-plus"></i> Tambah</button>
      <table class="table">
      <thead class="thead-dark">
          <tr>
              <th>NO</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Jenis</th>
              <th>Gambar</th>
              <th>Aksi</th>
          </tr>
      </thead>
  <?php
      $no=1;
      while ($data=mysqli_fetch_array($hasil))
      {
  ?>
          <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $data['kodebrg'];?></td>
              <td><?php echo $data['namabrg'];?></td>
              <td><?php echo $data['jumlah'];?></td>
              <td><?php echo $data['harga'];?></td>
              <td><?php echo $data['jenis'];?></td>
              <td><img src="<?php echo $data['gambar'];?>" alt="" width="100"></td>
              <td><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</button>
              <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</button>
              </td>
          </tr>
  <?php
          $no++;
      }
  ?>
      </table>
  </div>
</div>


<!-- Modal tambah-->
<div class="modal fade" id="tambah_brg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <div class="container">
          <div class="form-group">
            <label for="txtkode">Kode Barang</label>
            <input type="text" name="txtkode" id="txtkode" class="form-control">
          </div>
          <div class="form-group">
            <label for="txtnama">Nama Barang</label>
            <input type="text" name="txtnama" id="txtnama" class="form-control">
          </div>
          <div class="form-group">
            <label for="txtjumlah">Jumlah / Stok</label>
            <input type="text" name="txtjumlah" id="txtjumlah" class="form-control">
          </div>
          <div class="form-group">
            <label for="txtharga">Harga</label>
            <input type="text" name="txtharga" id="txtharga" class="form-control">
          </div>
          <div class="form-group">
            <label for="txtjenis">Jenis</label>
            <select name="txtjenis" id="txtjenis" class="form-control">
              <option value="ATK">Alat Tulis Kantor</option>
              <option value="Busana">Fashion</option>
              <option value="Sembako">Kebutuhan Pokok</option>
              <option value="Mainan">Mainan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="txtgambar">Gambar</label>
            <input type="text" name="txtgambar" id="txtgambar" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input type="submit" value="Simpan" class="btn btn-primary" name="cmdsimpan">
      </div>
      </form>

      <?php
        if(isset($_POST['cmdsimpan'])){
          // echo "<script>alert('horeee')</script>";
          $tkode=$_POST['txtkode'];
          $tnama=$_POST['txtnama'];
          $tjumlah=$_POST['txtjum'];
          $tharga=$_POST['txtharga'];
          $tjenis=$_POST['txtjenis'];
          $tgambar=$_POST['txtgambar'];

          //mencari data berdasarkan inputan kodebarang
          $sql1="select * from tblbarang where kodebrg like '%$tkode%'";
          $hasil1=mysqli_query($con,$sql1);
          $jum=mysqli_num_rows($hasil1); //jika lebih dari 0, data sdh ada
          //echo "<script language='javascript'>window.alert('".$jum."')</script>";
          if ($jum>0)
          {
            echo "<script language='javascript'>window.alert('Kode Sudah Ada !')</script>";
          }
          else{
            //echo "<script language='javascript'>window.alert('".$tkode.$tnama.$tjum.$tharga.$tjenis.$tgambar."')</script>";
            // $sql2="INSERT INTO `tblbarang` (`kodebrg`, `namabrg`, `jumlah`, `harga`, `jenis`, `gambar`) VALUES ('$tkode', '$tnama', '$tjum', '$tharga', '$tjenis', '$tgambar')";
            $sql2="INSERT INTO tblbarang (kodebrg, namabrg, jumlah, harga, jenis, gambar) VALUES ('$tkode','$tnama','$tjumlah','$tharga','$tjenis','$tgambar')";
            $hasil2=mysqli_query($con,$sql2);
            echo "<script language='javascript'>window.alert('Tersimpan !')</script>";
            //header("Location:coba8_b.php");
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=coba8_b.php">';
            exit;
          }

        }
      ?>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
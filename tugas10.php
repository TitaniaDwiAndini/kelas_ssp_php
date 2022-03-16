<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <?php
    //koneksi
    $con=mysqli_connect("localhost","root","","kelas_ssp") or die("koneksi gagal");
    error_reporting(0);

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
    <br/>
	<div class="row justify-content-center">
  <div class="col"></div>
                        <div class="col-sm-4">
                        <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama Barang" aria-label="Search" name="txtcari">
      <input type="submit" value="Cari" name="cmdcari" class="btn btn-outline-success my-2 my-sm-0">
    </form>                        </div>
                        <!--end of col-->
                    </div>
</div>

<?php
  if (isset($_POST['cmdcari'])){
    $tcari=$_POST['txtcari'];
    $sql="select * from tblbarang where namabrg like '%$tcari%'";
    $hasil=mysqli_query($con,$sql);
    //$jdata=mysqli_num_rows($hasil);
?>
<div class="row">
<div class="col"></div>
<div class="col-sm-6">
    <h1 align="center">Tabel Barang</h1>
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
        </tr>
<?php
        $no++;
    }
  }
?>
    </table>
</div>
<div class="col"></div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
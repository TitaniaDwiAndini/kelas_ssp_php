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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-warning">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php#slider">Gambar</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="#produk">Produk</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="index.php#produk">Lihat</a>
                            <a class="dropdown-item" href="coba_modif.php">CRUD</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php#contact">Kontak Kami</a>
                    </li>
                                                            
                   
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

  <?php
    //koneksi
    include('koneksi.php');

    //cek tombol tambah dan proses tambah data
    if (isset($_POST['cmdsimpan'])){
      $tkode=$_POST['txtkode'];
      $tnama=$_POST['txtnama'];
      $tjumlah=$_POST['txtjumlah'];
      $tharga=$_POST['txtharga'];
      $tjenis=$_POST['txtjenis'];
      $tgambar=$_POST['txtgambar'];

      $sql1="select * from tblbarang where kodebrg like '$tkode'";
      $hasil1=mysqli_query($con,$sql1);
      //mencari jumlah data sesuai query
      $ada=mysqli_num_rows($hasil1);
      //echo "<script>alert('".$ada."')</script>";
      if ($ada>0) {
        echo "<script>alert('Data Sudah Ada !')</script>";
      }
      else
      {
        $sql2="INSERT INTO tblbarang (kodebrg, namabrg, jumlah, harga, jenis, gambar) VALUES ('$tkode','$tnama','$tjumlah','$tharga','$tjenis','$tgambar')";
        $hasil2=mysqli_query($con,$sql2);
        echo "<script>alert('Data Tersimpan !')</script>";
        // header("Location:coba_modif.php");
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=coba_modif.php">';
        exit;
      }
    }

      //cek tombol edit dan proses edit data
    if (isset($_POST['cmdedit'])){
      $tkode=$_POST['cmdedit'];
      $tnama=$_POST['txtnama'];
      $tjumlah=$_POST['txtjumlah'];
      $tharga=$_POST['txtharga'];
      $tjenis=$_POST['txtjenis'];
      $tgambar=$_POST['txtgambar'];
                // echo "<script language='javascript'>window.alert('".$tkode.$tnama.$tjum.$tharga.$tjenis.$tgambar."')</script>";

      $sql="update tblbarang set namabrg = '$tnama', jumlah = '$tjumlah', harga = '$tharga', jenis = '$tjenis', gambar = '$tgambar' where kodebrg = '$tkode'";
      mysqli_query($con,$sql);
      echo "<script>
        alert('Data telah terupdate !');
        document.location='coba_modif.php';
      </script>";

    }   
    
    if (isset($_POST['cmdhapus'])){
      $tkode=$_POST['cmdhapus'];
      $sql="delete from tblbarang where kodebrg = '$tkode'";
      $hasil=mysqli_query($con,$sql);
      echo "<script>
        alert('Data telah terhapus !');
        document.location='coba_modif.php';
      </script>";

    }
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

<?php
    $sql="select * from tblbarang";
    $hasil=mysqli_query($con,$sql);
    //$jdata=mysqli_num_rows($hasil);
?>
<div class="container">
<div class="row">
<div class="col-sm-12">
    <h1 align="center">Tabel Barang</h1>
    <!-- tombol tambah -->
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
            <td>
            <!-- tombol edit -->
            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit_brg<?php echo $data['kodebrg'];?>"><i class="fa fa-edit"></i> Edit</button>

            <!-- Modal Edit -->
            <div class="modal fade" id="edit_brg<?php echo $data['kodebrg'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                <form action="" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="txtkode">Kode Barang</label>
                      <input type="text" name="txtkode" id="txtkode" class="form-control" value="<?php echo $data['kodebrg'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="txtnama">Nama Barang</label>
                      <input type="text" name="txtnama" id="txtnama" class="form-control" value="<?php echo $data['namabrg'];?>">
                    </div>
                    <div class="form-group">
                      <label for="txtjumlah">Jumlah / Stok</label>
                      <input type="text" name="txtjumlah" id="txtjumlah" class="form-control" value="<?php echo $data['jumlah'];?>">
                    </div>
                  <div class="form-group">
                      <label for="txtharga">Harga</label>
                      <input type="text" name="txtharga" id="txtharga" class="form-control" value="<?php echo $data['harga'];?>">
                    </div>
                    <div class="form-group">
                      <label for="txtjenis">Jenis</label>
                      <select name="txtjenis" id="txtjenis"  class="form-control" value="<?php echo $data['jenis'];?>">
                        <option value="Alat Tulis">Alat Tulis</option>
                        <option value="Alat Rumah Tangga">Alat Rumah Tangga</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="txtgambar">Gambar</label>
                      <input type="text" name="txtgambar" id="txtgambar" class="form-control" value="<?php echo $data['gambar'];?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <button type="reset" class="btn btn-warning">Bersih</button>
                    <button type="submit" value="<?php echo $data['kodebrg'];?>" name="cmdedit" class="btn btn-primary"> Simpan</button>
                    <!-- <input type="submit" value="Simpan" class="btn btn-primary" name="cmdsimpan"> -->
                  </div>
                </form>
                </div>
              </div>
            </div>

            <!-- tombol hapus -->
            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapus_brg<?php echo $data['kodebrg'];?>"><i class="fa fa-trash"></i> Hapus</button>

            <!-- Modal Hapus -->
            <div class="modal fade" id="hapus_brg<?php echo $data['kodebrg'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                <form action="" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="txtkode">Kode Barang</label>
                      <input type="text" name="txtkode" id="txtkode" class="form-control" value="<?php echo $data['kodebrg'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="txtnama">Nama Barang</label>
                      <input type="text" name="txtnama" id="txtnama" class="form-control" value="<?php echo $data['namabrg'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="txtjumlah">Jumlah / Stok</label>
                      <input type="text" name="txtjumlah" id="txtjumlah" class="form-control" value="<?php echo $data['jumlah'];?>" readonly>
                    </div>
                  <div class="form-group">
                      <label for="txtharga">Harga</label>
                      <input type="text" name="txtharga" id="txtharga" class="form-control" value="<?php echo $data['harga'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="txtjenis">Jenis</label>
                      <select name="txtjenis" id="txtjenis"  class="form-control" value="<?php echo $data['jenis'];?>" readonly>
                        <option value="Alat Tulis">Alat Tulis</option>
                        <option value="Alat Rumah Tangga">Alat Rumah Tangga</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="txtgambar">Gambar</label>
                      <input type="text" name="txtgambar" id="txtgambar" class="form-control" value="<?php echo $data['gambar'];?>" readonly>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <!-- <button type="reset" class="btn btn-warning">Bersih</button> -->
                    <button type="submit" value="<?php echo $data['kodebrg'];?>" name="cmdhapus" class="btn btn-primary"> Hapus</button>
                    <!-- <input type="submit" value="Simpan" class="btn btn-primary" name="cmdsimpan"> -->
                  </div>
                </form>
                </div>
              </div>
            </div>

            </td>
        </tr>
<?php
        $no++;
    }
?>
    </table>
</div>
</div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambah_brg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="" method="post">
      <div class="modal-body">
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
          <select name="txtjenis" id="txtjenis"  class="form-control">
            <option value="Alat Tulis">Alat Tulis</option>
            <option value="Alat Rumah Tangga">Alat Rumah Tangga</option>
            <option value="Fashion">Fashion</option>
            <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
          </select>
        </div>
        <div class="form-group">
          <label for="txtgambar">Gambar</label>
          <input type="text" name="txtgambar" id="txtgambar" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="reset" class="btn btn-warning">Bersih</button>
        <input type="submit" value="Simpan" class="btn btn-primary" name="cmdsimpan">
      </div>
    </form>
    </div>
  </div>
</div>
<nav class="navbar justify-content-center navbar-expand-sm navbar-dark bg-warning">
            &copy; Copyright 2020
        </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
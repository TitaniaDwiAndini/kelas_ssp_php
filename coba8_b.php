<!doctype html>
<html lang="en">

  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>
  <?php
    include('koneksi.php');

    if (isset($_POST['cmdhapus'])){
      $tkode=$_POST['cmdhapus'];
      $query= mysqli_query($con,"delete from tblbarang where kodebrg='$tkode' ") or die(mysql_error());
      echo "<script> alert ('Data Behasil di Hapus');
      document.location='coba8_b.php';
    
      </script>";
    }

    if (isset($_POST['cmdsimpan'])){
      //echo "<script language='javascript'>window.alert('hai')</script>";
      $tkode=$_POST['txtkode'];
      $tnama=$_POST['txtnama'];
      $tjum=$_POST['txtjum'];
      $tharga=$_POST['txtharga'];
      $tjenis=$_POST['txtjenis'];
      $tgambar=$_POST['txtgambar'];

      //mencari data berdasarkan inputan kodebarang
      $sql1="select * from tblbarang where kodebrg like '%$tkode%'";
      $hasil1=mysqli_query($con,$sql1);
      $jum=mysqli_num_rows($hasil1); //jika lebih dari 0, data sdh ada
      if ($jum>0)
      {
        echo "<script language='javascript'>window.alert('Kode Sudah Ada !')</script>";
      }
      else{
        $sql2="INSERT INTO `tblbarang` (`kodebrg`, `namabrg`, `jumlah`, `harga`, `jenis`, `gambar`) VALUES ('$tkode', '$tnama', '$tjum', '$tharga', '$tjenis', '$tgambar')";
        $hasil2=mysqli_query($con,$sql2);
        echo "<script> alert ('Data Behasil di Tambah');
        document.location='coba8_b.php';      
        </script>";
      }
    }

    if (isset($_POST['cmdedit'])){
      $tid=$_POST['cmdedit'];
      $tkode=$_POST['txtkode'];
      $tnama=$_POST['txtnama'];
      $tjum=$_POST['txtjum'];
      $tharga=$_POST['txtharga'];
      $tjenis=$_POST['txtjenis'];
      $tgambar=$_POST['txtgambar'];

      $sql1="UPDATE tblbarang SET namabrg = '$tnama', jumlah = '$tjum', harga = '$tharga', jenis = '$tjenis', gambar = '$tgambar' WHERE kodebrg = '$tid'";
        mysqli_query($con,$sql1);
        echo "<script> alert ('Data Berhasil di Edit');
        document.location='coba8_b.php';
      
        </script>";
        
    }

    $sql="select * from tblbarang";
    $hasil=mysqli_query($con,$sql);
?>

  <body>
  <div class="container">
  <h1 align="center">Tabel Barang</h1>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#nambah">
<i class="fa fa-plus"></i> Tambah</button>
    <table align="center" class="table">
    <thead class="thead-dark">
        <tr align="center">
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
            <td><img src="<?php echo $data['gambar'];?>" alt="" width="200"></td>
            <td>
<!-- tombol Update -->
            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#ngedit<?php echo $data['kodebrg']; ?>"><i class="fa fa-edit"></i>    Edit</button>

<!-- Modal ngedit-->
<div class="modal fade" id="ngedit<?php echo $data['kodebrg']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="container-fluid">
          <div class="form-group">
              <label for="txtkode">Kode Barang</label>
              <input type="text" name="txtkode" id="txtkode" value="<?php echo $data['kodebrg']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="txtnama">nama Barang</label>
              <input type="text" name="txtnama" id="txtnama" value="<?php echo $data['namabrg']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtjum">Jumlah / Stok</label>
              <input type="text" name="txtjum" id="txtjum" value="<?php echo $data['jumlah']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtharga">Harga Barang</label>
              <input type="text" name="txtharga" id="txtharga" value="<?php echo $data['harga']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtjenis">Jenis Barang</label>
              <input type="text" name="txtjenis" id="txtjenis" value="<?php echo $data['jenis']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtgambar">Gambar</label>
              <input type="text" name="txtgambar" id="txtgambar" value="<?php echo $data['gambar']; ?>" class="form-control">
            </div>
         </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" value="<?php echo $data['kodebrg']; ?>" name="cmdedit">Simpan Edit</button>

            <!-- <input type="submit" value="Update" name="cmdedit" class="btn btn-primary"> -->
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- tombol hapus -->
            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ngapus<?php echo $data['kodebrg']; ?>"> <i class="fa fa-trash"></i>  Hapus</button></td>

<!-- Modal ngapus-->
<div class="modal fade" id="ngapus<?php echo $data['kodebrg']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="container-fluid">

            <div class="form-group">
              <label for="txtkode">Kode Barang</label>
              <input type="text" name="txtkode" id="txtkode" value="<?php echo $data['kodebrg']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="txtnama">nama Barang</label>
              <input type="text" name="txtnama" id="txtnama" value="<?php echo $data['namabrg']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="txtjum">Jumlah / Stok</label>
              <input type="text" name="txtjum" id="txtjum" value="<?php echo $data['jumlah']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="txtharga">Harga Barang</label>
              <input type="text" name="txtharga" id="txtharga" value="<?php echo $data['harga']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="txtjenis">Jenis Barang</label>
              <input type="text" name="txtjenis" id="txtjenis" value="<?php echo $data['jenis']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="txtgambar">Gambar</label>
              <input type="text" name="txtgambar" id="txtgambar" value="<?php echo $data['gambar']; ?>" class="form-control" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" value="<?php echo $data['kodebrg']; ?>" name="cmdhapus">Hapus</button>
            <!-- <input type="submit" value="Hapus" name="cmdhapus" class="btn btn-primary"> -->
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
 
        </tr>
<?php
        $no++;
    }
?>
    </table>
    </div>

<!-- Modal nambah-->
<div class="modal fade" id="nambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group">
              <label for="txtkode">Kode Barang</label>
              <input type="text" name="txtkode" id="txtkode" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtnama">nama Barang</label>
              <input type="text" name="txtnama" id="txtnama" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtjum">Jumlah / Stok</label>
              <input type="text" name="txtjum" id="txtjum" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtharga">Harga Barang</label>
              <input type="text" name="txtharga" id="txtharga" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtjenis">Jenis Barang</label>
              <input type="text" name="txtjenis" id="txtjenis" class="form-control">
            </div>
            <div class="form-group">
              <label for="txtgambar">Gambar</label>
              <input type="text" name="txtgambar" id="txtgambar" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="reset" class="btn btn-warning" name="cmdbersih">Bersih</button>
            <input type="submit" value="Simpan" name="cmdsimpan" class="btn btn-primary">
          </div>      
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
  </body>
</html>
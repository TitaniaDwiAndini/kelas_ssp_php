<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="ref/css/bootstrap.min.css" >

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

  </head>
  <body>

    <!-- <div class="container"> -->
        <!-- menu navigasi -->
        <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-warning">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#slider">Gambar</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="#produk">Produk</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#produk">Lihat</a>
                            <a class="dropdown-item" href="coba_modif.php">CRUD</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#contact">Kontak Kami</a>
                    </li>
                                                            
                   
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <section id="welcome">
            <div class="jumbotron jumbotron-fluid">
                <div class="container center">
                    <h1 class="display-3" align="center">Selamat Datang</h1>
                    <p class="lead">di Institut Asia Malang</p>
                    <hr class="my-2">
                    <!-- <p>More info</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                    </p> -->
                </div>
            </div>
        </section>
        <section id="slider">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="gambar/banner1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="gambar/banner2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="gambar/gedung.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </a>
              </div>
        </section>
        <!-- <div class="container"><p><br/><br/></p><br></div> -->
        <br><br><br>
        <section id="produk">
        <h3 class="display-4" align="center">List Produk Kami</h3>          
          <?php
          include('koneksi.php');
          $sql="Select * from tblbarang";
          $hasil=mysqli_query($con,$sql);
          $angk=mysqli_num_rows($hasil);
      ?>

      <table border="0" cellpadding="0" cellspacing="0" align="center" width="60%">
      <tr>
      <?php
          $i=1;
          while ($data=mysqli_fetch_array($hasil)){
              $sisa=$i % 3;
      ?>
              <td><center><img src="<?php echo $data['gambar'];?>" alt="" width="70%"></center>
              <p align='center'><font face='arial' size='3'><b>Nama Produk :</b> <?php echo $data['namabrg'];?>
            <br><b>Harga : </b><?php echo $data['harga'];?>
            </font></p></td>
      <?php
          if ($sisa==0){
              echo "</tr><tr>";
              }
              $i++;
          }
      ?>
      
      </tr>
      </table>
      
          
        </section>
        <section id="contact">
          <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.588402574896!2d112.62445781523938!3d-7.9379825942821896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882780c5b14db%3A0xa2178e9d5a420380!2sInstitut%20Asia%20Malang!5e0!3m2!1sen!2sid!4v1594694818266!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
            </section>
        <!-- footer -->
        <nav class="navbar justify-content-center navbar-expand-sm navbar-dark bg-warning">
            &copy; Copyright 2020
        </nav>
    <!-- </div>   -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="ref/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="ref/js/popper.min.js"></script>
    <script src="ref/js/bootstrap.min.js"></script>

<!--     
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  </body>
</html>
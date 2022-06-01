<?php

require 'functions2.php';

?>


<!doctype html>
<style>


</style>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.daftar.css">
  </head>
 

  <body onload="configure()">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="container shadow-lg p-3 mt-5 mb-5" style="border-radius:10px;">

<h1 class="mt-lg-3">Buku Tamu 2022 </h1>
    <input type="text" class="form-control mb-3 mt-3" id="exampleFormControlInput1" name="nama" placeholder="Nama Anda!" required>
    <input type="number" class="form-control mb-3" id="exampleFormControlInput" name="telp" placeholder="Nomor Telephone Anda!" required>
    <input type="text" class="form-control mb-3" id="exampleFormControlInput1"  name="alamat" placeholder="Alamat Anda!" required>
    <input type="email" class="form-control mb-3" id="exampleFormControlInput1" name="email" placeholder="Email  Anda!" required>
    <div class="form-floating mb-3">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="alasan"></textarea>
  <label for="floatingTextarea">Alasan Menemui</label>
</div>
    <select class="form-select" aria-label="Default select example" name="pejabat">
  <option selected>Pilih Pejabat yang mau ditemui!</option>
  <option value="Kepala Dinas Kominfo">Kepala Dinas</option>
  <option value="Kepala Bidang Kominfo">Kepala Bidang</option>
  <option value="Staf Kominfo">Staf</option>
</select>
    <label for="foto" class="mt-3">Upload File PDF ,JPG JPEG, MAUPUN PNG</label>
    <input type="file" id="pdf" class="form-control mb-3" name="pdf" placeholder="Last name">
          <div id="my_camera">

          </div>
          <div id="results">

          </div>
        <button type="submit" name="tamu" class="btn btn-warning" onclick="saveSnap()" style="width: 100%;">Simpan Gambar dan Masuk data Tamu</button>   

    </div>
</form>
<script src="assets/webcam.min.js"></script>
<script>

    function configure() {
        Webcam.set({
            width:200,
            height:190,
            image_format:'jpeg',
            jpeg_quality:90
            
        });
        Webcam.attach('#my_camera');
     

    }

    function saveSnap() {
            Webcam.snap(function(data_uri) {
                document.getElementById('results').innerHTML = '<img id="webcam" src="'+ data_uri +'">';
            
                
            });

      Webcam.reset();

            var base64image = document.getElementById("webcam").src;
            Webcam.upload(base64image, 'functions2.php',function(code,text){
            })
    }

</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>
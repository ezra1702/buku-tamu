<?php
$conn = mysqli_connect("localhost", "root", "", "acara");
date_default_timezone_set("Asia/Jakarta");


//khusus realtime camera
if (isset($_FILES["webcam"]["tmp_name"])) {
    $tmpName = $_FILES["webcam"]["tmp_name"];
    $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' .jpeg';
    move_uploaded_file($tmpName, 'imageTamu/' . $imageName);
    return  $imageName;
}


if(isset($_POST["tamu"]) ) {



//fungsi untuk mengakses upload dari name pdf
function upload(){
	$namaFile = $_FILES['pdf']['name'];
	$ukuranFile = $_FILES['pdf']['size'];
	$error = $_FILES['pdf']['error'];
	$tmpName = $_FILES['pdf']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih file terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiFileValid = ['pdf','jpg','jpeg','png'];
	$ekstensiFile = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($ekstensiFile));
	if( !in_array($ekstensiFile, $ekstensiFileValid) ) {
		echo "<script>
				alert('yang anda upload bukan PDF ,JPG JPEG, MAUPUN PNG');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran File terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFile;

	move_uploaded_file($tmpName, 'pdf/' . $namaFileBaru);

	return $namaFileBaru;
}




$telp = mysqli_real_escape_string($conn, $_POST["telp"]);
$alamat = mysqli_real_escape_string($conn ,$_POST["alamat"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$pejabat = $_POST["pejabat"];
$name = mysqli_real_escape_string($conn, $_POST["nama"]);
// upload FILE PDF
$pdf = upload();

if( !$pdf ) {
		return false;
}




$alasan = mysqli_real_escape_string($conn, $_POST["alasan"]);
$jam = date('H:i');
$hari = date(' d M Y');



$kueri = "INSERT INTO buku
        VALUES  ('', '$name', '$telp', '$alamat', '$email', '$pejabat', '$pdf', 
        '$alasan', '$hari','$jam','$imageName')";

mysqli_query($conn, $kueri);

if (mysqli_affected_rows($conn) > 0) {
	echo "<script>alert('data berhasil ditambahkan')</script>";
}else{
	echo "data gagal ditambahkan";
	
}

}


?>
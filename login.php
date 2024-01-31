<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

//menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

//menghitung jumlah data yang ditemukan 
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	if ($data['level'] == "admin") {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['status'] = "login";
		header("location:admin/index.php");
	} else if ($data['level'] == "user") {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "user";
		$_SESSION['status'] = "login";
		header("location:user/index.php");
	}
} else {
	header("location:index.php?pesan=gagal");
}
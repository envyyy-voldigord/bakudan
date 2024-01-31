<?php
require 'koneksi.php';
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];

$query_sql= "INSERT INTO user (nama,username,password,level) VALUES ('$nama','$username','$password','$level')";

if (mysqli_query($koneksi,$query_sql)) {
header("location: index.php");
 }else {
 	echo "Pendaftaran Gagal:".mysqli_error($koneksi);
 }

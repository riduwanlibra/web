<?php

$host="localhost";
$user="root";
$password="";
$db="crud";

$Kon = mysqli_connect($host,$user,$password,$db);
if ($Kon){
	//echo"sukses";
	} 
	else{
		 echo"Koneksi gagal";
}
?>
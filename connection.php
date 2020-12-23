<?php
session_start();

$conn = mysqli_connect('127.0.0.1','root','','php10am');

if($conn !=true){
    die(mysqli_error($conn));
}

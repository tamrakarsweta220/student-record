<?php
// call connection
require_once('connection.php');
// call redirect function
require_once('redirect.php');

if (!empty($_POST) && !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $language = implode(',', $_POST['lang']);
    $country = $_POST['country'];
    $description = $_POST['description'];

    $imageExt = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $imageExt;
    $tmpName = $_FILES['upload']['tmp_name'];
    $size = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $imgExt = ['jpg', 'png', 'jpeg', 'gif'];


    if (!file_exists('images')) {
        mkdir('images');
    }

    if ($error == 0) {

        if (!in_array($imageExt, $imgExt)) {
            echo "image format only " . implode(',', $imgExt) . " supported";
        } else {

            if (move_uploaded_file($tmpName, 'images/' . $imageName)) {
                $image = $imageName;
            }
        }


    }

    $query = "INSERT INTO tbl_users(name,email,password,gender,language,country,image,description)
            VALUES ('$name','$email','$password','$gender','$language','$country','$image','$description')";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'user was inserted';
        to('index');
    } else {
        $_SESSION['error'] = 'There was a problem';
        to('index');
    }


} else {
    $_SESSION['error'] = 'Invalid Access';
    to('index');
}
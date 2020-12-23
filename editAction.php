<?php
// call connection
require_once('connection.php');
// call redirect function
require_once('redirect.php');

if (!empty($_POST) && !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $language = implode(',', $_POST['lang']);
    $country = $_POST['country'];
    $description = $_POST['description'];
  $userId = $_POST['userId'];


    if(!empty($_FILES['upload']['name'])){
        $fetUser="SELECT * FROM tbl_users WHERE id=".$userId;
        $userResult=mysqli_query($conn,$fetUser);
        $userData=mysqli_fetch_assoc($userResult);
        $userImage=$userData['image'];
     $imagePath = imagePath('images').$userImage;

        if(file_exists($imagePath) && is_file($imagePath)){
            unlink($imagePath);

        }
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

    }



    $query = "UPDATE tbl_users SET 
        name='$name',email='$email',gender='$gender',
        language='$language',country='$country',image='$image',
       description='$description'  WHERE id=" . $userId;


    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'user was updated';
        to('viewUsers');
    } else {
        $_SESSION['error'] = 'There was a problem';
        to('edit');
    }


} else {
    $_SESSION['error'] = 'Invalid Access';
    to('edit');
}
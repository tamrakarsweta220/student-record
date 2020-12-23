<?php
// call connection
require_once('connection.php');
// call redirect function
require_once('redirect.php');


if(!empty($_GET['uid']) && $_SERVER['REQUEST_METHOD']=='GET'){
  if((int)$_GET['uid']){
      $userId=$_GET['uid'];

      $fetUser="SELECT * FROM tbl_users WHERE id=".$userId;
      $userResult=mysqli_query($conn,$fetUser);
      $userData=mysqli_fetch_assoc($userResult);
      $userImage=$userData['image'];
      $imagePath = imagePath('images').$userImage;
      if(file_exists($imagePath) && is_file($imagePath)){
          unlink($imagePath);
      }
      $query="DELETE FROM tbl_users WHERE id=".$userId;
      $result=mysqli_query($conn,$query);
      if($result==true){
          $_SESSION['success']="user was deleted";
          to('index');

      }else{
          $_SESSION['error']="user was not deleted";
          to('index');
      }





  }else{
      $_SESSION['error']="id required integer";
      to('index');

  }
}else{
    $_SESSION['error']='invalid access';
    to('index');
}

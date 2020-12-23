<?php
require_once('connection.php');
require_once('header.php');
$query = "SELECT * FROM tbl_users ORDER BY id DESC";
$result = mysqli_query($conn, $query);
if(isset($_POST['search'])){
    $searchBy=$_POST['searchBy'];
    $query = "SELECT * FROM tbl_users WHERE name LIKE '%$searchBy%' OR email LIKE '%$searchBy%' OR gender LIKE '$searchBy%' ";
    $result = mysqli_query($conn, $query);
}
?>

    <h1><i class="glyphicon glyphicon-eye-open"></i> Views Users</h1>
    <hr>
    <div class="col-md-12">
        <form action="" method="post">
            <div class="form-group">
                <input type="search" name="searchBy" placeholder="search">
                <button name="search">Search</button>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <tr>
            <th>s.n</th>
            <th>name</th>
            <th>email</th>
            <th>gender</th>
            <th>language</th>
            <th>country</th>
            <th>image</th>
            <th>action</th>
        </tr>
        <?php foreach ($result as $key => $value) : ?>

            <tr>
                <td><?= ++$key ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['gender'] ?></td>
                <td><?= $value['language'] ?></td>
                <td><?= $value['country'] ?></td>
                <td><img src="http://localhost/php10amcrud/images/<?= $value['image'] ?>" alt="image not found"
                         width="30"></td>
                <td>
                    <a href="edit.php?uid=<?=$value['id']?>" onclick="return confirm('are you sure edit')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> edit</a>
                    <a href="delete.php?uid=<?=$value['id']?>" onclick="return confirm('are you sure delete')" class="btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"></i> delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>
    <a href="index.php" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-home"></i> Go to add user</a>


<?php require_once 'footer.php' ?>


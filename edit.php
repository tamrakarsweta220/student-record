<?php
// call connection
require_once('connection.php');
// call redirect function
require_once('redirect.php');


if (!empty($_GET['uid']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    if ((int)$_GET['uid']) {
        $userId = $_GET['uid'];
        $query = "SELECT * FROM tbl_users WHERE id=" . $userId;
        $result = mysqli_query($conn, $query);
        $userData = mysqli_fetch_assoc($result);
        $languageData=explode(',',$userData['language']);


    } else {
        $_SESSION['error'] = "id required integer";
        to('index');

    }
} else {
    $_SESSION['error'] = 'invalid access';
    to('index');
}

?>

<?php require_once('header.php') ?>

    <div class="col-md-12">
        <h1><i class="glyphicon glyphicon-edit"></i> Edit User</h1>
        <hr>
        <div class="col-md-8">
            <form action="editAction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="userId" value="<?=$userData['id']?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?=$userData['name']?>" required class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?=$userData['email']?>"  class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="location">Country</label>
                    <select name="country" id="location" class="form-control">
                        <option value="nepal" <?=$userData['country']=='nepal' ? 'selected' : ' ' ?> >Nepal</option>
                        <option value="china" <?=$userData['country']=='china' ? 'selected' : ' ' ?> >China</option>
                        <option value="bhutan" <?=$userData['country']=='bhutan' ? 'selected' : ' ' ?> >Bhutan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gen">Gender</label>
                    <input type="radio" name="gender" <?=$userData['gender']=='male' ? 'checked' : '' ?> value="male"> Male
                    <input type="radio" name="gender" <?=$userData['gender']=='female' ? 'checked' : '' ?>  value="female"> Female

                </div>

                <div class="form-group">
                    <label for="lang">Language</label> <br> &ensp;&ensp;
                    <input type="checkbox" name="lang[]" <?=in_array('english',$languageData) ? 'checked': '' ?> value="english"> English
                    <input type="checkbox" name="lang[]" value="nepali" <?=in_array('nepali',$languageData) ? 'checked': '' ?> > Nepali
                    <input type="checkbox" name="lang[]" value="chinese" <?=in_array('chinese',$languageData) ? 'checked': '' ?> > Chinese
                </div>
                <div class="form-group">
                    <label for="image">Profile Picture</label>
                    <input type="file" name="upload" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="description" class="form-control" id="desc">
                        <?=$userData['description']?>
                    </textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit Record</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <img src="http://localhost/php10amcrud/images/<?= $userData['image'] ?>"  alt="image not found"
               style="margin-top: 30px" class="img-responsive thumbnail">
        </div>
    </div>





<?php require_once('footer.php') ?>

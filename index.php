<?php
require_once('connection.php');
require_once('header.php');
?>

    <h1><i class="glyphicon glyphicon-user"></i> Student Record</h1>
    <hr>


<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
<?php endif ?>


    <form action="insert.php" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" required class="form-control" id="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="location">Country</label>
                <select name="country" id="location" class="form-control">
                    <option value="nepal">Nepal</option>
                    <option value="china">China</option>
                    <option value="bhutan">Bhutan</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="gen">Gender</label>
                <input type="radio" name="gender" value="male" > Male
                <input type="radio" name="gender" value="female" > Female

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="lang">Language</label> <br> &ensp;&ensp;
                <input type="checkbox" name="lang[]" value="english"> English
                <input type="checkbox" name="lang[]" value="nepali"> Nepali
                <input type="checkbox" name="lang[]" value="chinese"> Chinese
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="image">Profile Picture</label>
                <input type="file" name="upload" class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="description" class="form-control" id="desc"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Record</button>


    </form>

    <a href="viewUsers.php" class="btn btn-info pull-right">Go to View Users</a>
    </div>
    </div>
<?php require_once 'footer.php' ?>
<?php include('header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="code.php" method="POST">
                <div class="form-group">
                    <input type="text" name="userName" class="form-control" placeholder="Enter Username">
                </div>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                </div>

                <div class="form-group">
                    <input type="text" name="phoneno" class="form-control" placeholder="Enter PhoneNumber">
                </div>

                <div class="form-group">
                    <input type="text" name="pass" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <button type="submit" name="save_push_data" >Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
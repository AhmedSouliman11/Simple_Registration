<?php include('inc/header.php'); ?>
<?php if(isset($_SESSION['user_name'])): ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-4 border my-5 p-2">Change Password</h1>
        </div>
        <div class="col-sm-6 mx-auto">
            <div class="border p-5 my-3">
                <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger text-center"><?php echo $_SESSION['error']; ?></div>
                <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="handler/change-password.php" method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control" name="old_password" placeholder="You Old Password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="new_password" placeholder="You New Password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" name="submit" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="alert alert-danger text-center"> Data Not Found </div>
    <?php endif; ?>
<?php include('inc/footer.php'); ?>
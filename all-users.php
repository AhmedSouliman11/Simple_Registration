<?php include('inc/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-4 border my-5 p-2">All Users</h1>
        </div>
        <div class="col-sm-10 mx-auto">
            <div class="border my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">Name</td>
                            <td scope="col">Email</td>
                            <td scope="col">Mobile</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'classes/user.php';  $i = 1 ; ?>
                        <?php foreach(User::getAllUsers() as $row ): ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ;?></th>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->mobile; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>
<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Edit Register</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Registered
                    <a href="view-register.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $userId = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id='$userId'";
                            $query_run = mysqli_query($dbcon, $users);

                            if(mysqli_num_rows($query_run) > 0 )
                            {
                                foreach($query_run as $users)
                                {
                                ?>
                                
                    <form action="code.php" method="POST">
                        <input type="hidden" name="userId" value="<?=$users['id'];?>"/>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" value="<?=$users['fname'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" value="<?=$users['lname'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?=$users['email'];?>" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" value="<?=$users['password'];?>" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Role</label>
                                <select name="role" required class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="1" <?= $users['role'] == '1' ? 'selected':''?>>Admin</option>
                                    <option value="0" <?= $users['role'] == '0' ? 'selected':''?>>User</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" <?= $users['status'] == '1' ? 'checked':''?> width="70px" height="70px">
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" name="update_btn" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </form>

                    <?php
                                }
                            }
                            else
                            {
                               ?>
                               <h4>No records found</h4>
                               <?php 
                            }
                        }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
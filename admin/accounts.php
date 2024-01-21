<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accounts</title>
    <?php include_once('assets/components/all-styles.php'); ?>
</head>

<body>

    <div class="main-wrapper">
        
        <?php include_once('assets/components/header.php'); ?>
        <?php include_once('assets/components/sidebar.php'); ?>   

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Accounts</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Account</a></li>
                                    <li class="breadcrumb-item active">All Accounts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserAccModal"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Account Modal -->
                                <div class="modal fade" id="addUserAccModal" tabindex="-1" aria-labelledby="addUserAccModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-primary">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="fas fa-plus"></i>
                                                <h2 class="headline-md">Add Account</h2>
                                            </div>

                                            <form method="post" id="addUserAccForm" class="needs-validation" novalidate>

                                                <?php
                                                    $getUId = $functionClass->checkUserAccounts();
                                                    if (!empty($checkUserAccounts)) {
                                                        $latestUId = end($checkUserAccounts);
                                                        $getLatestUId = sprintf("UID-%03d", $latestUId + 1);
                                                    } else {
                                                        $getLatestUId = "UID-001";
                                                    }                                                
                                                ?>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addUserId" name="addUserId" type="text" value="<?php echo $getLatestUId ?? ""; ?>" placeholder="MID-001" readonly />
                                                                <label class="label-blue" for="addUserId"><i class="fa-solid fa-envelope"></i>User ID<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addUserFName" name="addUserFName" type="text" placeholder="Juan" required />
                                                                <label class="label-blue" for="addUserFName"><i class="fa-solid fa-envelope"></i>First Name<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addUserLName" name="addUserLName" type="text" placeholder="Dela Cruz" required />
                                                                <label class="label-blue" for="addUserLName"><i class="fa-solid fa-envelope"></i>Last Name<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addUserEmail" name="addUserEmail" type="text" placeholder="test@email.com" required />
                                                                <label class="label-blue" for="Email"><i class="fa-solid fa-envelope"></i>Email<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating password-input-field">
                                                                <input class="form-control" id="addUserPass" name="addUserPass" type="password" placeholder="12345" required />
                                                                <i class="fa-solid fa-eye show-hide-password-icon"></i>
                                                                <label class="label-blue" for="addUserPass"><i class="fa-solid fa-envelope"></i>Password<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating password-c-input-field">
                                                                <input class="form-control" id="addUserPassC" name="addUserPassC" type="password" placeholder="12345" required />
                                                                <i class="fa-solid fa-eye show-hide-password-icon"></i>
                                                                <label class="label-blue" for="addUserPassC"><i class="fa-solid fa-envelope"></i>Confirm Password<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <select class="form-control select-option-field" id="addUserType" name="addUserType" type="text" placeholder="User" required>
                                                                    <option value="User">User</option>
                                                                    <option value="Administrator">Administrator</option>
                                                                </select>
                                                                <label class="label-blue" for="addUserType"><i class="fa-solid fa-envelope"></i>User Type<span class="text-danger">*</span></label>
                                                                
                                                                <i class="fa-solid fa-sort-down select-option-icon position-absolute top-50 end-0 me-3 translate-middle-y"></i>
                                                                
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-primary">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnAddUserAcc" name="btnAddUserAcc">Submit <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Add Account Modal -->

                                <!-- Edit Account Modal -->
                                <div class="modal fade" id="updateAccModal" tabindex="-1" aria-labelledby="updateAccModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-warning">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update User Accounts</h2>
                                            </div>

                                            <form method="post" id="updateUserAccForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updateUserUId" name="updateUserUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateUserId" name="updateUserId" type="text" placeholder="UID-001" readonly />
                                                                <label class="label-blue" for="updateUserId"><i class="fa-solid fa-envelope"></i>User ID<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateUserFName" name="updateUserFName" type="text" placeholder="Juan" required />
                                                                <label class="label-blue" for="updateUserFName"><i class="fa-solid fa-envelope"></i>First Name<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateUserLName" name="updateUserLName" type="text" placeholder="Dela Cruz" required />
                                                                <label class="label-blue" for="updateUserLName"><i class="fa-solid fa-envelope"></i>Last Name<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateUserEmail" name="updateUserEmail" type="text" placeholder="test@email.com" required />
                                                                <label class="label-blue" for="Email"><i class="fa-solid fa-envelope"></i>Email<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <select class="form-control select-option-field" id="updateUserType" name="updateUserType" type="text" placeholder="User" required>
                                                                    <option value="User">User</option>
                                                                    <option value="Administrator">Administrator</option>
                                                                </select>
                                                                <label class="label-blue" for="updateUserType"><i class="fa-solid fa-envelope"></i>User Type<span class="text-danger">*</span></label>
                                                                
                                                                <i class="fa-solid fa-sort-down select-option-icon position-absolute top-50 end-0 me-3 translate-middle-y"></i>
                                                                
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-warning">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdateUserAcc" name="btnUpdateUserAcc">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Account Modal -->

                                <!-- Edit Account Password Modal -->
                                <div class="modal fade" id="updatePassModal" tabindex="-1" aria-labelledby="updateAccModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-success">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update User Pass</h2>
                                            </div>

                                            <form method="post" id="updateUserPassForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updateUserPassUId" name="updateUserPassUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateUserPassId" name="updateUserPassId" type="text" placeholder="UID-001" readonly />
                                                                <label class="label-blue" for="updateUserPassId"><i class="fa-solid fa-envelope"></i>User ID<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input class="form-control" id="currentUserPPass" name="currentUserPPass" type="text" placeholder="12345" />

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating password-input-field">
                                                                <input class="form-control" id="updateUserPPass" name="updateUserPPass" type="password" placeholder="12345" />
                                                                <i class="fa-solid fa-eye show-hide-password-icon"></i>
                                                                <label class="label-blue" for="updateUserPPass"><i class="fa-solid fa-envelope"></i>Password<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating password-c-input-field">
                                                                <input class="form-control" id="updateUserPPassC" name="updateUserPPassC" type="password" placeholder="12345" />
                                                                <i class="fa-solid fa-eye show-hide-password-icon"></i>
                                                                <label class="label-blue" for="updateUserPPassC"><i class="fa-solid fa-envelope"></i>Confirm Password<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-warning">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdateUserPass" name="btnUpdateUserPass">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Account Password Modal -->

                                <!-- Delete Account Modal -->
                                <?php $functionClass->deleteUserAccount(); ?>
                                <div class="modal fade" id="deleteAccModal" tabindex="-1" aria-labelledby="deleteAccModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-trash"></i>
                                                <h2 class="headline-md">Archive User Accounts</h2>
                                            </div>

                                            <form method="post" id="deleteUserAccForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="deleteUserUId" name="deleteUserUId">
                                                        <input type="text" id="deleteUserId" name="deleteUserId">
                                                        
                                                        <div class="text-center mb-2">
                                                            <h4>Are you sure you want to archive Account Name: <strong><span id="deleteUserName" class="text-danger"></span></strong>?</h4>
                                                        </div> 

                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-danger">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnDeleteUserAcc" name="btnDeleteUserAcc">Archive <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Delete Account Modal -->

                                <div class="table-responsive">
                                    <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="userAccountsTable">
                                        <thead class="table-head">
                                            <tr>
                                                <th>User ID</th>
                                                <th>User UID</th>
                                                <th>User Type</th>
                                                <th>F Name</th>
                                                <th>L Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Date Created</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <p>Copyright © 2022 J.F. Rubber</p>
            </footer>
        </div>
    </div>

    <?php include_once('assets/components/all-scripts.php'); ?>   
    
    <!-- Add User Account JS Function -->
    <script src="../includes/jsFunction/user-account-add.js"></script>
    <!-- Edit User Account JS Function -->
    <script src="../includes/jsFunction/user-account-edit.js"></script>
    <!-- Edit User Password JS Function -->
    <script src="../includes/jsFunction/user-account-password-edit.js"></script>

    <!-- Get User Accounts JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO User Accounts Table
            var userAccountsTable = $('#userAccountsTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/user-accounts-get.php',
                "columns": [
                    {data: "userId"},
                    {data: "userUId"},
                    {data: "userType"},
                    {data: "userFirstName"},
                    {data: "userLastName"},
                    {data: "userEmail"},
                    {data: "userPassword"},
                    {data: "userDateCreated"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                userAccountsTable.ajax.reload( null, false );
            }, 3000 );


            userAccountsTable.on('click', '.updateUA', function() {
                $('#updateAccModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateUserId').val(data[0]);   
                $('#updateUserUId').val(data[1]);   
                $('#updateUserType').val(data[2]);   
                $('#updateUserFName').val(data[3]);   
                $('#updateUserLName').val(data[4]);   
                $('#updateUserEmail').val(data[5]);   
                $('#currentUserPass').val(data[6]);
            });

            userAccountsTable.on('click', '.updateUP', function() {
                $('#updatePassModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateUserPassId').val(data[0]);   
                $('#updateUserPassUId').val(data[1]);
                $('#currentUserPPass').val(data[6]);
            });

            userAccountsTable.on('click', '.deleteUA', function() {
                $('#deleteAccModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deleteUserId').val(data[0]);   
                $('#deleteUserUId').val(data[1]);
                $('#deleteUserName').text(data[3] + " " + data[4]);
            });
        });
    </script>
</body>

</html>
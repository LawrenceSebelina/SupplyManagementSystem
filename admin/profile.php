<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
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
                                <h3 class="page-title">Profile</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Profile</a></li>
                                    <li class="breadcrumb-item active">My Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table comman-shadow">
                            <div class="card-body">

                                <?php $functionClass->updateProfile(); ?>
                                <form method="post" id="addPOLForm" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card comman-shadow">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-0" id="alertMessage"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card comman-shadow">
                                                <div class="card-body">
                                                
                                                    <div class="page-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h3 class="page-title">Update Profile Information</h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row gy-4">

                                                        <input type="text" id="updateUserUId" name="updateUserUId" value="<?php echo $userUId ?? "" ?>">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateUserId" name="updateUserId" type="text" value="<?php echo $userId ?? "" ?>" placeholder="UID-001" readonly />
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
                                                                <input class="form-control" id="updateUserFName" name="updateUserFName" type="text" value="<?php echo $userFirstName ?? "" ?>" placeholder="Juan" required />
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
                                                                <input class="form-control" id="updateUserLName" name="updateUserLName" type="text" value="<?php echo $userLastName ?? "" ?>" placeholder="Dela Cruz" required />
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
                                                                <input class="form-control" id="updateUserEmail" name="updateUserEmail" type="text" value="<?php echo $userEmail ?? "" ?>" placeholder="test@email.com" required />
                                                                <label class="label-blue" for="Email"><i class="fa-solid fa-envelope"></i>Email<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input class="form-control" id="currentUserPass" name="currentUserPass" type="text" value="<?php echo $userPassword ?? "" ?>" placeholder="12345" />

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating password-input-field">
                                                                <input class="form-control" id="updateUserPass" name="updateUserPass" type="password" placeholder="12345" />
                                                                <i class="fa-solid fa-eye show-hide-password-icon"></i>
                                                                <label class="label-blue" for="updateUserPass"><i class="fa-solid fa-envelope"></i>Password<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateUserPassC" name="updateUserPassC" type="password" placeholder="12345" />
                                                                <i class="fa-solid fa-eye show-hide-password-icon"></i>
                                                                <label class="label-blue" for="updateUserPassC"><i class="fa-solid fa-envelope"></i>Confirm Password<span class="text-danger">*</span></label>

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
                                                                    <option value="<?php echo $userType ?? "" ?>"  selected><?php echo $userType ?? "" ?></option>
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

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card comman-shadow">
                                                                <div class="card-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-12">
                                                                            <div class="text-end">
                                                                                <button type="submit" class="btn btn-primary me-2" id="btnUpdateProfile" name="btnUpdateProfile">Submit <i class="fas fa-download"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Raw Materials</title>
    <?php include_once('assets/components/all-styles.php'); ?>
</head>

<body>

    <div class="main-wrapper">
        
        <?php include_once('assets/components/header.php'); ?>
        <?php include_once('assets/components/sidebar.php'); ?>   

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Add Raw Material</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Raw Material</a></li>
                                    <li class="breadcrumb-item active">Add Raw Materials</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">
                                <form method="post" id="loginForm" class="needs-validation" novalidate>
                                    <div class="row gy-4">
                                        <div class="col-12">
                                            <h5 class="form-title raw-material-info">Raw Material Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-floating">
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                                <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Material ID<span class="text-danger">*</span></label>

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
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                                <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Material Name<span class="text-danger">*</span></label>

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
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                                <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                                <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                                <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                                <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-12">
                                            <div class="raw-material-submit">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
                <p>Copyright © 2022 Dreamguys.</p>
            </footer>
        </div>
    </div>

    <?php include_once('assets/components/all-scripts.php'); ?>   
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Raw Materials</title>
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
                                <h3 class="page-title">Edit Raw Material</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Raw Material</a></li>
                                    <li class="breadcrumb-item active">Edit Raw Materials</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card comman-shadow">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title raw-material-info">Raw Material Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="John Doe">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="Stephen">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender <span class="login-danger">*</span></label>
                                                <select class="form-control select">
                                                <option>Select Gender</option>
                                                <option>Female</option>
                                                <option>Male</option>
                                                <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Date Of Birth <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Roll </label>
                                                <input class="form-control" type="text" value="12450687">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Blood Group <span class="login-danger">*</span></label>
                                                <select class="form-control select">
                                                <option>Please Select Group </option>
                                                <option>B+</option>
                                                <option>A+</option>
                                                <option>O+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Religion <span class="login-danger">*</span></label>
                                                <select class="form-control select">
                                                    <option>Please Select Religion </option>
                                                    <option>Hindu</option>
                                                    <option>Christian</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>E-Mail <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="example@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Class <span class="login-danger">*</span></label>
                                                <select class="form-control select">
                                                    <option>Please Select Class </option>
                                                    <option>12</option>
                                                    <option>11</option>
                                                    <option>10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Section <span class="login-danger">*</span></label>
                                                <select class="form-control select">
                                                <option>Please Select Section </option>
                                                <option>B</option>
                                                <option>A</option>
                                                <option>C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Admission ID </label>
                                                <input class="form-control" type="text" value="1426539">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Phone </label>
                                                <input class="form-control" type="text" value="+1 888 888 8888">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group raw-materials-up-files">
                                                <label>Upload Student Photo (150px X 150px)</label>
                                                <div class="uplod">
                                                    <label class="file-upload image-upbtn mb-0">
                                                    Choose File <input type="file">
                                                    </label>
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
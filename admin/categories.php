<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories</title>
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
                                <h3 class="page-title">Categories</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Category</a></li>
                                    <li class="breadcrumb-item active">All Categories</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="student-group-form">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by ID ...">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Name ...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Phone ...">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="btn" class="btn btn-primary">Search</button>
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
                                        <div class="col">
                                            <h3 class="page-title">Categories</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                            <a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                            <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                            <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCatModal"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Category Modal -->
                                <div class="modal fade" id="addCatModal" tabindex="-1" aria-labelledby="addCatModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-primary">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="fas fa-plus"></i>
                                                <h2 class="headline-md">Add Category</h2>
                                            </div>

                                            <form method="post" id="addCatForm" class="needs-validation" novalidate>

                                                <?php
                                                    $getCatCId = $functionClass->getCatCId();
                                                    if (!empty($getCatCId)) {
                                                        $latestCatCId = end($getCatCId);
                                                        $getLatestCatCId = sprintf("CAT-%03d", $latestCatCId + 1);
                                                    } else {
                                                        $getLatestCatCId = "CAT-001";
                                                    }                                                
                                                ?>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addCatCId" name="addCatCId" type="text" value="<?php echo $getLatestCatCId ?? ""; ?>" placeholder="CAT-001" readonly />
                                                                <label class="label-blue" for="addCatCId"><i class="fa-solid fa-envelope"></i>Category ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addCatCN" name="addCatCN" type="text" placeholder="Filter/Harder" required />
                                                                <label class="label-blue" for="addCatCN"><i class="fa-solid fa-envelope"></i>Category Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addCatDesc" name="addCatDesc" type="text" placeholder="Description..." required />
                                                                <label class="label-blue" for="addCatDesc"><i class="fa-solid fa-envelope"></i>Category Description<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnAddCat" name="btnAddCat">Submit <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Add Category Modal -->

                                <!-- Edit Category Modal -->
                                <div class="modal fade" id="updateCatModal" tabindex="-1" aria-labelledby="updateCatModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-warning">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update Category</h2>
                                            </div>

                                            <form method="post" id="updateCatForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updateCatCUId" name="updateCatCUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateCatCId" name="updateCatCId" type="text" placeholder="CAT-001" readonly />
                                                                <label class="label-blue" for="updateCatCId"><i class="fa-solid fa-envelope"></i>Category ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateCatCN" name="updateCatCN" type="text" placeholder="Filter/Harder" required />
                                                                <label class="label-blue" for="updateCatCN"><i class="fa-solid fa-envelope"></i>Category Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateCatDesc" name="updateCatDesc" type="text" placeholder="Description..." required />
                                                                <label class="label-blue" for="updateCatDesc"><i class="fa-solid fa-envelope"></i>Category Description<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdateCat" name="btnUpdateCat">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Category Modal -->

                                <!-- Delete Category Modal -->
                                <?php $functionClass->deleteCat(); ?>
                                <div class="modal fade" id="deleteCatModal" tabindex="-1" aria-labelledby="deleteCatModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-trash"></i>
                                                <h2 class="headline-md">Archive Category</h2>
                                            </div>

                                            <form method="post" id="deleteCatForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="deleteCatCUId" name="deleteCatCUId">
                                                        <input type="text" id="deleteCatCId" name="deleteCatCId">
                                                        
                                                        <div class="text-center mb-2">
                                                            <h4>Are you sure you want to archive Category Name: <strong><span id="deleteCatCN" class="text-danger"></span></strong>?</h4>
                                                        </div> 

                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-danger">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnDeleteCat" name="btnDeleteCat">Archive <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Delete Category Modal -->

                                <div class="table-responsive">
                                    <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="categoriesTable">
                                        <thead class="table-head">
                                            <tr>
                                                <th>Category ID</th>
                                                <th>Category UID</th>
                                                <th>Category Name</th>
                                                <th>Category Desc</th>
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
    
    <!-- Add Category JS Function -->
    <script src="../includes/jsFunction/category-add.js"></script>
    <!-- Edit Category JS Function -->
    <script src="../includes/jsFunction/category-edit.js"></script>


    <!-- Get Categories JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO Categories Table
            var categoriesTable = $('#categoriesTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/category-get.php',
                "columns": [
                    {data: "categoryId"},
                    {data: "categoryUId"},
                    {data: "categoryName"},
                    {data: "categoryDesc"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                categoriesTable.ajax.reload( null, false );
            }, 3000 );


            categoriesTable.on('click', '.updateCat', function() {
                $('#updateCatModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateCatCId').val(data[0]);   
                $('#updateCatCUId').val(data[1]);   
                $('#updateCatCN').val(data[2]);   
                $('#updateCatDesc').val(data[3]);  
            });

            categoriesTable.on('click', '.deleteCat', function() {
                $('#deleteCatModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deleteCatCId').val(data[0]);   
                $('#deleteCatCUId').val(data[1]);
                $('#deleteCatCN').text(data[2]);
            });
        });
    </script>
</body>

</html>
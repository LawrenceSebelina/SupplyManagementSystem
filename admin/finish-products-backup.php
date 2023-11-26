<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Finish Products</title>
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
                                <h3 class="page-title">Finish Products</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Finish Product</a></li>
                                    <li class="breadcrumb-item active">All Finish Products</li>
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
                                            <h3 class="page-title">Finish Products</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                            <a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                            <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                            <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFPModal"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Finish Product Modal -->
                                <div class="modal fade" id="addFPModal" tabindex="-1" aria-labelledby="addFPModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-primary">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="fas fa-plus"></i>
                                                <h2 class="headline-md">Add Finish Product</h2>
                                            </div>

                                            <form method="post" id="addFPForm" class="needs-validation" novalidate>

                                                <?php
                                                    $getFinishProdPId = $functionClass->getFinishProdPId();
                                                    date_default_timezone_set('Asia/Manila');
                                                    $getFinishProdCurrentDate = date("Y-m-d");
                                                    if (!empty($getFinishProdPId)) {
                                                        $latestFinishProdPId = end($getFinishProdPId);
                                                        $getLatestFinishProdPId = sprintf("PROD-%03d", $latestFinishProdPId + 1);
                                                    } else {
                                                        $getLatestFinishProdPId = "PROD-001";
                                                    }                                                
                                                ?>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addFPPId" name="addFPPId" type="text" value="<?php echo $getLatestFinishProdPId ?? ""; ?>" placeholder="PROD-001" readonly />
                                                                <label class="label-blue" for="addFPPId"><i class="fa-solid fa-envelope"></i>Product ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addFPPN" name="addFPPN" type="text" placeholder="Base Pads" required />
                                                                <label class="label-blue" for="addFPPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addFPQty" name="addFPQty" type="text" placeholder="Total Quantity" required />
                                                                <label class="label-blue" for="addFPQty"><i class="fa-solid fa-envelope"></i>Total Quantity<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addFPDate" name="addFPDate" type="date" value="<?php echo $getFinishProdCurrentDate ?? "" ?>"  placeholder="Total Quantity" required />
                                                                <label class="label-blue" for="addFPDate"><i class="fa-solid fa-envelope"></i>Finished Product Date<span class="text-danger">*</span></label>

                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Please select a valid state.
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger my-4" id="alertMessage">Raw Materials</div>
                                                        </div>

                                                        <div class="page-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto text-end float-end ms-auto download-grp">
                                                                     <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchRMModal"><i class="fas fa-plus me-2"></i>Search For Existing Raw Materials</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="orderDeliveriesTable">
                                                                <thead class="table-head">
                                                                    <tr>
                                                                        <th>Order ID</th>
                                                                        <th>Order UID</th>
                                                                        <th>Order No</th>
                                                                        <th>Supplier</th>
                                                                        <th>Total Order</th>
                                                                        <th>Order Date</th>
                                                                        <th class="text-end">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                    <!-- Search Existing Raw Materials Modal -->
                                                    <div class="modal fade" id="searchRMModal" tabindex="-1" aria-labelledby="searchRMModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal-primary">
                                                                    <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                                    <i class="fas fa-plus"></i>
                                                                    <h2 class="headline-md">Search Existing Raw Materials</h2>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <div class="row gy-4">
                                                                        <div class="table-responsive">
                                                                            <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="rawMaterialsTable">
                                                                                <thead class="table-head">
                                                                                    <tr>
                                                                                        <th>Material ID</th>
                                                                                        <th>Material UID</th>
                                                                                        <th>Material Name</th>
                                                                                        <th>Category</th>
                                                                                        <th>Unit</th>
                                                                                        <th>Quantity</th>
                                                                                        <th>Supplier</th>
                                                                                        <th class="text-end">Actions</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="modal-footer modal-primary">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End of Search Existing Raw Materials Modal -->
                                                   
                                                </div>

                                                <div class="modal-footer modal-primary">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnAddFP" name="btnAddFP">Submit <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Add Finish Product Modal -->

                                <!-- Edit Finish Product Modal -->
                                <div class="modal fade" id="updateFPModal" tabindex="-1" aria-labelledby="updateFPModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-warning">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update Finish Product</h2>
                                            </div>

                                            <form method="post" id="updateFPForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updateFPPUId" name="updateFPPUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateFPPId" name="updateFPPId" type="text" placeholder="PROD-001" readonly />
                                                                <label class="label-blue" for="updateFPPId"><i class="fa-solid fa-envelope"></i>Product ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateFPPN" name="updateFPPN" type="text" placeholder="Base Pads" required />
                                                                <label class="label-blue" for="updateFPPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateFPQty" name="updateFPQty" type="text" placeholder="Total Quantity" required />
                                                                <label class="label-blue" for="updateFPQty"><i class="fa-solid fa-envelope"></i>Total Quantity<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateFPDate" name="updateFPDate" type="date" value="<?php echo $getFinishProdCurrentDate ?? "" ?>"  placeholder="Total Quantity" required />
                                                                <label class="label-blue" for="updateFPDate"><i class="fa-solid fa-envelope"></i>Finished Product Date<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdateFP" name="btnUpdateFP">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Finish Product Modal -->

                                <!-- Delete Finish Product Modal -->
                                <?php $functionClass->deleteFinishProd(); ?>
                                <div class="modal fade" id="deleteFPModal" tabindex="-1" aria-labelledby="deleteFPModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-trash"></i>
                                                <h2 class="headline-md">Archive Finish Product</h2>
                                            </div>

                                            <form method="post" id="deleteFPForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="deleteFPPUId" name="deleteFPPUId">
                                                        <input type="text" id="deleteFPPId" name="deleteFPPId">
                                                        
                                                        <div class="text-center mb-2">
                                                            <h4>Are you sure you want to archive Finish Product Name: <strong><span id="deleteFPPN" class="text-danger"></span></strong>?</h4>
                                                        </div> 

                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-danger">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnDeleteFP" name="btnDeleteFP">Archive <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Delete Finish Product Modal -->

                                <div class="table-responsive">
                                    <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="finishProdTable">
                                        <thead class="table-head">
                                            <tr>
                                                <th>Finish Prod ID</th>
                                                <th>Finish Prod UID</th>
                                                <th>Finish Prod Name</th>
                                                <th>Finish Prod Quantity</th>
                                                <th>Date</th>
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
    
    <!-- Add Finish Product JS Function -->
    <script src="../includes/jsFunction/finish-product-add.js"></script>
    <!-- Edit Finish Product JS Function -->
    <script src="../includes/jsFunction/finish-product-edit.js"></script>


    <!-- Get Finish Products JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO Finish Products Table
            var finishProdTable = $('#finishProdTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/finish-product-get.php',
                "columns": [
                    {data: "finishProdId"},
                    {data: "finishProdUId"},
                    {data: "finishProdName"},
                    {data: "finishProdTotal"},
                    {data: "finishProdDateFinished"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                finishProdTable.ajax.reload( null, false );
            }, 3000 );


            finishProdTable.on('click', '.updateFP', function() {
                $('#updateFPModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateFPPId').val(data[0]);   
                $('#updateFPPUId').val(data[1]);   
                $('#updateFPPN').val(data[2]);   
                $('#updateFPQty').val(data[3]);   
            });

            finishProdTable.on('click', '.deleteFP', function() {
                $('#deleteFPModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deleteFPPId').val(data[0]);   
                $('#deleteFPPUId').val(data[1]);
                $('#deleteFPPN').text(data[2]);
            });
        });
    </script>
</body>

</html>
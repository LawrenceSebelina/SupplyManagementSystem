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

        <?php 
            if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "finish-products" && isset($_GET['finish-product']) && !empty($_GET['finish-product'])) {  
        ?>

            <?php
                $finishProductUId = $_GET['finish-product'];
                $finishProductDetails = $functionClass->getFinishPRoductByFPUID($finishProductUId);

                if (!empty($finishProductDetails)) {
                    foreach ($finishProductDetails as $finishProductDetail) {
                        $finishProductId = $finishProductDetail['finishProdId'];
                        $finishProductName = $finishProductDetail['finishProdName'];
                    }
                }
                
            ?>

            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-sub-header">
                                    <h3 class="page-title"><?php echo $finishProductId ?? ""; ?></h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="students.html">Finish Product</a></li>
                                        <li class="breadcrumb-item">All Finish Product</li>
                                        <li class="breadcrumb-item active"><?php echo $finishProductId ?? "" ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <form method="post" id="addODLForm" class="needs-validation" novalidate> -->
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
                                                <h3 class="page-title">Order Details</h3>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row gy-4">

                                            <div class="col-12 col-sm-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="viewFPPId" name="viewFPPId" type="text" value="<?php echo $finishProductId ?? ""; ?>" placeholder="PROD-001" readonly />
                                                    <label class="label-blue" for="viewFPPId"><i class="fa-solid fa-envelope"></i>Product ID<span class="text-danger">*</span></label>

                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="viewFPPN" name="viewFPPN" type="text" value="<?php echo $finishProductName ?? ""; ?>" placeholder="Base Pads" readonly />
                                                    <label class="label-blue" for="viewFPPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card comman-shadow">

                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="viewRawMaterialsOrdersTable">
                                                <thead class="table-head">
                                                    <tr>
                                                        <th>Material ID</th>
                                                        <th>Material UID</th>
                                                        <th>Material Name</th>
                                                        <th>Category</th>
                                                        <th>Unit</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if (!empty($finishProductDetails)) {
                                                            foreach ($finishProductDetails as $finishProductDetail) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $finishProductDetail['materialId'] ?? "" ?></td>
                                                            <td><?php echo $finishProductDetail['materialUId'] ?? "" ?></td>
                                                            <td><?php echo $finishProductDetail['materialName'] ?? "" ?></td>
                                                            <td><?php echo $finishProductDetail['materialCategory'] ?? "" ?></td>
                                                            <td><?php echo $finishProductDetail['materialUnit'] ?? "" ?></td>
                                                            <td><?php echo $finishProductDetail['finishProdMaterialQty'] ?? "" ?></td>
                                                        </tr>
                                                    <?php
                                                        }
                                                            } 
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <!-- </form> -->
                </div>

                <footer>
                    <p>Copyright © 2022 J.F. Rubber</p>
                </footer>
            </div>

            <?php include_once('assets/components/all-scripts.php'); ?> 

        <?php 
          } else if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "finish-products" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-finish-product") {  
        ?>

            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-sub-header">
                                    <h3 class="page-title">Add Finish Product</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="students.html">Finish Product</a></li>
                                        <li class="breadcrumb-item">All Finish Products</li>
                                        <li class="breadcrumb-item active">Add Finish Product</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" id="addFPLForm" class="needs-validation" novalidate>
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
                                                <h3 class="page-title">Finish Product Details Details</h3>
                                            </div>
                                        </div>
                                    </div>

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

                                        <div class="row gy-4">

                                            <div class="col-12 col-sm-6">
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

                                            <div class="col-12 col-sm-6">
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
                                                    <h3 class="page-title">Raw Material Lists</h3>
                                                </div>
                                                <div class="col-auto text-end float-end ms-auto download-grp">
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchRMModal"><i class="fas fa-plus me-2"></i>Search For Existing Raw Materials</a>
                                                </div>
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

                                        <!-- Add Material Quantity Modal -->
                                        <div class="modal fade" id="addRMODQModal" tabindex="-1" aria-labelledby="addRMODQModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-primary">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="fas fa-plus"></i>
                                                        <h2 class="headline-md">Add Raw Materials</h2>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            <div class="col-12">
                                                                <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                            </div>

                                                            <div class="col-12 col-sm-4">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="addRMQty" name="addRMQty" type="text" value="1" placeholder="1" />
                                                                    <label class="label-blue" for="addRMQty"><i class="fa-solid fa-envelope"></i>Raw Material Quantity<span class="text-danger">*</span></label>

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
                                                        <button type="button" class="btn btn-primary me-2" id="btnAddRMODQ" name="btnAddRMODQ">Submit <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Add Material Quantity Modal -->

                                        <!-- Update Material Modal -->
                                        <div class="modal fade" id="updateRMODQModal" tabindex="-1" aria-labelledby="updateRMODQModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-primary">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="fas fa-plus"></i>
                                                        <h2 class="headline-md">Update Raw Material Quantity</h2>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            <div class="col-12">
                                                                <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                            </div>

                                                            <div class="col-12 col-sm-4">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="updateRMQty" name="updateRMQty" type="text" value="1" placeholder="1" />
                                                                    <label class="label-blue" for="updateRMQty"><i class="fa-solid fa-envelope"></i>Update Raw Material Quantity<span class="text-danger">*</span></label>

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
                                                        <button type="button" class="btn btn-primary me-2" id="btnUpdateRMOD" name="btnUpdateRMOD">Submit <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Update Material Modal -->

                                        <!-- Remove Material Modal -->
                                        <div class="modal fade" id="removeRMODQModal" tabindex="-1" aria-labelledby="removeRMODQModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-primary">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="fas fa-plus"></i>
                                                        <h2 class="headline-md">Remove Raw Materials</h2>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            

                                                        </div>
                                                    
                                                    </div>

                                                    <div class="modal-footer modal-primary">
                                                        <button type="button" class="btn btn-primary me-2" id="btnRemoveRMOD" name="btnRemoveRMOD">Submit <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Remove Material Modal -->

                                        <div class="table-responsive">
                                            <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="rawMaterialsOrdersTable">
                                                <thead class="table-head">
                                                    <tr>
                                                        <th>Material ID</th>
                                                        <th>Material UID</th>
                                                        <th>Material Name</th>
                                                        <th>Category</th>
                                                        <th>Unit</th>
                                                        <th>Quantity</th>
                                                        <th>Supplier</th>
                                                        <th>Quantity</th>
                                                        <th>Actions</th>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card comman-shadow">
                                    <div class="card-body">
                                        <div class="row gy-4">
                                            <div class="col-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnaddFPL" name="btnaddFPL">Submit <i class="fas fa-download"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <footer>
                    <p>Copyright © 2022 J.F. Rubber</p>
                </footer>
            </div>

            <?php include_once('assets/components/all-scripts.php'); ?>   

            <!-- Add Order Delivery JS Function -->
            <script src="../includes/jsFunction/finish-product-list-add.js"></script>
        <?php } else { ?>

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
                                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                                <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                                <!-- <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFPModal"><i class="fas fa-plus"></i></a> -->
                                                <a href="index.php?route=finish-products&action=add-finish-product" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add Finish Product Quantity Modal -->
                                    <div class="modal fade" id="addFPQtyModal" tabindex="-1" aria-labelledby="addFPQtyMOdalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header modal-primary">
                                                    <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    <i class="feather-edit"></i>
                                                    <h2 class="headline-md">Add Finish Product Quantity</h2>
                                                </div>

                                                <form method="post" id="addFPQtyForm" class="needs-validation" novalidate>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            <div class="col-12">
                                                                <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                            </div>

                                                            <input type="text" id="addFPQtyPUId" name="addFPQtyPUId">

                                                            <div class="col-12 col-sm-4">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="addFPQtyPId" name="addFPQtyPId" type="text" placeholder="PROD-001" readonly />
                                                                    <label class="label-blue" for="addFPQtyPId"><i class="fa-solid fa-envelope"></i>Product ID<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addFPQtyPN" name="addFPQtyPN" type="text" placeholder="Base Pads" readonly />
                                                                    <label class="label-blue" for="addFPQtyPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addFPRQty" name="addFPRQty" type="text" placeholder="Remaning Quantity" readonly />
                                                                    <label class="label-blue" for="addFPRQty"><i class="fa-solid fa-envelope"></i>Remaning Quantity<span class="text-danger">*</span></label>

                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-12">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="addFPQty" name="addFPQty" type="text" placeholder="Quantity to be added" required />
                                                                    <label class="label-blue" for="addFPQty"><i class="fa-solid fa-envelope"></i>Quantity to be added<span class="text-danger">*</span></label>

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
                                                        <button type="submit" class="btn btn-primary me-2" id="btnAddFPQty" name="btnAddFPQty">Update <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Add Finish Product Quantity Modal -->

                                    <div class="table-responsive">
                                        <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="finishProdTable">
                                            <thead class="table-head">
                                                <tr>
                                                    <th>F.Prod ID</th>
                                                    <th>F.Prod UID</th>
                                                    <th>F.Prod Name</th>
                                                    <th>F.Prod Raw Mat.</th>
                                                    <th>F.Prod Quantity</th>
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

            <?php include_once('assets/components/all-scripts.php'); ?>   
    
            <!-- Add Finish Product JS Function -->
            <script src="../includes/jsFunction/finish-product-add.js"></script>
            <!-- Edit Finish Product JS Function -->
            <script src="../includes/jsFunction/finish-product-edit.js"></script>
            <!-- Add Finish Product Qty JS Function -->
            <script src="../includes/jsFunction/finish-product-qty-add.js"></script>

        <?php } ?>
    </div>

    <!-- Get Finish Products JS Function -->
    <script>
        $(document).ready(function () { 
            
            // TODO Raw Materials Table
            var rawMaterialsTable = $('#rawMaterialsTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/raw-materials-for-search-get.php',
                "columns": [
                    {data: "materialId"},
                    {data: "materialUId"},
                    {data: "materialName"},
                    {data: "materialCategory"},
                    {data: "materialUnit"},
                    {data: "materialQuantity"},
                    {data: "materialSupplier"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                rawMaterialsTable.ajax.reload( null, false );
            }, 3000 );

            // Event handler for adding an order in rawMaterialsTable
            rawMaterialsTable.on('click', '.addRMOrder', function () {

                // Show the modal for adding raw material order quantity
                $('#addRMODQModal').modal('show');

                // Store references to the clicked row and related elements
                var tr = $(this).closest('tr');
                var tds = tr.find("td:not(:last-child)");

                // Event handler for the button inside the modal
                $('#addRMODQModal').one('click', '#btnAddRMODQ', function () {

                    // Check if the order is already added based on the second column value
                    var matchFound = isOrderAlreadyAdded(tds);

                    // Get the raw material quantity from the modal input
                    var rawMaterialQty = $('#addRMQty').val();

                    // Add the order to the table if not already added
                    if (!matchFound) {

                        var newRow = $('<tr></tr>');

                        // Retrieve the values of rawMaterialsOrdersTable headers, convert to small caps, and remove spaces
                        var columnNames = $('#rawMaterialsOrdersTable thead tr th').map(function () {
                            return $(this).text().toLowerCase().replace(/\s/g, ''); // \s matches any white space character
                        }).get();

                        tds.each(function (index) {
                            var cellData = $(this).text();
                            var newCell = $('<td><input type="text" name="' + columnNames[index] + '[]" value="' + cellData + '"></td>');
                            newRow.append(newCell);
                        });

                        newRow.append('<td><input type="text" name="materialqty[]" value="' + rawMaterialQty + '"></td>');
                        newRow.append('<td><div class="actions"><a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updateRMOD"><i class="feather-edit"></i></a><a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deleteRMOD"><i class="feather-trash"></i></a></div></td>');

                        // Append the new row to the rawMaterialsOrdersTable
                        $('#rawMaterialsOrdersTable tbody').append(newRow);
                        swal('Added!', 'This Raw Material has added.', 'success');
                    } else {
                        swal('Already Added!', 'This Raw Material has already been added.', 'warning');
                    }

                    // Close the modal
                    $('#addRMODQModal').modal('hide');
                });
            });

            // Function to check if the order is already added based on the second column value
            function isOrderAlreadyAdded(tds) {

                var ordersTable = $('#rawMaterialsOrdersTable tbody');
                var matchFound = false;

                // Get the second column value of the current row
                var secondColumnValue = tds.closest('tr').find('td:eq(1)').text();

                ordersTable.find('tr').each(function () {
                    var existingRow = $(this);
                    var existingSecondColumnValue = existingRow.find('td:eq(1) input[name="materialuid[]"]').val();

                    // Compare the second column values
                    if (existingSecondColumnValue === secondColumnValue) {
                        matchFound = true;
                        return false; // Break the loop if a match is found
                    }
                });

                return matchFound;
            }

            // Event handler for updating the qty of an order in rawMaterialsOrdersTable
            $('#rawMaterialsOrdersTable').on('click', '.updateRMOD', function() {
                console.log('Update button clicked on row:', $(this).closest('tr'));

                // Show the modal
                $('#updateRMODQModal').modal('show');

                // Store a reference to the clicked row
                var clickedRow = $(this).closest('tr');
                console.log('Clicked row:', clickedRow);

                var materialUId = clickedRow.find('td:eq(2) input[name="materialuid[]"]').val();
                console.log('Material unique id:', materialUId);

                var materialQtyInput = clickedRow.find('td:eq(7) input[name="materialqty[]"]');
                console.log('Material quantity input:', materialQtyInput);

                // Store the current material quantity
                var currentMaterialQty = materialQtyInput.val();
                console.log('Current material quantity:', currentMaterialQty);

                // Set the value of the update input to the current material quantity
                $('#updateRMQty').val(currentMaterialQty);

                // Event handler for the button inside the modal
                $('#updateRMODQModal').one('click', '#btnUpdateRMOD', function() {
                    console.log('Update button inside modal clicked');

                    // Get the updated quantity from the modal input
                    var updatedRMQty = $('#updateRMQty').val();
                    console.log('Updated quantity:', updatedRMQty);

                    // Update the material quantity input in the clicked row
                    materialQtyInput.val(updatedRMQty);
                    console.log('Material quantity updated:', materialQtyInput.val());

                    // Check if the quantity was actually updated
                    swal('Updated!', 'Quantity has been updated.', 'success');
                    console.log('SweetAlert: Quantity has been updated.');

                    // Close the modal
                    $('#updateRMODQModal').modal('hide');
                    console.log('Modal closed.');

                    // Check if materialUniqueId exists
                    if (materialUId) {
                        // Additional logic to handle materialUniqueId update
                        console.log('MaterialUniqueId exists. Do something with it.');
                    }
                });
            });

            // Event handler for deleting an order in rawMaterialsOrdersTable
            $('#rawMaterialsOrdersTable').on('click', '.deleteRMOD', function() {
                // Show the modal
                $('#removeRMODQModal').modal('show');

                // Store a reference to the clicked row
                var clickedRow = $(this).closest('tr');

                // Event handler for the button inside the modal
                $('#removeRMODQModal').on('click', '#btnRemoveRMOD', function() {
                    // Remove the row
                    clickedRow.remove();
                    swal('Removed!', 'This Raw Material has removed.', 'success');
                    // Close the modal
                    $('#removeRMODQModal').modal('hide');
                });
            });

            // TODO Finish Products Table
            var finishProdTable = $('#finishProdTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/finish-product-get.php',
                "columns": [
                    {data: "finishProdId"},
                    {data: "finishProdUId"},
                    {data: "finishProdName"},
                    {data: "finishProdTotalRawMaterials"},
                    {data: "finishProdQuantity"},
                    {data: "finishProdDateCreated"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                finishProdTable.ajax.reload( null, false );
            }, 3000 );


            finishProdTable.on('click', '.addFPQty', function() {
                $('#addFPQtyModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#addFPQtyPId').val(data[0]);   
                $('#addFPQtyPUId').val(data[1]);   
                $('#addFPQtyPN').val(data[2]);   
                $('#addFPRQty').val(data[4]);   
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
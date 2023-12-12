<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purchase Orders</title>
    <?php include_once('assets/components/all-styles.php'); ?>
</head>

<body>

    <div class="main-wrapper">
        
        <?php include_once('assets/components/header.php'); ?>
        <?php include_once('assets/components/sidebar.php'); ?>   

        <?php 
            if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "purchase-orders" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-purchase-order") {  
        ?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-sub-header">
                                    <h3 class="page-title">Add Purchase Order</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="students.html">Purchase Order</a></li>
                                        <li class="breadcrumb-item">All Order Deliveries</li>
                                        <li class="breadcrumb-item active">Add Purchase Order</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" id="addODLForm" class="needs-validation" novalidate>
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

                                        <?php
                                            $getPOPOId = $functionClass->getPurchaseOrderPOId();
                                            date_default_timezone_set('Asia/Manila');
                                            $getPurchaseOrderCurrentDate = date("Y-m-d");
                                            if (!empty($getPOPOId)) {
                                                $latestPOPOId = end($getPOPOId);
                                                $getLatestPOPOId = sprintf("PO-%03d", $latestPOPOId + 1);
                                            } else {
                                                $getLatestPOPOId = "PO-001";
                                            }                                                
                                        ?>

                                        <div class="row gy-4">

                                            <div class="col-12 col-sm-4">
                                                <div class="form-floating">
                                                    <input class="form-control" id="addPOPOId" name="addPOPOId" type="text" value="<?php echo $getLatestPOPOId ?? ""; ?>" placeholder="PO-001" readonly />
                                                    <label class="label-blue" for="addPOPOId"><i class="fa-solid fa-envelope"></i>Purchase Order ID<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addPONo" name="addPONo" type="text" placeholder="POR-001" required />
                                                    <label class="label-blue" for="addPONo"><i class="fa-solid fa-envelope"></i>Purchase Order No<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addPORM" name="addPORM" type="text" placeholder="Hi-Styrene" required />
                                                    <label class="label-blue" for="addPORM"><i class="fa-solid fa-envelope"></i>Raw Material<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addPODate" name="addPODate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                    <label class="label-blue" for="addPODate"><i class="fa-solid fa-envelope"></i>Date Received<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addPOSupplier" name="addPOSupplier" type="text" placeholder="Hakuta" required />
                                                    <label class="label-blue" for="addPOSupplier"><i class="fa-solid fa-envelope"></i>Supplier<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addPOQuantity" name="addPOQuantity" type="text" placeholder="100" required />
                                                    <label class="label-blue" for="addPOQuantity"><i class="fa-solid fa-envelope"></i>Quantity<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addPOPrice" name="addPOPrice" type="text" placeholder="100.00" required />
                                                    <label class="label-blue" for="addPOPrice"><i class="fa-solid fa-envelope"></i>Price<span class="text-danger">*</span></label>

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
                                                    <h3 class="page-title">Order Lists</h3>
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
                                                                <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="finishProdTable">
                                                                    <thead class="table-head">
                                                                        <tr>
                                                                            <th>F.Prod ID</th>
                                                                            <th>F.Prod UID</th>
                                                                            <th>F.Prod Name</th>
                                                                            <th>F.Prod Raw Mat.</th>
                                                                            <th>F.Prod Quantity</th>
                                                                            <!-- <th>Date</th> -->
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

                                        <!-- Add Material Modal -->
                                        <div class="modal fade" id="addRMODModal" tabindex="-1" aria-labelledby="addRMModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-primary">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="fas fa-plus"></i>
                                                        <h2 class="headline-md">Add Raw Materials</h2>
                                                    </div>

                                                    <!-- <form method="post" id="addRMForm" class="needs-validation" novalidate> -->

                                                        <?php
                                                            $getRMMId = $functionClass->getRMMId();
                                                            if (!empty($getRMMId)) {
                                                                $latestRMMId = end($getRMMId);
                                                                $getLatestRMMId = sprintf("MID-%03d", $latestRMMId + 1);
                                                            } else {
                                                                $getLatestRMMId = "MID-001";
                                                            }                                                
                                                        ?>

                                                        <div class="modal-body">

                                                            <div class="row gy-4">
                                                                <div class="col-12">
                                                                    <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                                </div>

                                                                <div class="col-12 col-sm-4">
                                                                    <div class="form-floating">
                                                                        <input class="form-control" id="addRMMId" name="addRMMId" type="text" value="<?php echo $getLatestRMMId ?? ""; ?>" placeholder="MID-001" readonly />
                                                                        <label class="label-blue" for="addRMMId"><i class="fa-solid fa-envelope"></i>Material ID<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addRMMN" name="addRMMN" type="text" placeholder="Hi-Styrene" required />
                                                                        <label class="label-blue" for="addRMMN"><i class="fa-solid fa-envelope"></i>Material Name<span class="text-danger">*</span></label>

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
                                                                        <select class="form-control select-option-field" id="addRMCat" name="addRMCat" type="text" placeholder="Filler/Hardener" required>
                                                                        <?php
                                                                            $getCategories = $functionClass->getCatDataOnly();
                                                                            if (!empty($getCategories)) {
                                                                                foreach ($getCategories as $getCategory) {
                                                                        ?>
                                                                            <option value="<?php echo $getCategory['categoryUId'] ?? "" ?>"><?php echo $getCategory['categoryName'] ?? "" ?></option>
                                                                        <?php 
                                                                                }
                                                                            }
                                                                        ?>
                                                                        </select>
                                                                        <label class="label-blue" for="addRMCat"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>
                                                                        
                                                                        <i class="fa-solid fa-sort-down select-option-icon position-absolute top-50 end-0 me-3 translate-middle-y"></i>
                                                                        
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
                                                                        <input class="form-control" id="addRMUnit" name="addRMUnit" type="text" placeholder="Liter" required />
                                                                        <label class="label-blue" for="addRMUnit"><i class="fa-solid fa-envelope"></i>Unit<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addRMQty" name="addRMQty" type="text" placeholder="100" required />
                                                                        <label class="label-blue" for="addRMQty"><i class="fa-solid fa-envelope"></i>Quantity<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addRMSupplier" name="addRMSupplier" type="text" placeholder="Hakuta" required />
                                                                        <label class="label-blue" for="addRMSupplier"><i class="fa-solid fa-envelope"></i>Supplier<span class="text-danger">*</span></label>

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
                                                            <button type="submit" class="btn btn-primary me-2" id="btnAddRM" name="btnAddRM">Submit <i class="fas fa-download"></i></button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                        </div>

                                                    <!-- </form> -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Add Material Modal -->

                                        <div class="table-responsive">
                                            <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="rawMaterialsOrdersTable">
                                                <thead class="table-head">
                                                    <tr>
                                                        <th>F.Prod ID</th>
                                                        <th>F.Prod UID</th>
                                                        <th>F.Prod Name</th>
                                                        <th>F.Prod Raw Mat.</th>
                                                        <th>F.Prod Quantity</th>
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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnaddODL" name="btnaddODL">Submit <i class="fas fa-download"></i></button>
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
            <script src="../includes/jsFunction/order-delivery-list-add.js"></script>
        <?php } else { ?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-sub-header">
                                    <h3 class="page-title">Purchase Orders</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="students.html">Purchase Order</a></li>
                                        <li class="breadcrumb-item active">All Purchase Orders</li>
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
                                                <h3 class="page-title">Purchase Orders</h3>
                                            </div>
                                            <div class="col-auto text-end float-end ms-auto download-grp">
                                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                                <a href="index.php?route=purchase-orders&action=add-purchase-order" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="purchaseOrdersTable">
                                            <thead class="table-head">
                                                <tr>
                                                    <th>Purchase ID</th>
                                                    <th>Purchase UID</th>
                                                    <th>Purchase Order No</th>
                                                    <th>Raw Material</th>
                                                    <th>Date Received</th>
                                                    <th>Supplier</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
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
        <?php } ?>
    </div>

    <?php include_once('assets/components/all-scripts.php'); ?>   
    
    <!-- Add Purchase Order JS Function -->
    <script src="../includes/jsFunction/purchase-order-add.js"></script>
    <!-- Edit Purchase Order JS Function -->
    <script src="../includes/jsFunction/purchase-order-edit.js"></script>

    <!-- Get Purchase Orders JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO Purchase Orders Table
            var purchaseOrdersTable = $('#purchaseOrdersTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/purchase-order-get.php',
                "columns": [
                    {data: "purchaseOrderId"},
                    {data: "purchaseOrderUId"},
                    {data: "purchaseOrderNo"},
                    {data: "purchaseOrderRawMaterial"},
                    {data: "purchaseOrderDateReceived"},
                    {data: "purchaseOrderSupplier"},
                    {data: "purchaseOrderQuantity"},
                    {data: "purchaseOrderPrice"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                purchaseOrdersTable.ajax.reload( null, false );
            }, 3000 );


            purchaseOrdersTable.on('click', '.updatePO', function() {
                $('#updatePOModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updatePOPOId').val(data[0]);   
                $('#updatePOPOUId').val(data[1]);   
                $('#updatePONo').val(data[2]);   
                $('#updatePORM').val(data[3]);  
                $('#updatePOSupplier').val(data[5]);   
                $('#updatePOQuantity').val(data[6]);  
                $('#updatePOPrice').val(data[7]);  
            });

            purchaseOrdersTable.on('click', '.deletePO', function() {
                $('#deletePOModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deletePOPOID').val(data[0]);   
                $('#deletePOPOUId').val(data[1]);
                $('#deletePORM').text(data[3]);
            });

            // TODO Finish Products Table
            var finishProdTable = $('#finishProdTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/finish-product-for-search-get.php',
                "columns": [
                    {data: "finishProdId"},
                    {data: "finishProdUId"},
                    {data: "finishProdName"},
                    {data: "finishProdTotalRawMaterials"},
                    {data: "finishProdQuantity"},
                    // {data: "finishProdDateCreated"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                finishProdTable.ajax.reload( null, false );
            }, 3000 );

            // Event handler for adding an order in finishProdTable
            finishProdTable.on('click', '.addFPPOrder', function () {

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

        });
    </script>
</body>

</html>
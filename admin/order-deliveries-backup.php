<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Deliveries</title>
    <?php include_once('assets/components/all-styles.php'); ?>
</head>

<body>

    <div class="main-wrapper">
        
        <?php include_once('assets/components/header.php'); ?>
        <?php include_once('assets/components/sidebar.php'); ?>   

        <?php 
            if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "order-deliveries" && isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "add-delivery") {  
        ?>
            
            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-sub-header">
                                    <h3 class="page-title">Add Order Delivery</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="students.html">Order Delivery</a></li>
                                        <li class="breadcrumb-item">All Order Deliveries</li>
                                        <li class="breadcrumb-item active">Add Order Delivery</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" id="addODForm" class="needs-validation" novalidate>
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
                                            $getODODId = $functionClass->getOrderDeliveryODId();
                                            date_default_timezone_set('Asia/Manila');
                                            $getPurchaseOrderCurrentDate = date("Y-m-d");
                                            if (!empty($getODODId)) {
                                                $latestODODId = end($getODODId);
                                                $getLatestODODId = sprintf("OD-%03d", $latestODODId + 1);
                                            } else {
                                                $getLatestODODId = "OD-001";
                                            }                                                
                                        ?>

                                        <div class="row gy-4">

                                            <div class="col-12 col-sm-4">
                                                <div class="form-floating">
                                                    <input class="form-control" id="addODODId" name="addODODId" type="text" value="<?php echo $getLatestODODId ?? ""; ?>" placeholder="OD-001" readonly />
                                                    <label class="label-blue" for="addODODId"><i class="fa-solid fa-envelope"></i>Order ID<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODNo" name="addODNo" type="text" placeholder="ODN-001" required />
                                                    <label class="label-blue" for="addODNo"><i class="fa-solid fa-envelope"></i>Order No<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODPN" name="addODPN" type="text" placeholder="Base Pads" required />
                                                    <label class="label-blue" for="addODPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODCustomer" name="addODCustomer" type="text" placeholder="Juan Dela Cruz" required />
                                                    <label class="label-blue" for="addODCustomer"><i class="fa-solid fa-envelope"></i>Customer<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODTO" name="addODTO" type="text" placeholder="10" required />
                                                    <label class="label-blue" for="addODTO"><i class="fa-solid fa-envelope"></i>Total Order<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODSDate" name="addODSDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                    <label class="label-blue" for="addODSDate"><i class="fa-solid fa-envelope"></i>Schedules Date<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODEDate" name="addODEDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                    <label class="label-blue" for="addODEDate"><i class="fa-solid fa-envelope"></i>Expected Date<span class="text-danger">*</span></label>

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
                                                    <input class="form-control" id="addODStatus" name="addODStatus" type="text" placeholder="Pending" required />
                                                    <label class="label-blue" for="addODStatus"><i class="fa-solid fa-envelope"></i>Status<span class="text-danger">*</span></label>

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
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPOModal"><i class="fas fa-plus me-2"></i>Add New</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add Order Delivery Modal -->
                                        <div class="modal fade" id="addODModal" tabindex="-1" aria-labelledby="addODModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-primary">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="fas fa-plus"></i>
                                                        <h2 class="headline-md">Add Order Delivery</h2>
                                                    </div>

                                                    <form method="post" id="addODForm" class="needs-validation" novalidate>

                                                        <?php
                                                            $getODODId = $functionClass->getOrderDeliveryODId();
                                                            date_default_timezone_set('Asia/Manila');
                                                            $getPurchaseOrderCurrentDate = date("Y-m-d");
                                                            if (!empty($getODODId)) {
                                                                $latestODODId = end($getODODId);
                                                                $getLatestODODId = sprintf("OD-%03d", $latestODODId + 1);
                                                            } else {
                                                                $getLatestODODId = "OD-001";
                                                            }                                                
                                                        ?>

                                                        <div class="modal-body">

                                                            <div class="row gy-4">
                                                                <div class="col-12">
                                                                    <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                                </div>

                                                                <div class="col-12 col-sm-4">
                                                                    <div class="form-floating">
                                                                        <input class="form-control" id="addODODId" name="addODODId" type="text" value="<?php echo $getLatestODODId ?? ""; ?>" placeholder="OD-001" readonly />
                                                                        <label class="label-blue" for="addODODId"><i class="fa-solid fa-envelope"></i>Order ID<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODNo" name="addODNo" type="text" placeholder="ODN-001" required />
                                                                        <label class="label-blue" for="addODNo"><i class="fa-solid fa-envelope"></i>Order No<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODPN" name="addODPN" type="text" placeholder="Base Pads" required />
                                                                        <label class="label-blue" for="addODPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODCustomer" name="addODCustomer" type="text" placeholder="Juan Dela Cruz" required />
                                                                        <label class="label-blue" for="addODCustomer"><i class="fa-solid fa-envelope"></i>Customer<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODTO" name="addODTO" type="text" placeholder="10" required />
                                                                        <label class="label-blue" for="addODTO"><i class="fa-solid fa-envelope"></i>Total Order<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODSDate" name="addODSDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                        <label class="label-blue" for="addODSDate"><i class="fa-solid fa-envelope"></i>Schedules Date<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODEDate" name="addODEDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                        <label class="label-blue" for="addODEDate"><i class="fa-solid fa-envelope"></i>Expected Date<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="addODStatus" name="addODStatus" type="text" placeholder="Pending" required />
                                                                        <label class="label-blue" for="addODStatus"><i class="fa-solid fa-envelope"></i>Status<span class="text-danger">*</span></label>

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
                                                            <button type="submit" class="btn btn-primary me-2" id="btnAddOD" name="btnAddOD">Submit <i class="fas fa-download"></i></button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Add Order Delivery Modal -->

                                        <!-- Edit Order Delivery Modal -->
                                        <div class="modal fade" id="updateODModal" tabindex="-1" aria-labelledby="updateODModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-warning">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="feather-edit"></i>
                                                        <h2 class="headline-md">Update Order Delivery</h2>
                                                    </div>

                                                    <form method="post" id="updateODForm" class="needs-validation" novalidate>

                                                        <div class="modal-body">

                                                            <div class="row gy-4">
                                                                <div class="col-12">
                                                                    <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                                </div>

                                                                <input type="text" id="updateODODUId" name="updateODODUId">

                                                                <div class="col-12 col-sm-4">
                                                                    <div class="form-floating">
                                                                        <input class="form-control" id="updateODODId" name="updateODODId" type="text" placeholder="OD-001" readonly />
                                                                        <label class="label-blue" for="updateODODId"><i class="fa-solid fa-envelope"></i>Order ID<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODNo" name="updateODNo" type="text" placeholder="ODN-001" required />
                                                                        <label class="label-blue" for="updateODNo"><i class="fa-solid fa-envelope"></i>Order No<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODPN" name="updateODPN" type="text" placeholder="Base Pads" required />
                                                                        <label class="label-blue" for="updateODPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODCustomer" name="updateODCustomer" type="text" placeholder="Juan Dela Cruz" required />
                                                                        <label class="label-blue" for="updateODCustomer"><i class="fa-solid fa-envelope"></i>Customer<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODTO" name="updateODTO" type="text" placeholder="10" required />
                                                                        <label class="label-blue" for="updateODTO"><i class="fa-solid fa-envelope"></i>Total Order<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODSDate" name="updateODSDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                        <label class="label-blue" for="updateODSDate"><i class="fa-solid fa-envelope"></i>Schedules Date<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODEDate" name="updateODEDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                        <label class="label-blue" for="updateODEDate"><i class="fa-solid fa-envelope"></i>Expected Date<span class="text-danger">*</span></label>

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
                                                                        <input class="form-control" id="updateODStatus" name="updateODStatus" type="text" placeholder="Pending" required />
                                                                        <label class="label-blue" for="updateODStatus"><i class="fa-solid fa-envelope"></i>Status<span class="text-danger">*</span></label>

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
                                                            <button type="submit" class="btn btn-primary me-2" id="btnUpdateOD" name="btnUpdateOD">Update <i class="fas fa-download"></i></button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Edit Order Delivery Modal -->

                                        <!-- Delete Order Delivery Modal -->
                                        <?php $functionClass->deleteOrderDelivery(); ?>
                                        <div class="modal fade" id="deleteODModal" tabindex="-1" aria-labelledby="deleteODModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-danger">
                                                        <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        <i class="feather-trash"></i>
                                                        <h2 class="headline-md">Archive Order Delivery</h2>
                                                    </div>

                                                    <form method="post" id="deletePOForm" class="needs-validation" novalidate>

                                                        <div class="modal-body">

                                                            <div class="row gy-4">
                                                                <div class="col-12">
                                                                    <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                                </div>

                                                                <input type="text" id="deleteODODUID" name="deleteODODUID">
                                                                <input type="text" id="deleteODODID" name="deleteODODID">
                                                                
                                                                <div class="text-center mb-2">
                                                                    <h4>Are you sure you want to archive Order Delivery Product Name: <strong><span id="deleteODPN" class="text-danger"></span></strong>?</h4>
                                                                </div> 

                                                            </div>
                                                        
                                                        </div>

                                                        <div class="modal-footer modal-danger">
                                                            <button type="submit" class="btn btn-primary me-2" id="btnDeletePO" name="btnDeletePO">Archive <i class="fas fa-download"></i></button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Delete Order Delivery Modal -->

                                        <div class="table-responsive">
                                            <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="orderDeliveriesTable">
                                                <thead class="table-head">
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Order UID</th>
                                                        <th>Order No</th>
                                                        <th>Prod Name</th>
                                                        <th>Customer</th>
                                                        <th>Total Order</th>
                                                        <th>Schedule Date</th>
                                                        <th>Expected Date</th>
                                                        <th>Status</th>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card comman-shadow">
                                    <div class="card-body">
                                        <div class="row gy-4">
                                            <div class="col-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnAddOD" name="btnAddOD">Submit <i class="fas fa-download"></i></button>
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

        <?php } else { ?>

            <div class="page-wrapper">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-sub-header">
                                    <h3 class="page-title">Order Deliveries</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="students.html">Order Delivery</a></li>
                                        <li class="breadcrumb-item active">All Order Deliveries</li>
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
                                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                                <a href="index.php?route=order-deliveries&action=add-delivery" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addODModal"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add Order Delivery Modal -->
                                    <div class="modal fade" id="addODModal" tabindex="-1" aria-labelledby="addODModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header modal-primary">
                                                    <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    <i class="fas fa-plus"></i>
                                                    <h2 class="headline-md">Add Order Delivery</h2>
                                                </div>

                                                <form method="post" id="addODForm" class="needs-validation" novalidate>

                                                    <?php
                                                        $getODODId = $functionClass->getOrderDeliveryODId();
                                                        date_default_timezone_set('Asia/Manila');
                                                        $getPurchaseOrderCurrentDate = date("Y-m-d");
                                                        if (!empty($getODODId)) {
                                                            $latestODODId = end($getODODId);
                                                            $getLatestODODId = sprintf("OD-%03d", $latestODODId + 1);
                                                        } else {
                                                            $getLatestODODId = "OD-001";
                                                        }                                                
                                                    ?>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            <div class="col-12">
                                                                <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                            </div>

                                                            <div class="col-12 col-sm-4">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="addODODId" name="addODODId" type="text" value="<?php echo $getLatestODODId ?? ""; ?>" placeholder="OD-001" readonly />
                                                                    <label class="label-blue" for="addODODId"><i class="fa-solid fa-envelope"></i>Order ID<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODNo" name="addODNo" type="text" placeholder="ODN-001" required />
                                                                    <label class="label-blue" for="addODNo"><i class="fa-solid fa-envelope"></i>Order No<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODPN" name="addODPN" type="text" placeholder="Base Pads" required />
                                                                    <label class="label-blue" for="addODPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODCustomer" name="addODCustomer" type="text" placeholder="Juan Dela Cruz" required />
                                                                    <label class="label-blue" for="addODCustomer"><i class="fa-solid fa-envelope"></i>Customer<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODTO" name="addODTO" type="text" placeholder="10" required />
                                                                    <label class="label-blue" for="addODTO"><i class="fa-solid fa-envelope"></i>Total Order<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODSDate" name="addODSDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                    <label class="label-blue" for="addODSDate"><i class="fa-solid fa-envelope"></i>Schedules Date<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODEDate" name="addODEDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                    <label class="label-blue" for="addODEDate"><i class="fa-solid fa-envelope"></i>Expected Date<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="addODStatus" name="addODStatus" type="text" placeholder="Pending" required />
                                                                    <label class="label-blue" for="addODStatus"><i class="fa-solid fa-envelope"></i>Status<span class="text-danger">*</span></label>

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
                                                        <button type="submit" class="btn btn-primary me-2" id="btnAddOD" name="btnAddOD">Submit <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Add Order Delivery Modal -->

                                    <!-- Edit Order Delivery Modal -->
                                    <div class="modal fade" id="updateODModal" tabindex="-1" aria-labelledby="updateODModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header modal-warning">
                                                    <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    <i class="feather-edit"></i>
                                                    <h2 class="headline-md">Update Order Delivery</h2>
                                                </div>

                                                <form method="post" id="updateODForm" class="needs-validation" novalidate>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            <div class="col-12">
                                                                <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                            </div>

                                                            <input type="text" id="updateODODUId" name="updateODODUId">

                                                            <div class="col-12 col-sm-4">
                                                                <div class="form-floating">
                                                                    <input class="form-control" id="updateODODId" name="updateODODId" type="text" placeholder="OD-001" readonly />
                                                                    <label class="label-blue" for="updateODODId"><i class="fa-solid fa-envelope"></i>Order ID<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODNo" name="updateODNo" type="text" placeholder="ODN-001" required />
                                                                    <label class="label-blue" for="updateODNo"><i class="fa-solid fa-envelope"></i>Order No<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODPN" name="updateODPN" type="text" placeholder="Base Pads" required />
                                                                    <label class="label-blue" for="updateODPN"><i class="fa-solid fa-envelope"></i>Product Name<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODCustomer" name="updateODCustomer" type="text" placeholder="Juan Dela Cruz" required />
                                                                    <label class="label-blue" for="updateODCustomer"><i class="fa-solid fa-envelope"></i>Customer<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODTO" name="updateODTO" type="text" placeholder="10" required />
                                                                    <label class="label-blue" for="updateODTO"><i class="fa-solid fa-envelope"></i>Total Order<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODSDate" name="updateODSDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                    <label class="label-blue" for="updateODSDate"><i class="fa-solid fa-envelope"></i>Schedules Date<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODEDate" name="updateODEDate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                    <label class="label-blue" for="updateODEDate"><i class="fa-solid fa-envelope"></i>Expected Date<span class="text-danger">*</span></label>

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
                                                                    <input class="form-control" id="updateODStatus" name="updateODStatus" type="text" placeholder="Pending" required />
                                                                    <label class="label-blue" for="updateODStatus"><i class="fa-solid fa-envelope"></i>Status<span class="text-danger">*</span></label>

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
                                                        <button type="submit" class="btn btn-primary me-2" id="btnUpdateOD" name="btnUpdateOD">Update <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Edit Order Delivery Modal -->

                                    <!-- Delete Order Delivery Modal -->
                                    <?php $functionClass->deleteOrderDelivery(); ?>
                                    <div class="modal fade" id="deleteODModal" tabindex="-1" aria-labelledby="deleteODModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header modal-danger">
                                                    <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    <i class="feather-trash"></i>
                                                    <h2 class="headline-md">Archive Order Delivery</h2>
                                                </div>

                                                <form method="post" id="deletePOForm" class="needs-validation" novalidate>

                                                    <div class="modal-body">

                                                        <div class="row gy-4">
                                                            <div class="col-12">
                                                                <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                            </div>

                                                            <input type="text" id="deleteODODUID" name="deleteODODUID">
                                                            <input type="text" id="deleteODODID" name="deleteODODID">
                                                            
                                                            <div class="text-center mb-2">
                                                                <h4>Are you sure you want to archive Order Delivery Product Name: <strong><span id="deleteODPN" class="text-danger"></span></strong>?</h4>
                                                            </div> 

                                                        </div>
                                                    
                                                    </div>

                                                    <div class="modal-footer modal-danger">
                                                        <button type="submit" class="btn btn-primary me-2" id="btnDeletePO" name="btnDeletePO">Archive <i class="fas fa-download"></i></button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Delete Order Delivery Modal -->

                                    <div class="table-responsive">
                                        <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="orderDeliveriesTable">
                                            <thead class="table-head">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Order UID</th>
                                                    <th>Order No</th>
                                                    <th>Prod Name</th>
                                                    <th>Customer</th>
                                                    <th>Total Order</th>
                                                    <th>Schedule Date</th>
                                                    <th>Expected Date</th>
                                                    <th>Status</th>
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
    
    <!-- Add Order Delivery JS Function -->
    <script src="../includes/jsFunction/order-delivery-add.js"></script>
    <!-- Edit Order Delivery JS Function -->
    <script src="../includes/jsFunction/order-delivery-edit.js"></script>

    <!-- Get Order Deliveries JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO Order Deliveries Table
            var orderDeliveriesTable = $('#orderDeliveriesTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/order-delivery-get.php',
                "columns": [
                    {data: "orderDeliveryId"},
                    {data: "orderDeliveryUId"},
                    {data: "orderDeliveryOrderNo"},
                    {data: "orderDeliveryProdName"},
                    {data: "orderDeliveryCustomer"},
                    {data: "orderDeliveryTotalOrder"},                 
                    {data: "orderDeliverySchedDate"},
                    {data: "orderDeliveryExpectedDate"},
                    {data: "orderDeliveryOrderStatus"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                orderDeliveriesTable.ajax.reload( null, false );
            }, 3000 );


            orderDeliveriesTable.on('click', '.updateOD', function() {
                $('#updateODModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateODODId').val(data[0]);   
                $('#updateODODUId').val(data[1]);   
                $('#updateODNo').val(data[2]);   
                $('#updateODPN').val(data[3]);  
                $('#updateODCustomer').val(data[4]);   
                $('#updateODTO').val(data[5]);  
                $('#updateODStatus').val(data[8]);  
            });

            orderDeliveriesTable.on('click', '.deleteOD', function() {
                $('#deleteODModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deleteODODID').val(data[0]);   
                $('#deleteODODUID').val(data[1]);
                $('#deleteODPN').text(data[3]);
            });
        });
    </script>
</body>

</html>
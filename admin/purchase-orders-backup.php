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
                                            <a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                            <a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                            <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                            <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPOModal"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Puchase Order Modal -->
                                <div class="modal fade" id="addPOModal" tabindex="-1" aria-labelledby="addPOModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-primary">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="fas fa-plus"></i>
                                                <h2 class="headline-md">Add Puchase Order</h2>
                                            </div>

                                            <form method="post" id="addPOForm" class="needs-validation" novalidate>

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

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

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

                                                <div class="modal-footer modal-primary">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnAddPO" name="btnAddPO">Submit <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Add Purchase Order Modal -->

                                <!-- Edit Purchase Order Modal -->
                                <div class="modal fade" id="updatePOModal" tabindex="-1" aria-labelledby="updatePOModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-warning">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update Purchase Order</h2>
                                            </div>

                                            <form method="post" id="updatePOForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updatePOPOUId" name="updatePOPOUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updatePOPOId" name="updatePOPOId" type="text" placeholder="PO-001" readonly />
                                                                <label class="label-blue" for="updatePOPOId"><i class="fa-solid fa-envelope"></i>Purchase Order ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updatePONo" name="updatePONo" type="text" placeholder="POR-001" required />
                                                                <label class="label-blue" for="updatePONo"><i class="fa-solid fa-envelope"></i>Purchase Order No<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updatePORM" name="updatePORM" type="text" placeholder="Hi-Styrene" required />
                                                                <label class="label-blue" for="updatePORM"><i class="fa-solid fa-envelope"></i>Raw Material<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updatePODate" name="updatePODate" type="date" value="<?php echo $getPurchaseOrderCurrentDate ?? "" ?>"  placeholder="MM-DD-YYYY" required />
                                                                <label class="label-blue" for="updatePODate"><i class="fa-solid fa-envelope"></i>Date Received<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updatePOSupplier" name="updatePOSupplier" type="text" placeholder="Hakuta" required />
                                                                <label class="label-blue" for="updatePOSupplier"><i class="fa-solid fa-envelope"></i>Supplier<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updatePOQuantity" name="updatePOQuantity" type="text" placeholder="100" required />
                                                                <label class="label-blue" for="updatePOQuantity"><i class="fa-solid fa-envelope"></i>Quantity<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updatePOPrice" name="updatePOPrice" type="text" placeholder="100.00" required />
                                                                <label class="label-blue" for="updatePOPrice"><i class="fa-solid fa-envelope"></i>Price<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdatePO" name="btnUpdatePO">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Purchase Order Modal -->

                                <!-- Delete Purchase Order Modal -->
                                <?php $functionClass->deletePurchaseOrder(); ?>
                                <div class="modal fade" id="deletePOModal" tabindex="-1" aria-labelledby="deletePOModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-trash"></i>
                                                <h2 class="headline-md">Archive Purchase Order</h2>
                                            </div>

                                            <form method="post" id="deletePOForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="deletePOPOUId" name="deletePOPOUId">
                                                        <input type="text" id="deletePOPOID" name="deletePOPOID">
                                                        
                                                        <div class="text-center mb-2">
                                                            <h4>Are you sure you want to archive Purchase Order Raw Material Name: <strong><span id="deletePORM" class="text-danger"></span></strong>?</h4>
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
                                <!-- End of Delete Purchase Order Modal -->

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
        });
    </script>
</body>

</html>
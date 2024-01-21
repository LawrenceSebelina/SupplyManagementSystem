<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Raw Materials</title>
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
                                <h3 class="page-title">Raw Materials</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Raw Material</a></li>
                                    <li class="breadcrumb-item active">All Raw Materials</li>
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
                                            <h3 class="page-title">Raw Materials</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a type="button" class="btn btn-outline-primary" onclick="document.querySelector('.print-datatable').click();">
                                                <i class="fas fa-print"></i> Print Data
                                            </a>
                                            <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRMModal"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Material Modal -->
                                <div class="modal fade" id="addRMModal" tabindex="-1" aria-labelledby="addRMModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-primary">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="fas fa-plus"></i>
                                                <h2 class="headline-md">Add Raw Materials</h2>
                                            </div>

                                            <form method="post" id="addRMForm" class="needs-validation" novalidate>

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
                                                                <input class="form-control" id="addRMCat" name="addRMCat" type="text" placeholder="Filler/Hardener" required />
                                                                <label class="label-blue" for="addRMCat"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Add Material Modal -->

                                <!-- Edit Material Modal -->
                                <div class="modal fade" id="updateRMModal" tabindex="-1" aria-labelledby="updateRMModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-warning">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update Raw Materials</h2>
                                            </div>

                                            <form method="post" id="updateRMForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updateRMMUId" name="updateRMMUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateRMMId" name="updateRMMId" type="text" placeholder="MID-001" readonly />
                                                                <label class="label-blue" for="updateRMMId"><i class="fa-solid fa-envelope"></i>Material ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateRMMN" name="updateRMMN" type="text" placeholder="Hi-Styrene" required />
                                                                <label class="label-blue" for="updateRMMN"><i class="fa-solid fa-envelope"></i>Material Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateRMCat" name="updateRMCat" type="text" placeholder="Filler/Hardener" required />
                                                                <label class="label-blue" for="updateRMCat"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateRMUnit" name="updateRMUnit" type="text" placeholder="Liter" required />
                                                                <label class="label-blue" for="updateRMUnit"><i class="fa-solid fa-envelope"></i>Unit<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateRMQty" name="updateRMQty" type="text" placeholder="100" required />
                                                                <label class="label-blue" for="updateRMQty"><i class="fa-solid fa-envelope"></i>Quantity<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateRMSupplier" name="updateRMSupplier" type="text" placeholder="Hakuta" required />
                                                                <label class="label-blue" for="updateRMSupplier"><i class="fa-solid fa-envelope"></i>Supplier<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdateRM" name="btnUpdateRM">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Material Modal -->

                                <!-- Delete Material Modal -->
                                <?php $functionClass->deleteRM(); ?>
                                <div class="modal fade" id="deleteRMModal" tabindex="-1" aria-labelledby="deleteRMModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-trash"></i>
                                                <h2 class="headline-md">Archive Raw Materials</h2>
                                            </div>

                                            <form method="post" id="deleteRMForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="deleteRMMUId" name="deleteRMMUId">
                                                        <input type="text" id="deleteRMMId" name="deleteRMMId">
                                                        
                                                        <div class="text-center mb-2">
                                                            <h4>Are you sure you want to archive Material Name: <strong><span id="deleteRMMN" class="text-danger"></span></strong>?</h4>
                                                        </div> 

                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-danger">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnDeleteRM" name="btnDeleteRM">Archive <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Delete Material Modal -->

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
                    </div>
                </div>
            </div>

            <footer>
                <p>Copyright © 2022 J.F. Rubber</p>
            </footer>
        </div>
    </div>

    <?php include_once('assets/components/all-scripts.php'); ?>   
    
    <!-- Add Raw Material JS Function -->
    <script src="../includes/jsFunction/raw-materials-add.js"></script>
    <!-- Edit Raw Material JS Function -->
    <script src="../includes/jsFunction/raw-materials-edit.js"></script>


    <!-- Get Raw Materials JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO Raw Materials Table
            var rawMaterialsTable = $('#rawMaterialsTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/raw-materials-get.php',
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

                dom: 'B',
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                        },
                        className: 'btn btn-success btn-flat mb-3 print-datatable d-none',
                        text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                        messageTop: '<div class="row"><div class="col-md-4 d-flex justify-content-end align-items-center"><img class="img-fluid" width="100" height="100" src="../assets/images/logo.png" alt="" alt=""></div><div class="col-md-5 text-center mt-3 mb-2"><strong>J.F. RUBBER PHILS., INC.</strong><br><h6>Block 2, Lot 6 People`s Technology, Sez, Carmona, Cavite</h6><h6>☏ (046) 430-3485 / (6346) 443-0342</h6><h6>✉ sales@jfrubber.ph</h6></div><div class="mb-2 mt-5 col-md-12 d-flex justify-content-center align-items-center"><h3><strong>Raw Materials</strong></h3></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $userFirstName . " " . $userLastName ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php date_default_timezone_set('Asia/Manila'); echo date('Y-m-d | h:i a') ?? ""; ?></h6></div></div>',

                        messageBottom: 'Test',
                        
                        title: '',
                    },
                ],
            });

            setInterval( function () {
                rawMaterialsTable.ajax.reload( null, false );
            }, 3000 );


            rawMaterialsTable.on('click', '.updateRM', function() {
                $('#updateRMModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateRMMId').val(data[0]);   
                $('#updateRMMUId').val(data[1]);   
                $('#updateRMMN').val(data[2]);   
                $('#updateRMCat').val(data[3]);   
                $('#updateRMUnit').val(data[4]);   
                $('#updateRMQty').val(data[5]);   
                $('#updateRMSupplier').val(data[6]);   
            });

            rawMaterialsTable.on('click', '.deleteRM', function() {
                $('#deleteRMModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deleteRMMId').val(data[0]);   
                $('#deleteRMMUId').val(data[1]);
                $('#deleteRMMN').text(data[2]);
            });
        });
    </script>
</body>

</html>
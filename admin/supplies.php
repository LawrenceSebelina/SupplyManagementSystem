<?php 
    include_once('../includes/mainFunction/functionClasses.php'); 
?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Supplies</title>
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
                                <h3 class="page-title">Supplies</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="students.html">Supply</a></li>
                                    <li class="breadcrumb-item active">All Supplies</li>
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
                                            <h3 class="page-title">Supplies</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                            <a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                            <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                            <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplyModal"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Supply Modal -->
                                <div class="modal fade" id="addSupplyModal" tabindex="-1" aria-labelledby="addSupplyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-primary">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="fas fa-plus"></i>
                                                <h2 class="headline-md">Add Supply</h2>
                                            </div>

                                            <form method="post" id="addSupplyForm" class="needs-validation" novalidate>

                                                <?php
                                                    $getSupplySId = $functionClass->getSupplySId();
                                                    if (!empty($getSupplySId)) {
                                                        $latestSupplySId = end($getSupplySId);
                                                        $getLatestSupplySId = sprintf("SUP-%03d", $latestSupplySId + 1);
                                                    } else {
                                                        $getLatestSupplySId = "SUP-001";
                                                    }                                                
                                                ?>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="addSupplySId" name="addSupplySId" type="text" value="<?php echo $getLatestSupplySId ?? ""; ?>" placeholder="SUP-001" readonly />
                                                                <label class="label-blue" for="addSupplySId"><i class="fa-solid fa-envelope"></i>Supply ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addSupplyRM" name="addSupplyRM" type="text" placeholder="Hi-Styrene" required />
                                                                <label class="label-blue" for="addSupplyRM"><i class="fa-solid fa-envelope"></i>Raw Material Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addSupplyCat" name="addSupplyCat" type="text" placeholder="Filter" required />
                                                                <label class="label-blue" for="addSupplyCat"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addSupplyUnit" name="addSupplyUnit" type="text" placeholder="Liter" required />
                                                                <label class="label-blue" for="addSupplyUnit"><i class="fa-solid fa-envelope"></i>Liter<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="addSupplyStock" name="addSupplyStock" type="text" placeholder="100" required />
                                                                <label class="label-blue" for="addSupplyStock"><i class="fa-solid fa-envelope"></i>Stock Available<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnAddSupply" name="btnAddSupply">Submit <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Add Supply Modal -->

                                <!-- Edit Supply Modal -->
                                <div class="modal fade" id="updateSuppyModal" tabindex="-1" aria-labelledby="updateSuppyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-warning">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-edit"></i>
                                                <h2 class="headline-md">Update Supply</h2>
                                            </div>

                                            <form method="post" id="updateSuppyForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="updateSuppySUId" name="updateSuppySUId">

                                                        <div class="col-12 col-sm-4">
                                                            <div class="form-floating">
                                                                <input class="form-control" id="updateSupplySId" name="updateSupplySId" type="text" placeholder="SUP-001" readonly />
                                                                <label class="label-blue" for="updateSupplySId"><i class="fa-solid fa-envelope"></i>Supply ID<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateSupplyRM" name="updateSupplyRM" type="text" placeholder="Hi-Styrene" required />
                                                                <label class="label-blue" for="updateSupplyRM"><i class="fa-solid fa-envelope"></i>Raw Material Name<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateSupplyCat" name="updateSupplyCat" type="text" placeholder="Filter" required />
                                                                <label class="label-blue" for="updateSupplyCat"><i class="fa-solid fa-envelope"></i>Category<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateSupplyUnit" name="updateSupplyUnit" type="text" placeholder="Liter" required />
                                                                <label class="label-blue" for="updateSupplyUnit"><i class="fa-solid fa-envelope"></i>Liter<span class="text-danger">*</span></label>

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
                                                                <input class="form-control" id="updateSupplyStock" name="updateSupplyStock" type="text" placeholder="100" required />
                                                                <label class="label-blue" for="updateSupplyStock"><i class="fa-solid fa-envelope"></i>Stock Available<span class="text-danger">*</span></label>

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
                                                    <button type="submit" class="btn btn-primary me-2" id="btnUpdateSupply" name="btnUpdateSupply">Update <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Edit Supply Modal -->

                                <!-- Delete Supply Modal -->
                                <?php $functionClass->deleteSupply(); ?>
                                <div class="modal fade" id="deleteSupplyModal" tabindex="-1" aria-labelledby="deleteSupplyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header modal-danger">
                                                <!-- <h1 class="modal-title fs-5" id="historyModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                <i class="feather-trash"></i>
                                                <h2 class="headline-md">Archive Supply</h2>
                                            </div>

                                            <form method="post" id="deleteCatForm" class="needs-validation" novalidate>

                                                <div class="modal-body">

                                                    <div class="row gy-4">
                                                        <div class="col-12">
                                                            <div class="alert alert-danger mb-4" id="alertMessage"></div>
                                                        </div>

                                                        <input type="text" id="deleteSupplySUId" name="deleteSupplySUId">
                                                        <input type="text" id="deleteSupplySId" name="deleteSupplySId">
                                                        
                                                        <div class="text-center mb-2">
                                                            <h4>Are you sure you want to archive Supply Raw Material Name: <strong><span id="deleteSupplyRM" class="text-danger"></span></strong>?</h4>
                                                        </div> 

                                                    </div>
                                                   
                                                </div>

                                                <div class="modal-footer modal-danger">
                                                    <button type="submit" class="btn btn-primary me-2" id="btnDeleteSupply" name="btnDeleteSupply">Archive <i class="fas fa-download"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <i class="fas fa-xmark"></i></button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End of Delete Supply Modal -->

                                <div class="table-responsive">
                                    <table class="table border-0 all-table table-hover table-center mb-0 table-striped" id="suppliesTable">
                                        <thead class="table-head">
                                            <tr>
                                                <th>Supply ID</th>
                                                <th>Supply UID</th>
                                                <th>Raw Material</th>
                                                <th>Category</th>
                                                <th>Unit</th>
                                                <th>Stock</th>
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
    
    <!-- Add Supply JS Function -->
    <script src="../includes/jsFunction/supply-add.js"></script>
    <!-- Edit Supply JS Function -->
    <script src="../includes/jsFunction/supply-edit.js"></script>

    <!-- Get Supplies JS Function -->
    <script>
        $(document).ready(function () { 
            // TODO Supplies Table
            var suppliesTable = $('#suppliesTable').DataTable({
                "ordering": false,
                "ajax": '../includes/phpFunction/supply-get.php',
                "columns": [
                    {data: "supplyId"},
                    {data: "supplyUId"},
                    {data: "supplyRawMaterial"},
                    {data: "supplyCategory"},
                    {data: "supplyUnit"},
                    {data: "supplyStock"},
                    {data: "actions"}
                ],
            });

            setInterval( function () {
                suppliesTable.ajax.reload( null, false );
            }, 3000 );


            suppliesTable.on('click', '.updateSupply', function() {
                $('#updateSuppyModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#updateSupplySId').val(data[0]);   
                $('#updateSuppySUId').val(data[1]);   
                $('#updateSupplyRM').val(data[2]);   
                $('#updateSupplyCat').val(data[3]);  
                $('#updateSupplyUnit').val(data[4]);   
                $('#updateSupplyStock').val(data[5]);  
            });

            suppliesTable.on('click', '.deleteSupply', function() {
                $('#deleteSupplyModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#deleteSupplySId').val(data[0]);   
                $('#deleteSupplySUId').val(data[1]);
                $('#deleteSupplyRM').text(data[2]);
            });
        });
    </script>
</body>

</html>
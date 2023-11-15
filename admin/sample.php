<script>
    rawMaterialsTable.on('click', '.addRMOrder', function() {
                $('#addRMODQModal').modal('show');
                
                
                var $tr = $(this).closest('tr');
                var $tds = $tr.find("td:not(:last-child)");

                var ordersTable = $('#rawMaterialsOrdersTable tbody');

                var matchFound = false;
                ordersTable.find('tr').each(function() {
                    var $existingRow = $(this);
                    var existingValues = $existingRow.find('td input').map(function() {
                        return $(this).val();
                    }).get();

                    if (JSON.stringify(existingValues) === JSON.stringify($tds.map(function() {
                        return $(this).text();
                    }).get())) {
                        matchFound = true;
                        return false;
                    }
                });

                
                var rawMaterialQty =   $('#valaddRMQty').val();


                $('#addRMODQModal').on('click', '#btnAddRMODQ', function() {
                    // Remove the row
                    if (!matchFound) {
                    var newRow = $('<tr></tr>');

                    // Retrieve th values of rawMaterialsOrdersTable, convert to small caps, and remove spaces
                    var columnNames = $('#rawMaterialsOrdersTable thead tr th').map(function() {
                        return $(this).text().toLowerCase().replace(/\s/g, ''); // \s matches any white space character
                    }).get();

                    $tds.each(function(index) {
                        var cellData = $(this).text();
                        var newCell = $('<td><input type="text" name="' + columnNames[index] + '[]' + '" value="' + cellData + '"></td>');
                        newRow.append(newCell);
                    });

                    newRow.append('<td><input type="text" name="materialqty[]" value="' + rawMaterialQty + '"></td>');
                    newRow.append('<td><div class="actions"><a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updateRMOD"><i class="feather-edit"></i></a><a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deleteRMOD"><i class="feather-trash"></i></a></div></td>');

                    $('#rawMaterialsOrdersTable tbody').append(newRow);
                } else {
                    swal('Already Added!', 'This Raw Material has already been added.', 'warning');
                }

                    // Close the modal
                    $('#addRMODQModal').modal('hide');
                });

                
            });
</script>
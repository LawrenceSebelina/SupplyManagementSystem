<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script> -->
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/plugins/datatables/js/datatables.min.js"></script>
<script src="assets/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/js/jszip.min.js"></script>
<script src="assets/plugins/datatables/js/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/js/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/js/buttons.print.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/script2.js"></script>




<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


<script>
    // TODO: Add Active Class on the Selected Route 
    <?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>
    $('.nav-<?php echo $route; ?>').addClass('active');
    // TODO: End of Add Active Class on the Selected Route 
</script>

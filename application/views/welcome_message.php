<?php
// namespace Phppot;
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>Drag & Drop</title>
<head>
<!-- <script src="./vendor/jquery/jquery-3.2.1.min.js"></script> -->
<!-- bootstrap min css  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

<!-- bootstrap 4 datatable min css  -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

 <!-- responsive bootstrap min css  -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" >

<style>
.loader-icon {
	display: none;
}
</style>
</head>
<body>
<div class="container">
        <h3 class="text-center">Codeigniter Dynamic Drag and Drop table rows</h3>
		<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Position</th>
				</tr>
			</thead>
			<tbody class="row_position">
				<?php 
				if($data_list){ 
				foreach($data_list as $data){
				?>
				<tr id="<?php echo $data->id;?>">
					<td ><?php echo $data->id?></td>
					<td><?php echo $data->name?></td>
					<td><?php echo $data->description?></td>
				</tr>
				<?php }}else{ ?>
				Record not found!
				<?php }?>

			</tbody>
		</table>
    </div>

	



	<!-- hh -->

<!-- jquery min js  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- bootstrap min js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- datatable min all js -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<!-- datable all js  -->

<!-- drag and drop  -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
<!-- drag and drop  -->

<!-- jquery ui  -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
	// datatable active js
	$(document).ready(function() {
		$('#example').DataTable({
			responsive: false,
			rowReorder: true,
			dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>tp",
			aaSorting: [[0, "desc"]],
			columnDefs: [
				{
				bSortable: true,
				aTargets: [0],
				},
				{
				bSortable: false,
				targets: 8,
				className: "text-center",
				},
			],
		});
	} );



    $(".row_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".row_position>tr").each(function() {
                selectedData.push($(this).attr("id"));
            });
			// alert(selectedData);
             updateOrder(selectedData);
        }
    });

    function updateOrder(aData) {
        $.ajax({
            url: "<?php echo base_url('save-drag-data');?>",
            type: 'POST',
            data: {
                allData: aData
            },
            success: function(r) {
				console.log(r);
                alert("Your change successfully saved");
            }
        });
    }
</script>
</body>

</html>
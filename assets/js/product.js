$(document).ready(function () {

	// Product & Product Category Datatable Initiator
	$('#tableProduct').DataTable();

	// Product & Product Category Delete
	$('#tableProduct').on('click','.btnDeleteProduct',function () {
		let id = $(this).data('id');
		$('#idProductDelete').val(id);
		swal({
			title: "Are you sure?",
			text: "Delete this item from list ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$('#formDeleteProduct').submit();
					swal("Item is deleted from list...", {
						icon: "success",
					});
				} else {
					swal("Delete Canceled !","Item was cancel delete...",'warning',{
						icon: "info",
					});
				}
			});
	})
})

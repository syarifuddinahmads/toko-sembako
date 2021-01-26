$(document).ready(function () {

	// Customer & Customer Category Datatable Initiator
	$('#tableCustomer').DataTable();

	// Customer & Customer Category Delete
	$('#tableCustomer').on('click','.btnDeleteCustomer',function () {
		let id = $(this).data('id');
		$('#idCustomerDelete').val(id);
		swal({
			title: "Are you sure?",
			text: "Delete this item from list ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$('#formDeleteCustomer').submit();
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

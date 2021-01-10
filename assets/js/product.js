$(document).ready(function () {

	$('#tableProduct').DataTable();

	$('#tableProduct').on('click','.btnDeleteProduct',function () {
		let id = $(this).data('id');
		$('#idProductDelete').val(id);
		swal({
			title: "Are you sure?",
			text: "Delete this product from list ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$('#formDeleteProduct').submit();
					swal("Item Product is deleted from list...", {
						icon: "success",
					});
				} else {
					swal("Delete Canceled !","Product was cancel delete...",'warning',{
						icon: "info",
					});
				}
			});
	})
})

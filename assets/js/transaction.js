$(document).ready(function () {

	// Transaction & Transaction Category Datatable Initiator
	$('#tableTransaction').DataTable();

	// Select Customer
	$('#customer').on('change',function () {
		let idCustomer = $(this).val();
		$('#id_customer').val(idCustomer)
	})

	// Select Payment
	$('#payment').on('change',function () {
		let payment = $(this).val();
		$('#payment_status').val(payment)
	})

	// Select Shipping
	$('#shipping').on('change',function () {
		let shipping = $(this).val();
		$('#type_shipping').val(shipping)
	})

	// Add product
	$('.btnAddProduct').on('click', function () {
		let customer = $('#customer').val();
		let payment = $('#payment').val();
		let shipping = $('#shipping').val();
		if (customer == '') {
			swal('Customer Not Selected !', 'Select Customer Before Add Product...', 'warning')
		}else if(shipping == ''){
			swal('Shipping Not Selected !', 'Select Shipping Before Add Product...', 'warning')
		}else if(payment == ''){
			swal('Payment Not Selected !', 'Select Payment Before Add Product...', 'warning')
		}else {
			let product = $('#product').val();
			let productName = $('#product').find(':selected').data('name');
			let productPrice = $('#product').find(':selected').data('price');
			let qty = $('#qty').val();
			let subTotal = productPrice * qty;
			if (product == '') {
				swal('Product Not Selected !', 'Select Product Before Add Product...', 'warning')
			} else if (qty == '') {
				swal('Qty Not Input  !', 'Input Qty Before Add Product...', 'warning')
			} else {
				let tr = `<tr>
				<td>
					<input type="hidden" class="form-control" name="id_product[]" value="${product}">
					<input type="text" class="form-control" name="product[]" value="${productName}" readonly>
				</td>
				<td>
					<input type="text" class="form-control text-right" name="price[]" value="${productPrice}" readonly>
				</td>
				<td>
					<input type="text" class="form-control text-center" name="qty[]" value="${qty}" readonly>
				</td>
				<td>
					<input type="text" class="form-control text-right" name="subtotal[]" value="${subTotal}" readonly>
				</td>
				<td class="text-center">
					<button class="btn btn-danger btn-sm btnDeleteProduct"><i class="fa fa-trash"></i></button>
				</td></tr>`;
				$('#product').val('')
				$('#qty').val('');
				$('#tableTransactionProduct tbody').append(tr);
			}
		}
	})

	$('#tableTransactionProduct').on('click','.btnDeleteProduct',function () {
		$(this).closest('tr').remove();
	})

	$('.btnSaveTransaction').on('click',function () {
		let lengthProduct = $('#tableTransactionProduct tbody tr').length;
		if(lengthProduct > 0){
			$('#formTransaction').submit();
		}else{
			swal('Product Not Input  !', 'Input Product Before Save...', 'warning')
		}
	})


	$('#tableTransaction').on('click','.btnDeleteTransaction',function () {
		let id = $(this).data('id');
		$('#idTransactionDelete').val(id);
		swal({
			title: "Are you sure?",
			text: "Delete this item from list ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$('#formDeleteTransaction').submit();
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

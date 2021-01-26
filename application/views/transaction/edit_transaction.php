<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<form action="<?php echo site_url('transaction/update')?>" method="post" enctype="multipart/form-data">

		<input type="hidden" name="code_transaction" id="code_transaction" value="<?php echo $transaction->code_transaction; ?>">

		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-8">
						<div class="card-title mb-0">Edit Transaction -  <?php echo $transaction->code_transaction ?></div>
					</div>
					<div class="col-md-4">
						<div class="text-right">
							<a href="<?php echo site_url('transaction/list')?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Customer</label>
							<select name="id_customer" id="customer" class="form-control" required>
								<option value="">Select Customer</option>
								<?php foreach ($customers as $c){?>
									<option <?php echo $transaction->id_customer == $c->id?'selected':'' ?> value="<?php echo $c->id ?>"><?php echo $c->name?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Shipping</label>
							<select name="type_shipping" id="shipping" class="form-control" required>
								<option value="">Select Shipping</option>
								<option <?php echo $transaction->type_shipping == 'Shipping'?'selected':'' ?> value="1">Shipping</option>
								<option <?php echo $transaction->type_shipping == 'Pick Up'?'selected':'' ?> value="2">Pick Up</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Payment</label>
							<select name="payment_status" id="payment" class="form-control" required>
								<option value="">Select Payment</option>
								<option <?php echo $transaction->payment_status == 'Paid'?'selected':'' ?> value="1">Paid</option>
								<option <?php echo $transaction->payment_status == 'Pending'?'selected':'' ?> value="2">Pending</option>
								<option <?php echo $transaction->payment_status == 'Rejected'?'selected':'' ?> value="3">Rejected</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<h5>Detail Product</h5>
				<table class="table">
					<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Product</th>
						<th class="text-center">Price</th>
						<th class="text-center">Qty</th>
						<th class="text-center">Subtotal</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$subtotal = 0;
					foreach ($transaction_detail as $key => $td) {
						$subtotal = $td->subtotal;
						?>

						<tr>
							<td class="text-center"><?php echo $key+1 ?></td>
							<td><?php echo $td->name?></td>
							<td class="text-right"><?php echo number_format($td->price,2) ?></td>
							<td class="text-center"><?php echo $td->qty ?></td>
							<td class="text-right"><?php echo number_format($td->subtotal,2) ?></td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="4" class="text-right"><strong>Total</strong></td>
						<td class="text-right"><strong><?php echo number_format($subtotal,2) ?></strong></td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<div class="text-right">
					<button type="reset" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</button>
					<button type="submit" class="btn btn-primary btnUpdateTransaction"><i class="fa fa-save"></i> Update Transaction</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
$this->load->view('partials/footer');
?>

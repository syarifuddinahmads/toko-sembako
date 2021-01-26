<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8">
					<div class="card-title">Add Transaction</div>
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
								<option value="<?php echo $c->id ?>"><?php echo $c->name?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Product</label>
						<select id="product" class="form-control" required>
							<option value="">Select Product</option>
							<?php foreach ($products as $p){?>
								<option data-name="<?php echo $p->name ?>" data-price="<?php echo $p->price ?>" value="<?php echo $p->id ?>"><?php echo $p->name?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<label for="">Qty</label>
					<input id="qty" type="number" class="form-control text-right" placeholder="0">
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<button class="btn btn-success mt-4 btnAddProduct"><i class="fa fa-plus"></i> Add Product</button>
					</div>
				</div>
			</div>
			<hr>
			<form action="<?php echo site_url('transaction/save')?>" id="formTransaction" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id_customer" id="id_customer">

				<table class="table" id="tableTransactionProduct">
					<thead>
					<tr>
						<th class="text-center">Product</th>
						<th class="text-center">Price</th>
						<th class="text-center">Qty</th>
						<th class="text-center">Subtotal</th>
						<th class="text-center">Action</th>
					</tr>
					</thead>
					<tbody></tbody>
				</table>
			</form>
		</div>
		<div class="card-footer">
			<div class="text-right">
				<button type="reset" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</button>
				<button type="submit" class="btn btn-primary btnSaveTransaction"><i class="fa fa-save"></i> Save Transaction</button>
			</div>
		</div>
	</div>
</div>

<?php
$this->load->view('partials/footer');
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8">
					<div class="card-title">Data Transaction</div>
				</div>
				<div class="col-md-4">
					<div class="text-right">
						<a href="<?php echo site_url('transaction/add')?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Transaction</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table" id="tableTransaction">
				<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Date Transaction</th>
					<th class="text-center">Date Payment</th>
					<th class="text-center">Name</th>
					<th class="text-center">Grandtotal</th>
					<th class="text-center">Type Shipping</th>
					<th class="text-center">Payment Status</th>
					<th class="text-center">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($transaction as $key => $t) { ?>
					<tr>
						<td class="text-center"><?php echo $key+1 ?></td>
						<td><?php echo date('Y M d',strtotime($t->date_transaction)) ?></td>
						<td class="text-center"><?php echo !empty($t->date_payment)?date('Y M d',strtotime($t->date_payment)):'-' ?></td>
						<td><?php echo $t->name ?></td>
						<td class="text-right"><?php echo number_format($t->grandtotal,2) ?></td>
						<td class="text-center"><?php echo $t->type_shipping ?></td>
						<td class="text-center"><?php echo $t->payment_status ?></td>
						<td class="text-center">
							<a href="<?php echo site_url('transaction/edit?id='.$t->code_transaction)?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
							<a href="javascript:void(0)" class="btn btn-sm btn-danger btnDeleteTransaction" data-id="<?php echo $t->code_transaction ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="d-none">
	<form id="formDeleteTransaction" action="<?php echo site_url('transaction/delete')?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" id="idTransactionDelete">
	</form>
</div>


<?php
$this->load->view('partials/footer');
?>

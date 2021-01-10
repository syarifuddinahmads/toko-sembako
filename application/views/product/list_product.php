<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8">
					<div class="card-title">Data Product</div>
				</div>
				<div class="col-md-4">
					<div class="text-right">
				<a href="<?php echo site_url('product/add')?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Product</a>
			</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table" id="tableProduct">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
					<th class="text-center">Price</th>
					<th class="text-center">Stock</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $key => $p) { ?>
					<tr>
						<td class="text-center"><?php echo $key+1 ?></td>
						<td><?php echo $p->name ?></td>
						<td class="text-right"><?php echo number_format($p->price,2) ?></td>
						<td class="text-center"><?php echo $p->stock ?></td>
						<td class="text-center">
							<a href="<?php echo site_url('product/edit?id='.$p->id)?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
							<a href="javascript:void(0)" class="btn btn-sm btn-danger btnDeleteProduct" data-id="<?php echo $p->id ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<div class="d-none">
	<form id="formDeleteProduct" action="<?php echo site_url('product/delete')?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" id="idProductDelete">
	</form>
</div>

<?php
	$this->load->view('partials/footer');
?>

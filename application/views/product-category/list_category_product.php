<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8">
					<div class="card-title">Data Product Category</div>
				</div>
				<div class="col-md-4">
					<div class="text-right">
				<a href="<?php echo site_url('product/category/add')?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Category Product</a>
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
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($category_product as $key => $cp) { ?>
					<tr>
						<td class="text-center"><?php echo $key+1 ?></td>
						<td><?php echo $cp->name ?></td>
						<td class="text-center">
							<a href="<?php echo site_url('product/category/edit?id='.$cp->id)?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
							<a href="javascript:void(0)" class="btn btn-sm btn-danger btnDeleteProduct" data-id="<?php echo $cp->id ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<div class="d-none">
	<form id="formDeleteProduct" action="<?php echo site_url('product/category/delete')?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" id="idProductDelete">
	</form>
</div>

<?php
	$this->load->view('partials/footer');
?>

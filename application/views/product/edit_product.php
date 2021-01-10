<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<form action="<?php echo site_url('product/save')?>" method="post" enctype="multipart/form-data">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-8">
						<div class="card-title">Edit Product</div>
					</div>
					<div class="col-md-4">
						<div class="text-right">
							<a href="<?php echo site_url('product/list')?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" name="name">
						</div>
						<div class="form-group">
							<label for="">Price</label>
							<input type="number" class="form-control" name="price">
						</div>
						<div class="form-group">
							<label for="">Stock</label>
							<input type="number" class="form-control" name="stock">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Category</label>
							<select name="category" class="form-control">
								<option value="">Select Category</option>
								<?php foreach ($category_product as $cp){?>
									<option value="<?php echo $cp->id ?>"><?php echo $cp->name?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Category</label>
							<select name="status" class="form-control">
								<option value="Active">Active</option>
								<option value="In Active">In Active</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="text-right">
					<button type="reset" class="btn btn-warning"><i class=""></i> Cancel</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Product</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
$this->load->view('partials/footer');
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<form action="<?php echo site_url('product/update')?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $product->id?>">
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
							<input type="text" class="form-control" name="name" value="<?php echo $product->name?>" required>
						</div>
						<div class="form-group">
							<label for="">Price</label>
							<input type="number" class="form-control" name="price" value="<?php echo $product->price?>" required>
						</div>
						<div class="form-group">
							<label for="">Stock</label>
							<input type="number" class="form-control" name="stock"  value="<?php echo $product->stock?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Category</label>
							<select name="category" class="form-control" required>
								<option value="">Select Category</option>
								<?php foreach ($category_product as $cp){?>
									<option <?php echo $product->category == $cp->id ?'selected':'' ?> value="<?php echo $cp->id ?>"><?php echo $cp->name?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Category</label>
							<select name="status" class="form-control" required>
								<option <?php echo $product->status == 'Active' ?'selected':'' ?> value="Active">Active</option>
								<option <?php echo $product->status == 'In Active' ?'selected':'' ?> value="In Active">In Active</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="text-right">
					<button type="reset" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Product</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
$this->load->view('partials/footer');
?>

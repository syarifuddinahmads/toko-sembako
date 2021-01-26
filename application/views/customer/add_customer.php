<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container mt-4 mb-4">
	<form action="<?php echo site_url('customer/save')?>" method="post" enctype="multipart/form-data">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-8">
						<div class="card-title">Add Customer</div>
					</div>
					<div class="col-md-4">
						<div class="text-right">
							<a href="<?php echo site_url('customer/list')?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<textarea name="alamat" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="">No Telp</label>
							<input type="number" class="form-control" name="no_telp" required>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="text-right">
					<button type="reset" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Customer</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
$this->load->view('partials/footer');
?>

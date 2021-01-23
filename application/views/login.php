<!DOCTYPE html>
<html>
<head>
	<title>Toko Sembako</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">

	<div class="mb-5 mt-5">
		<div class="row">
			<div class="col-md-6 offset-3">
				<form action="<?php echo site_url('login/process')?>" method="post" enctype="multipart/form-data">
					<div class="card shadow-sm">
						<div class="card-header bg-white">
							<h4 class="mb-0">Login</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" placeholder="Input email">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Input password">
							</div>
						</div>
						<div class="card-footer bg-white text-center">
							<button type="reset" class="btn btn-secondary"><i class="fa fa-close"></i> Cancel</button>
							<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>


<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
</body>
</html>

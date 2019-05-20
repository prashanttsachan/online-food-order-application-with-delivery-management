<?php require 'includes/header.php'; ?>
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
	<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<!--h4>Continue to basket</h4>
						<ul>
							<li>Product1 <i>-</i> <span>$675.00 </span></li>
							<li>Product2 <i>-</i> <span>$325.00 </span></li>
							<li>Product3 <i>-</i> <span>$405.00 </span></li>
							<li>Total Service Charges <i>-</i> <span>$55.00</span></li>
							<li>Total <i>-</i> <span>$1405.00</span></li>
						</ul -->
					</div>
					<div class="col-md-8 address_form">
						<h4>Manage Details</h4>
						<form action="<?= base_url("action/profile"); ?>" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Address: </label>
											<input class="form-control" type="text" name="address" value="<?= $this->session->address; ?>" placeholder="Address">
										</div>
										<div class="controls">
											<label class="control-label">City: </label>
											<input class="form-control" type="text" name="city" value="<?= $this->session->city; ?>" placeholder="City">
										</div>
										<div class="controls">
											<label class="control-label">State: </label>
											<input class="form-control" type="text" name="state" value="<?= $this->session->state; ?>" placeholder="State">
										</div>
										<div class="controls">
											<label class="control-label">Pin: </label>
											<input class="form-control" type="text" name="pin" value="<?= $this->session->pin; ?>" placeholder="Pin">
										</div>
									<button class="submit check_out">Update these details</button>
								</div>
							</section>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- //top products -->
	</div>
</section>
<?php require 'includes/footer.php'; ?>
<?php require 'includes/header.php'; ?>
<!--show Now-->  
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
	<div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
		<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Menu</h3>
		<div class="row">
			<div class="left-ads-display col-lg-12">
				<div class="row">
				    <?php foreach ($products as $row): ?>
					<div class="col-lg-4 col-md-6 col-sm-6 product-men women_two <?= $row->category; ?>">
						<div class="product-toys-info">
							<div class="men-pro-item">
								<div class="item-info-product">
									<div class="info-product-price" style="border:none;">
										<div class="grid_meta">
											<div class="product_price">
												<h4><a href="#"> <?= $row->name; ?></a></h4>
												<div class="grid-price mt-2"><span class="money ">INR<?= $row->price; ?></span></div>
											</div>
										</div>
										<div class="toys single-item hvr-outline-out">
											<form action="<?php echo base_url('action/cart/add'); ?>" method="post">
												<input type="hidden" name="id" value="<?= $row->id; ?>" required>
												<input type="hidden" name="name" value="<?= $row->name; ?>" required>
												<input type="hidden" name="price" value="<?= $row->price; ?>" required>
												<input type="hidden" name="qty" value="1" required>
												<button type="submit" class="toys-cart ptoys-cart">
												<i class="fas fa-cart-plus"></i>
												</button>
											</form>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require 'includes/footer.php'; ?>
<script>
$('.menu').click(function(e){
    e.preventDefault();
    var category = $(this).attr("data");
    $(".product-men").css("display", "none");
    $("."+category).css("display", "block");
});
</script>
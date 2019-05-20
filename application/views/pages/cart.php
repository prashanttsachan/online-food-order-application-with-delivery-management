<?php require 'includes/header.php'; ?>
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
	<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Chec<span>kout</span></h3>
				<div class="checkout-right" style="overflow: scroll;">
					<h4>Your shopping cart contains: <span><?= $this->cart->total_items(); ?> Item(s)</span></h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Total</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
						    <?php $i = 0; foreach ($this->cart->contents() as $row): ?>
							<tr class="rem1">
								<td class="invert"><?= $i+1; ?></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<a class="entry value-minus">&nbsp;</a>
											<input type="hidden" name="qty" value="<?= $row['qty']; ?>">
											<div class="entry value"><span class="qty"><?= $row['qty']; ?></span></div>
											<a class="entry value-plus active">&nbsp;</a>
										</div>
									</div>
								</td>
								<td class="invert"><?= $row['name']; ?></td>
								<td class="invert">INR<?= $this->cart->format_number($row['price']); ?></td>
                                <td class="invert">INR<?= $this->cart->format_number($row['subtotal']); ?></td>
								<td class="invert">
								    <input type="hidden" class="rowid" name="rowid" value="<?= $row['rowid']; ?>">
									<div class="rem">
										<a href="cart" class="close1"> </a>
									</div>
								</td>
							</tr>
							<?php $i++; endforeach; ?>
							<? if ($i == 0): ?>
							    <tr class="rem1"><td class="invert" colspan="6"><p>You cart is empty. Please add items to your cart</p></td></tr>
							<? endif; ?>
						</tbody>
					</table>
				</div>
				<? if($this->cart->total_items() > 0): ?>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<h4>Continue to basket</h4>
						<ul>
						    <?php $i = 0; foreach ($this->cart->contents() as $row): ?>
							<li><?= $row['name']; ?> <i>-</i> <span>INR<?= $this->cart->format_number($row['subtotal']); ?> </span></li>
							<?php $i++; endforeach; ?>
							<!--li>Total Service Charges <i>-</i> <span>$55.00</span></li -->
							<li>Total <i>-</i> <span>INR<?= $this->cart->format_number($this->cart->total()); ?></span></li>
						</ul>
					</div>
					<div class="col-md-8 address_form">
						<h4>Payment information</h4>
						<?php if (!$this->session->logged_in): ?>
						<h4>Please login to proceed further ...</h4>
						<a href="#" data-toggle="modal" data-target="#exampleModal" style="color:blue;">Click here</a> to update your profile.
						<?php elseif (empty($this->session->address) || empty($this->session->city) || empty($this->session->state) || empty($this->session->pin)): ?>
						<h4>Please complete your profile before placing an order ...</h4>
						<a href="<?= base_url("profile"); ?>" style="color:blue;">Click here</a> to update your profile.
						<?php else: ?>
						<form action="<?= base_url("placeholder"); ?>" method="get" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Payment method: </label>
											<select class="form-control option-w3ls method" name="pay-method" style="padding:8px;">
												<option value="cod">Cash on delivery</option>
											</select>
										</div>
									</div>
									<button type="submit" class="place-order submit check_out">Place Order</button>
								</div>
							</section>
						</form>
						<div class="checkout-right-basket">
							<a href="payment.html">Make a Payment </a>
						</div>
						<?php endif; ?>
					</div>
					<div class="clearfix"> </div>
					<div class="clearfix"></div>
				</div>
				<? endif; ?>
			</div>
		</div>
		<!-- //top products -->
	</div>
</section>
<?php require 'includes/footer.php'; ?>
<script>
$('.value-minus').click(function(e){
    e.preventDefault();
    var qty = parseInt($(this).closest("tr").find("input[name=qty]").val());
    var row = $(this).closest("tr").find("input[name=rowid]").val();
    $(this).closest("tr").find("input[name=qty]").val(qty-1);
    $(this).closest("tr").find("span.qty").html(qty-1);
    cart (row, qty-1)
});
$('.value-plus').click(function(e){
    e.preventDefault();
    var qty = parseInt($(this).closest("tr").find("input[name=qty]").val());
    var row = $(this).closest("tr").find("input[name=rowid]").val();
    $(this).closest("tr").find("input[name=qty]").val(qty+1);
    $(this).closest("tr").find("span.qty").html(qty+1);
    cart (row, qty+1)
});
function cart (row, qty) {
    $.ajax({
        type: "POST",
        url: "action/cart/update",
        data: "rowid=" + row + "&qty="+qty,
        success: function(data) {
            if (data != "success") alert(data);
        }
    });
}
$("form").submit(function() {
    if ($(".method").val() == "cod")
        window.location.href = "<?= base_url("action/place-order?req=cod"); ?>";
});
$(".close1").click(function(e) {
    e.preventDefault();
    var row = $(this).closest("tr").find("input[name=rowid]").val();
    $(this).closest("tr").remove();
    $.ajax({
        type: "POST",
        url: "action/cart/update",
        data: "rowid=" + row + "&qty=0",
        success: function(data) {
        }
    });
});
</script>
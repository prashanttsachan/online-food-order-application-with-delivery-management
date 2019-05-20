<?php require 'includes/header.php'; ?>
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
	<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Ord<span>ers</span></h3>
				<div class="checkout-right" style="overflow: scroll;">
					<?php $i = 1; foreach ($orders as $row): ?>
					<table class="table table-striped" style="border: 1px solid green;">
						<tbody>
						    <tr class="rem1">
								<th colspan="4">Order <?= $i; ?>:</td>
							</tr>
							<tr class="rem1">
								<th>Name: </td>
								<td class="invert"><?= $row->first_name; ?> <?= $row->last_name; ?></td>
								<th>Payment method: </td>
								<td class="invert"><?= $row->method; ?></td>
							</tr>
							<tr class="rem1">
								<th>Address: </td>
								<td class="invert"><?= $row->address; ?></td>
								<th>City: </td>
								<td class="invert"><?= $row->city; ?></td>
							</tr>
							<tr class="rem1">
								<th>PIN Code: </td>
								<td class="invert"><?= $row->pin; ?></td>
								<th>State: </td>
								<td class="invert"><?= $row->state; ?></td>
							</tr>
							<tr class="rem1">
								<th>Status: </td>
								<td class="invert"><?= $row->pstatus; ?></td>
								<th>Country: </td>
								<td class="invert"><?= $row->country; ?></td>
							</tr>
							<tr class="rem1">
								<th>Date: </td>
								<td class="invert"><?= date_format(date_create($row->cr_date), "d M, Y h:i A"); ?></td>
								<th>Del date: </td>
								<td class="invert"><?= date_format(date_create($row->dl_date), "d M, Y h:i A"); ?></td>
							</tr>
							<tr>
							    <td colspan="2"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?= $i; ?>"> <span class="fa fa-eye"></span></button></td>
							    <th>Current Status: </td>
								<td class="invert"><?= $row->status; ?></td>
							</tr>
						</tbody>
					</table></br>
					<?php $i++; endforeach; ?>
					<? if ($i == 0): ?>
					<table class="timetable_sub">
						<tbody>
					        <tr class="rem1"><td class="invert" colspan="6"><p>No order yet.</p></td></tr>
					    </tbody>
					</table>
					<? endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $i = 1; foreach ($orders as $row): ?>
<!-- Modal 1-->
<div class="modal fade" id="exampleModal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="col s12" method="POST" action="<?php echo base_url('action/order/deliver'); ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Order detail</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                    <table class="table table-striped">
                        <thead>
                            <tr>
        					    <th>Product: </th>
        					    <th>Quantity: </th>
        					    <th>Price: </th>
        					    <th>Total: </th>
        					</tr>
                        </thead>
                        <tbody>
                            <?php foreach ($row->items as $row1): ?>
    						<tr class="rem1">
    							<td><?= $row1->product; ?></td>
    							<td><?= $row1->qty; ?></td>
    							<td>INR <?= $row1->price; ?></td>
    							<td>INR <?= $row1->price*$row1->qty; ?></td>
    						</tr>
    						<?php endforeach; ?>
                        </tbody>
                    </table>
                    <? if ($row->status == "Hold"): ?>
                    <div class="styled-input">
                        <input type="text" name="dlcode" placeholder="Delivery code" required>
                    </div>
                    <div class="styled-input">
                        <input type="text" name="remarks" placeholder="Remarks" required>
                    </div>
                    <? endif; ?>
                 </div>
               </div>
               <div class="modal-footer">
                   <? if ($row->status == 'Hold'): ?>
                    <input type="hidden" name="order" value="<?= base64_encode($row->id); ?>">
                    <button type="submit" class="btn btn-success">Deliver</button>
                    <? endif; ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
        </form>
    </div>
</div>
<? $i++; endforeach; ?>
<?php require 'includes/footer.php'; ?>
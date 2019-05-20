<? $this->view("admin/header"); ?>
<div id="content">
	<? $this->view("admin/topbar"); ?>
	<section class="tables-section">
	    <div class="outer-w3-agile mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name </th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pin</th>
                        <th scope="col">Date</th>
                        <th scope="col">Del Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <? $id = ""; foreach ($orders as $row): ?>
                    <tr>
                        <td><?= $row->first_name." ".$row->last_name; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->mobile; ?></td>
                        <td><?= $row->address; ?></td>
                        <td><?= $row->city; ?></td>
                        <td><?= $row->state; ?></td>
                        <td><?= $row->pin; ?></td>
                        <td><?= date_format(date_create($row->cr_date), "d M, Y h:i A"); ?></td>
                        <td><?= date_format(date_create($row->dl_date), "d M, Y h:i A"); ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $row->id; ?>">
                            <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <? $id = $row->id; endforeach; ?>
                    <tr>
                        <td colspan="10"><a href="<?= base_url("adm190/orders?q=".base64_encode($id)."&status=". $this->input->get("status")); ?>" class="btn btn-info">Next <i class="fa fa-chevron-right"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</section>
	<? foreach ($orders as $row): ?>
	<div class="modal fade" id="exampleModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
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
                            <tr>
    							<td><?= $row1->product; ?></td>
    							<td><?= $row1->qty; ?></td>
    							<td>INR <?= $row1->price; ?></td>
    							<td>INR <?= $row1->price*$row1->qty; ?></td>
    						</tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
	<? endforeach; ?>
<? $this->view("admin/footer"); ?>
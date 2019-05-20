<? $this->view("admin/header"); ?>
<div id="content">
	<? $this->view("admin/topbar"); ?>
	<section class="tables-section">
	    <div class="outer-w3-agile mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan="10">
                            <a href="<?= base_url("adm190/action/user-import"); ?>" class="btn btn-info"> Download <i class="fa fa-download"></i></a>
						</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name </th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <? $id = ""; foreach ($users as $row): ?>
                    <tr>
                        <th scope="row"></th>
                        <td><?= $row->firstname." ".$row->lastname; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->mobile; ?></td>
                        <td><?= $row->address; ?></td>
                        <td><?= $row->city; ?></td>
                        <td><?= $row->state; ?></td>
                        <td><?= $row->pin; ?></td>
                        <td>
                            <a href="<?= base_url("adm190/user-view?q=".base64_encode($id)); ?>" ><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <? $id = $row->id; endforeach; ?>
                    <tr>
                        <td colspan="10"><a href="<?= base_url("adm190/users?q=".base64_encode($id)); ?>" class="btn btn-info">Next <i class="fa fa-chevron-right"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</section>
<? $this->view("admin/footer"); ?>
<script>
$("form").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: $(this).serialize(), // serializes the form's elements.
        success: function(data) {
            alert(data);
        }
    });
});
</script>	
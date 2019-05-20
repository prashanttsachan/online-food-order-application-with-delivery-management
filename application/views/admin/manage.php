<? $this->view("admin/header"); ?>
<div id="content">
	<? $this->view("admin/topbar"); ?>
	<section class="tables-section">
	    <div class="outer-w3-agile mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name </th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <? $i = 1; $id = ""; foreach ($products as $row): ?>
                    <tr data="<?= $i; ?>" >
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->price; ?></td>
                        <td>
                            <form action="<?php echo base_url('action/category/remove'); ?>" method="post">
								<input type="hidden" name="id" value="<?= $row->id; ?>" required>
								<a href="<?= base_url("adm190/edit-product?q=".base64_encode($row->id)); ?>" ><i class="fa fa-edit"></i></a>
								<button type="submit" class="delete toys-cart ptoys-cart">
								<i class="fas fa-trash"></i>
								</button>
							</form>
                        </td>
                    </tr>
                    <? $i++; $id = $row->id; endforeach; ?>
                    <tr>
                        <td colspan="8"><a href="<?= base_url("adm190/manage?q=".base64_encode($id)); ?>" class="btn btn-info">Next <i class="fa fa-chevron-right"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
	</section>
<input type="hidden" value="" class="delete-this"/>
<? $this->view("admin/footer"); ?>
<script>
$("form").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: $(this).serialize(), // serializes the form's elements.
        success: function(data) {
            $('form').find("input[type=text],input[type=email], input[type=password], textarea").val("");
            if (data == 'success') {
                window.location.href = "";
            } else {
                alert(data);
            }
        }
    });
});
</script>	
<script>
$('.delete').click(function() {
    var row = $(this).parents('tr').attr("data");
    $(".delete-this").val(row);
    setTimeout(function(){
        var row = $(".delete-this").val();
        $("tr:nth-child(" + row + ")").remove();
    }, 100);
});
</script>
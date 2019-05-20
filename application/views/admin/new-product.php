<? $this->view("admin/header"); ?>
<div id="content">
	<? $this->view("admin/topbar"); ?>
	<section class="forms-section">
	    <div class="outer-w3-agile mt-3">
            <div class="row validform">
                <div class="col-md-8 order-md-1 validform2">
                    <h4 class="mb-3">New products</h4>
                    <form action="<?= base_url("adm190/action/item/add"); ?>" method="post" class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select  name="category" class="custom-select d-block w-100" id="category" required="">
                                    <option value="">Choose...</option>
                                    <?php foreach($category as $row): ?>
                                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>
                            <!--div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required="">
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div -->
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="firstName">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="" value="" required="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastName">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="" value="" required="">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block error-w3l-btn" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
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
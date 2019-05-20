<? $this->view("admin/header"); ?>
<div id="content">
	<? $this->view("admin/topbar"); ?>
	<section class="forms-section">
	    <div class="outer-w3-agile mt-3">
            <div class="row validform">
                <div class="col-md-8 order-md-1 validform2">
                    <h4 class="mb-3">New products</h4>
                    <form action="<?= base_url("adm190/action/category/edit"); ?>" method="post" class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="firstName">Name</label>
                                <input type="hidden" name="id" id="name" value="<?= $cat->id; ?>" required="">
                                <input type="text" class="form-control" name="name" id="name" value="<?= $cat->name; ?>" required="">
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
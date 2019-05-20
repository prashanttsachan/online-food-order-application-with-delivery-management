<?php require 'includes/header.php'; ?>
<div class="container-fluid product-page">
	<div class="container current-page">
		<nav>
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="<?= base_url(''); ?>" class="breadcrumb">Kathiking</a>
					<a href="#" class="breadcrumb">Password</a>
				</div>
			</div>
		</nav>
	</div>
</div>
<div class="container editprofile">
	<div class="container">
		<div class="card">
			<div class="row">
				<form class="col s12" method="POST" action="<?php echo base_url('action/change-password'); ?>">
					<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input type="password" placeholder="Password" name="password" class="validate value1" required>
						</div>
						<div class="input-field col s12 meh">
							<i class="material-icons prefix">lock</i>
							<input type="password" placeholder="Confirm Password" name="password" class="validate value2" required>
						</div>
						<div class="center-align">
							<button type="submit" name="update" class="btn meh button-rounded waves-effect waves-light ">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require 'includes/footer.php'; ?>
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
                window.location.href = "<?php echo base_url(''); ?>";
            } else {
                alert(data);
            }
        }
    });
});
</script>
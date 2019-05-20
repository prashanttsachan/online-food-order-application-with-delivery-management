<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ciesta Technologies</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta name="keywords" content="" />
		<script>
			addEventListener("load", function () {
			    setTimeout(hideURLbar, 0);
			}, false);
			
			function hideURLbar() {
			    window.scrollTo(0, 1);
			}
		</script>
		<link href="admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="admin/css/fontawesome-all.css" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	</head>
	<body>
		<div class="bg-page py-5">
			<div class="container">
				<h2 class="main-title-w3layouts mb-2 text-center text-white">Login</h2>
				<div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
					<form action="<?= base_url("adm190/action/sign-in"); ?>" method="post">
						<div class="form-group">
							<label>Email address</label>
							<input type="email" name="email" class="form-control" placeholder="Enter email" required="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password" required="">
						</div>
						<div class="d-sm-flex justify-content-between">
							<div class="form-check col-md-6 text-sm-left text-center">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1">Remember me</label>
							</div>
							<div class="forgot col-md-6 text-sm-right text-center">
								<a href="forgot.html">forgot password?</a>
							</div>
						</div>
						<button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Login</button>
					</form>
				</div>
				<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
					<p>© 2018 Ciesta . All Rights Reserved | Design by
						<a href="https://ciesta.in/"> Ciesta Technologies </a>
					</p>
				</div>
			</div>
		</div>
		<script src='admin/js/jquery-2.2.3.min.js'></script>
		<script src="admin/js/bootstrap.min.js"></script>
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
</body>
</html>
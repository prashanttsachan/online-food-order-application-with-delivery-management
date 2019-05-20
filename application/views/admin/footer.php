				<div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
					<p>© 2018 Modernize . All Rights Reserved | Developed by
						<a href="http://ciesta.in/"> Ciesta Technologies </a>
					</p>
				</div>
			</div>
		</div>
		<script src='<?= base_url("admin/"); ?>js/jquery-2.2.3.min.js'></script>
		<script>
			$(document).ready(function () {
			    $('#sidebarCollapse').on('click', function () {
			        $('#sidebar').toggleClass('active');
			    });
			});
		</script>
		<script>
			$(document).ready(function () {
			    $(".dropdown").hover(
			        function () {
			            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
			            $(this).toggleClass('open');
			        },
			        function () {
			            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
			            $(this).toggleClass('open');
			        }
			    );
			});
		</script>
		<script src="<?= base_url("admin/"); ?>js/bootstrap.min.js"></script>
	</body>
</html>
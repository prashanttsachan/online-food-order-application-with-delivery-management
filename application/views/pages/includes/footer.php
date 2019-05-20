      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <p> 
               © 2018 Kathiking. All Rights Reserved | Developed by <a href="https://www.ciesta.in" target="_blank">Ciesta Technologies</a> Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
            </p>
         </div>
      </footer>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form sign-in">
                     <form action="<?= base_url('action/sign-in'); ?>" method="post">
                        <div class="fields-grid">
                            <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
                  <div class="register-form sign-up" style="display:none;">
                     <form action="<?= base_url('action/sign-up'); ?>" method="post">
                        <div class="fields-grid">
                            <div class="styled-input">
								<input type="text" name="email" placeholder="E-mail" class="validate" required>
							</div>
							<div class="styled-input">
								<input type="text" name="mobile" placeholder="Mobile" class="validate" required>
							</div>
							<div class="styled-input">
								<input type="text" placeholder="First Name" name="firstname" class="validate" required>
							</div>
							<div class="styled-input">
							    <input type="text"  placeholder="Last Name" name="lastname" class="validate" required>
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" class="validate value1" required>
							</div>
							<div class="styled-input">
								<input type="password" name="password" placeholder="Confirm Password" class="validate value2" required>
							</div>
							<div class="styled-input">
								<input type="text" placeholder="State" name="state" class="validate" required>
							</div>
							<div class="styled-input">
								<input type="text" placeholder="City" name="city" class="validate" required>
							</div>
							<div class="styled-input">
								<input type="text" name="address" placeholder="Address" class="validate" required>
							</div>
							<div class="styled-input">
								<input type="text" name="country" placeholder="Country" value="India" class="validate" readonly>
							</div>
                           <button type="submit" class="btn subscrib-btnn">Sign-up</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="signin" >Sign-in</button>
                    <button type="button" class="btn btn-secondary" id="signup" >Sign-up</button>
               </div>
            </div>
         </div>
      </div>
      <script src='<?php echo base_url('cdn/js/jquery-2.2.3.min.js'); ?>'></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!-- //cart-js -->
      <!-- price range (top products) -->
      <script src="<?php echo base_url('cdn/js/jquery-ui.js'); ?>"></script>
      <script>
         //<![CDATA[ 
         $(window).load(function () {
         	$("#slider-range").slider({
         		range: true,
         		min: 0,
         		max: 9000,
         		values: [50, 6000],
         		slide: function (event, ui) {
         			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
         		}
         	});
         	$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
         
         }); //]]>
      </script>
      <!-- //price range (top products) -->
      <!-- start-smoth-scrolling -->
      <script src="<?php echo base_url('cdn/js/move-top.js'); ?>"></script>
      <script src="<?php echo base_url('cdn/js/easing.js'); ?>"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         
         
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
<script>
$('#signin').click(function() {
    $('.sign-up').css('display', 'none');
    $('.sign-in').css('display', 'block');
    $(this).css('color', 'green');
    $('#signup').css('color', 'red');
});
$('#signup').click(function() {
    $('.sign-in').css('display', 'none');
    $('.sign-up').css('display', 'block');
    $(this).css('color', 'green');
    $('#signin').css('color', 'red');
});
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
      <script src="<?php echo base_url('cdn/js/bootstrap.min.js'); ?>"></script>
</body>
</html>

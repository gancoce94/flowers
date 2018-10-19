<?php $this->load->view("templates/Header") ?>

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url(); ?>assets/images/heading-pages-04.jpg);">
	<h2 class="l-text2 t-center">
		Contacto
	</h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">
				<div class="p-r-20 p-r-0-lg">
					<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1oT6Wl6RONoybtuPBEq403CX6JCgujWZU" class="contact-map size21"></iframe>
				</div>
			</div>

			<div class="col-md-6 p-b-30">
				<form class="leave-comment">
					<h4 class="m-text26 p-b-36 p-t-15">
						Escríbenos
					</h4>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nombres y Apellidos">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Telfono">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Dirección Email">
					</div>

					<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Mensaje"></textarea>

					<div class="w-size25">
						<!-- Button -->
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
							Enviar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<?php $this->load->view("templates/Footer") ?>



   <div class="content">
			<div class="contact">
			<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Contact</li>
				<div class="container">


					<h2>Contact</h2>
						
						
					<div class="contact-grids">
						<div class="col-md-6 contact-grid wow fadeInLeft animated animated" data-wow-delay="0.4s">
							<h4>Your Message</h4>
							<span>Fill Your Information.</span>
							<form class="form-horizontal" role="form" action='<?=$_PATH['formHandler']?>' method="post" enctype="multipart/form-data">

									
									<input type="hidden" name="action" value="manageContact" >
									<input type="hidden" name="type" value="Add" >
				           
						
								<label>Name</label>
								<input type="text" placeholder="Your name" required name="contact_name" value=""> 
								<div class="row">
									<div class="col-md-6 row-grid">
									<label>Email *</label>
									<input type="text" placeholder="Email address" required name="contact_email" required>
									</div>
										<div class="col-md-6 row-grid">
										<label>Phone</label>
									<input type="text" placeholder="Phone number" required name="contact_phone" >
									</div>
									<div class="clearfix"></div>
								</div>
								<label>Subject *</label>
								<input type="text" placeholder="Subject" required name="contact_subject" required>
								<div class="row1">
								<label>Message *</label>
								<textarea placeholder="Message" name="contact_message" required></textarea>
								</div>
								<input type="submit" value="Send message">
							

							</form>
						</div>
						<div class="col-md-6 contact-grid wow fadeInRight animated animated" data-wow-delay="0.4s">
							<div class="col-md-6 contact-left">
								<h4> Address</h4>
								<div class="cont-info">
									<h5>Address</h5>
									<p> Plot No. 84, Block C , Sector-10,Noida</p>
									<h5>Email</h5>
									<a href="mailto:example@mail.com">  Info@srafs.in</a>
									<h5>Phone</h5>
									<p>  +91-8588834151</p>


								



								</div>
							</div>
							<div class="col-md-6 contact-right">
								<h4>Timings</h4>
								<div class="cont-info">
									<h5>Monday - Friday</h5>
									<p>09:00 AM - 6:30 PM</p>
									<h5>Saturday</h5>
									<p>09:00 AM - 1:30 PM</p>
									<h5>Sunday</h5>
									<p>Closed</p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="contact-bottom">
								<h4>Get connected</h4>
								
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="google-map wow fadeInDownBig animated animated" data-wow-delay="0.4s">
				<!--	<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d73186.60666218921!2d-1.7167095606544744!3d55.02426474632968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sinterior+design+near+Stanley+Street%2C+Newcastle+upon+Tyne%2C+UK!5e0!3m2!1sen!2sin!4v1457526886002"></iframe>  -->

				<iframe width="100%" height="600" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=600&amp;hl=en&amp;q=GF%2C%20C84%2C%20SECTOR-10%2C%20NOIDA%20201301%2C%20UTTAR%20PRADESH+(SRA)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/it/crea-una-mappa-con-google/">Inserire google maps html</a> by <a href="http://www.mapsdirections.info/it/">Mappa con Google Maps</a></iframe></div><br />

					</div>
				</div>
			</div>
		</div>
			  <?php $param = array();
                $param['conditionParam']['param']['sub_category_index_value'] = 1;
                $subcateDetails =$SubCategory->get_sub_category_details($param)['data'];
              ?>
				<div class="content">

			<div class="welcome-section">

				<div class="container">
					<h2> <?=$subcateDetails->sub_category_name?></h2>
					<span><?=$subcateDetails->sub_category_description?></span>

					<div class="welcome-grids">
							  <?php $param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subcateDetails->id;
				                $postListIndexOne =$Post->get_post_list($param)['data'];
				                foreach ($postListIndexOne as $key => $value) { ?>
				    
				              	<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s">
								<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive" alt="" style="height: 225px;
    width: 350px;"/>
								<div class="<?=$value['post_add_class_id']?>">
									<h4><?=$value['post_title']?></h4>
									<p><?=$value['post_description']?></p>
								</div>
								</div>


				              <?php } ?>
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="services wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">

				<?php 

								$param = array();
                				$param['conditionParam']['param']['sub_category_index_value'] = 2;
                				$subcateDetails =$SubCategory->get_sub_category_details($param)['data'];
              
								$param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subcateDetails->id;
				                $postListIndexTwo =$Post->get_post_list($param)['data'];
				                foreach ($postListIndexTwo as $key => $value) {?>
								<div class="<?=$value['post_class_id']?>">
									<div class="<?=$value['post_add_class_id']?>">
										<div class="text-box">
											<i class="<?=$value['post_icon']?>" aria-hidden="true"></i>
											<h5><?=$value['post_title']?></h5>
											<p><?=$value['post_description']?></p>
										</div>
										<div class="info-box">
											<div class="info-content">
											<img  src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive" alt=""/>
											</div>
										</div>
									</div>
								</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
			<!--<div class="capabilities">
				<div class="container">
					<h3>Interiors Capabilities</h3>
					<div class="capabil-grids">
						<div class="col-md-3 capabil-grid wow fadeInLeft animated animated" data-wow-delay="0.4s">
							<div class="cap">
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='57000' data-delay='.5' data-increment="100">57000</div>
							</div>
							<h5>Happy Clients</h5>
						</div>
						<div class="col-md-3 capabil-grid wow fadeInUpBig animated animated" data-wow-delay="0.4s">
							<div class="cap">
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1700' data-delay='.5' data-increment="5">1700</div>
							</div>
							<h5>Modern design</h5>
						</div>
						<div class="col-md-3 capabil-grid wow fadeInDownBig animated animated" data-wow-delay="0.4s">
							<div class="cap">
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='90000' data-delay='.5' data-increment="100">90000</div>
							</div>
							<h5>Followers</h5>
						</div>
						<div class="col-md-3 capabil-grid wow fadeInRight animated animated" data-wow-delay="0.4s">
							<div class="cap">
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='250' data-delay='.5' data-increment="1">250</div>
							</div>
							<h5>Awards</h5>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div> -->
			<!--<div class="testimonial">
				<div class="container">
					<div class="testimonial-grids">
						<div class="col-md-4 testimonial-grid wow fadeInLeft animated animated" data-wow-delay="0.4s">
							<h3>Testimonial</h3>
							<div class="testimonial-info">
								<p><span>"</span> Quisque varius, nibh ac feugiat interdum, libero massa laoreet tellus, nec congue lorem arcu a nunc. Praesent quis felis eget</p>
								<h5>William Patrick.</h5>
							</div>
							<div class="testimonial-info">
								<p><span>" </span> Vestibulum et consequat justo. Maecenas ultrices malesuada leo porta venenatis. Sed sit amet diam facilisis, interdum tellus nec</p>
								<h5>Frederic Victoria</h5>
							</div>
							<div class="testimonial-info">
								<p><span>" </span> Cras elementum sed mi sit amet ullamcorper. Cras sed felis a enim rutrum lobortis a eu nisi. Curabitur justo libero, hendrerit at</p>
								<h5>Kimberly Thompson</h5>
							</div>
						</div>
							<div class="col-md-8 testimonial-grid-right wow fadeInRight animated animated" data-wow-delay="0.4s">
							<h3>Latest Works</h3>
								<div class="works-grids">
								<div class="col-md-4 works-grid">
									<img src="<?= $_PATH['images'] ?>/e1.jpg" class="img-responsive" alt=""/>
								<p>Quisque varius, nibh ac feugiat interdum, libero massa laoreet tellus, nec congue lorem arcu a nunc. Praesent quis felis eget.</p>
								</div>
								<div class="col-md-4 works-grid">
									<img src="<?= $_PATH['images'] ?>/e2.jpg" class="img-responsive" alt=""/>
								<p>Quisque varius, nibh ac feugiat interdum, libero massa laoreet tellus, nec congue lorem arcu a nunc. Praesent quis felis eget.</p>
								</div>
								<div class="col-md-4 works-grid">
									<img src="<?= $_PATH['images'] ?>/e3.jpg" class="img-responsive" alt=""/>
								<p>Quisque varius, nibh ac feugiat interdum, libero massa laoreet tellus, nec congue lorem arcu a nunc. Praesent quis felis eget.</p>
								</div>
									<div class="clearfix"></div>
								</div>
							</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>-->
		</div>
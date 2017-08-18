  <?php $param = array();
                $param['conditionParam']['param']['sub_category_index_value'] = 4;
                $subcateDetails =$SubCategory->get_sub_category_details($param)['data'];
              ?>

<div class="content">
		<!---about-->
			<div class="about-section">

			<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">About</li>
				<div class="container">


					<h2> <?=$subcateDetails->sub_category_name?></h2>

					
					
					
						<div class="about-grid">
						<?php $param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subcateDetails->id;
				                $postListIndexOne =$Post->get_post_list($param)['data'];
				                foreach ($postListIndexOne as $key => $value) { ?>
				    
				              	<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s" >
								<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" style="height:400px;width: 100%;" class="img-responsive" alt=""/>
								<div class="<?=$value['post_add_class_id']?>" >
								<div class="about-at wow fadeInRight animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;     width: 100%;">
									<h4><?=$value['post_title']?></h4>
									<p style="margin-top: 15px;text-align: justify;"><?=$value['post_description']?></p>
								</div>
								</div>
						 <?php } ?>
						<div class="clearfix"></div>
					</div>
					</div>
				</div>
			</div>
            </div>

     		<!---about-->
			<!---team-->
				<?php $param = array();
                $param['conditionParam']['param']['sub_category_index_value'] = 3;
                $subcateDetails =$SubCategory->get_sub_category_details($param)['data'];
              ?>
			<div class="team-section">
				<div class="container">
					<h3> <?=$subcateDetails->sub_category_name?></h3>
					<div class="team-grids">
					<?php 
								$param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subcateDetails->id;
				                $postListIndex =$Post->get_post_list($param)['data'];
				                foreach ($postListIndex as $key => $value) { ?>
				                	
				               
											<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s">
												<div class="<?=$value['post_add_class_id']?>"><a href="#">
													<div class="spinner"></div>
													<div class="img"><img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" alt="img"></div>
													<div class="info">
													  <div class="info-back">
														<h4><?=$value['post_title']?></h4>
														<span><?=$value['post_sub_title']?></span>
													  </div>
													</div></a>
												</div>
												<p><?=$value['post_description']?></p>
											<!--	<div class="social-icons">
													<a href="#"><i class="icon"></i></a>
													<a href="#"><i class="icon1"></i></a>
													<a href="#"><i class="icon2"></i></a>
													<a href="#"><i class="icon3"></i></a>
												</div>   -->
											</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!---team-->
			
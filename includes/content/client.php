            <?php $param = array();
                $param['conditionParam']['param']['category_index_value'] = 7;
                $category =$Category->get_category_details($param)['data'];
                	
                $param = array();
                $param['conditionParam']['param']['sub_category_parent_id'] = $category->id;
                $subcateDetails =$SubCategory->get_sub_category_list($param)['data'];
              
              ?>

              		  <?php 
					    $subCate = null;
					    $subName =null;
					  	foreach ($subcateDetails as $key => $value) {
					  		$subCate = $value['id'];
					  		$subName = $value['sub_category_name'];
					  	}

					  ?>
			<div class="team-section">
			<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Clients</li>
				<div class="container">
				
					<h3> <?=$subName?></h3>
					<div class="team-grids">
					<?php 
								$param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subCate;
				                $postListIndexThree =$Post->get_post_list($param)['data'];
				                foreach ($postListIndexThree as $key => $value) { ?>
				                	
				               
											<div class="col-md-4 team-grid wow fadeInLeft animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
							<div class="ih-item circle effect1"><a href="#">
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

     <?php $param = array();
                $param['conditionParam']['param']['sub_category_index_value'] = 5;
                $subcateDetails =$SubCategory->get_sub_category_details($param)['data'];
            ?>



<div class="content">
			<div class="service-section">
				<div class="container">
					<h2> <?=$subcateDetails->sub_category_name?></h2>
					<div class="service-grids">
                    <?php $param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subcateDetails->id;
				                $postListIndexOne =$Post->get_post_list($param)['data'];
				                foreach ($postListIndexOne as $key => $value) { ?>
				             

						<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s">
							<div class="<?=$value['post_add_class_id']?>">
							<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
							</div>
						</div>
						<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s">
							<div class="service-top">
								<div class="col-md-6 service-left">
									<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
							<div class="col-md-6 service-right">
							<div class="<?=$value['post_add_class_id']?>">
							<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="service-top1">
								<div class="col-md-6 service-left">
									<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="col-md-6 service-right">
										<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="service-grids">
						<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s">
							<div class="service-top">
								<div class="col-md-6 service-left">
									<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="col-md-6 service-right">
									<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="service-top1">
								<div class="col-md-6 service-left">
									<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="col-md-6 service-right">
									<div class="<?=$value['post_add_class_id']?>">
										<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
									</div>
									<h5><?=$value['post_title']?></h5>
									<p><?=$value['post_description']?></p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s">
							<div class="<?=$value['post_add_class_id']?>">
								<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" class="img-responsive wid" alt=""/>
							</div>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		
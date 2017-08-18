<?php $param = array();
                $param['conditionParam']['param']['category_index_value'] = 6;
                $category =$Category->get_category_details($param)['data'];
                	
                $param = array();
                $param['conditionParam']['param']['sub_category_parent_id'] = $category->id;
                $subcateDetails =$SubCategory->get_sub_category_list($param)['data'];
              ?>

<div class="content">
		<!---about-->
			<div class="about-section">
			<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Partners</li>
				<div class="container">
				

					<!--  <h2> <?=$subcateDetails->sub_category_name?></h2> -->
					  <?php 
					    $subCate = null;
					  	foreach ($subcateDetails as $key => $value) {
					  		$subCate = $value['id'];
					  	}

					  ?>
					
					
						<div class="about-grid">
						<?php $param = array();
				                $param['conditionParam']['param']['post_sub_category_id'] = $subCate;
				                $postListIndexFour =$Post->get_post_list($param)['data'];
				                foreach ($postListIndexFour as $key => $value) { ?>
				    
				              	<div class="<?=$value['post_class_id']?>" data-wow-delay="0.4s" >
								<!--<img src="<?= $_PATH['websiteRoot'] ?>/<?=$value['post_image']?>" style="height:400px;width: 100%;" class="img-responsive" alt=""/> -->
								<div class="<?=$value['post_add_class_id']?>" >
								<div class="about-at wow fadeInRight animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
									<h4><?=$value['post_title']?></h4>
		                           <h3>--------------------------------------------</h3>
									<p style="margin-top: 15px;text-align: justify;"><?=$value['post_description']?></p>
								</div>
								</div>
						 <?php } ?>
						<div class="clearfix"></div>
					</div>
					</div>>
				</div>
			</div>
			</div>





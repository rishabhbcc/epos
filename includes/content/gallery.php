      		<?php 
      			$param = array();
                $param['conditionParam']['param']['category_index_value'] = 4;
                $product =$Category->get_category_details($param)['data'];

             
               	$param = array();
                $param['conditionParam']['param']['sub_category_parent_id'] = $product->id;
                $list =$SubCategory->get_sub_category_list($param)['data'];
                
              
              ?>


 		<div class="content">
			<div class="gallery">
			<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
				<div class="container">
				
					<h2>Products</h2>
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	<?php foreach ($list as $key => $value) { ?>
						  	
						  	  <li class="resp-tab-item" aria-controls="tab_item-<?=$key?>" role="tab"><span><?=$value['sub_category_name']?></span></li>
							 <?php } ?>
							  <div class="clearfix"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							<?php foreach ($list as $key => $value) { ?>
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-<?=$key?>  wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;    margin-top: -371px">

							    <?php 
							    	$param = array();
					              	$param['conditionParam']['param']['post_sub_category_id'] = $value['id'];
					                $postGalleryone = array_chunk($Post->get_post_list($param)['data'],3);
					         
              							foreach ($postGalleryone as $key => $value) { ?>
              									<div class="tab_img">
              									<?php foreach ($value as $key => $result) { ?>
			              							<div class="col-md-4 img-top ">
								   		  			   <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Betasase ferode vetuyasas deulidas vacsques mtreasades vias asey yoleacene aris masease. Bsaeats laoieu lacsqueses.">
														<img class="example-image" src="<?=$_PATH['websiteRoot']?>/<?=$result['post_image']?>" alt=""/>
															 <div class="link-top">
															 <i class="link"> </i>
														</div>
								   		  			   </a>
													</div>
			              							<?php }?>
											   <div class="clearfix"></div>
												</div>
											<?php } ?>
									</div>
										<?php }?>
									
								
							</div>
						</div>
					</div>
				</div>	
			</div>
		
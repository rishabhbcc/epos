<?php 
	$param = array();
	$param['conditionParam']['param']['status'] = 1;
	$categories = $Ad->get_category_list($param)['data'];
?>
<section class="banner">
<div class="wrapper padLR15">
<div class="row">
<div class="col-md-12">
  <h1>Best Classifieds Portal!</h1>
  <h2>Here you will sell quickly and find things easy!</h2>
  <div class="search">
  <div class="input-group">
    <div class="input-group-btn">
      <button class="btn btn-default W130" type="button">Category</button>
      <select role="menu" name="category"  class="dropdown-menu" id="ddCategory" style="display:block !important; height:42px;  top:-3px;left:0px;  border-bottom-left-radius: 18px;border-top-left-radius: 18px;width: 30%;border-top-right-radius: 0px;border-bottom-right-radius: 0px;padding-left:10px;border:none" >
       	<option value="">Select</option>
       	<?php 
       	for($count=0;$count<count($categories);$count++)
       	{
       		$item = $categories[$count];
       	?>
       	<option value="<?= $item['id'] ?>"><?= $item['categoryName'] ?></option>
       	<?php 	
       	}
       	?>
	  </select>
    </div>   
    <div class="right-inner-addon" style="float:right">
       <div class="input-group">
		    <input type="text" value="" name="query" id="query" placeholder="What are you looking for...?" class="form-control">
			    <div class="input-group-btn">
		    <button class="btn btn-success" style="height:41px;" type="submit"><span class="glyphicon glyphicon-search"></span></button>
		    </div>
		</div>
    </div>
  </div>
  <!-- /.input-group -->
</div>
  <p><a href="#">Advanced search +</a></p>
</div>
</div>
</div>
</section>
<!-- Banner Ends -->
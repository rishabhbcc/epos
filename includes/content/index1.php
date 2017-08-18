
<!-- Category Start -->
<div class="wrapper category">
<div class="category_bg">
<h2>Categories</h2>
<span class="brdr_bot">&nbsp;</span>
<div class="row">
<div class="col-md-12">
	<ul>
		<?php 
		for($count=0;$count<count($categories);$count++)
		{
			$item = $categories[$count];
		?>
    	<li>
        	<h4><a href="<?= $_PATH['root'] ?>/?url=listing&category=<?= $item['id'] ?>"><?= $item['categoryName'] ?></a></h4>
            <p><?= $item['tags'] ?></p>
            <a href="<?= $_PATH['root'] ?>/?url=listing&category=<?= $item['id'] ?>"><img src="<?= $_PATH['websiteRoot'] ?>/<?= $item['image'] ?>" alt="" class="img-responsive"></a>
            <span class="brdr">&nbsp;</span>
            <h5> <?= $item['description'] ?></h5>
        </li>
        <?php 
		}
		?>
    </ul>
</div>
</div>
</div>
</div>
<!-- Category Ends -->

<!-- Share Start -->
<section class="share">
<div class="wrapper">
<div class="row">
<div class="col-md-12">
<h5>Share Your Views</h5>
<table class="table">
  <thead>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <div class="input-group">
                <span class="input-group-btn">
                <input type="text" readonly="" class="form-control" placeholder="Image">
                    <span class="btn btn-primary btn-file">
                        Browse <input type="file" multiple="">
                    </span>                </span>            </div>            </th>
      <td><input type="text" readonly="" class="form-control" placeholder="Message"></td>
    </tr>
    <tr>
      <th scope="row"><div class="input-group">
                <span class="input-group-btn">
                <input type="text" readonly="" class="form-control" placeholder="Video">
                    <span class="btn btn-primary btn-file">
                        Browse <input type="file" multiple="">
                    </span>                </span>                
            </div></th>
      <td><select name="list_type" class="form-control">
          <option value="Any">Any</option>
        </select></td>
    </tr>
    <tr>
      <th colspan="2" align="center" scope="row" class="text-center"><button type="button" class="btn btn-success">Submit</button></th>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</section>
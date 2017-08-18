              <?php $param = array();
                $param['conditionParam']['param']['banner_index_value'] = 1;
                $bannerDetails =$Banner->get_banner_details($param)['data'];
              ?>

               <?php $param = array();
                $param['conditionParam']['param']['id'] = 1;
                $config =$System->get_configuration_details($param)['data'];
               ?>


<div class="header" style="background-image:url('<?=$_PATH['websiteRoot'].'/'.$bannerDetails->banner_image?>');height: 513px !important;
    background-size: contain;">
    <div class="container">
      <div class="heder-top">
        <div class="logo wow fadeInDownBig animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDownBig;">
          <h1><a href="?sra_page_url=<?=base64_encode('home')?>"><?=$config->websiteTitle?></a></h1>
        </div>
        <div class="nav-icon">    
          <a href="#" class="navicon"></a>
            <div class="toggle">
              <ul class="toggle-menu">
                <?php 
                $param = array();
                $param['conditionParam']['param']['1'] = 1;
                $menuList =$Category->get_category_list($param)['data'];
                foreach ($menuList as $key => $value) { 

                  ?>
                    <li><a class="active" href="?sra_page_url=<?=base64_encode(strtolower($value['category_name']))?>"><?=$value['category_name']?></a></li>
                <?php } ?>

        
              </ul>
            </div>
          <script>
          $('.navicon').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('navicon--active');
            $('.toggle').toggleClass('toggle--active');
          });
          </script>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="banner-text wow fadeInLeft animated animated" data-wow-delay="0.4s">
        <h3><?=$bannerDetails->banner_title?></h3>
        <p><?=$bannerDetails->banner_description?></p>
      </div>
    </div>
  </div>

               <?php $param = array();
                $param['conditionParam']['param']['id'] = 1;
                $config =$System->get_configuration_details($param)['data'];
               ?>	
<div class="footer-section wow fadeInDownBig animated animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s;">
			<div class="container">
				<div class="social-icons">
					<a href="https://www.facebook.com/srafs"><i class="icon"></i></a>
					<a href="#"><i class="icon1"></i></a>
					<a href="https://plus.google.com/+SrafsIn1"><i class="icon2"></i></a>
					<a href="#"><i class="icon3"></i></a>
				</div>
				<div class="copy">
					<p>© 2016 <?=$config->copyrightMessage?></a></p>
				</div>
			</div>
		</div>
<?php
	$param = array();
	$param['conditionParam']['param']['id'] = $_REQUEST['invoiceId'];
	$details = $Finance->get_supplier_invoice_details($param)['data'];
	$param = array();
	$param['conditionParam']['param']['id'] = $details->supplierId;
	$supplierDetails = $Supplier->get_suppliers_details($param)['data'];
	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$list = $Requisition->get_purchase_order_items_list($param)['data'];
?>
<!DOCTYPE html>
    <!-- BEGIN BODY -->
	<button style="float:right; margin:10px;"  type="button" class="btn btn-info" onclick="window.location='./?url=supplier_invoice&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->

		<div class="col-sm-10">
		<div style="padding:0px 0px;">
        <div id="content" style="width:100%">
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
				<div class="col-lg-1" style="margin-right: 15px;margin-top: 25px;">
                    <img style="height:100px" src="<?= $_PATH['websiteRoot'] ?>/<?= $_SESSION[$_SESSION_ID]['configuration']->logo ?>"/>
                  </div>
                    <div class="col-lg-7">
                       <a href="#"> <h2>Kadi Boutique</h2></a>
						<p><?= $_SESSION[$_SESSION_ID]['configuration']->address ?><br />
						Contact: <?= $_SESSION[$_SESSION_ID]['configuration']->contactNumber ?> <br />
						Email: <?= $_SESSION[$_SESSION_ID]['configuration']->supportMailId ?><br />
						Web: <?= $_SESSION[$_SESSION_ID]['configuration']->websiteLink ?></p>
                    </div>
					<div class="col-lg-3">
                       <a href="#"> <h3>Purchase Order</h3></a>
						<p>Date: <?= $details->invoiceDate ?></p>
						<p>P.O. #: <?=  $details->purchaseOrderId ?></p>
						<p>Supplier ID: <?=  $supplierDetails->supplierNumber ?></p>
                    </div>
                </div>
                 <!--BLOCK SECTION -->
                   <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-9">
                        <h1 style="FONT-SIZE:20PX;">Vendor</h1>
						<p><strong>Name : </strong><?= $supplierDetails->supplierName ?></P>
						<P><strong>Contact Number : </strong><?= $supplierDetails->contactNumber ?></p>
						<P><strong>Address : </strong><?= $supplierDetails->address1 ?></p>
                    </div>
                </div>
                  <!--END BLOCK SECTION -->
 <div class="row">
	<div class="col-lg-12">
		 <div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				</thead>
					<tr>
						<th>Qty</th>
						<th>Item #</th>
						<th>Description</th>
						<th>Job</th>
						<th>Unit Price</th>
						<th>Line Total</th>
						
					</tr>
					<tbody>
						<?php
							$calculatePrice = 0;
							$totalPrice = 0;
							for($count=0;$count<count($list);$count++)
							{
								$item = $list[$count];
								$param = array();
								$param['conditionParam']['param']['id'] = $item['itemId'];
								$itemDetails = $Products->get_raw_material_details($param)['data'];
								$param = array();
								$param['conditionParam']['param']['id'] = $itemDetails->currencyCodeId;
								$currencyDetails = $System->get_currency_details($param)['data'];								
						?>
							<tr class="odd gradeX">
								<td><?= $item['expectedQuantity'] ?></td>
								<td><?= $itemDetails->itemName ?></td>
								<td><?= $itemDetails->userDescription ?></td>
								<td><?= $item['expectedQuantity'] ?></td>
								<td class="center"><?= $itemDetails->unitPrice ?>&nbsp;<?= $currencyDetails->currencyCode ?></td>
								<td class="center"><?php $calculatePrice = $itemDetails->unitPrice * $item['expectedQuantity']?> <?= $calculatePrice ?>&nbsp;<?= $currencyDetails->currencyCode ?></td>
							</tr>
						<?php
							$totalPrice = $totalPrice + $calculatePrice;
							}
						?>
							 <tr class="odd gradeX">
								<td colspan="5" style="text-align:right;">Total</td>
								<td class="center"> <?= $totalPrice ?>&nbsp;<?= $currencyDetails->currencyCode ?></td>                                    
							</tr>
					</tbody>
				</table>
			</div> 
	</div>
</div>
	<div class="row">
		<div class="col-lg-6">
		</div>
		<div class="col-lg-3">
			<h3 style="FONT-SIZE:20PX;">____________</h3>
				<p style="font-size:17px;"> Authorized by </p>
		</div>
		<div class="col-lg-3">
			<h3 style="FONT-SIZE:20PX;">____________</h3>
				<p style="font-size:17px;"> Date </p>
		</div>
	</div>
                </div>
                  <!--END BLOCK SECTION -->
               
                 
                 <!-- COMMENT AND NOTIFICATION  SECTION -->
               
                
            </div>
        </div>
		
        <!--END PAGE CONTENT -->
	</div>
</body>

    <!-- END BODY -->
	<style>
		ul li{
		list-style-type:none;
		}
		div ul li a{
		text-decoration:none;
		}
		.panel
		{
			box-shadow:0px 0px 0px red !important;
		}
	</style>
	
</html>

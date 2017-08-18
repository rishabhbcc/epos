
  <?php 


  $param = array(); // get order details
  $param['conditionParam']['param']['id'] = base64_decode($_REQUEST['orderId']);
  $orderDetails = $Order->get_order_details($param)['data'];

  //echo '<pre>';print_r($orderDetails);exit;

  $param = array(); // get order items
  $param['conditionParam']['param']['orderId'] = $orderDetails->id;
  $orderList = $OrderItems->get_orderitems_list($param)['data'];
  //echo '<pre>';print_r($orderList);exit;

  $param = array(); // get payment methods
  $param['conditionParam']['param']['1'] = 1;
  $PaymentMethods = $PaymentMethods->get_payment_method_list($param)['data'];

  $PaymentMethodsArray = array();
  foreach ($PaymentMethods as $key => $value) {
  $PaymentMethodsArray[$value['id']] = $value['methodName'];
  }
  //echo '<pre>';print_r($PaymentMethodsArray);exit;
  //get details for franchise
  // $param = array(); // get order details
  // $param['conditionParam']['param']['id'] = $orderDetails->franchiseId;
  // $franchiseDetails = $Franchise->get_franchise_details($param)['data'];
    
  //get customer details;
  $param = array(); // get order details
  $param['conditionParam']['param']['id'] = $orderDetails->customerId;
  $customerDetails = $Customer->get_customer_details($param)['data'];
  // echo '<pre>';print_r($customerDetails);exit;

  // $param = array(); // get configuration details
  // $param['conditionParam']['param']['franchiseId'] = $orderDetails->franchiseId;
  // $configurationDetails = $Configuration->get_configuration_details($param)['data'];
  ///echo '<pre>';print_r($configurationDetails);exit;
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width"/>
  <style type="text/css">

  body {
    padding:0; margin:0 10px; 
    font-family:Arial, Helvetica, sans-serif; 
    font-size:13px;
    line-height:18px;
    color:#333;
  }
  table {
    padding:0; 
    margin:0;
  }
  table tr td{
    padding:0 5px; 
    margin:0;
  }
  table.cntbrdrtbl tbody tr td{ padding:0 4px; border-bottom:#333 solid 2px;border-right:#333 solid 2px;}
  table.cntbrdrtbl tbody tr td:last-child{border-right:none;}
  table.nopdng tbody tr td{padding:0; margin:0;}
  table.tblgrdbx th{background-color:#e2e2e2;color:#000}
  .cash_p{
    margin-left: 40%;
  }
  .cash_t{
    float:right;
  }
  .watermark {
     position: absolute;
      color: #928e8e;
      opacity: 0.25;
      font-size: 4em;
      width: 100%;
      top: 63%;
      text-align: center;
      z-index: 0;

  }
  /*jyotika*/
  .footer{
    display:none !important;
  }
  @media print {
    @page { size: auto;  margin: 0mm; }

    }
    .fatherTable{
      border: 1px solid #000;
      box-shadow: 0px 0px 0px 0px;
    }
    .paddingNo{
      padding:0px !important;
    }
    /*jyotika*/

      body{
        background:#e2e2e2;
      }
      .companyDescrip{
      background: #07325c;
      padding: 2%;
      text-align: right;
      color: #fff;
      border-radius: 1%;
      }
       .companyDescrip h1{
        color:#fff;
       }
       .companyDescrip p{
      padding-bottom: 4px;
      margin: 0px;
  }
  .forLogoResppo img{
  height: 67px;
      width: 23%;
  }
  .rightsideInvoice h1{
    color:#07325c;
    }
    .rightsideInvoice p{
      padding-bottom: 4px;
      margin: 0px;
    }
    .commonPaddingForSales{
          padding-top: 2%;
      padding-bottom: 8px;
      color:#000;
    }
    .commonTdForSaleRepo{
      padding-top: 1%;
      padding-bottom: 1%;
    }
    .forLAstTable{
     background:#c9c7c8;
    }
   .forNews tr:nth-child(odd) {
      background-color:#c9c7c8;
  }
  .firstForBlack{
  color:#000;
  font-weight:bold;
    }
  .j_hfd{
      padding-top:6px;
      padding-bottom:6px;
      padding-right: 3%;
      padding-left: 2%;
  }
    .for_db{
      padding-left: 2%;
      padding-right: 2%;
    }
  .heyLAstCodeyup{
    background: #04284c;
    padding: 17px 42px;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-size: 15px;
        }
        .caodvsah_dd{
          padding-bottom:28px;
        }
        .EkCenter{
          text-align:center;
        }
  </style>
    
  </head>

<body  style="padding: 15px 120px 15px 120px;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fatherTable" style="background-color: #e2e2e2;width: 100%;">
   <tbody>
      <tr>
         <td class="paddingNo">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
               <tr>
                  <td></td>
                  <?php if($orderDetails->isConfirmed == 1) { ?>
                  <td width="33%" align="right" class="paddingNo"><img  src="<?= $purifier->purify($_ADMIN_PATH['assets'].'/'.'images/Paid.png')?>" alt="logo"  height="113"></td>
                  <?php }else { ?>
                  <td width="33%" align="right" class="paddingNo"><img  src="<?= $purifier->purify($_ADMIN_PATH['assets'].'/'.'images/Outstanding.png')?>" alt="logo"  height="113"></td>
                  <?php } ?>
               </tr>
            </table>
         </td>
      </tr>
      <!-- <tr>
         <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
               <tr>
                  <td><?=$orderDetails->createdOn?></td>
                  <td style="text-align:right;" class="forLogoResppo"><img alt="logo" src="<?= $purifier->purify($_FRONT_PATH['websiteRoot'].'/'.$configurationDetails->logo)?>"></td>
               </tr>
            </table>
         </td>
      </tr> -->
      <tr>
         <style type="text/css">
         </style>
         <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding: 10px 15px 10px 15px;" align="center">
               <tbody>
                  <tr>
                     <td width="33%" class="rightsideInvoice">
                        <h1 style="margin:0; font-size:24px;font-weight:bolder">
                           <span class="firstForBlack">INVOICE</span>
                        </h1>
                        <p> 
                           <span class="firstForBlack"> Name  :-</span> <span id="lblphno"> <?=$customerDetails->firstName?> <?=$customerDetails->lastName?></span>
                        </p>
                        <p> 
                           <span class="firstForBlack">Contact Number  :- </span><span id="lblphno"><?=$customerDetails->contactNumber?></span>
                        </p>
                        <p> 
                           <span class="firstForBlack">Email :- </span><span id="lblphno"><?=$customerDetails->mailId?> </span>
                        </p>
                        <p> 
                           <span class="firstForBlack">Address :- </span><span id="lblphno"><?=$customerDetails->address?> </span>
                        </p>
                        <p> 
                           <span class="firstForBlack">Sales Invoice No  :- </span><span id="lblphno"><?=$orderDetails->orderSequenceNumber?></span>
                        </p>
                         <p> 
                           <span class="firstForBlack">Txn Id  :- </span><span id="lblphno"><?=isset($orderDetails->taxationId) ? $orderDetails->taxationId : 'N/A'?></span>
                        </p>
                     </td>
                     <!-- <td width="15%" class="companyDescrip">
                        <h1 style="margin:0; font-size:24px;font-weight:bolder">
                           <span style="font-weight:bolder;font-size:25px"><?=$franchiseDetails->franchiseName?></span>  
                        </h1>
                        <p><b><span id="lblAddress"><?=$franchiseDetails->address?>
                           
                           </span></b>
                        </p>
                        <p>
                           Contact No :- <span id="lblphno"><?=$franchiseDetails->landlineNumber?></span>
                        </p>
                        <p>
                           PAN Number :- <span id="lblFREmailId"><?=$franchiseDetails->PANNumber?></span>
                        </p>
                        <p>
                           Service Tax No :- <span id="lblServiceTaxNo"><?=$franchiseDetails->serviceTaxNumber?></span>
                        </p>
                        <p>
                           VAT No. :- <span id="lblVATNo"><?=$franchiseDetails->VATNumber?></span>
                        </p>
                     </td> -->
                    
                  </tr>
                  <tr>
                     <td colspan="2" align="center"></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
              
               <tr>
                  <td colspan="4" style="height:auto;!important" valign="top"  >
                     <div>
                        <table class="totalAmoutnSalePrint" cellspacing="0"  border="0" id="gvPackageDetails" style="width:100%;border-collapse:collapse;">
                           <thead>
                              <!-- <div class="watermark"><img src="<?php //$_PATH['websiteRoot'].'/'.$configurationDetails->logo?>"></div> -->
                              <tr>
                                 <th scope="col" class="widthFortdSn borderTopNone commonPaddingForSales" >S.No.</th>
                                 <th align="left" class="widthFortdDest commonPaddingForSales"  scope="col" style="width:70%;">Description</th>
                                 <th scope="col" class="widthFortd commonPaddingForSales" >Unit Price</th>
                                 <th scope="col" class="widthFortd commonPaddingForSales">Quantity</th>
                                 <th scope="col" class="widthFortd ForborederRigthNone commonPaddingForSales">Line Total</th>
                              </tr>
                           </thead>
                           <tbody class="forNews">
                              <?php
                                 foreach ($orderList as $key => $value) {
                                  $param = array(); // get order details
                                  $param['conditionParam']['param']['id'] = $value['itemId'];
                                  $itemDetails = $Item->get_item_details($param)['data'];
                                 
                                  // echo '<pre>';print_r( $itemDetails); exit;
                                 ?>
                              <tr>
                                 <td align="center" class="widthFortdSn borderTopNone commonTdForSaleRepo backgroundCol<?php echo $key ?>">   <?=($key+1)?>   </td>
                                 <td align="left" class="widthFortdDest commonTdForSaleRepo backgroundCol<?php echo $key ?>">
                                    <b><span id="gvPackageDetails_lblPackName_0"><?=$itemDetails->productName?></span></b> <br>
                                 </td>
                                 <td align="center" class="widthFortd commonTdForSaleRepo backgroundCol<?php echo $key ?>">
                                    <b><span id="gvPackageDetails_lblPackAmount_0"><?=$value['unitPrice']?></span></b>
                                 </td>
                                 <td align="center" class="widthFortd commonTdForSaleRepo backgroundCol<?php echo $key ?> ">
                                    <b><span id="gvPackageDetails_lblPackAmount_0"><?=$value['quantity']?></span></b>
                                 </td>
                                 <td align="center" class="widthFortd ForborederRigthNone commonTdForSaleRepo backgroundCol<?php echo $key ?>">
                                    <b><span id="gvPackageDetails_lblPackAmount_0"><?=$value['totalPrice']?></span></b>
                                 </td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td colspan="4" style="padding:0;">
                     <table width="100%" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                           <tr>
                              <!-- <td width="50%"> </td> -->
                              <td style="padding:0;">
                                 <div id="Pnl_ServiceTax">
                                 </div>
                                 <table class="totalAmoutnSalePrint forLAstTable" width="100%" cellpadding="0"  cellspacing="0" align="center">
                                    <tbody>
                                       <tr>
                                          <td style="border-top:none;" class="j_hfd">
                                             <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="nopdng">
                                                <tbody>
                                                   <tr>
                                                      <td class="firstForBlack">Total Amount</td>
                                                      <td></td>
                                                      <td width="28%" align="right"><span id="lblBaseAmount">
                                                         <?=number_format($orderDetails->totalPrice,2)?>                
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                       <!-- handle multiple tax for sales -->
                                       
                                          
                                       <tr>
                                          <td colspan="2" style="border-bottom:none;" class="j_hfd">
                                             <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="nopdng">
                                                <tbody>
                                                   <tr>
                                                      <td width="47%" class="firstForBlack"><b>Net Amount (Rounded off)</b></td>
                                                      <td width="25%" align="center">&nbsp;</td>
                                                      <td width="28%" align="right">
                                                         <span id="lblNetAmount">
                                                            <!-- get total amount along with discount and tax -->
                                                            <?php 
                                                               $totalAmountValue = 0.0;
                                                                 //calculating the total amount
                                                                $totalAmountValue = (($orderDetails->totalPrice));
                                                               
                                                               ?>
                                                            <?=number_format($totalAmountValue,2)?>
                                                         </span>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
               <!-- <tr>
                  <td colspan="4" class="j_hfd"><b>Amount (in words):</b> 
                     <span id="lblAmountInWords" style="float:right;"><?php //ucwords(convert_number_to_words($orderDetails->totalPrice))?></span>
                  </td>
               </tr> -->
               <tr>
                  <td colspan="5" class="j_hfd">
                     <b>Mode Of Payments</b>  <b class="cash_t"><?=$orderDetails->paymentMethod?></b>
                  </td>
               </tr>
               
               <!-- jyotika -->
               <tr>

               <!-- jyotika -->
               <tr>
                  <td colspan="4">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="nopdng">
                        <tbody>
                           <tr>
                              <td>
                                 <div>
                                    <table cellspacing="0" id="gvPaymode" style="border-width:0px;width:45%;border-collapse:collapse;">
                                       <tbody>
                                          <tr>
                                             <th scope="col">&nbsp;</th>
                                             <th scope="col">&nbsp;</th>
                                          </tr>
                                          <!-- <tr>
                                             <td align="left">Cash</td>
                                             <td align="left"><?php //number_format($totalAmountValue,2)?></td>
                                             </tr> -->
                                       </tbody>
                                    </table>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
               <style type="text/css">
               </style>
               <!-- <tr>
                  <td colspan="4" class="for_db">
                     <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
                        <tbody>
                           <tr>
                              <td width="50%" style="padding-right:10px;">
                                 <span style="text-align:left;">
                                 <u>Acknowledgement</u><br>
                                 &nbsp; NA
                                 <br></span>
                                 <?php 
                                    /*$param = array(); // get User details
                                    $param['conditionParam']['param']['id'] = $value;
                                    $userDetails = $User->get_user_details($param)['data'];*/
                                    
                                    ?>
                                 <p align="left" style="margin-bottom:1%;">
                                    <span id="lblCustSigName" ><?php //$userDetails->firstName?> <?php //$userDetails->lastName?> </span><br>
                                    Customer Signature
                                 </p>
                              </td>
                              <td width="50%" align="right">
                                 <?php 
                                    /*$param = array(); // get Configuration details
                                    $param['conditionParam']['param']['1'] = 1;
                                    $configurationDetails = $Configuration->get_configuration_details($param)['data'];*/
                                    
                                    ?>
                                 For <span id="lblFranchiseNameFor"><?php //$configurationDetails->websiteName?></span><br>
                                 <br>
                                 Authorised Signatory 
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr> -->
               </tbody>
            </table>
         </td>
      </tr>

<tr>

      </tr>
   </tbody>
</table>
  <br><br><br><br><br>
    <!-- Footer Start -->
      <script type="text/javascript">

    </script>
    

      
      <!-- Bottom Start -->

</body>   
</html>

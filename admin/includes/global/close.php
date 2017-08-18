<!--  <?php 

$param = array();
$param['conditionParam']['param']['id'] = $_SESSION[$_SESSION_ID]['user']->roleId;
$roleDetails = $User->get_role_details($param)['data'];


?>

<footer class="footer">
                   <div class="footer-block buttons"> 
                     <span ><i style="color:rgb(58, 70, 81);" class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<strong style="color:rgb(58, 70, 81);"><?=ucfirst($roleDetails->roleName)?></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  You are currently logged in from IP: <span id="lblIpAddrress">
                        <?= $_SERVER['SERVER_ADDR']; ?>
                    </div>
                   <div class="footer-block author">
                       <ul>
                           <li><?= $_SESSION[$_SESSION_ID]['configuration']->copyrightMessage ?> 
           | Privacy Statement</li>
                           
                       </ul>
                   </div>
               </footer>
               <div class="modal fade" id="modal-media">
                   <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                           <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                   </button>
                               <h4 class="modal-title">Media Library</h4> </div>
                           <div class="modal-body modal-tab-container">
                               <ul class="nav nav-tabs modal-tabs" role="tablist">
                                   <li class="nav-item"> <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a> </li>
                                   <li class="nav-item"> <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a> </li>
                               </ul>
                               <div class="tab-content modal-tab-content">
                                   <div class="tab-pane fade" id="gallery" role="tabpanel">
                                       <div class="images-container">
                                           <div class="row"> </div>
                                       </div>
                                   </div>
                                   <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                       <div class="upload-container">
                                           <div id="dropzone">
                                               <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                   <div class="dz-message-block">
                                                       <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Insert Selected</button> </div>
                       </div>
                       /.modal-content
                   </div>
                   /.modal-dialog
               </div>
               /.modal
               <div class="modal fade" id="confirm-modal">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
                               <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4> </div>
                           <div class="modal-body">
                               <p>Are you sure want to do this?</p>
                           </div>
                           <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>
                       </div>
                       /.modal-content
                   </div>
                   /.modal-dialog
               </div>
               /.modal
           </div>
       </div>
       Reference block for JS
       <div class="ref" id="ref">
           <div class="color-primary"></div>
           <div class="chart">
               <div class="color-primary"></div>
               <div class="color-secondary"></div>
           </div>
       </div>


       

       <script src="<?=$_PATH['assets']?>/js/vendor.js"></script>
       <script src="<?=$_PATH['assets']?>/js/app.js"></script>

       
      
      
          

       
       datatable js,css config start


             
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/dataTables.bootstrap.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/toastr.min.js"></script>
        <link rel="stylesheet" href="<?= $_PATH['assets'] ?>/css/bootstrap-datepicker3.css"/>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/bootstrap-datepicker.min.js"></script>

       <script src="<?= $_PATH['assets'] ?>/custom-js/ajax.js" type="text/javascript"></script>
       <script src="<?= $_PATH['assets'] ?>/custom-js/calculate.js" type="text/javascript"></script>
      
       <script src="<?= $_PATH['assets'] ?>/custom-js/validation.js" type="text/javascript"></script>
       <script src="<?= $_PATH['assets'] ?>/custom-js/export.js" type="text/javascript"></script>
      
       <script src="<?= $_PATH['assets'] ?>/js/custom.js" type="text/javascript"></script>  
       <script src="<?= $_PATH['assets'] ?>/js/table.js" type="text/javascript"></script>                                                
       datatable js,css config end
 
    for Table print  
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/dataTables.buttons.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/pdfmake.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/buttons.flash.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/jszip.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/pdfmake.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/buttons.print.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/vfs_fonts.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/buttons.html5.min.js"></script>
       <script type="text/javascript" src="<?= $_PATH['assets'] ?>/js/buttons.colVis.min.js"></script>
       <link rel="stylesheet" type="text/css" href="<?= $_PATH['assets'] ?>/css/semantic.min.css">
       <script src="<?= $_PATH['assets'] ?>/js/semantic.min.js"></script>    

      
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChSx3-bLiqstw7_A2hH6KF_xnpYabOtwA&libraries=places&callback=initAutocomplete"
        ></script>

       for search select starts
       <script type="text/javascript">
           $('#franchiseId').dropdown();
           $('#salutationId').dropdown();
           $('#supplierId').dropdown();
           $('#paymentMethod').dropdown();
           $('#purchaseId').dropdown();
            $('#discountId').dropdown();
            $('#countryId').dropdown();
            $('#stateId').dropdown();
            $('#regionId').dropdown();
            $('#roleId').dropdown();
           $('#taxTypeId').dropdown();
           $('#unitId').dropdown();
           $('#floorId').dropdown();
           $('#amountTypeId').dropdown();
            $('#cardNumber').dropdown();
            $('#priceLevelId').dropdown();
            $('#taxNatureId').dropdown();
            $('#exciseId').dropdown();
            $('#franchise_id').dropdown();
            $('#cityId').dropdown();
            $('#serviceTypeId').dropdown();
           $('#currencyId').dropdown();
           $('#taxId').dropdown();
           $('#categoryId').dropdown();
          
       </script>

       for search select ends


        datatable js,css config end
 

        <script type="text/javascript">
       $(document).ready(function() {
           console.log('<?= $purifier->purify($_PATH['websiteRoot'].'/'.$_SESSION[$_SESSION_ID]['configuration']->logo)?>');
           $('#exportTable').DataTable({
     
           dom: 'Bfrtip',
           buttons: [
           'copy', 'csv', 'excel', 'pdf', 
           

            {
               extend: 'print',
               customize: function ( win ) {
                   $(win.document.body)
                       .css( 'font-size', '10pt' )
                       .prepend(
                           '<div style="opacity: 0.2;"><img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$_SESSION[$_SESSION_ID]['configuration']->logo)?>" style="position:absolute;top: 0; bottom:0; left: 0; right:0;margin: auto;z-index:-1;" /></div>'
                       );

                   $(win.document.body).find( 'table' )
                       .addClass( 'compact' )
                       .css( 'font-size', 'inherit' );
               }
           },

           'colvis'
       ],
        columnDefs: [ {
           targets: -1,
           visible: false
       } ]
           
           }

               );

       } );
       
       </script>

  Report datatable js,css config end
 
       <script type="text/javascript">
       $(document).ready(function() {
           console.log('<?= $purifier->purify($_PATH['websiteRoot'].'/'.$_SESSION[$_SESSION_ID]['configuration']->logo)?>');
           $('#exportReportTable').DataTable({
           'scrollX': true,
           dom: 'Bfrtip',
           buttons: [
           'copy', 'csv', 'excel', 'pdf', 
           

            {
               extend: 'print',
               customize: function ( win ) {
                   $(win.document.body)
                       .css( 'font-size', '10pt' )
                       .prepend(
                           '<div style="opacity: 0.2;"><img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$_SESSION[$_SESSION_ID]['configuration']->logo)?>" style="position:absolute;top: 0; bottom:0; left: 0; right:0;margin: auto;z-index:-1;" /></div>'
                       );

                   $(win.document.body).find( 'table' )
                       .addClass( 'compact' )
                       .css( 'font-size', 'inherit' );
               }
           },

           'colvis'
       ],
        columnDefs: [ {
           targets: -1,
           visible: false
       } ]
           
    });
           
   // DataTable
   var table = $('#exportReportTable').DataTable();

   // Apply the search
   table.columns().every( function () {
       var that = this;

       $( 'input', this.footer() ).on( 'keyup change', function () {
           if ( that.search() !== this.value ) {
               that
                   .search( this.value )
                   .draw();
           }
       } );
   } );

       } );
       
       </script>
add by Print Table

       
       
add by Print Table

       global config for messgae in toaster

          <script type="text/javascript">

           <?php if(isset($_GET['flag']) && base64_decode($_GET['flag']) <= 0){?>

            toastr.error('<?=base64_decode($_GET["msg"])?>');

           <?php } ?>

          <?php if(isset($_GET['flag']) && base64_decode($_GET['flag']) > 0){?>
                toastr.success('<?=base64_decode($_GET["msg"])?>');
           <?php } ?>

         </script>
         
script for datapicker
   <script type="text/javascript">
       $( document ).ready(function() {
       if($(".datepicker").length)
       {
           $('.datepicker').datepicker({
               changeMonth: true,
               changeYear: true,
               dateFormat: "yy-mm-dd"
               
             });
       }

       // this is for change color in table row

       // if(localStorage.getItem('otherColor')!=""){
       //     console.log(localStorage.getItem('otherColor'));
       //     $('table.dataTable tbody tr').attr('style','background-color:'+localStorage.getItem('otherColor')+'!important');
       // }

   });
   </script>

  <script type="text/javascript">
  //<![CDATA[
  (function($){
      $(document).ready(function() {
  
          $('a').click(function(){
  
              if($(this).data('click-confirm')){
                  var onClickConfirm = window.confirm($(this).data('click-confirm'));
                  if(!onClickConfirm){
                      return onClickConfirm;
                  }
              }
  
              // continue code
          });
  
      });
  })(jQuery);
  //]]>
</script>

Image Size validation
<script type="text/javascript"> //image size valdation

function ImageValidate() {
 $("#file_error").html("");
 $(".imgInputBox").css("border-color","#F0F0F0");
 var file_size = $('#form-field-1')[0].files[0].size;
 if(file_size>1024000) {
   $("#file_error").html("File size is greater than 1MB");
   $(".imgInputBox").css("border-color","#FF0000");
   return false;
 } 
 return true;
}                 //end image validation
</script>


<script type="text/javascript">
       $( document ).ready(function() {
       if($(".datepicker").length)
       {
           $('.datepicker').datepicker({
               changeMonth: true,
               changeYear: true,
               dateFormat: "yy-mm-dd"
               
             });
       }
        var date = new Date();
      
       $('#dt1').datepicker({
           startDate: date,
           autoclose: true,
           format: 'mm-dd-yyyy',
           }).on('changeDate', function(ev) {
           ConfigureReturnDate();
       });
          

        $('#dt2').datepicker({
           startDate: date,
           autoclose: true,
           format: 'mm-dd-yyyy',
           startDate: $('#dt1').val()
       });


       ConfigureReturnDate();

       function ConfigureReturnDate() {
           $('#dt2').datepicker('setStartDate', $('#dt1').val());
       }
       // this is for change color in table row

       /*if(localStorage.getItem('otherColor')!=""){
           console.log(localStorage.getItem('otherColor'));
           $('table.dataTable tbody tr').attr('style','background-color:'+localStorage.getItem('otherColor')+'!important');
       }*/

   });
   </script>


  

<script type="text/javascript">
  $("#buyPrice, #sellPrice").change(function (e) {
  var lil = parseInt($("#buyPrice").val(), 10);
  var big = parseInt($("#sellPrice").val(), 10);
  $('#lil').text(lil);
  $('#big').text(big);
  if (lil > big) {
      var targ = $(e.target);
      if (targ.is("#sellPrice")) {
          alert("Max must be greater than Min");
          $('#sellPrice').val(lil);
      }
      if (targ.is("#buyPrice")) {
          alert("Min must be less than Max");
          $('#buyPrice').val(big);
      }
  }
  });
</script>  


<script type="text/javascript">
  $('#buyPrice').keypress(function(event){
           console.log(event.which);
       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault();
       }});
  $('#sellPrice').keypress(function(event){
           console.log(event.which);
       if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault();
       }});
</script>


<script type="text/javascript">

$('.purchase').dropdown({
onChange: function() {

   var form_data = 'access=true&action=getPurchaseDetails&purchaseId='+$('#purchaseId').val();
   var response =JSON.parse(post_ajax(form_data));
   console.log(response.data);
   $('#availableStock').attr('for',response['data']['grandTotal']);
}
});
</script>
<script type="text/javascript">

$('.purchase').dropdown({
onChange: function() {

   var form_data = 'access=true&action=getPurchaseDetails&purchaseId='+$('#purchaseId').val();
   var response =JSON.parse(post_ajax(form_data));
   console.log(response.data);
   $('#availableStock').attr('for',response['data']['grandTotal']);
}
});
</script>
<script>
$(document).ready(function(){ // script for validating the image file extention
$("input[type=file]").each(function() {
var nameValue = jQuery(this).attr("name");
var skippable = ['resume'];
if(jQuery.inArray( nameValue, skippable ) == -1)
{
$( this ).change(function() {
var re_text = /\.jpg|\.jpeg|\.png|\.gif/i;
var filename = this.value;
if (filename.search(re_text) == -1)
{
alert("File does not have (jpg / gif / png) extension");
this.value = '';
return false;
}
return true;
});
}
if(nameValue == 'resume')
{
$( this ).change(function() {
var re_text = /\.doc|\.docx|\.pdf/i;
var filename = this.value;
if (filename.search(re_text) == -1)
{
alert("File does not have (doc / docx / pdf) extension");
this.value = '';
return false;
}
return true;
});
}
});

});
</script>
<script>
function blink(){
   $('.fa-shopping-basket').delay(100).fadeTo(100,0.5).delay(100).fadeTo(100,1, blink);
}
$(document).ready(function() {
   blink();
});
</script>

<script>
$(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<script type="text/javascript">
/*set userID for sales window*/
$(document).ready(function(){
setUserIdOnlocalStorage('<?=$_SESSION[$_SESSION_ID]['user']->id?>','<?=$_SESSION[$_SESSION_ID]['configuration']->isDineIn?>');
});
</script>



   </body>

</html> -->
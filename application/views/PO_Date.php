 <div class="row">
                     
<div class="col-md-8"  id="exampleModalEditMat">
                        <div class="form-group">
                            <lable class="form-control-label" for="duration">PO No:</lable>
                            <br>
                            <select class="form-control mySelectMatProEdit" data-live-search="true" searchable="Search here.."  name="PO" id="PoCode">
                             <option value="">Select PO :</option>
                               <?php
                                  foreach ($getPO as $Key) {
                         ?>
                        <option value="<?php echo $Key['PO'] ?>" ><?php echo $Key['POCode'] ?></option>
                        <?php
                        }
                  ?>
                  </select>
                        </div>
                    </div>
                       <div class="col-md-4">
                       <label >Order Qty:</label>
                        <div class="form-group-inline">
                            
                            <input name="POQty" id="POQty" class="form-control" type="text">
                        </div>
                    </div>
                 </div>



                           <script>
    
$(document).ready(function(){
      
$("#PoCode").change(function(e) {
//alert('i am here');
loadQty()
     });
     function loadQty(){
         //alert('Heloo');
          var PO =  $("#PoCode").val()
   
            url = "<?php echo base_url("index.php/Kitsissuance/json_by_machine/") ?>" + PO 
            //alert(url);
 $.get(url, function(data) {
    //alertconsole.log(data);


                    html = data[0].OrderQty
                     //html1 = data[0].ID
                    // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
                
console.log(html);
                $("#POQty").val(html)
                 //$("#ID").val(html1)
 });
        }
         $('.mySelectMatProEdit').select2(
        {
  dropdownParent: $('#exampleModalEditMat')
}
    );
});


</script>

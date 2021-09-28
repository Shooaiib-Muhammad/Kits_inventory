
      <?php
      $this->load->view('header');
    ?>
    <script>

  $(".updatebtn").click(function(e) {
     let id= this.id;
     let split_value = id.split(".");
 
     var RIDValue = $(`#RID${split_value[1]}`).val()
     var RStatus = $(`#customSwitch${split_value[1]}`).val()
     var IssueDte = $(`#iDate${split_value[1]}`).val()
    
console.log("RIDValue",RIDValue)
console.log("RStatus",RStatus)
console.log("IssueDte",IssueDte)
 url = "<?php echo base_url('index.php/kitsReceived/updateRecord/') ?>"+ RIDValue + "/" + RStatus + "/" + IssueDte
  alert(url);
   $.get(url, function(data){
            
               console.log(data);
location.reload();
            })

     });
   
     </script>
    <div class="table-responsive-lg">
        <table class="table table-striped table-hover table-sm" id="tableExport">
                                                        <thead style="background-color:black; color:white;">
                                                           
                                                                <th>Kit Name</th>
                                                                <th>Quantity</th>
                                                                 <th>Received Date</th>
                                                                <th>issue Status</th>
                                                                <th>Issuee Date</th>
                                                                 
                                                                 <th>Action</th>
                                                           
                                                        </thead>
                                                       <tbody >
                                                        <?php
foreach ($received as $keys){
 $Status=$keys['IssueStatus'];
 $RecID=$keys['RecID'];
 ?> 

 <tr>    
   
                                                            <td><?php Echo $keys['SerialNo'];?>
                                                               
                                                                
                                                            </td>
                                                             <td><?php Echo $keys['Qty'];?></td>
                                                              <td><?php Echo $keys['TranDate'];?></td>
                                                             <input type="text" name="RID" id="RID<?php echo $RecID;?>" value="<?php echo $RecID;?>" hidden>
                                                             <td><?php if($Status==1){ ?>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" name="onoffswitch" class="custom-control-input" id="customSwitch<?php Echo $RecID ?>" checked>
                                                                <label class="custom-control-label" for="customSwitch<?php Echo $RecID ?>"></label>
                                                            </div>
                                                            <?php
                                                            }else{
                                                             ?>
                                                                <div class="custom-control custom-switch">
                                                                <input type="checkbox" name="onoffswitch" class="custom-control-input" id="customSwitch<?php Echo $RecID ?>" >
                                                                <label class="custom-control-label" for="customSwitch<?php Echo $RecID ?>"></label>
                                                            </div>
                                                             <?php
                                                            }?>
                                                           </td>
                                                             <td>
                                                              <?php
                                                              $issueDate=$keys['IssueDate'];
                                                              if($issueDate){
                                                               ?>
                                                               <?php Echo $keys['IssueDate'];?>
                                                               <?php
                                                              }else{
                                                               ?>
                                                               <input type="Date" class="form-control" name="IDate" id="iDate<?php echo $RecID;?>" >
                                                               <?php
                                                              }
                                                              ?>
                                                             
                                                             </td>
                                                             
                                                               <td>
                                                                <button type="button"  class="btn btn-success btn-sm updatebtn" id="btn.<?php echo $RecID;?>">issued</button>
                                                              </td>
                                                               
                                                                                              
         </tr>     
                                                   
 <?php
}
?>
                                    </tbody>
                                </table>
                            </div>
                                                                        
                                  <?php
        $this->load->view('Foter');
       ?>                      


                                   
                                

      <?php
      $this->load->view('header');
    ?>
   
    <div class="table-responsive-lg" id="Data">
        <table class="table table-striped table-hover table-sm" id="tableExport">
                                                        <thead>
                                                            <tr>
                                                               <th>PO Code</th>
                                                                <th>Kit Name</th>
                                                                <th>Quantity</th>
                                                                <th>Issue Date</th>
                                                                 <th>Westage</th>
                                                                  <th>Issued By</th>
                                                                   <th>Received By</th>
                                                                  <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                       <tbody >
                                                        <?php
foreach ($getkitsissuance as $keys){
 $POCode=$keys['POCode'];
 $SerialNo=$keys['SerialNo'];
  $KitQty=$keys['KitQty'];
   $IssuanceDate=$keys['IssuanceDate'];
    $Wastage=$keys['Wastage'];
     $Type=$keys['Type'];
      $Issuedby=$keys['Issuedby'];
       $Receivedby=$keys['Receivedby'];
     
     
 ?> 

 <tr>   
  <td><?php Echo $POCode;?></td>
  <td><?php Echo $SerialNo;?></td>
  <td><?php Echo $KitQty;?></td>
  <td><?php Echo $IssuanceDate;?></td>
  <td><?php Echo $Wastage;?></td> 
  <td><?php Echo $Issuedby;?></td> 
  <td><?php Echo $Receivedby;?></td> 
  <td>
   
                                                     
   <?php
   if($Type=='normal'){
    ?>
   <button type="button" class="btn btn-xs btn-outline-success">Normal</button>
    <?php
   }else{
    ?>
 <button type="button" class="btn btn-xs btn-outline-info">Reprint</button>
    <?php
   }
   ?>
  
 
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


                                   
                                
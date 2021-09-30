

    <?php
if(!($this->session->has_userdata('user_id'))){
  redirect('login');
}else{
?>


<?php
      $this->load->view('header');
    ?>

<body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <?php
      $this->load->view('aside');
    ?>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <?php
      $this->load->view('template');
    ?>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                    <?php
      if($this->session->flashdata('Proinfo')){ 
    
    
      ?>
    <div class="alert alert-danger alert-dismissible show fade" id="msgbox">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('Proinfo');?>
                    </div>
                  </div>
                  <?php
      }

                  ?>
                      
                          <div>
                            <div>
                            
                            <!-- Popup Form Button --> 

<!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add/Edit Assets Type </h1>
            </div>
            <div class="modal-body">
                <form name="form" id="myForm" method="POST" action="">
                    <!-- <input type="hidden" name="_token" value=""> -->
                    <div class="form-group" style="display:none;">
                        <label class="control-label">ID</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="project-bid"  name="tid">
                        </div>
                    </div>
              
                    <div class="form-group">
                        <label class="control-label">Asset Type</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="assetName" id="assName" placeholder="Enter Asset Name">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="assetStatus"> Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                        <button type="submit" class="btn btn-success" id="saveAssetType" >Save</button>
                        <button type="submit" class="btn btn-success" id="updateAssetType" style="display:none" >Update</button>   

                            <button class="btn btn-success" data-dismiss="modal">Close</button>
                          
                 </div>
                    </div>
                </form>
       
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Delete Asset Type -->
<div class="modal fade" id="ModelDeletetype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Asset Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete detail of project? (This process is irreversible)
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary btn-confirm-del-type">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>  
    </div>
    </div>
  </div>
</div>


<!-- Modal Delete Asset Type -->
<div class="modal fade" id="ModelDeleteChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Chart of Asset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete detail of project? (This process is irreversible)
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary btn-confirm-del-chart">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>  
    </div>
    </div>
  </div>
</div>


<div id="ModalAss" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add/Edit  Charts of Asset</h1>
            </div>
            <div class="modal-body">
                <form name="formChart" id="myformChart" method="POST" action="">
                    <!-- <input type="hidden" name="_token" value=""> -->
                    <div class="form-group" style="display:none;">
                        <label class="control-label">ID</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="project-bid"  name="cid">
                        </div>
                    </div>
                   
                     <div class="form-group">
                     <div>
                     <label for="sel1">Production Type :</label>
                        <select class="form-control" id="sel1" name="assetProdType" >
                        <option value="0" disabled>Select one of the following</option>
                        <option value="1">Production</option>
                             <option value="2">Non Production</option>
                            </select>
                        </div> 
                   </div>
                      <div class="form-group">
                     <div>
                     <label for="sel1">Asset Type :</label>
                        <select class="form-control" id="sel1" name="assetChartType" >
                        <option value="0" disabled>Select one of the following</option>
                        <?php
                                   if (isset($Assettype)) {
                                  foreach ($Assettype as $Key) {
                           
                         ?>

                        <option value="<?php echo $Key['TID'] ?>" ><?php echo $Key['AssertType'] ?></option>
                        <?php
                        }
                       }
                  ?>
    
                            </select>
                        </div> 
                   </div>
                     <div class="form-group">
                        <label class="control-label">Name :</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="assetNameChart" placeholder="Name">
                        </div>
                    </div>
             
                     <div class="form-group">
                        <label class="control-label">UOM: </label>
                        <div>
                            <input type="text" class="form-control input-lg" name="UOM" placeholder="UOM">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="assetChartStatus"> Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                        <button type="submit" class="btn btn-success" id="saveAssetChart" >Save</button>
                        <button type="submit" class="btn btn-success" id="updateAssetChart" style="display:none" >Update</button>   

                            <button class="btn btn-success" data-dismiss="modal">Close</button>
                          
                 </div>
                    </div>
                </form>
       
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        </div>
<br><br>
<?php
  $Month=date('m');
$Year=date('Y');
$Day=date('d');
$CurrentDate=$Year.'-'.$Month.'-'.$Day;
?>
<div id="exampleModalEditMat"   class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Kits  <span class="fw-300"><i>Issuance</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            
                                           
                                            <div class="tab-content py-3">
                                                <div class="row">
                                             
                       
                       
     <div class="col-md-3">
                       <label >Start Date :</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date1" class="form-control" type="date" value="<?php echo $CurrentDate;?>" >
                        </div>
                    </div>
                    <div class="col-md-3">
                       <label >End Date</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date2" class="form-control" type="date" value="<?php echo $CurrentDate;?>" >
                        </div>
                    </div>
                    <div id="poSelectbox" >
                        <div class="row">
                     <div class="col-md-8" >
                       <div class="form-group">
                            <lable class="form-control-label " for="duration">PO No:</lable>
                            <br>
                           <select class="form-control mySelectMatProEdit" data-live-search="true" searchable="Search here.."  name="PO" id="PO">
                             <option value="">Select PO :</option>
                               
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
</div>
                    </div>
                    <br><br>
                    <div class="row">
                     <div class="col-md-2">
                    <div class="form-group">
                            <lable class="form-control-label" for="duration">Kits Name:</lable>
                            
                            <select class="form-control" name="duration" id="duration">
                             <option value="">Select Duration :</option>
                               
                            </select>
                        </div>
                        </div>
                           <div class="col-md-2">
                       <label >Quantity:</label>
                        <div class="form-group-inline">
                            
                            <input name="POQty" id="POQty" class="form-control" type="text">
                        </div>
                    </div>
                       <div class="col-md-2">
                       <label >Westage:</label>
                        <div class="form-group-inline">
                            
                            <input name="SR" id="date2" class="form-control" type="text">
                        </div>
                    </div>
                       <div class="col-md-2">
                       <label >Balance:</label>
                        <div class="form-group-inline">
                            
                            <input name="ER" id="date2" class="form-control" type="text">
                        </div>
                    </div>
                     <div class="col-md-2">
                       <label >Issue  Date :</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date1" class="form-control" type="date">
                        </div>
                    </div>
                     <div class="col-md-2">
                       <label style="background-color: #fff; color: #fff;" >Schedule End Date</label>
                        <div class="form-group-inline">
                            
                             <button class="btn btn-primary" id="searchdata" >Save</button>
                        </div>
                    </div>
                      
</div>
  <br><br>
<div class="row">
     <div class="col-md-8">
    <div class="table-responsive-lg">
                        
                                                <table class="table table-striped table-hover table-sm" id="tableExport">
                                                     
                                                        <thead>
                                                            <tr>
                                                               <th>PO Code</th>
                                                                <th>Kit Name</th>
                                                                <th>Quantity</th>
                                                                <th>issue Status</th>
                                                                <th>Issuee Date</th>
                                                                 <th>Westage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                    </tbody>
                                </table>
                            </div>
                            </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
                        </div>
                    </main>
            
                    <?php
        $this->load->view('after-main');
       ?>
    

<script>
    
$(document).ready(function(){
       $("#date1").change(function(e) {
//alert('Heloo');
loadPO()
     });
 $("#date2").change(function(e) {
//alert('Heloo');
loadPO()
     });
      
     
     function loadPO(){
         //alert('Heloo');
  var date1 =  $("#date1").val()
    var date2 = $("#date2").val()
            url = "<?php echo base_url("index.php/Kitsissuance/getPO/") ?>" + date1 + "/" + date2 
             //alert(url);
 $.get(url, function(data) {
     $("#poSelectbox").html(data)
 });
        }

         $('.mySelectMatProEdit').select2(
        {
  dropdownParent: $('#exampleModalEditMat')
}
    );
});


</script>


<?php
        $this->load->view('Foter');
       ?>
</body>
</html>
<?php

}

?>
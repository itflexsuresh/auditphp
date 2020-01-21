<?php
$attributes_installationType = array('class' => 'Installation_type', 'data-toggle'=>'validator', 'id' => 'Installation_type1', 'method' => 'post');

  //   $this->load->helper('form'); ?>
  <div class="row">
    <div class="col-sm-12">
      <div class="white-box">           
        <?php echo form_open_multipart('installation_type/installationtype_insert', $attributes_installationType); ?>    
        <div class="form-group">
          <?php
          if ($this->session->flashdata('installation_sucess')!='') {
            echo "<div class='alert alert-success'>";
            echo $this->session->flashdata('installation_sucess');
            echo "</div>";
          }

          elseif ($this->session->flashdata('updation_sucess')!='') {
            echo "<div class='alert alert-success'>";
            echo $this->session->flashdata('updation_sucess');                    
            echo '</div>';

          }elseif ($this->session->flashdata('Archive_install')!='') {
            echo "<div class='alert alert-success'>";
            echo $this->session->flashdata('Archive_install');                    
            echo '</div>';

          }
          elseif ($this->session->flashdata('Active_install')!='') {
            echo "<div class='alert alert-success'>";
            echo $this->session->flashdata('Active_install');                    
            echo '</div>';

          }elseif ($this->session->flashdata('delete_install')!='') {
            echo "<div class='alert alert-danger'>";
            echo $this->session->flashdata('delete_install');                    
            echo '</div>';

          }
          ?>
          <label for="textarea" class="control-label">Installation Type</label>
          <textarea name="InstallationType" type="text" id="ContentPlaceHolder1_InstallationType" placeholder="Enter an Installtion Type" id="textarea" class="form-control" required><?php if($this->session->flashdata('install_flash')!==''){echo $this->session->flashdata('install_flash'); } ?></textarea>
          <span class="help-block with-errors"><?php if($this->session->flashdata('install_check')!=''){ echo $this->session->flashdata('install_check'); } ?></span>
        </div>


        <div class="form-group">
          <div class="checkbox">
            <input name="ContentPlaceHolder1isActive" <?php if($this->session->flashdata('install_check')!=''){ echo "checked='checked'"; } ?> type="checkbox" id="terms" data-error="Before you wreck yourself">
            <label for="terms"> Active </label>    
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-rounded btn-sm btn-primary">Add Installation Type</button>
        </div>
        </form>
        
        <div class="row button-box">
         <div class="col-lg-2 col-sm-4 col-xs-12">
          <button id="active_btn" name="active_btn" class="btn btn-block btn-success">ACTIVE</button>
        </div>
        <div class="col-lg-2 col-sm-4 col-xs-12">
          <button id="archive_btn" name="archive_btn" class="btn btn-block btn-success">ARCHIVED</button>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="table-responsive">
          <div id="activeTable">
            <table id="isActive" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                 <th>Installation Type</th>
                 <th></th>
               </tr>
             </thead>
             <tbody>
              <?php
              foreach ($records as $key) {
                ?>
                <?php if ($key->is_active==1) { ?>
                  <tr>
                   <td><?php echo $key->installation_type; ?></td>
                   <td><div class="col-sm-6 col-md-4 col-lg-3"><a href='<?php echo base_url()."installation_type/addToArchive/".$key->installationtype_id; ?>' data-toggle="tooltip" data-original-title="Add To Active" onclick="return confirm('You Want Move This To Archive ?');" ><i class="fa fa-check-circle"></i></a></div><a href='<?php echo base_url()."installation_type/installation_type_update/".$key->installationtype_id; ?>' data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a></td>
                   <!-- <td><a href = '<?php // echo "installation_type_update/".$key->installationtype_id; ?>'><img src="<?php // echo base_url(); ?>assets/images/edit.png" height="25" width="25"></a></td> -->
                 <?php  } ?>

               </tr>
             <?php }  ?>

           </tbody>
         </table>
       </div>
     </div>
     <!-- </div> -->
   </div>

   <div class="col-sm-12">
    <div class="table-responsive">
      <div id="archiveTable">
        <table id="isArchive" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
             <th>Installation Type</th>
             <th></th>
           </tr>
         </thead>
         <tbody>
          <?php
          foreach ($records as $key1) {
            ?>
            <?php if ($key1->is_active==0) { ?>
              <tr>
               <td><?php echo $key1->installation_type; ?></td>
                <td><div class="col-sm-6 col-md-4 col-lg-2"><a href='<?php echo base_url()."installation_type/addToActive/".$key1->installationtype_id; ?>' data-toggle="tooltip" data-original-title="Add To Archive" onclick="return confirm('You Want Move This To Active ?');" ><i class="fa fa-check-circle"></i></a></div><a href='<?php echo base_url()."installation_type/installation_type_update/".$key1->installationtype_id; ?>' data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a href='<?php echo base_url()."installation_type/deleteisntallation/".$key1->installationtype_id; ?>' data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('You Want Delete This ?');"> <i class="fa fa-close text-danger"></i> </a></td>
              <!--  <td><a href = '<?php // echo "installation_type_update/".$key->installationtype_id; ?>'><img src="<?php // echo base_url(); ?>assets/images/edit.png" height="25" width="25"></a></td> -->
             <?php  } ?>

           </tr>
         <?php }  ?>

       </tbody>
     </table>
   </div>
 </div>
 <!-- </div> -->
</div>

</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
$('.alert, .alert-success').delay('3000').fadeOut(300);
$('.alert, .alert-danger').delay('3000').fadeOut(300);
    $('#isActive').DataTable({
      aoColumnDefs: [
      {
       bSortable: false,
       aTargets: [ -1 ]
     }
     ]
    });
    $('#isArchive').DataTable({
      aoColumnDefs: [
      {
       bSortable: false,
       aTargets: [ -1 ]
     }
     ]
    });
    $('#archiveTable').hide();
    $('#archive_btn').css("color","#333");
    $('#archive_btn').css("background-color","#ebebeb");
    $('#archive_btn').css("border-color","#adadad");
    

    
    $('#archive_btn').click(function(){
      $('#isActive_wrapper').hide();
      $('#archiveTable').show();
      $('#isActive').hide();
      $('#archive_btn').css("color","#333");
      $('#archive_btn').css("background-color","#00c292");
      $('#archive_btn').css("border-color","#adadad");
      $('#active_btn').css("color","#333");
      $('#active_btn').css("background-color","#ebebeb");
      $('#active_btn').css("border-color","#adadad");
    });
    $('#active_btn').click(function(){
     $('#archiveTable').hide();
     $('#isActive').show();
     $('#isActive_wrapper').show();
     $('#active_btn').css("color","#333");
     $('#active_btn').css("background-color","#00c292");
     $('#active_btn').css("border-color","#adadad");      
     $('#archive_btn').css("color","#333");
     $('#archive_btn').css("background-color","#ebebeb");
     $('#archive_btn').css("border-color","#adadad");
   });

  } );
  // $(document).ready( function () {
  //  $('#isActive_Archive').DataTable();
  // } );
</script>

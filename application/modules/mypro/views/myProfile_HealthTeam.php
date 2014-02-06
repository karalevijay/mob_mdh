<?php
//var_dump($content_data) 
?>
<div id="mysugar_sugarNow">
  <div class="ui-grid-a mb20">
    <a data-ajax='false' href="<?php echo base_url() ?>mypro/" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a> </div>
    <p id="error">
        <?php
        if (isset($content_data['error']))
        {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        } echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
    </p>
 <form>
    <div class="mb10 per100 smallFont">
        <a data-ajax='false' href="<?php echo base_url() ?>mypro/add_Provider" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="b" class="ui-btn-text">Add Provider</a>
    </div>
    <div class="per100 mb20">
    <div class="per100">
      <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
        <thead>
          <tr class="ui-bar-d">
            <th class="per40">Name</th>
            <th class="per40">Specialization</th>
            <th class="per20">Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tableScroller healthteam per100">
      <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
        <tbody>
            <?php 
            if (isset($content_data['provider']['prescribers']))
            {
              foreach($content_data['provider']['prescribers'] as $prescriber)
              { 
                  ?>
             <tr>
            <td class="per40"><?php echo $prescriber['prescriber_name']?></td>
            <td class="per40"><?php echo $prescriber['notes']?></td>
            <td class="per20"> <a data-ajax='false' href="<?php echo base_url().'mypro/Edit_myProvider/'.$prescriber['prescriber_uid'];?>" > <img src="<?php echo img_url(); ?>edit-ico.png" class="per40" ></a></td>
          </tr> <?php
  }
     
            } ?>
        </tbody>
      </table>
    </div>
    </div>
     <div class="mb10 per100 smallFont">
        <a data-ajax='false' href="<?php echo base_url() ?>mypro/add_Pharmacy" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="b" class="ui-btn-text">Add Pharmacy</a>
    </div>
    <div class="per100 mb20">
    <div class="per100">
      <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
        <thead>
          <tr class="ui-bar-d">
            <th class="per40">Name</th>
            <th class="per40">Specialization</th>
            <th class="per20">Action</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tableScroller healthteam per100">
      <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
        <tbody>
             <?php 
            if (isset($content_data['pharmacy']['pharmacies']))
            {
              foreach($content_data['pharmacy']['pharmacies'] as $pharmacy)
              { 
                  ?>
             <tr>
            <td class="per40"><?php echo $pharmacy['pharmacy_name']?></td>
            <td class="per40"><?php echo $pharmacy['nickname']?></td>
            <td class="per20"> <a data-ajax='false' href="<?php echo base_url().'mypro/Edit_myPharmacy/'.$pharmacy['pharmacy_uid'];?>" > <img src="<?php echo img_url(); ?>edit-ico.png" class="per40" ></a></td>
          </tr> <?php
  }
  
              } ?>
        </tbody>
      </table>
    </div>
    </div>
    
    </div>
  </form>

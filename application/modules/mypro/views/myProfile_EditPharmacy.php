<?php 
?>

<div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Edit Pharmacy</h2>
            <a data-ajax='false' href="<?php echo base_url() ?>mypro/add_healthteam/" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
        </div> 
        <p id="error">
        <?php
        if (isset($content_data['error']))
        {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        } echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
    </p>
    
        <form name="Edit_pharmacyform" id="Edit_pharmacyform" data-ajax='false' action="<?php echo base_url() ?>mypro/save_myPharmacy" method="post">
           <input type="hidden" name="pha_id" value="<?php if(isset($content_data['pharmacy_id'])) echo $content_data['pharmacy_id']; ?>" data-mini="true"/>
            <div class="groupDivs">
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Pharmacy</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="pha_name" id="pha_name" value="<?php if(isset($content_data['pharmacy_name'])) echo $content_data['pharmacy_name']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Street</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="Street" name="Street" value="<?php if(isset($content_data['street'])) echo $content_data['street']; ?>" data-mini="true"/></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">City</h4>
                    <div class="ui-block-b per65"><input type="text" name="city" it="city" placeholder="" value="<?php if(isset($content_data['city'])) echo $content_data['city']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">State</h4>
                    <div class="ui-block-b per65"><select name="State" id="State" vlaue="<?php if(isset($content_data['state'])) echo $content_data['state']; ?>"><option>IA</option><option>San Diago</option></select></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Zip Code</h4>
                    <div class="ui-block-b per65"><input type="text" name="Zip" id="Zip" placeholder="" value="<?php if(isset($content_data['zip'])) echo $content_data['zip']; ?>" data-mini="true"/></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Phone</h4>
                    <div class="ui-block-b per65"><input type="text" name="Phone" id="Phone" placeholder="" value="<?php if(isset($content_data['phone'])) echo $content_data['phone']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Fax</h4>
                    <div class="ui-block-b per65"><input type="text" name="Fax" id="Fax" placeholder="" value="<?php if(isset($content_data['fax'])) echo $content_data['fax']; ?>" data-mini="true"/></div>
                </div>                 
                <div class="mb20 ui-grid-b">
                    <h4 class="ui-block-a mt15">Email</h4>
                    <div class="ui-block-b per65"><input type="text" name="Email" id="Email" placeholder="" value="<?php if(isset($content_data['email'])) echo $content_data['email']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb20 ui-grid-b">
                    <h4 class="ui-block-a mt15">Website</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="web" id="web" value="<?php if(isset($content_data['url'])) echo $content_data['url']; ?>" data-mini="true"/></div>
                </div>
            </div>
            <div class="mb10 ui-grid-a">
                <div class="ui-block-a smallFont"> 
                        <input type="submit" id="save" class="submit" data-theme='b' value='Save' />
                </div>
                <div class="ui-block-b smallFont"> 
                      <a data-ajax='false' href="<?php echo base_url() ?>mypro/add_healthteam/" data-role="button" data-theme='c'>Cancel</a>
                </div>
            </div>
      </form>
 </div>
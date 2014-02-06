<?php
//var_dump($content_data);
?>

<div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Edit Provider</h2>
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
        <form name="Edit_providerform" id="Edit_providerform" data-ajax='false' action="<?php echo base_url() ?>mypro/submit_provider" method="post">
            <div class="groupDivs">
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Provider Name</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="pro_name" id="pro_name" maxlength="10" value="<?php if(isset($content_data['prescriber_name'])) echo $content_data['prescriber_name']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Speciality</h4>
                    <div class="ui-block-b per65"><select name="Spe" value="<?php if(isset($content_data[''])) echo $content_data['']; ?>"><option>Endocrinologist</option><option>Test1</option></select></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Street</h4>
                    <div class="ui-block-b per65"><input type="text" name="Street" placeholder="" value="<?php if(isset($content_data['address_1'])) echo $content_data['address_1']; ?>" id="street" value="" data-mini="true"/></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Zip Code</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="Zip" value="<?php if(isset($content_data['zip'])) echo $content_data['zip']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">City</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="City" value="<?php if(isset($content_data['city'])) echo $content_data['city']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">State</h4>
                    <div class="ui-block-b per65"><select name="State" value="<?php if(isset($content_data['state'])) echo $content_data['state']; ?>"><option>IA</option><option>San Diago</option></select></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Phone</h4>
                    <div class="ui-block-b per65"><input type="text" name="phone" placeholder="" id="phone" value="<?php if(isset($content_data['phone'])) echo $content_data['phone']; ?>" data-mini="true"/></div>
                </div>                 
                <div class="mb20 ui-grid-b">
                    <h4 class="ui-block-a mt15">My Notes</h4>
                    <div class="ui-block-b per65"><input type="text" placeholder="" name="notes" value="<?php if(isset($content_data['notes'])) echo $content_data['notes']; ?>" data-mini="true"/></div>
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
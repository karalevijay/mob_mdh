   
<div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">About Me</h2>
            <a data-ajax='false' href="<?php echo base_url() ?>mypro/" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
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
        <form name="abt_me" id="abt_me" method="post" action="<?php echo base_url() ?>mypro/abt_my_profile_submit" data-ajax='false' id='abt_me'>
            <div class="groupDivs">
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">First Name</h4>
                    <div class="ui-block-b per65 posRel"><input type="text" name="FN" id="FN" placeholder=""  value= "<?php echo $content_data['user_profile']['first_name'];?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Last Name</h4>
                    <div class="ui-block-b per65"><input type="text" name="LN" id="LN" placeholder="" value="<?php echo $content_data['user_profile']['last_name'];?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt20">Street Address</h4>
                    <div class="ui-block-b per65"><textarea name="SA" id="ST" value="<?php echo $content_data['user_profile']['address_1'];?>"></textarea></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Zip Code</h4>
                    <div class="ui-block-b per65"><input type="text" name="ZC" id="ZC" placeholder="" value="<?php echo $content_data['user_profile']['zip'];?>" data-mini="true"/></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">City</h4>
                    <div class="ui-block-b per65"><input type="text" name="ct" id="ct" placeholder="" value="<?php echo $content_data['user_profile']['city'];?>" data-mini="true"/></div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">State / Proviance</h4>
                    <div class="ui-block-b per65"><input type="text" name="state" id="stste" placeholder="" value="<?php echo $content_data['user_profile']['state'];?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Date of Birth</h4>
                    <div class="ui-block-b per65"><input name="mydate" id="mydate" value="<?php echo $content_data['user_profile']['birthdate'];?>" type="date" data-role="datebox"  data-options='{"mode": "datebox"}'>  </div>
                </div>
                 <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Gender</h4>
                    <div class="ui-block-b per65"><select name="G" id="G" value="<?php echo $content_data['user_profile']['gender'];?>"><option>Male</option><option>Female</option></select></div>
                </div>
                <div class="mb20 ui-grid-b">
                    <h4 class="ui-block-a mt15">Race / Ethnicity</h4>
                    <div class="ui-block-b per65"><input type="text" name="race" id="race" placeholder="" value="<?php echo $content_data['user_profile']['race_type_id'];?>" data-mini="true"/></div>
                </div>
                <div class="mb20 ui-grid-a">
                    <h3>Other Information</h3>                    
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Income Level</h4>
                    <div class="ui-block-b per65">
                      <select name="INL" id="INL" value="<?php echo $content_data['user_profile']['income_range_id'];?>">
                        <option>0-50000</option>
                        <option>100000-500000</option>
                        <option>500000-1000000</option>
                      </select>
                    </div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Insurance</h4>
                    <div class="ui-block-b per65">
                      <select name="insurance" id="in" value="<?php echo $content_data['user_profile']['insurance_type_id'];?>">
                        <option>Yes i have</option>
                        <option>No i don't have</option>
                      </select>
                    </div>
                </div>
                <div class="mb10 ui-grid-b">
                    <h4 class="ui-block-a mt15">Dependants</h4>
                    <div class="ui-block-b per65">
                      <select name="De" id="De" value="<?php echo $content_data['user_profile']['dependents'];?>">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
                    </div>
                </div>
                <div class="mb20 ui-grid-a">
                    <h3>Profile Picture</h3>                    
                </div>
               
            </div>
            
            <div class="mb10 ui-grid-a">
                <div class="ui-block-a smallFont"> 
                    <input type="submit" id="save" class="submit" data-theme='b' value='Save' />
                </div>
                <div class="ui-block-b smallFont"> 
                   <a data-ajax='false' href="<?php echo base_url(); ?>mypro/" class="smallFont" data-theme='c' data-role="button">Cancel</a>
                </div>
            </div>
    </div>
</form>

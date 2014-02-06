<?php $formdata=$this->session->flashdata('vitals_data'); ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Today's Visit</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <div class="menuBg" >
        <div data-role="navbar" class="mb10" >
            <ul>
                <li><a  data-ajax='false'   href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/1'; ?>" class="ui-btn-active">Vitals</a></li>
                <li><a  data-ajax='false'   href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/2'; ?>" >Meds</a></li>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3'; ?>" >Sugars</a></li>
            </ul>
        </div>
        <div data-role="navbar" >
            <ul>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" >Labs</a></li>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/5'; ?>" >Questions</a></li>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/6'; ?>" >Goals</a></li>
            </ul>
        </div>
        <p id="error">
            <?php
        if (isset($content_data['error']))
        {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        }
        echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
        </p>
    </div>

    <?php
    if (isset($content_data['error']))
    {
        echo '<p>' . $content_data['error'] . '</p>';
        unset($content_data['error']);
    } echo '<p>' . $this->session->flashdata('error') . '</p>'
    ?>

    <div class="today-visit-mid mt10">
        <form action="<?php echo base_url() ?>myvisit/todays_visit"  method="post" data-ajax='false' id='vitalsform' >
            <div class="mb10 fLeft per100">
                <h3 class='mb5'>Weight</h3>
                <div class="per90 fLeft">
                    <input maxlength="4" type="number" id='weight' name="weight" placeholder="Enter your Weight" value="<?php if (isset($old_data['weight']))
        echo $old_data['weight']; else if(isset($formdata['weight'])) echo $formdata['weight'];
    ?>" />
                    <input type="hidden" name="app_id" value="<?php echo $content_data['app_id']; ?>" />
                    <input type="hidden" name="tab" value="<?php echo $content_data['tab']; ?>" />
                </div>
                <span class="fLeft mt20 ml5">lbs</span>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="mb10 fLeft per100">
                <h3 class='mb5'>Enter your Blood Pressure</h3>
                <div class="per40 fLeft">
                    <input maxlength="4" type="number" id='systolic' name="systolic" placeholder="Systolic" value="<?php if (isset($old_data['bp_systolic']))
                               echo $old_data['bp_systolic']; else if(isset($formdata['systolic'])) echo $formdata['systolic'];
    ?>" />
                </div>
                <div class="per10 mt20 fLeft center" style="font-size:20px;"> / </div>
                <div class="per40 fLeft">
                    <input maxlength="4" type="number"  id='diastolic'  name="diastolic" placeholder="Diastolic" value="<?php if (isset($old_data['bp_diastolic']))
                               echo $old_data['bp_diastolic']; else if(isset($formdata['diastolic'])) echo $formdata['diastolic'];
    ?>" />
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="noteBg">
                <div class="mb10 fLeft per100">
                    <div class="per65 fLeft">
                        <textarea maxlength="250" cols="40" rows="8" name="notes" placeholder="Add notes" id="textarea-1"><?php if (isset($old_data['notes']))
                               echo $old_data['notes'];
    ?></textarea>
                    </div>
                    <div class="fLeft mt5 smallFont ml10">
                        <button id="login" type="submit" data-theme='b'>Next</button>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </form>
    </div>
</div>
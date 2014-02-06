<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Today's Visit</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>

    <div class="menuBg" >
        <div data-role="navbar" class="mb10" >
            <ul>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/1'; ?>" >Vitals</a></li>
                <li><a data-ajax='false'   href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/2'; ?>" >Meds</a></li>
                <li><a data-ajax='false'   href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3'; ?>" >Sugars</a></li>
            </ul>
        </div>
        <div data-role="navbar" >
            <ul>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" class="ui-btn-active" >Labs</a></li>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/5'; ?>" >Questions</a></li>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/6'; ?>" >Goals</a></li>
            </ul>
            
        </div>
        <div class='clear'></div>
        <span id="error" class="fLeft per100">
            <?php
        if (isset($content_data['error']))
        {
            echo $content_data['error'] . '</br>';
            unset($content_data['error']);
        }
        echo $this->session->flashdata('error') ;
        ?>
        </span>
        <div class='clear'></div>
    </div>
   
    <div class="today-visit-mid mt10">
        <div style="height:215px; overflow-x:hidden; overflow-y:auto;">
            <div class="fLeft per100">
                <h4>Enter A1C Details</h4>
                <p id="a1cerror">
                </p>
                <div class="fLeft per60 posRel mb10">
                    <input type="text" name="result" id="result" placeholder="Enter New Reading" value="<?php if (isset($old_data['a1c']['lab_a1c'][0]['result'])) echo $old_data['a1c']['lab_a1c'][0]['result']; ?>" />
                    <span class="percentage mt10">%</span>
                </div>
                <input type="hidden" name="app_id" id="app_id" value="<?php if (isset($old_data['a1c']['lab_a1c'][0]['app_id'])) echo $old_data['a1c']['lab_a1c'][0]['app_id']; else if (isset($old_data['cholesterol']['lab_cholesterol'][0]['app_id'])) echo $old_data['cholesterol']['lab_cholesterol'][0]['app_id'];
else echo $old_data['app_id']; ?>" />
                <!--<div class="mr15 f15 mt20 fRight fBold">6.7%</div>-->
                <div class="clear"></div>
            </div>
         
          
                    <input name="a1cmydate" id="a1cmydate" type="hidden" value="<?php if (isset($old_data['a1c']['lab_a1c'][0]['date'])) echo date('m/d/Y', strtotime ($old_data['a1c']['lab_a1c'][0]['date']));
else echo date('m/d/Y', time()); ?>">                  
                                                <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
        
                <!--<div class="mr15 mt15 f15 fRight fBold">11/12/13</div>-->
           
            <div class="clear"></div>
            <div class="ui-grid-a mb5 per95">
                <div class="ui-block-a smallFont">
                    <button id="save" onclick="submit_a1c();" data-theme='b'>Save</button>
                </div>
                <div class="ui-block-b smallFont">
                    <a type="button" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" id="cancel" data-theme='c'  >Cancel</a>
                </div>
            </div>
            <div class="clear"></div>
            <h4>Scroll down to enter cholesterol details</h4>
            <p id="cherror">
                </p>
            <div class="fLeft per100 mb10">
                <div class="per80 fLeft">
                    <input type="number" name="total" id="total" placeholder="Total" value="<?php if (isset($old_data['cholesterol']['lab_cholesterol'][0]['total'])) echo $old_data['cholesterol']['lab_cholesterol'][0]['total']; ?>" />
                </div>
                <span class="fLeft mt15 ml5">mg/dL</span>
            </div>
            <div class="fLeft per100 mb10">
                <div class="per80 fLeft">
                    <input type="number" name="hdl" id="hdl" placeholder="HDL" value="<?php if (isset($old_data['cholesterol']['lab_cholesterol'][0]['hdl'])) echo $old_data['cholesterol']['lab_cholesterol'][0]['hdl']; ?>" />
                </div>
                <span class="fLeft mt15 ml5">mg/dL</span>
            </div>
            <div class="fLeft per100 mb10">
                <div class="per80 fLeft">
                    <input type="number" name="ldl" id="ldl" placeholder="LDL" value="<?php if (isset($old_data['cholesterol']['lab_cholesterol'][0]['ldl'])) echo $old_data['cholesterol']['lab_cholesterol'][0]['ldl']; ?>" />
                </div>
                <span class="fLeft mt15 ml5">mg/dL</span>
            </div>
            <div class="fLeft per100 mb10">
                <div class="per80 fLeft">
                    <input type="number" name="tg" id="tg" placeholder="TG" value="<?php if (isset($old_data['cholesterol']['lab_cholesterol'][0]['tri'])) echo $old_data['cholesterol']['lab_cholesterol'][0]['tri']; ?>" />
                </div>
                <span class="fLeft mt15 ml5">mg/dL</span>
            </div>

        
                <input name="chmydate" id="chmydate" type="hidden" value="<?php if (isset($old_data['cholesterol']['lab_cholesterol'][0]['cholesterol_date'])) echo date('d M y', strtotime($old_data['cholesterol']['lab_cholesterol'][0]['cholesterol_date']));
else echo date('m/d/Y', time()); ?>">                  
         
            <div class="clear"></div>
            <div class="ui-grid-a mb20 per95">
                <div class="ui-block-a smallFont">
                    <button id="save" onclick="submit_cholesterol();" data-theme='b'>Save</button>
                </div>
                <div class="ui-block-b smallFont">
                    <a type="button" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" id="cancel" data-theme='c'  >Cancel</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="noteBg">
            <div class="fLeft per100">
                <div class="per65 fLeft">
                    <textarea cols="40" rows="8" name="notes" placeholder="Add notes" id="textarea-1"><?php  if(isset($old_data['a1c']['lab_a1c'][0]['notes'])) echo $old_data['a1c']['lab_a1c'][0]['notes']; else if(isset($old_data['cholesterol']['lab_cholesterol'][0]['notes'])) echo $old_data['cholesterol']['lab_cholesterol'][0]['notes'];  ?></textarea>
                </div>
                <div class="fLeft mt5 smallFont ml10">
                    <button id="login" onclick="submit_labs();"  data-theme='b'>Next</button>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
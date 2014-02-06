<?php //  var_dump($old_data['note']) ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Today's Visit</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <div class="menuBg" >
        <div data-role="navbar" class="mb10" >
            <ul>
                <li><a  data-ajax='false'   href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/1'; ?>" >Vitals</a></li>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/2'; ?>" class="ui-btn-active" >Meds</a></li>
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
    <div class="today-visit-mid mt10">
        <h3 class="per100 fleft mb10"><?php echo $content_data['name']; ?>'s Meds</h3>
        <div class="tableScroller mb20">
            <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="meds-list ui-body-d ui-shadow table-stripe ui-responsive">
                <tbody>
                    <?php
                    if (isset($old_data['meds']))
                    {
                        foreach ($old_data['meds'] as $drug)
                        {
                            ?>

                            <tr>
                                <td class="per80"><?php echo $drug['drug_display']; ?></td>
                                <!--<td class="per20"><a id="triggerEdit" href="#popupBasic" data-rel="popup"></a> <a href="javascript:void(0);"  onclick="visit_meds_edit(<?php //  echo $drug['patient_drug_id'];   ?>)" data-theme='c' ><img src="<?php // echo img_url()   ?>edit-ico.png" class="per35 mt5" style="border:0;"></a></td>-->
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>

                        <tr>
                            <td class="per80">No Drugs Exist</td>
                            <td class="per20"></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <form action="<?php echo base_url() . 'myvisit/submit_meds_notes' ?>" method='post' data-ajax='false'>
            <div class="noteBg">
                <div class="fLeft per100">
                    <div class="per65 fLeft">
                        <textarea maxlength="250" cols="40" rows="8" name="notes" placeholder="Make any notes about medication dosage changes here." id="textarea-1"><?php if (isset($old_data['note']['visitvitals']['notes'])) echo $old_data['note']['visitvitals']['notes'];  ?></textarea>
                    </div>
                    <input type="hidden" value='<?php echo  $content_data['app_id'] ?>' name='app_id' />
                    <div class="fLeft mt5 smallFont ml10">
                        <input type="submit" data-theme='b' value="Next" />
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </form>

    </div>


    <div data-role="popup" id="popupBasic" style="width:100%; dispay:none">

    </div>
    <!--    <div id="medsedit" style="position:absolute; top:20%; background:#fff; padding: 15px; z-index: 300; ">
          
        </div>
        <div data-role="popup" id="popupBasic" style="width:100%;"> <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
            <div class="groupDivs per100" >
                <div style="height:250px; overflow-x:hidden; overflow-y:auto; padding-right:15px;">
                    <h2 class="mb10">Brilinta (ticagrelor)</h2>
                    <div class="mb5 per100">
                        <h4>Select Dosage form</h4>
                        <div class="per100 fLeft">
                            <input type="text" placeholder="" value="Tablet" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="mb5 per100">
                        <h4>Select Dose strength</h4>
                        <div class="per100 fLeft">
                            <input type="text"  value="90 mg" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="mb5 fLeft per100">
                        <h3>How much do you take</h3>
                        <div class="per70 fLeft">
                            <input type="text" placeholder="" value="1" />
                        </div>
                        <span class="fLeft mt15 ml5">Tablet(s)</span>
                        <div class="clear"></div>
                    </div>
                    <div class="mb5 fLeft per100">
                        <h4>How often do you take it</h4>
                        <div class="per30 fLeft">
                            <select name="select-native-1" id="select-native-1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="per25 mt15 fLeft center"> times per </div>
                        <div class="per35 fLeft">
                            <select name="select-native-1" id="select-native-1">
                                <option value="1">Day</option>
                                <option value="2">Month</option>
                                <option value="3">Year</option>
                            </select>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="mb5 per100">
                        <h4>what are you taking this medication for?</h4>
                        <div class="per100 fLeft">
                            <textarea cols="40" rows="8" name="textarea-1" placeholder="Add notes" id="textarea-1"></textarea>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="mb5 per100">
                        <h4>Add Notes</h4>
                        <div class="per100 fLeft">
                            <textarea cols="40" rows="8" name="textarea-1" placeholder="Add notes" id="textarea-1"></textarea>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="m15 ui-grid-a">
                <div class="ui-block-a">
                    <button id="save" data-theme='b'>Save</button>
                </div>
                <div class="ui-block-b">
                    <button id="cancel" data-theme='c'>Cancel</button>
                </div>
            </div>
        </div>-->
</div>

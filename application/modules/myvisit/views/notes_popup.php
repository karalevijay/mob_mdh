<?php $flag = 1; ?>
<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
<form data-ajax="false" method="post" action="<?php echo base_url() ?>myvisit/final_submit"  id="notesform" name="notesform">
        <div class="groupDivs border">
            <div class=" m15">
                <h3 class="mb10">Notes from Today's Visit</h3>
                <input type="hidden" name="app_id" id="app_id" value="<?php echo $content_data['app_id']; ?>"/>
                <input type="hidden" name="med_exist" value="<?php if(isset($content_data['notes']['meds']['visitvitals']['notes'])) echo 1; else echo 0; ?>"/>
                <?php
                if (is_array($content_data['notes']['vitals'][0]))
                {
                    ?>

                    <div class="mb20 mt20 ui-grid-a">
                        <div class="ui-block-b per100"><input type="radio" class="rad" onclick='edit_notes("vitalsnotes");' data-mini="true" name="radio-choice" id="radio-choice-1" value="vitalsnotes" />
                            <label for="radio-choice-1">Vitals Notes</label></div>
                        <input type="hidden" name="vitals" id="vitals" value="<?php
                        if (isset($content_data['notes']['vitals'][0]['vitals_id']))
                        {
                            echo $content_data['notes']['vitals'][0]['vitals_id'];
                            $flag = 0;
                        }
                        else
                            echo 0;
                        ?>"/>
                        <div class="clear"></div>
                        <div class="ui-block-b per100"><textarea id="vitalsnotes" name="vitalsnotes" onfocus='edit_notes("radio-choice-1");' readonly="readonly"><?php
                                if (isset($content_data['notes']['vitals'][0]['notes']))
                                {
                                    echo $content_data['notes']['vitals'][0]['notes'];
                                }
                                ?></textarea></div>
                    </div>

                    <div class="clear"></div>
                <?php } ?>
                <?php
                if (is_array($content_data['notes']['meds']))
                {
                    ?>

                    <div class="mb20 mt20 ui-grid-a">
                        <div class="ui-block-b per100"><input type="radio" class="rad" onclick='edit_notes("medsnotes");' data-mini="true" name="radio-choice" id="radio-choice-5" value="medsnotes" />
                            <label for="radio-choice-5">Meds Notes</label></div>

                        <div class="clear"></div>
                        <div class="ui-block-b per100"><textarea id="medsnotes" onfocus='edit_notes("radio-choice-5");' maxlenth='255' name="medsnotes" readonly="readonly"><?php
                                if (isset($content_data['notes']['meds']['visitvitals']['notes']))
                                {
                                    $flag = 0;
                                    echo urldecode($content_data['notes']['meds']['visitvitals']['notes']);
                                }
                                ?></textarea>
                        </div>
                    </div>

                    <div class="clear"></div>
                <?php } ?>
                <?php
                if (isset($content_data['notes']['cholesterol']['lab_cholesterol']) || isset($content_data['notes']['a1c']['lab_a1c']))
                {
                    ?>
                    <div class="mb20 mt20 ui-grid-a">
                        <div class="ui-block-b per100"><input type="radio"  onclick='edit_notes("labsnotes");' data-mini="true" class="rad" name="radio-choice" id="radio-choice-3" value="labsnotes" />
                            <label for="radio-choice-3">Labs Notes</label></div>
                        <div class="clear"></div>
                        <input type="hidden" name="a1c" id="a1c" value="<?php
                        if (isset($content_data['notes']['a1c']['lab_a1c'][0]['lab_a1c_id']))
                        {
                            echo $content_data['notes']['a1c']['lab_a1c'][0]['lab_a1c_id'];
                            $flag = 0;
                        }
                        else
                            echo -1;
                        ?>"/>
                        <input type="hidden" name="cholesterol" id="cholesterol" value="<?php
                        if (isset($content_data['notes']['cholesterol']['lab_cholesterol'][0]['lab_cholesterol_id']))
                        {
                            echo $content_data['notes']['cholesterol']['lab_cholesterol'][0]['lab_cholesterol_id'];
                            $flag = 0;
                        }
                        else
                            echo -1;
                        ?>"/>
                        <div class="ui-block-b per100"><textarea id="labsnotes" onfocus='edit_notes("radio-choice-3");' name="labsnotes" readonly="readonly"><?php
                                if (isset($content_data['notes']['cholesterol']['lab_cholesterol'][0]['notes']))
                                    echo urldecode($content_data['notes']['cholesterol']['lab_cholesterol'][0]['notes']); else if (isset($content_data['notes']['a1c']['lab_a1c'][0]['notes']))
                                    echo urldecode($content_data['notes']['a1c']['lab_a1c'][0]['notes']);
                                    ?></textarea></div>
                    </div>

                <?php } ?>


            </div>
        </div>
        <div class="mb20 mt20 ui-grid-a" id="errorPopUp" style='margin-left:20px;margin-right: auto'></div>
        <?php
        if ($flag == 1)
        {
            ?>
            <div class="mb20 mt20 ui-grid-a" style='margin-left:20px;margin-right: auto'>No Note To Edit!</div>
            <?php
        }
        else
        {
            ?>
            <div class="mb20 mt20 ui-grid-a">
                <div class="ui-block-a smallFont"> 
                    <input type="submit" id="save" data-theme='b' value="Save"/>
                </div>
                <div class="ui-block-b smallFont"> 
                    <a data-role="button" href="javascript:void(0);" onclick="deletenotes()" id="delete" data-theme='red'>Delete</a>
                </div>
                <div class="clear"></div>
                <div class="ui-block-c smallFont per100">
                    <a href="#" data-rel="back" data-role="button" id="cancel" data-theme='c'>Cancel</a>
                </div>
            </div>
            <?php
        }
        ?>
    
</form>
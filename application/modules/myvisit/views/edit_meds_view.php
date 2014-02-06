<div>
    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
    <form action="<?php echo base_url(); ?>myvisit/update_meds"  method="post">
        <div class="groupDivs per100" >
            <div style="height:250px; overflow-x:hidden; overflow-y:auto; padding-right:15px;">
                <h2 class="mb10"><?php if (isset($edit_meds['drug_display_name'])) echo $edit_meds['drug_display_name']; if (isset($edit_meds['drug_display_name'])) echo ' ( ' . $edit_meds['drug_display_name'] . ' ) '; ?></h2>
                <div class="mb5 per100">
                    <h4>Select Dosage form</h4>
                    <div class="per100 fLeft">
                        <input type="text" placeholder="Tablet" value="<?php if (isset($edit_meds['unit_display_name'])) echo $edit_meds['unit_display_name']; ?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="mb5 per100">
                    <h4>Select Dose strength</h4>
                    <div class="per100 fLeft">
                        <input type="text"  value="<?php if (isset($edit_meds['strength_display_name'])) echo $edit_meds['strength_display_name']; ?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="mb5 fLeft per100">
                    <h3>How much do you take</h3>
                    <div class="per70 fLeft">
                        <input type="number" placeholder="" value="<?php if (isset($edit_meds['dose_amount'])) echo $edit_meds['dose_amount']; ?>" />
                    </div>
                    <span class="fLeft mt15 ml5">Tablet(s)</span>
                    <div class="clear"></div>
                </div>
                <div class="mb5 fLeft per100">
                    <h4>How often do you take it</h4>
                    <div class="per30 fLeft">
                        <select name="select-native-1" id="select-native-1">
                            <?php
                            for ($i = 1; $i < 5; $i++)
                            {
                                ?>
                                <option value="<?php echo $i; ?>" <?php if (isset($edit_meds['frequency_amount'])) if ($edit_meds['frequency_amount'] == $i) echo 'selected';  ?>  ><?php
                                    echo $i;
                                    ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="per25 mt15 fLeft center"> times per </div>
                    <div class="per35 fLeft">
                        <select name="select-native-1" id="select-native-1">
                            <option value="2" <?php if ($edit_meds['frequency_period_id'] == 2) echo 'selected'; ?> >Day</option>
                            <option value="3" <?php if ($edit_meds['frequency_period_id'] == 3) echo 'selected'; ?> >Week</option>
                            <option value="4" <?php if ($edit_meds['frequency_period_id'] == 4) echo 'selected'; ?> >Month</option>
                            <option value="5" <?php if ($edit_meds['frequency_period_id'] == 5) echo 'selected'; ?> >Year</option>
                            <option value="1" <?php if ($edit_meds['frequency_period_id'] == 1) echo 'selected'; ?> >Hour</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="mb5 per100">
                    <h4>what are you taking this medication for?</h4>
                    <div class="per100 fLeft">
                        <textarea cols="40" rows="8" name="textarea-1" placeholder="Add notes" id="textarea-1"><?php if (isset($edit_meds['disease_state'])) echo $edit_meds['disease_state']; ?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="mb5 per100">
                    <h4>Add Notes</h4>
                    <div class="per100 fLeft">
                        <textarea cols="40" rows="8" name="textarea-1" placeholder="Add notes" id="textarea-1"><?php if (isset($edit_meds['notes'])) echo $edit_meds['notes']; ?></textarea>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="m15 ui-grid-a">
            <div class="ui-block-a">
                <button id="save" type="submit" data-theme='b'>Save</button>
            </div>
            <div class="ui-block-b">
                <button id="cancel" data-rel="back" data-theme='c'>Cancel</button>
            </div>
        </div>
    </form>
</div>
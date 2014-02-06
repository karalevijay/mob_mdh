<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
<form action="<?php echo base_url(); ?>myvisit/update_appointment"  method="post">
    <div class="groupDivs border">
        <div class=" m15">
            <h3 class="mb10">Add New Appointment</h3>
            <div class="ui-grid-a mb5">
                <p class="ui-block-a per25 mt15">Date</p>
                <div class="ui-block-b per70 fRight">
                    <input name="mydate" id="mydate" type="date" value="<?php echo date("d M y", strtotime($content_data['appointment']['date'])); ?>" data-role="datebox"  data-options='{"mode": "datebox"}'>
                </div>
            </div>
            <div class="ui-grid-a mb5">
                <p class="ui-block-a per30 mt15">Time</p>
                <div class="ui-block-b per35">
                    <div data-role="fieldcontain">
                        <select name="hour" id="select-native-1" >
                            <?php
                            for ($i = 0; $i < 24; $i++)
                            {
                                ?>
                                <option <?php if (date("H", strtotime($content_data['appointment']['date'])) == $i)
                            {
                                echo 'selected';
                            } ?> value="<?php echo $i; ?>"><?php if ($i < 10)
                                echo '0'; echo $i;
                                ?></option>
    <?php
}
?>
                        </select>
                    </div>
                </div>
                <div class="ui-block-b per35 fRight">
                    <div data-role="fieldcontain">
                        <select name="minute" id="select-native-1">
                                <?php
                                for ($i = 0; $i < 60; $i++)
                                {
                                    ?>
                                <option <?php if (date("i", strtotime($content_data['appointment']['date'])) == $i)
                            {
                                echo 'selected';
                            } ?> value="<?php echo $i; ?>"><?php if ($i < 10)
                                echo '0'; echo $i;
                            ?></option>
    <?php
}
?>
                        </select>
                    </div>
                </div>
            </div>

            <div data-role="fieldcontain">
                <input type="hidden" value="<?php echo $content_data['appointment']['app_id']; ?>" name="app_id"/>
            </div>
            <div class="ui-grid-a mb5">
                <p class="ui-block-a per25 mt15">Provider name</p>
                <div class="ui-block-b per70 fRight">
                    <div data-role="fieldcontain">
                        <select name="prescriber" >
<?php
foreach ($content_data['prescriber']['prescribers'] as $pre)
{
    ?>
                                <option <?php if ($content_data['appointment']['prescriber_name'] == $pre['prescriber_name'])
    {
        echo 'selected';
    } ?> value="<?php echo $pre['prescriber_id']; ?>"><?php echo $pre['prescriber_name']; ?></option>
    <?php
}
?>

                        </select>
                    </div>
                </div>

                <div data-role="fieldcontain" style="text-align: right">
                    <a href="<?php echo base_url(); ?>myvisit/add_provider"   data-icon="arrow-l" data-inline="true">Add Provider</a>
                </div>
            </div>
            <div class="ui-grid-a mb5">
                <p class="ui-block-a per25 mt15">Reason</p>
                <div class="ui-block-b per70 fRight">
                    <div data-role="fieldcontain">
                        <select name="reason" id="addtextbox" >
<?php
foreach ($content_data['reason']['reasons'] as $pre)
{
    ?>
                                <option <?php if ($content_data['appointment']['reason'] == $pre['text'])
    {
        echo 'selected';
    } ?> value="<?php echo $pre['res_id']; ?> "><?php echo $pre['text']; ?></option>
    <?php
}
?>
                            <option value="other">Other</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="ui-grid-a mb5">
                <p class="ui-block-a per25 mt15">Reminder</p>
                <div class="ui-block-b per70 fRight">
                    <select name="reminder" id="flip-1" data-role="slider">
                        <option value="0" <?php if ($content_data['appointment']['reminder'] == null)
{
    echo 'selected';
} ?> >Off</option>
                        <option value="1" <?php if ($content_data['appointment']['reminder'] != null)
{
    echo 'selected';
} ?> >On</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="mb20 mt20 ui-grid-a">
        <div class="ui-block-c smallFont3"> 
            <input type="submit" id="save" data-theme='b' value="Save" />
        </div>
        <div class="ui-block-c smallFont3"> 
            <button id="cancel" data-theme='c'>Cancel</button>
        </div>
        <div class="ui-block-c"> 
            <a href="<?php echo base_url(); ?>myvisit/delete/<?php echo $content_data['appointment']['app_id']; ?>" id="opendialog"  class="delete smallFont3" data-theme='red' data-role="button">Delete</a>
        </div>
    </div>
</form>



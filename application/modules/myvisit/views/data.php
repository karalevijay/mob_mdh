<?php
if (isset($content_data['appointment']))
    if ($content_data['appointment']['appointments'] != null)
    {
        foreach ($content_data['appointment']['appointments'] as $data)
        {


            $date1 = date("d-m-Y", strtotime($data['date']));
            $date2 = date('d-m-Y', strtotime('-7 day', time()));

            if (strtotime($date1) >= strtotime($date2))
            {
                ?>

                <div id="edit<?php echo $data['app_id'] ?>" data-transition="turn" data-position-to="window" data-role="popup" style="width:100%;">

                    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <form action="<?php echo base_url(); ?>myvisit/update_appointment"  method="post" data-ajax='false'>
                        <div class="groupDivs border">
                            <div class=" m15">
                                <h3 class="mb10">Edit Appointment</h3>
                                <div class="ui-grid-a mb10">
                                    <p class="ui-block-a per25 mt15">Date</p>
                                    <div class="ui-block-b per70 fRight">
                                        <input name="mydate" id="mydate" type="date" value="<?php echo date("m/d/Y", strtotime($data['date'])); ?>" data-role="datebox"  data-options='{"mode": "datebox"}'>
                                    </div>
                                </div>
                                <div class="ui-grid-a mb10">
                                    <p class="ui-block-a per30 mt15">Time</p>
                                    <div class="ui-block-b per35">
                                        <div data-role="fieldcontain">
                                            <select name="hour" id="select-native-1" >
                                                <?php
                                                for ($i = 0; $i < 12; $i++)
                                                {
                                                    ?>
                                                    <option <?php
                                                    if ((date("H", strtotime($data['date'])) >= 12))
                                                    {
                                                        if((date("H", strtotime($data['date']))-12) == $i)
                                                        echo 'selected';
                                                    }
                                                    else if (date("H", strtotime($data['date'])) == $i)
                                                    {
                                                        echo 'selected';
                                                    }
                                                    ?> value="<?php if($i==0) echo '12'; else echo $i; ?>"><?php if($i==0) echo '12'; else echo $i; ?></option>
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
                                                for ($i = 0; $i < 60; $i = $i + 5)
                                                {
                                                    ?>
                                                    <option <?php
                                                    if (date("i", strtotime($data['date'])) == $i)
                                                    {
                                                        echo 'selected';
                                                    }
                                                    ?> value="<?php echo $i; ?>"><?php
                                                            if ($i < 10)
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
                                    <input type="hidden" value="<?php echo $data['app_id']; ?>" name="app_id"/>
                                </div>
                                <div class="ui-grid-a mb10">
                                    <p class="ui-block-a per25 mt15">Provider name</p>
                                    <div class="ui-block-b per70 fRight">
                                        <div data-role="fieldcontain">
                                            <select name="prescriber" >
                                                <?php
                                                foreach ($content_data['prescriber']['prescribers'] as $pre)
                                                {
                                                    ?>
                                                    <option <?php
                                                    if ($data['prescriber_name'] == $pre['prescriber_name'])
                                                    {
                                                        echo 'selected';
                                                    }
                                                    ?> value="<?php echo $pre['prescriber_id']; ?>"><?php echo $pre['prescriber_name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>

                                            </select>
                                        </div>
                                        <a  href="<?php echo base_url(); ?>myvisit/add_provider" data-icon="arrow-l" data-inline="true" class='mt10 ml10 mb5 fLeft'>Add Provider</a>
                                    </div>

                                    
                                </div>
                                <div class="ui-grid-a mb10">
                                    <p class="ui-block-a per25 mt15">Reason</p>
                                    <div class="ui-block-b per70 fRight">
                                        <div data-role="fieldcontain">
                                            <select name="reason1" id="reason1" >
                                                <?php
                                                foreach ($content_data['reason']['reasons'] as $pre)
                                                {
                                                    ?>
                                                    <option <?php
                                                    if ($data['reason'] == $pre['text'])
                                                    {
                                                        echo 'selected';
                                                    }
                                                    ?>  value="<?php echo $pre['res_id']; ?> "><?php echo $pre['text']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                <option value="other">Other</option>
                                            </select>

                                        </div>
                                        <div class="other1" style="display:none;">
                                            <input type="text" data-theme='b' name="other" placeholder="Other Reason" />
                                        </div>
                                    </div>

                                </div>
                                <div class="ui-grid-a mb10">
                                    <p class="ui-block-a per25 mt15">Reminder</p>
                                    <div class="ui-block-b per70 fRight">

                                        <select name="reminder" id="flip-1" data-role="slider">
                                            <option value="0" <?php
                                            if ($data['reminder'] == null || $data['reminder'] == '0')
                                            {
                                                echo 'selected';
                                            }
                                            ?> >Off</option>
                                            <option value="1" <?php
                                            if ($data['reminder'] != null && $data['reminder'] != '0')
                                            {
                                                echo 'selected';
                                            }
                                            ?> >On</option>
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
                                <a href="#" data-rel="back" data-role="button"   id="cancel" data-theme='c'>Cancel</a>
                            </div>
                            <div class="ui-block-c" style="margin-left:25%;"> 
                                <a data-ajax="false" href="<?php echo base_url(); ?>myvisit/delete/<?php echo $data['app_id']; ?>" id="opendialog" class="delete smallFont3" data-theme='red' data-role="button">Delete</a>
                            </div>
                        </div>
                    </form>

                </div>

                <?php
            }
        }
    }
?>

    $("#add_app_reason").on('change', function() {
            val = $(this).children('option:selected').val();
            if (val == 'other')
            {
                $('.other').show();

            }
            else
            {
                $('.other').hide();
            }
        });
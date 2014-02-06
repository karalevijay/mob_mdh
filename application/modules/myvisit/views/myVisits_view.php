<?php
//var_dump($content_data['appointment']);
?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">myVisits</h2>
        <a href="<?php echo base_url(); ?>dashboard" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <div data-role="navbar">
        <ul>
            <li>
                <a id="addTrigger" href="#popupBasic" style='display:none' data-rel="popup"></a>
                <a data-theme='c' data-ajax="true"  href="javascript:void(0)" onClick='add_app()' >
                    Add Appointment
                </a>
            </li>
            <li>

                <a href="#popupBasic1" data-theme='c' data-rel="popup" >Start Visit</a></li>
        </ul>
    </div>
    <!-- /navbar -->
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
    <div class="per100 dataTable myVisitTable mt20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th class="per35 extra">Date & Time</th>
                    <th class="per30 extra">Provider Name</th>
                    <th class="per20 extra">Reason</th>
                    <th class="per15 extra"></th>
                </tr>
            </thead>
        </table>
        <div class="tableScroller">
            <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
                <tbody>

                    <?php
                    if (isset($content_data['appointment']['appointments']))
                    {
                        foreach ($content_data['appointment']['appointments'] as $data)
                        {
                            if (isset($data['date']))
                            {
                                $date1 = date("d-m-Y", strtotime($data['date']));
                                $date2 = date("d-m-Y", strtotime('-1 day', time()));
                                if (strtotime($date1) >= strtotime($date2))
                                {
                                    ?>

                                    <tr>
                                        <td class="per35 extra center"><?php echo date("M d Y", strtotime($data['date'])) . '</br>' . date("h:i A", strtotime($data['date'])); ?></td>
                                        <td class="per30 extra center"><?php echo $data['prescriber_name']; ?></td>
                                        <td class="per20 extra center"><?php echo $data['reason']; ?></td>
                                        <td class="per15 extra center"><a id="triggerEdit<?php echo $data['app_id'] ?>" href="#editApp" data-rel="popup"></a><a data-theme='c' data-ajax="true"  href="javascript:void(0)" onClick='edit_app("<?php echo $data['app_id'] ?>")' ><img src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div data-role="navbar" class="miniNav mt30 mb20">
        <div class="center mb10" style='font-size: 18px;' ><b>Share my report</b></div>
        <ul>
            <li class="per33"><a data-ajax='false' data-theme="b" href="<?php echo base_url() . 'fax/print_report' ?>">Print</a></li>
            <li class="per33"><a data-ajax='false' data-theme="b" href="<?php echo base_url() ?>fax/mail_report">Email</a></li>
            <li class="per33"><a data-ajax='false' data-theme="b" href="<?php echo base_url(); ?>fax">Fax</a></li>
        </ul>
    </div>
    <!-- /navbar -->
    <div data-role="popup" data-transition="turn" id="popupBasic1" style="width:100%;"> <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
        <form action="<?php echo base_url() ?>myvisit/start_todays_visit"  method="post" data-ajax='false' >
            <div class="groupDivs border">
                <div class=" m15">
                    <h3 class="mb10">Please select the visit you would like to start:</h3>
                    <?php
                    $disable = true;
                    if (isset($content_data['appointment']['appointments']))
                    {
                        $flag = false;
                        $flag2 = false;
                        date_default_timezone_set('America/New_York');
                        ?>
                        <div class="ui-grid-a">
                            <?php
                            foreach ($content_data['appointment']['appointments'] as $data)
                            {
                               
                                $date1 = date("d-m-y", strtotime($data['date']));
                                $date2 = date('d-m-y');
                                $time = date('h:i', time());
                                if (strtotime($date1) == strtotime($date2))
                                {
                                    

                                    $time2 = date("h:i", strtotime($data['date']));
                                    ?>

                                    <div class="ui-block-a per100" style="padding-top: 5px">

                                        <?php
                                        if ($flag2 == false)
                                        {
                                            $disable = false;
                                            ?>

                                            <input type="radio" class="rad" name="app_id" data-mini="true" checked id="radio-choice<?php echo $data['app_id']; ?>" value="<?php echo $data['app_id']; ?>" />
                                            <label for="radio-choice<?php echo $data['app_id']; ?>">With <?php echo $data['prescriber_name']; ?> at <?php echo date("h:i A", strtotime($data['date'])); ?>  on <?php echo date("F d, Y", strtotime($data['date'])); ?></label>                                        
                                            <?php
                                            $flag2 = true;
                                        }
                                        else
                                        {
                                            $disable = false;
                                            ?>
                                            <input type="radio" class="rad" name="app_id" data-mini="true" <?php
                                            if (($time <= $time2) && $flag == false)
                                            {
                                                echo 'checked';
                                                $flag = true;
                                            }
                                            ?> id="radio-choice<?php echo $data['app_id']; ?>" value="<?php echo $data['app_id']; ?>" />
                                            <label for="radio-choice<?php echo $data['app_id']; ?>">With <?php echo $data['prescriber_name']; ?> at <?php echo date("h:i A", strtotime($data['date'])); ?>  on <?php echo date("F d, Y", strtotime($data['date'])); ?></label>                                        
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <span class="ui-block-b ml5 per70">

                                    </span>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                        if ($disable === true)
                        {
                            ?>
                            <div>                                
                                You can only record data for a visit that’s scheduled on today’s date. If you have no scheduled visits for today, you can create a new visit below—it will start automatically. If you want to record data from a past visit, just log in to My Diabetes Home on your desktop computer and update your vitals in the myNumbers section. 
                            </div>
                            <?php
                        }
                        ?>
                        
                </div>

            </div>
            <div class="m15">
                <div class="mb20">
                    <a id="addTriggerStart" href="#popupBasicstart" style='display:none' data-rel="popup"></a>
                    <a data-theme='c' id="save" data-ajax="true" data-role="button"  href="javascript:void(0)" onClick='add_app_start()' >
                        Create New Visit
                    </a>
                </div>

                <button type="submit" id="cancel" data-theme='b' <?php
                if ($disable === true)
                    echo 'disabled'
                    ?> >Start Selected Visit</button>

            </div>
        </form>
    </div>

</div>


<div data-role="popup" data-overlay-theme="a" data-position-to="window" data-transition="turn" id="popupBasic" style="width:100%;">

</div>




<div data-role="popup" data-overlay-theme="a" data-position-to="window" data-transition="turn" id="popupBasicstart" style="width:100%;">

</div>


<div id="editApp" data-transition="turn" data-position-to="window" data-role="popup" style="width:100%;">
</div>



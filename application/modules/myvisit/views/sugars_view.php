<?php //  var_dump($content_data);   ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Today's Visit</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <div class="menuBg" >
        <div data-role="navbar" class="mb10" >
            <ul>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/1'; ?>" >Vitals</a></li>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/2'; ?>" >Meds</a></li>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3'; ?>" class="ui-btn-active" >Sugars</a></li>
            </ul>
        </div>
        <div data-role="navbar" >
            <ul>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" >Labs</a></li>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/5'; ?>" >Questions</a></li>
                <li><a data-ajax="false" href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/6'; ?>" >Goals</a></li>
            </ul>
        </div>
        <p id="error" >
            <?php
            if (isset($content_data['error']))
            {
                echo '<p>' . $content_data['error'] . '</p>';
                unset($content_data['error']);
            } echo '<p>' . $this->session->flashdata('error') . '</p>'
            ?>
        </p>
    </div>
    <div data-role="navbar" class="miniNav mt20 mb20">
        <ul>
            <li class="per40"><a data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3/1'; ?>"  <?php
                if ($content_data['subtab'] == 1)
                    echo 'class="ui-btn-active"';
                ?>>B4 Meal/Bed</a></li>
            <li class="per30"><a data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3/2'; ?>"  <?php
                if ($content_data['subtab'] == 2)
                    echo 'class="ui-btn-active"';
                ?> >AM/Lunch</a></li>
            <li class="per30"><a data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3/3'; ?>"  <?php
                if ($content_data['subtab'] == 3)
                    echo 'class="ui-btn-active"';
                ?> >PM/Other</a></li>
        </ul>
    </div>
    <div class="mb10">
        <?php if ($content_data['subtab'] == 1) echo '<h4>Before meals and bedtime sugars</h4>'; ?>
        <?php if ($content_data['subtab'] == 2) echo '<h4>Breakfast and lunch sugars</h4>'; ?>
        <?php if ($content_data['subtab'] == 3) echo '<h4>Supper, bedtime, and other sugars</h4>'; ?>
    </div><!-- /navbar -->
    <div class="per97 dataTable" id="thisdiv">
        <?php
        if (isset($content_data['data']))
        {
            ?>

            <div class="dataTable per100">
                <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
                    <thead>



                        <?php
                        if ($content_data['subtab'] == 2)
                        {
                            ?>
                            <tr class="ui-bar-d">
                                <th rowspan="2" class="center per20">Date</th>
                                <th colspan="2" class="center per40">Breakfast</th>
                                <th colspan="2"class="center per40">Lunch</th>
                                
                            </tr>
                            <tr class="ui-bar-d">
                                <th class="per20">Before</th>
                                <th class="per20">After</th>
                                <th class="per20">Before</th>
                                <th class="per20">After</th>
                            </tr>
                            <?php
                        }
                        else if ($content_data['subtab'] == 3)
                        {
                            ?>
                            <tr class="ui-bar-d">
                                <th rowspan="2" class="center per20" >Date</th>
                                <th colspan="2" class="center per40">Supper</th>
                                <th rowspan="2" class="center per20">Bed</th>
                                <th rowspan="2" class='per20'>Other</th>
                            </tr>
                            <tr class="ui-bar-d">
                                <th class="per20">Before</th>
                                <th class="per20">After</th>
                            </tr>
                            <?php
                        }
                        else
                        {
                            ?>
                            <tr class="ui-bar-d">
                                <th class="center per20">Date</th>
                                <th class="center per20" >AM</th>
                                <th class="center per20" >Lunch</th>
                                <th class="center per20" >Supper</th>
                                <th class="center per20" >Bed</th>
                            </tr>
                            <?php
                        }
                        ?>
                    </thead>
                </table>
            </div>

            <div class="tableScroller dataTable per100">
                <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
                    <tbody>
                        <?php
                        if ($content_data['subtab'] == 2)
                        {
                            ?>
                            <?php
                            for ($i = 0; $i < count($content_data['data']); $i++)
                            {
                                if ($content_data['data'][$i]['active'] == 1)
                                {
                                    ?>
                                    <tr>
                                        <td class="center per20" width="25px" ><?php echo date("M d", strtotime($content_data['data'][$i]['sugar_date'])) ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_before_breakfast'] != 0) echo $content_data['data'][$i]['result_number_before_breakfast'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_after_breakfast'] != 0) echo $content_data['data'][$i]['result_number_after_breakfast'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_before_lunch'] != 0) echo $content_data['data'][$i]['result_number_before_lunch'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_after_lunch'] != 0) echo $content_data['data'][$i]['result_number_after_lunch'] ?></td>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                        }
                        else if ($content_data['subtab'] == 3)
                        {

                            for ($i = 0; $i < count($content_data['data']); $i++)
                            {
                                if ($content_data['data'][$i]['active'] == 1)
                                {
                                    ?>
                                    <tr>
                                        <td class="center per20" width="25px" ><?php echo date("M d", strtotime($content_data['data'][$i]['sugar_date'])) ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_before_supper'] != 0) echo $content_data['data'][$i]['result_number_before_supper'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_after_supper'] != 0) echo $content_data['data'][$i]['result_number_after_supper'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_bedtime'] != 0) echo $content_data['data'][$i]['result_number_bedtime'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_other'] != 0) echo $content_data['data'][$i]['result_number_other'] ?></td>

                                    </tr>
                                    <?php
                                }
                            }
                        }
                        else
                        {

                            for ($i = 0; $i < count($content_data['data']); $i++)
                            {
                                if ($content_data['data'][$i]['active'] == 1)
                                {
                                    ?>
                                    <tr>
                                        <td class="center per20" width="25px" ><?php echo date("M d", strtotime($content_data['data'][$i]['sugar_date'])) ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_before_breakfast'] != 0) echo $content_data['data'][$i]['result_number_before_breakfast'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_before_lunch'] != 0) echo $content_data['data'][$i]['result_number_before_lunch'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_before_supper'] != 0) echo $content_data['data'][$i]['result_number_before_supper'] ?></td>
                                        <td class="center per20" ><?php if ($content_data['data'][$i]['result_number_bedtime'] != 0) echo $content_data['data'][$i]['result_number_bedtime'] ?></td>    
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>




                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="clear"></div>
    <!-- <div class="noteBg">
         <div class="mb5 fLeft per100">
             <div class="per65 fLeft">
                 <textarea cols="40" rows="8" name="notes" placeholder="Add notes" id="textarea-1"><?php
// if (isset($old_data['notes']))
//            echo $old_data['notes'];
    ?></textarea>
             </div>
             <div class="fLeft mt5 smallFont ml10">
                 <button id="login" type="submit" data-theme='b'>Next</button>
                 <div class="clear"></div>
             </div>
         </div>
         <div class="clear"></div>
     </div>-->
    <div class="noteBg">
        <div class="fLeft per100">
            <!--                    <div class="per65 fLeft">
                                    <textarea cols="40" rows="8" name="textarea-1" placeholder="Add notes" id="textarea-1"></textarea>
                                </div>-->
            <div class="fLeft per100 mt5 smallFont ml00" >
                <a id="submitQuestion" data-role="button" data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" data-theme='b'>Next</a>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
























<div id="mysugar_sugarNow">

</div>

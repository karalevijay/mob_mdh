
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">MySugars</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>dashboard"   data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
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
    <div data-role="navbar" class='mb10'>
        <ul>
            <li><a  data-ajax='false' href="<?php echo base_url(); ?>mysugar" <?php if (isset($content_data[0]) && $content_data[0] == 1) echo 'class="ui-btn-active"'; ?> >Sugar Now</a></li>
            <li><a  data-ajax='false' href="<?php echo base_url(); ?>mysugar/pastdata" <?php if (isset($content_data[0]) && $content_data[0] == 2) echo 'class="ui-btn-active"'; ?> >Past Data</a></li>
            <li><a data-ajax='false' href="<?php echo base_url(); ?>mysugar/graph" <?php if (isset($content_data[0]) && $content_data[0] == 3) echo 'class="ui-btn-active"'; ?> >Graph</a></li>
        </ul>
    </div><!-- /navbar -->

    <div data-role="navbar" class="miniNav mt10 mb10">
        <ul>
            <li class="per40"><a data-ajax='false'  href="<?php echo base_url(); ?>mysugar/pastdata"  <?php if ($content_data[1] == 1) echo 'class="ui-btn-active"'; ?>>B4 Meal/Bed</a></li>
            <li class="per30"><a data-ajax='false'  href="<?php echo base_url(); ?>mysugar/pastdata/2"  <?php if ($content_data[1] == 2) echo 'class="ui-btn-active"'; ?> >AM/Lunch</a></li>
            <li class="per30"><a data-ajax='false'  href="<?php echo base_url(); ?>mysugar/pastdata/3"  <?php if ($content_data[1] == 3) echo 'class="ui-btn-active"'; ?> >PM/Other</a></li>
        </ul>
       
    </div><!-- /navbar -->
    <div class="mb10">
            <?php if ($content_data[1] == 1) echo '<h4>Before meals and bedtime sugars</h4>'; ?>
        <?php if ($content_data[1] == 2) echo '<h4>Breakfast and lunch sugars</h4>'; ?>
            <?php if ($content_data[1] == 3) echo '<h4>Supper, bedtime, and other sugars</h4>'; ?>
        </div>
    <div class="per97 dataTable" id="thisdiv">
        <?php
        if (isset($content_data['data']))
        {
            ?>
        <div class="dataTable per100">
            <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
                <thead>



                    <?php
                    if ($content_data[1] == 2)
                    {
                        ?>
                        <tr class="ui-bar-d">
                            <th rowspan="2" class="center per20">Date</th>
                            <th colspan="2" class="center per30">Breakfast</th>
                            <th colspan="2"class="center per30">Lunch</th>
                            <th rowspan="2" class='per20' ></th>
                        </tr>
                        <tr class="ui-bar-d">
                            <th class="per15">Before</th>
                            <th class="per15">After</th>
                            <th class="per15">Before</th>
                            <th class="per15">After</th>
                        </tr>
                        <?php
                    }
                    else if ($content_data[1] == 3)
                    {
                        ?>
                        <tr class="ui-bar-d">
                            <th rowspan="2" class="center per20" >Date</th>
                            <th colspan="2" class="center per30">Supper</th>
                            <th rowspan="2" class="center per15">Bed</th>
                            <th rowspan="2" class='per15'>Other</th>
                            <th rowspan="2" class='per20'></th>
                        </tr>
                        <tr class="ui-bar-d">
                            <th class="per15">Before</th>
                            <th class="per15">After</th>
                        </tr>
                        <?php
                    }
                    else
                    {
                        ?>
                        <tr class="ui-bar-d">
                            <th class="center per20">Date</th>
                            <th class="center per15" >AM</th>
                            <th class="center per15" >Lunch</th>
                            <th class="center per15" >Supper</th>
                            <th class="center per15" >Bed</th>
                            <th rowspan="2" class='per20'></th>
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
                    if ($content_data[1] == 2)
                    {
                        ?>
                        <?php
                        for ($i = 0; $i < count($content_data['data']); $i++)
                        {
                            if ($content_data['data'][$i]['active'] == 1)
                            {
                                ?>
                                <tr>
                                    <td class="center per20"><?php echo date("M d", strtotime($content_data['data'][$i]['sugar_date'])) ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_before_breakfast']!=0) echo $content_data['data'][$i]['result_number_before_breakfast'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_after_breakfast']!=0) echo $content_data['data'][$i]['result_number_after_breakfast'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_before_lunch']!=0) echo $content_data['data'][$i]['result_number_before_lunch'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_after_lunch']!=0)echo $content_data['data'][$i]['result_number_after_lunch'] ?></td>
                                    <td class="center per20"><a data-ajax='false' href="<?php echo base_url() . 'mysugar/edit/' . $content_data['data'][$i]['sugar_date'] . '/' . $content_data[1] ?>"  ><img style="height:40%; width:40%" src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <?php
                    }
                    else if ($content_data[1] == 3)
                    {

                        for ($i = 0; $i < count($content_data['data']); $i++)
                        {
                            if ($content_data['data'][$i]['active'] == 1)
                            {
                                ?>
                                <tr>
                                    <td class="center per20" ><?php echo date("M d", strtotime($content_data['data'][$i]['sugar_date'])) ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_before_supper']!=0) echo $content_data['data'][$i]['result_number_before_supper'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_after_supper']!=0) echo $content_data['data'][$i]['result_number_after_supper'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_bedtime']!=0) echo $content_data['data'][$i]['result_number_bedtime'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_other']!=0) echo $content_data['data'][$i]['result_number_other'] ?></td>
                                    <td class="center per20" ><a data-ajax='false' href="<?php echo base_url() . 'mysugar/edit/' . $content_data['data'][$i]['sugar_date'] . '/' . $content_data[1] ?>"  ><img style="height:40%; width:40%" src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
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
                                    <td class="center per20"><?php echo date("M d", strtotime($content_data['data'][$i]['sugar_date'])) ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_before_breakfast']!=0) echo $content_data['data'][$i]['result_number_before_breakfast'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_before_lunch']!=0) echo $content_data['data'][$i]['result_number_before_lunch'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_before_supper']!=0) echo $content_data['data'][$i]['result_number_before_supper'] ?></td>
                                    <td class="center per15" ><?php if($content_data['data'][$i]['result_number_bedtime']!=0) echo $content_data['data'][$i]['result_number_bedtime'] ?></td>
                                    <td class="center per20"><a data-ajax='false' href="<?php echo base_url() . 'mysugar/edit/' . $content_data['data'][$i]['sugar_date'] . '/' . $content_data[1] ?>"  ><img style="height:40%; width:40%" src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
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
</div>

<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">MySugars</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a href="<?php echo base_url(); ?>mysugar" <?php if ($content_data[0] == 1) echo 'class="ui-btn-active"'; ?> data-ajax="false">Sugar Now</a></li>
            <li><a href="<?php echo base_url(); ?>mysugar/pastdata" <?php if ($content_data[0] == 2) echo 'class="ui-btn-active"'; ?> data-ajax="false">Past Data</a></li>
            <li><a href="<?php echo base_url(); ?>mysugar/graph" <?php if ($content_data[0] == 3) echo 'class="ui-btn-active"'; ?> data-ajax="false">Graph</a></li>
        </ul>
    </div>
    <div id="error" data-role="fieldcontain" >
        <?php
        if (isset($content_data['error']))
        {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        } echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
    </div><!-- /navbar -->
    <div id="error_rotate" style="height:100px;">
        <h2 style="color:red"> Please Enable Auto-Rotate and rotate your screen in landscape to See the Graph!</h2>
    </div>
    <div id="graph_rotate">
        <div id="graphTop">

            <span id="selectionDiv" >
                Show Me 
                <select name="graphDate" id="graphNavigate" onchange="navigate(this)">
                    <option <?php if ($content_data['range'] == 1) echo "selected='selected'"; ?> value="1">1 day</option>
                    <option <?php if ($content_data['range'] == 7) echo "selected='selected'"; ?> value="7">7 days</option>
                    <option <?php if ($content_data['range'] == 14) echo "selected='selected'"; ?> value="14">14 days</option>
                    <option <?php if ($content_data['range'] == 30) echo "selected='selected'"; ?> value="30">30 days</option>
                    <option <?php if ($content_data['range'] == 60) echo "selected='selected'"; ?> value="60">60 days</option>
                    <option <?php if ($content_data['range'] == 90) echo "selected='selected'"; ?> value="90">90 days</option>
                </select>
                Of Sugar Trends
            </span>
        </div>
        <div id="trends" style="height:300px;">
        </div>

        <div  class="per100 dataTable">
            <h3 style="text-align: left">Average:</h3>
            <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
                <thead>
                    <tr class="ui-bar-d">
                        <th colspan="2" class="center">Breakfast</th>
                        <th colspan="2" class="center">Lunch</th>
                        <th colspan="2" class="center">Supper</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class="ui-bar-d" >
                        <th class="center">B4</th>
                        <th class="center">AFTER</th>
                        <th class="center">B4</th>
                        <th class="center">AFTER</th>
                        <th class="center">B4</th>
                        <th class="center">AFTER</th>
                        <th class="center">BEDTIME</th>
                        <th class="center">NIGHT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="center"><?php echo $data['avgSugars']['avg_bb']; ?></td>
                        <td class="center" ><?php echo $data['avgSugars']['avg_ab']; ?></td>
                        <td class="center"><?php echo $data['avgSugars']['avg_bl']; ?></td>
                        <td class="center" ><?php echo $data['avgSugars']['avg_al']; ?></td>
                        <td class="center"><?php echo $data['avgSugars']['avg_bs']; ?></td>
                        <td class="center" ><?php echo $data['avgSugars']['avg_as']; ?></td>
                        <td class="center"><?php echo $data['avgSugars']['avg_bt']; ?></td>
                        <td class="center" ><?php echo $data['avgSugars']['avg_nt']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ui-grid-a">
            <div id="pie"  class="ui-block-a per40">
            </div>
            <div id="moreVisualinfo" class="ui-block-b per60">
                <ul class="highestSugar sugar-list">
                    <li class="item marRight">
                        <div class="content">Highest Blood Sugar</div>
                        <div class="<?php if ($data['highFlag']) echo "yellow";
        else echo "Green"; ?> value"><?php echo $data['highestSugar']; ?></div>
                    </li>
                    <li class="item marRight">
                        <div class="content">Lowest Blood Sugar</div>
                        <div class=" <?php if ($data['lowFlag']) echo "red";
        else echo "Green"; ?> value"><?php echo $data['lowestSugar']; ?></div>
                    </li>
                    <li class="item">
                        <div class="content">Blood Sugar Average</div>
                        <div class="value Green"><?php echo $data['sugarAvg']; ?></div>
                    </li>
                    <div class="clear"></div>
                    <li class="item marRight">
                        <div class="content">Estimated A1C</div>
                        <div class="value blue"><?php echo $data['estA1c']; ?></div>
                    </li>
                    <li class="item marRight">
                        <div class="content">Average # of tests per day</div>
                        <div class="value blue"><?php echo $data['noOftestsPerDay']; ?></div>
                    </li>
                    <li class="item">
                        <div class="content">Average # of tests per week</div>
                        <div class="value blue"><?php echo $data['noOfTestsPerWeek']; ?></div>
                    </li>
                </ul>
            </div>
        </div>

        <div id="patternData" class="value-index">
            <h2>Pattern Summary</h2>
            <span>Number of low blood sugars in selected time period: <?php echo $data['lowSugars']; ?></span><br>
            <span>Number of high blood sugars in selected time period: <?php echo $data['highSugars']; ?></span><br>
            <span>The majority of your low blood sugars are occurring: <?php echo $data['mostLows']; ?></span><br>
            <span>The majority of your high blood sugars are occurring: <?php echo $data['mostHighs']; ?></span>
        </div>
    </div>
</div>





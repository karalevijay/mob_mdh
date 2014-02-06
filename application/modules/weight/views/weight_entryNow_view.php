<?php $old_data=$this->session->flashdata('old_data'); ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Weight</h2>
        <a data-ajax="false" href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a data-ajax="false" href="<?php echo base_url() ?>weight" class="ui-btn-active">Entry Now</a></li>
            <li><a data-ajax="false" href="<?php echo base_url() ?>weight/pastdata">Past Data</a></li>
            <li><a data-ajax='false' href="<?php echo base_url() ?>weight/graph">Graph</a></li>
        </ul>
    </div><!-- /navbar -->
    <p id="error" >
        <?php
        if (isset($content_data['error']))
        {
            echo $content_data['error'];
            unset($content_data['error']);
        } echo $this->session->flashdata('error')
        ?>
    </p>
    <div class="per100 dataTable mb20 mt20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <td colspan="2" style="align:center" >Result</td>
                </tr>
            </thead>
            <tbody>
                <tr style="background:#c4f4a6;">
                    <td><b>Goal (lbs)</b></td>
                    <td><?php if (isset($content_data['goal'])) echo $content_data['goal']; ?></td>
                </tr>
                <tr>
                    <td><?php if (isset($content_data['lab_weight']['weight_date'])) echo date('M d', strtotime($content_data['lab_weight']['weight_date'])); ?></td>
                    <td><?php if (isset($content_data['lab_weight'])) echo $content_data['lab_weight']['weigh']; ?></td>

                </tr>
            </tbody>
        </table>
    </div>
    <form action="<?php echo base_url() ?>weight/submit_weight" method="post" data-ajax="false" id="wtfrm" >   
        <div class="groupDivs">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Enter Goal</p>
                <div class="ui-block-b per55 posRel"><input type="number" maxlength='5' id="goal" name="goal" placeholder="" value="<?php if(isset($old_data['goal'])) echo sprintf ("%.1f",$old_data['goal']); else if (isset($content_data['goal'])) echo sprintf ("%.1f",$content_data['goal']); ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">lbs</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Enter Weight</p>
                <div class="ui-block-b per55 posRel"><input required="required" maxlength='5' type="number" id="weight" name="weight" placeholder="" value="<?php if(isset($old_data['weight'])) echo sprintf ("%.1f",$old_data['weight']); ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">lbs</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Select Date</p>
                <div class="ui-block-b per65"><input required="required" name="mydate" id="mydate" value="<?php if(isset($old_data['mydate'])) echo $old_data['mydate']; else echo date('m/d/Y', time()) ?>" type="date" data-role="datebox"  data-options='{"mode": "datebox"}'>                  
                                            <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                </div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt20">Notes</p>
                <div class="ui-block-b per65"><input type="text" name="notes" placeholder="" value="<?php if(isset($old_data['notes'])) echo $old_data['notes']; ?>" /></div>
            </div>
        </div>
        <div class="mb10 ui-grid-a">
            <div class="ui-block-a smallFont"> 
                <input type="submit" id="save" data-theme='b' value="Save" />
            </div>
            <div class="ui-block-b smallFont"> 
                <a data-ajax="false" data-role="button" id="cancel" href="<?php echo base_url() ?>mynumbers"  data-theme='c'>Cancel</a>
            </div>
        </div>
    </form>
</div>


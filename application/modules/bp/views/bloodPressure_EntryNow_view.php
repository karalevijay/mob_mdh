<?php $old_data=$this->session->flashdata('old_data'); ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Blood Pressure</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>bp" class="ui-btn-active">Entry Now</a></li>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>bp/pastdata">Past Data</a></li>
            <li><a data-ajax='false' href="<?php echo base_url() ?>bp/graph">Graph</a></li>
        </ul>
    </div>
    <p id="error" >
        <?php
        if (isset($content_data['error']))
        {
            echo $content_data['error'];
            unset($content_data['error']);
        } echo $this->session->flashdata('error')
        ?>
    </p><!-- /navbar -->
        <div class="per90 dataTable mb20 mt20 margAuto">
            <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
                <thead>
                    <tr class="ui-bar-d">
                        <th></th>
                        <th>Systolic</th>
                        <th>Diastolic</th>
                    </tr>
                </thead>
                <tbody>

                    <tr style="background:#c4f4a6;">
                        <td>Goal</td>
                        <td>< 140</td>
                        <td>< 80</td>
                    </tr>
                    <tr>
                        <td><?php if (isset($content_data['lab_bp']['bp_date'])) echo date('M d', strtotime($content_data['lab_bp']['bp_date'])) ?></td>
                        <td><?php if (isset($content_data['lab_bp']['systolic'])) echo $content_data['lab_bp']['systolic'] ?></td>
                        <td><?php if (isset($content_data['lab_bp']['diastolic'])) echo $content_data['lab_bp']['diastolic'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="<?php echo base_url() ?>bp/submit_bp" method="post" data-ajax='false' id='bpfrm'  >
            <div class="groupDivs">
                <div class="mb10 ui-grid-b">
                    <p class="ui-block-a mt15">Entry</p>
                    <div class="ui-block-b"><input required='reqiured' maxlength='5' type="number" id="systolic" name="systolic" placeholder="Systolic" value="<?php if(isset($old_data['systolic'])) echo $old_data['systolic']; ?>" data-mini="true"/></div>
                    <div class="ui-block-c"><input required='reqiured' maxlength='5' type="number" id="diastolic" name="diastolic" placeholder="Diastolic" value="<?php if(isset($old_data['diastolic'])) echo $old_data['diastolic']; ?>" data-mini="true"/></div>
                </div>
                <div class="mb10 ui-grid-b">
                    <p class="ui-block-a mt15">Select Date</p>
                    <div class="ui-block-b per66"><input required='reqiured' name="mydate" id="mydate" value="<?php if(isset($old_data['mydate'])) echo $old_data['mydate']; else echo date('m/d/Y', time()) ?>" type="date" data-role="datebox"  data-options='{"mode": "datebox"}'>                  
                                                <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                    </div>
                </div>
                <div class="mb10 ui-grid-b">
                    <p class="ui-block-a mt20">Notes</p>
                    <div class="ui-block-b per66"><input type="text" name='notes' placeholder="" value="<?php if(isset($old_data['notes'])) echo $old_data['notes']; ?>" /></div>
                </div>

            </div>
            <div class="mb10 ui-grid-a">
                <div class="ui-block-a smallFont"> 
                    <input type="submit" id="save" data-theme='b' value="Save" />
                </div>
                <div class="ui-block-b smallFont"> 
                    <a data-ajax='false' data-role="button" id="cancel" href="<?php echo base_url() ?>mynumbers"  data-theme='c'>Cancel</a>
                </div>
            </div>
        </form>
</div>


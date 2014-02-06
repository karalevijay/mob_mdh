<?php //  var_dump($content_data) ?>
<?php $old_data=$this->session->flashdata('old_data'); ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">A1C</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>aonec" class="ui-btn-active">Entry Now</a></li>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>aonec/pastdata">Past Data</a></li>
            <li><a data-ajax='false'  href="<?php echo base_url() ?>aonec/graph">Graph</a></li>
        </ul>
    </div><!-- /navbar -->
    <p id="error" >
        <?php if (isset($content_data['error']))
        {
            echo $content_data['error'].'<br/>';
            unset($content_data['error']);
        } echo $this->session->flashdata('error') ?>
    </p>
    <div class="per80 dataTable mb20 mt20 ml20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th colspan="2">Latest Result</th>
                </tr>
            </thead>
            <tbody>

                    <tr style="background:#c4f4a6;">
                        <td>Goal (%)</td>
                        <td>7</td>
                    </tr>

<?php
if (isset($content_data['lab_a1c']['result']))
{
    ?>
                <tr>
                    <td><?php echo date('M d, Y',strtotime($content_data['lab_a1c']['a1c_date'])) ?></td>
                    <td><?php echo $content_data['lab_a1c']['result'] ?></td>
                </tr>
    <?php
}
?>            
                
            </tbody>
        </table>
    </div>
    <form action="<?php echo base_url() ?>aonec/submit_aonec" method="post" data-ajax="false" name='a1cfrm' id='a1cfrm'>   
        <div class="groupDivs">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">A1C Result</p>
                <div class="ui-block-b per65 posRel"><input required='reqiured' maxlength='5' type="text" id='result' name="result" placeholder="Result" value="<?php if(isset($old_data['result'])) echo $old_data['result']; ?>" data-mini="true"/><span class="percentage">%</span></div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">Select Date</p>
                <div class="ui-block-b per65"><input required='reqiured'  name="mydate" id="mydate" name="mydate" type="date" value="<?php if(isset($old_data['mydate'])) echo $old_data['mydate']; else echo date('m/d/Y', time()) ?>" data-role="datebox"  data-options='{"mode": "datebox"}'>                  
                                            <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                </div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt20">Notes</p>
                <div class="ui-block-b per65"><input type="text" maxlength="250" name="notes" placeholder="Enter notes here" value="<?php if(isset($old_data['notes'])) echo $old_data['notes']; ?>" /></div>
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

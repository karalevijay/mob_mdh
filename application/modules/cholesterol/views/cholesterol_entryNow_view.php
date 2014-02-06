<?php $old_data=$this->session->flashdata('old_data'); ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Cholesterol</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar" class="mb10">
        <ul>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>cholesterol" class="ui-btn-active">Entry Now</a></li>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>cholesterol/pastdata">Past Data</a></li>
            <li><a data-ajax='false' href="<?php echo base_url() ?>cholesterol/graph">Graph</a></li>
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
    <div class="per100 dataTable mb20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th></th>
                    <th>Total</th>
                    <th>HDL</th>
                    <th>LDL</th>
                    <th>TG</th>
                </tr>
            </thead>
            <tbody>

                <tr style="background:#c4f4a6;">
                    <td>Goal<br> (mg/dL)</td>
                    <td>< 200</td>
                    <td>> 40 (M)</br> > 50 (W)</td>
                    <td>< 100</td>
                    <td>< 150</td>
                </tr>
                <tr>
                    <?php
                    if (isset($content_data['lab_cholesterol']))
                    {
                        ?>
                        <td><?php echo date('M d', strtotime($content_data['lab_cholesterol']['cholesterol_date'])) ?></td>
                        <td><?php echo $content_data['lab_cholesterol']['total']; ?></td>
                        <td><?php echo $content_data['lab_cholesterol']['hdl']; ?></td>
                        <td><?php echo $content_data['lab_cholesterol']['ldl']; ?></td>
                        <td><?php echo $content_data['lab_cholesterol']['tri']; ?></td>
    <?php
}
?>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="<?php echo base_url() ?>cholesterol/submit_cholesterol" method="post" data-ajax='false' id="cholfrm" >   
        <div class="groupDivs">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Total</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' maxlength='5' type="number" id="total" name='total' placeholder="" value="<?php if(isset($old_data['total'])) echo $old_data['total']; ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">HDL (Good)</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' maxlength='5' type="number" id='hdl' name='hdl' placeholder="" value="<?php if(isset($old_data['hdl'])) echo $old_data['hdl']; ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">LDL (Bad)</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' maxlength='5' type="number" id='ldl' name='ldl' placeholder="" value="<?php if(isset($old_data['ldl'])) echo $old_data['ldl']; ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">TG</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' maxlength='5' type="number" id='tri' name='tri' placeholder="" value="<?php if(isset($old_data['tri'])) echo $old_data['tri']; ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Select Date</p>
                <div class="ui-block-b per65"><input required='reqiured' name="mydate" id="mydate" value="<?php if(isset($old_data['mydate'])) echo $old_data['mydate']; else echo date('m/d/Y', time()) ?>" name='mydate' type="date" data-role="datebox"  data-options='{"mode": "datebox"}'>                  
                                            <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                </div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt20">Notes</p>
                <div class="ui-block-b per65"><input maxlength="250" type="text" name='notes' placeholder="" value="<?php if(isset($old_data['notes'])) echo $old_data['notes']; ?>" /></div>
            </div>

        </div>
        <div class="mb10 ui-grid-a">
            <div class="ui-block-a smallFont"> 
                <input type='submit' value='Save' id="save" data-theme='b'/>
            </div>
            <div class="ui-block-b smallFont"> 
                <a data-ajax='false' href='<?php echo base_url() ?>mynumbers' id="cancel" data-theme='c' data-role='button'  >Cancel</a>
            </div>
        </div>
    </form>
</div>


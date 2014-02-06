<div id="dashboard">
    <div class="mb20">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">My Numbers</h2>
            <a data-ajax='false' href="<?php echo base_url() ?>" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b smallFont m0 per35 fRight">Back</a>

        </div> 
        <p id="error">
            <?php
            if (isset($content_data['error']))
            {
                echo $content_data['error'] . '<br/>';
                unset($content_data['error']);
            } echo $this->session->flashdata('error')
            ?>
        </p>
        <ul data-role="listview" id='myNumbersList' class="ui-nodisc-icon ui-alt-icon">
            <li data-iconpos="right">
                <a  data-ajax='false' href="<?php echo base_url()?>aonec">
                    A1C<br/>
                    <span class="subdata"><?php if (isset($content_data['a1c']['lab_a1c']))
                echo "(" . $content_data['a1c']['lab_a1c']['result'] . " % on " . strtoupper(date('M d Y', strtotime($content_data['a1c']['lab_a1c']['a1c_date']))) . ")" ?></span>                    
                </a>
            </li>
            <li>
                <a  data-ajax='false' href="<?php echo base_url()?>bp">
                    Blood Pressure<br/>
                    <span class="subdata"><?php if (isset($content_data['bp']['lab_bp']))
                echo "(" . $content_data['bp']['lab_bp']['systolic'] . "/" . $content_data['bp']['lab_bp']['diastolic'] . " on " . strtoupper(date('M d Y', strtotime($content_data['bp']['lab_bp']['bp_date']))) . ")" ?></span>                    
                </a>
            </li>
            <li>
                <a  data-ajax='false'  href="<?php echo base_url()?>cholesterol">
                    Cholesterol<br/>
                    <span class="subdata"><?php if (isset($content_data['cholesterol']['lab_cholesterol']))
                echo "(LDL: " . $content_data['cholesterol']['lab_cholesterol']['ldl'] . " mg/dL on " . strtoupper(date('M d Y', strtotime($content_data['cholesterol']['lab_cholesterol']['cholesterol_date']))) . ")" ?></span>
                </a>
            </li>
            <li>
                <a  data-ajax='false'  href="<?php echo base_url()?>weight">
                    Weight<br/>
                    <span class="subdata"><?php if (isset($content_data['weight']['lab_weight']))
                echo "(" . $content_data['weight']['lab_weight']['weigh'] . " lbs on " . strtoupper(date('M d Y', strtotime($content_data['weight']['lab_weight']['weight_date']))) . ")" ?>
                    </span>                    
                </a>
            </li>

        </ul>

    </div> 

</div>

<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">A1C</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>aonec" >Entry Now</a></li>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>aonec/pastdata" class="ui-btn-active">Past Data</a></li>
            <li><a data-ajax='false' href="<?php echo base_url() ?>aonec/graph">Graph</a></li>
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
    <div class="dataTable per80 ml20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th colspan="3">Result</th>
                </tr>
            </thead>
            <tbody>
                <tr   style="background:#c4f4a6;">
                    <th class='per40' >Goal (%)</th>
                    <td class='per40' >7</td>
                    <td class='per20' ></td>
                </tr>
            </tbody>
        </table>   
    </div>
    <div class="tableScroller dataTable per80 ml20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <tbody>
                <?php
                if (isset($content_data['old_data']['lab_a1c']))
                {
                    foreach ($content_data['old_data']['lab_a1c'] as $data)
                    {
                        ?>
                        <tr>
                            <td class='per40' ><?php echo date('M d, Y', strtotime($data['a1c_date'])) ?></td>
                            <td class='per40' ><?php echo $data['result'] ?></td>
                            <td class='per20' ><a data-ajax='false' href="<?php echo base_url()."aonec/edit/".$data['a1c_id'] ?>" ><img style="height:40%; width:40%" src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
                        </tr>

                        <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>  
</div>

<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Weight</h2>
        <a data-ajax="false" href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a data-ajax="false" href="<?php echo base_url() ?>weight" >Entry Now</a></li>
            <li><a data-ajax="false" href="<?php echo base_url() ?>weight/pastdata" class="ui-btn-active">Past Data</a></li>
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
    <div class="dataTable per80 ml20" style="margin-top: 15px">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th colspan="3">Result</th>
                </tr>
            </thead>
            <tbody>
                <tr   style="background:#c4f4a6;">
                    <th class="per40" >Goal (lbs)</th>
                    <td class="per40" ><?php
                        if (isset($content_data['old_data']['lab_bp'][0]['goal']))
                            echo $content_data['old_data']['lab_bp'][0]['goal'];
                        else
                            echo 'Not Yet Set'
                            ?></td>
                    <td class="per20" ></td>
                </tr>
            </tbody>
        </table>   
    </div>
    <div class="tableScroller dataTable per80 ml20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <tbody>
                <?php
                if (isset($content_data['old_data']['lab_bp']))
                {
                    foreach ($content_data['old_data']['lab_bp'] as $data)
                    {
                        ?>
                        <tr>
                            <td class="per40" ><?php echo date('M d, Y', strtotime($data['weight_date'])) ?></td>
                            <td class="per40" ><?php echo $data['weigh'] ?></td>
                            <td class="per20" ><a data-ajax="false" href="<?php echo base_url() . "weight/edit/" . $data['weight_id'] ?>" ><img style="height:40%; width:40%" src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>  



</div>


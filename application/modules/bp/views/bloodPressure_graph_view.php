
    <div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Blood Pressure</h2>
            <a data-ajax='false' href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
        </div> 
        <div data-role="navbar">
            <ul>
              <li><a  data-ajax='false'  href="<?php echo base_url() ?>bp" >Entry Now</a></li>
                <li><a  data-ajax='false'  href="<?php echo base_url() ?>bp/pastdata">Past Data</a></li>
                <li><a data-ajax='false' href="<?php echo base_url() ?>bp/graph" class="ui-btn-active">Graph</a></li>
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
        <div id="visualization" style="margin-top: 10px; width: 100%; height: 200px; border:1px solid black"></div> 
           
    <div class="dataTable per90 ml20" style="margin-top: 15px">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th class='per40'></th>
                    <th class='per30'>Systolic</th>
                    <th class='per30' >Diastolic</th>
                    
                </tr>
            </thead>
            <tbody>

                <tr style="background:#c4f4a6;">
                    <td class='per40'>Goal</td>
                    <td class='per30' >< 140 </td>
                    <td class='per30' >< 80 </td>
                  
                </tr>
            </tbody>
        </table>   
    </div>
    <div class="tableScroller dataTable per90 ml20">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <tbody>
                <?php
                if (isset($content_data['old_data']['lab_bp']))
                {
                    foreach ($content_data['old_data']['lab_bp'] as $data)
                    {
                        ?>
                        <tr>
                            <td class='per40' ><?php echo date('M d, Y', strtotime($data['bp_date'])) ?></td>
                            <td class='per30' ><?php echo $data['systolic'] ?></td>
                            <td class='per30' ><?php echo $data['diastolic'] ?></td>
                           
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>   
            
            
    </div>


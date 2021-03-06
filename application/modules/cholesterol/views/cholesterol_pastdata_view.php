
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Cholesterol</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>mynumbers" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <div data-role="navbar" class='mb10'>
        <ul>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>cholesterol" >Entry Now</a></li>
            <li><a  data-ajax='false'  href="<?php echo base_url() ?>cholesterol/pastdata" class="ui-btn-active">Past Data</a></li>
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
    <div class=" per100 dataTable">
        <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
            <thead>
                <tr class="ui-bar-d">
                    <th class="per15" ></th>
                    <th class="per15" >Total</th>
                    <th class="per20" >HDL</th>
                    <th class="per15" >LDL</th>
                    <th class="per15" >TG</th>
                    <th class="per20" ></th>
                </tr>

            </thead>

            <tbody>  
                <tr style="background:#c4f4a6;">
                    <td class="per15" >Goal<br> (mg/dL)</td>
                    <td class="per15" > &lt; 200</td>
                    <td class="per20" >&gt; 40 (M)<br/> &gt; 50 (W)</td>
                    <td class="per15" >&lt; 100</td>
                    <td class="per15" >&lt; 150</td>
                    <td class="per20" ></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="per100 tableScroller dataTable">
        <table data-role="table"  id="table-custom-2" data-mode="columntoggle" class=" ui-body-d ui-shadow table-stripe ui-responsive">

            <tbody>        
                <?php
                if(isset($content_data['old_data']['lab_cholesterol']))
                foreach ($content_data['old_data']['lab_cholesterol'] as $data)
                {
                    ?>
                    <tr>
                        <td class="per15" ><?php echo date('M d', strtotime($data['cholesterol_date'])) ?></td>
                        <td class="per15" ><?php echo $data['total'] ?></td>
                        <td class="per20" ><?php echo $data['hdl'] ?></td>
                        <td class="per15" ><?php echo $data['ldl'] ?></td>
                        <td class="per15" ><?php echo $data['tri'] ?></td>
                        <td class="per20" ><a data-ajax='false' href="<?php echo base_url() . "cholesterol/edit/" . $data['cholesterol_id'] ?>" ><img style="height:40%; width:40%" src="<?php echo img_url() . 'edit-ico.png' ?>"/></a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</div>

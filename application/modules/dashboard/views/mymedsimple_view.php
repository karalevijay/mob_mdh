<div id="dashboard">
    <div class="mb20">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">myMedSimple</h2>
            <a  data-ajax='false'  href="<?php echo base_url() ?>myMedsimple_view" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b smallFont m0 per35 fRight">Back</a>

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
        <div id='ios_and_app'>

        </div>

    </div> 

</div>
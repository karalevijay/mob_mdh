<div id="dashboard">
    <div class="mb20">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">My Profile</h2>
            <a data-ajax='false' href="<?php echo base_url() ?>myProfile" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b smallFont m0 per35 fRight">Back</a>

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
        <div>This feature is not available in the beta version of the mobile site—but it’s coming soon! Be sure to check back frequently for updates. </div>

    </div> 

</div>
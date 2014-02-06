<div id="dashboard">
    <div class="mb20">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Appointment Alerts</h2>
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
        <div>Alerts are not available in the beta version of My Diabetes Home. Once they are available, you will be able to see dose and refill reminders for MedSimple and appointment reminders for myVisits. Check back soon!</div>

    </div> 

</div>
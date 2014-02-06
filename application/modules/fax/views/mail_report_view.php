<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Send Your Appointment Report</h2>
        <a data-ajax='false'  href="<?php echo base_url(); ?>myvisit" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div> 
    <p id="error"  >
        <?php
        if (isset($content_data['error']))
        {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        } echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
    </p><!-- /navbar -->
    <form method="post" name="mailerfrm" id="mailerfrm" data-ajax='false' action='<?php echo base_url() ?>fax/mailpdf_report' >
        <div class="mb10 ui-grid-b">
            <div class="ui-block-b per100">
                <label for="email">Send Report To:*</label>
                <input required='required' maxlength="50" type="email" name="email" placeholder="Provider's Email" value="" data-mini="true" />
            </div>
        </div>
        <div class="mb10 ui-grid-b">
            <div id='date' class="ui-block-b per100">
                <label for="date">Appointment Date:*</label>
                <input required='required' type="date" name="date" value="<?php echo date('d M y', time()); ?>" data-role="datebox"  data-options='{"mode": "datebox"}' />
            </div>
        </div>
        <div class="mb10 ui-grid-b">
            <div style="height:auto" class="ui-block-c per100">
                <label for="messege">Add Comment:</label>
                <textarea name="message" maxlength="250" id="message" rows="10" placeholder="" value="" data-mini="true"></textarea>
            </div>
        </div>
        <div class="mb10 ui-grid-a">
        <div class="ui-block-a smallFont"> 
            <input type="button" id="save" onclick="mail()" class="submit" data-theme='b' value='Email Report' />
        </div>
        <div class="ui-block-b"> 
            <a data-ajax='false' href="<?php echo base_url() ?>myvisit"  class="smallFont" data-theme='c' data-role="button">Cancel</a>
        </div>
        </div>
    </form>
</div>



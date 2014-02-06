<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Email</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div> 
    <p id="error"  >
        <?php
        if (isset($content_data['error'])) {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        } echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
    </p><!-- /navbar -->
    <form method="post" action="<?php echo base_url(); ?>myvisit/generatepdf" >
        <div class="mb10 ui-grid-b"><div class="ui-block-b"><label for="email">Email:</label><input type="text" name="email" placeholder="Email" value="" data-mini="true" /></div></div>
        <div class="mb10 ui-grid-b"><div style="height:auto" class="ui-block-c"><label for="report">Add More Comment:</label><textarea name="report" rows="10" placeholder="" value="" data-mini="true"></textarea></div></div>
        <div class="ui-block-a smallFont"> 
            <button type="submit" id="save" class="submit" data-theme='b'>Send</button>
        </div>
        <div class="ui-block-b"> 
            <a href="javascript:void(0);" onclick="goBack()" class="smallFont" data-theme='c' data-role="button">Cancel</a>
        </div>
    </form>
</div>



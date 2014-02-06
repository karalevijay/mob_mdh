
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Fax</h2>
        <a data-ajax='false'  href="<?php echo base_url() ?>myvisit" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
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
    <form  method="post" >
        <div class="mb10 ui-grid-a per100">
            <div class="per100"><h3 for="number">Fax Number:</h3><input maxlength="12" type="number" name="number" placeholder="" value="" data-mini="true" /></div>
        </div>
        <div class="mb10 ui-grid-a">
        <div class="ui-block-a smallFont"> 
            <input type="button" id="save" onclick="fax()" class="submit" data-theme='b' value='Send' />
        </div>
        <div class="ui-block-b"> 
            <a data-ajax='false' href="<?php echo base_url() ?>myvisit"  class="smallFont" data-theme='c' data-role="button">Cancel</a>
        </div>
        </div>
    </form>
</div>

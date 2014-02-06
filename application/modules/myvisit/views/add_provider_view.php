

<div id="mysugar_sugarNow">
    <div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Add Provider</h2>
            <a data-ajax='false' href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
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
        <form data-ajax='false' method="post" id="profrm" action="<?php echo base_url(); ?>myvisit/submit_provider" >

            <div class="mb5 fLeft per100">
                <h3>Provider Name:</h3>
                <div class='per95 fLeft'>
                    <input  type="text" maxlength='20' name="prescriberName" id='prescriberName' placeholder="" value="" data-mini="true" />
                </div>
            </div>
            <div class="mb5 fLeft per100">
                <h3>Phone:</h3>
                <div class='per95 fLeft'>
                    <input type="number" minlenght='6' maxlength='12' name="prescriberPhone" placeholder="" value="" data-mini="true" />
                </div>
            </div>
            <div class="mb5 fLeft per100">
                <h3>Notes:</h3>
                <div class='per95 fLeft'>
                    <textarea name="notes" rows="10" maxlenth='250' placeholder="" value="" data-mini="true"></textarea>
                </div>
            </div>
            <div class='ui-grid-a mb5 fLeft per95'>
            <div class="ui-block-a smallFont"> 
                <button type="submit" id="save" class="submit" data-theme='b'>Save</button>
            </div>
            <div class="ui-block-b smallFont"> 
                <a data-ajax='false' href="<?php echo base_url(); ?>myvisit"  class="smallFont" data-theme='c' data-role="button">Cancel</a>
            </div>
            </div>
        </form>
    </div>



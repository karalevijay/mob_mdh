
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Today's Visit</h2>
        <a data-ajax='false' href="<?php echo base_url() ?>myvisit/todays_visit/<?php echo $content_data['app_id']; ?>/6" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <div class="today-visit-mid mt10"> 
        <p class="f14 mb20 ml10 mr10 fBold">Thank you for using the mobile VisitOptimizer tool from My Diabetes Home!</p>
        <div class="ui-block-a per100 mb20 smallFont">
            <a id="addAppTrigger" href="#popupBasic" style='display:none' data-rel="popup" ></a>
            <a data-theme='b' data-role="button" id="save" href="javascript:void(0)" onClick='open_add_app_final(<?php echo $content_data['app_id']; ?>)' >
                Schedule New Visit
            </a>
            
        </div>
        <p id="error">
            <?php
            if (isset($content_data['error']))
            {
                echo '<p>' . $content_data['error'] . '</p>';
                unset($content_data['error']);
            }
            echo '<p>' . $this->session->flashdata('error') . '</p>'
            ?>
        </p>
        <p class="mb20">Take a look at the notes you recorded during your visit.</p>
        <div class="ui-block-a per100 mb20 smallFont">
            <a id="displayNoteAnch" href="#popupBasic1" style='display:none' data-rel="popup"></a>
            <a data-theme='c' data-ajax="true" data-role="button" id="save" href="javascript:void(0)" onClick='disp_note(<?php echo $content_data['app_id']; ?>)' >
                Display Notes
            </a>
        </div>
    </div>
</div>

<div data-role="popup" id="popupBasic1" style="width:100%;" data-transition="turn" >
</div>


<div data-role="popup" data-transition="turn" id="popupBasic" style="width:100%;">
   
</div>

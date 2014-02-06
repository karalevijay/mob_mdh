
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Edit Cholesterol</h2>
        <a data-ajax='false' href="<?php echo base_url() . 'cholesterol/pastdata' ?>" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
    </div> 
    <p id="error" >
        <?php
        if (isset($content_data['error']))
        {
            echo $content_data['error'];
            unset($content_data['error']);
        } echo $this->session->flashdata('error')
        ?>
    </p>
    <form action="<?php echo base_url() ?>cholesterol/update_cholesterol" method="post" data-ajax='false' id="cholfrm" > 
        <div class="groupDivs">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Total</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' type="number" id='total' name="total" placeholder="" value="<?php if (isset($content_data['cholesterol']['total'])) echo sprintf ("%.1f",$content_data['cholesterol']['total']); ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>                     
            </div>

            <input type="hidden" name="cholesterol_id" placeholder="" value="<?php if (isset($content_data['cholesterol']['cholesterol_id'])) echo $content_data['cholesterol']['cholesterol_id']; ?>" data-mini="true"/>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">HDL (Good)</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' type="number" placeholder="" id='hdl' name="hdl" value="<?php if (isset($content_data['cholesterol']['hdl'])) echo sprintf ("%.1f",$content_data['cholesterol']['hdl']); ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">LDL (Bad)</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' type="number" placeholder="" id='ldl' name="ldl" value="<?php if (isset($content_data['cholesterol']['ldl'])) echo sprintf ("%.1f",$content_data['cholesterol']['ldl']); ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">TG</p>
                <div class="ui-block-b per55 posRel"><input required='reqiured' type="number" placeholder="" id="tri" name="tri" value="<?php if (isset($content_data['cholesterol']['tri'])) echo sprintf ("%.1f",$content_data['cholesterol']['tri']); ?>" data-mini="true"/></div>
                <div class="ui-block-c per10 ml5 mt15">mg/dL</div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt15">Select Date</p>
                <div class="ui-block-b per65"><input required='reqiured' name="mydate" id="mydate" type="date" name="mydate" data-role="datebox" value="<?php if (isset($content_data['cholesterol']['cholesterol_date'])) echo date('m/d/Y', strtotime($content_data['cholesterol']['cholesterol_date'])); ?>"  data-options='{"mode": "datebox"}'>                  
                                            <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                </div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a per30 mt20">Notes</p>
                <div class="ui-block-b per65"><input type="text" maxlength="250" placeholder="" name="notes" value="<?php if (isset($content_data['cholesterol']['notes'])) echo $content_data['cholesterol']['notes']; ?>" /></div>
            </div>

        </div>
        <div class="mb10 ui-grid-a">
            <div class="ui-block-a smallFont"> 
                <input type="submit" id="save" data-theme='b' value="Save"/>
            </div>
            <div class="ui-block-b smallFont"> 
                <a data-ajax='false' data-role='button' href='<?php echo base_url() ?>cholesterol/pastdata' id="cancel" data-theme='c'>Cancel</a>
            </div>
            <div class="clear"></div>

            <div class="ui-block-c smallFont ml25per"> 
                <a href="#deleteme" data-rel="popup" class="delete smallFont3" data-theme='red' data-role="button">Delete</a>
            </div>
        </div>
    </form>
</div>



<div data-role="popup"  id="deleteme" data-theme="c" data-dismissible="false" style="max-width:400px;" data-shadow="true" data-corners="true" data-position-to="origin">
    <div data-role="header" data-theme="a" role="banner">
        <h1 class="ui-title" role="heading" >Delete Cholesterol?</h1>
    </div>
    <div data-role="content" data-theme="d" role="main">
        <h3 class="ui-title">Are you sure you want to delete this cholesterol entry?</h3>
        <p>This action cannot be undone.</p>
        <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true">Cancel</a>    
        <a data-ajax='false' data-role='button' href='<?php echo base_url() . 'cholesterol/delete_cholesterol/' . $content_data['cholesterol']['cholesterol_id'] ?>' id="cancel" data-inline="true" data-theme="red" data-corners="true" data-shadow="true" data-iconshadow="true" >Delete</a>
    </div>
</div>
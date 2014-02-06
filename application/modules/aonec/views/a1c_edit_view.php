<?php // var_dump($content_data)   ?>    
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Edit A1C</h2>
        <a data-ajax='false' href="<?php echo base_url() . 'aonec/pastdata' ?>" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
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
    <form action="<?php echo base_url() ?>aonec/update_aonec" method="post" data-ajax='false' name='a1cfrm' id='a1cfrm' > 

        <div class="groupDivs mt20">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">A1C Result</p>
                <div class="ui-block-b per65 posRel">
                    <input required type="text" placeholder="" maxlength="5" id="result" name="result" value="<?php if (isset($content_data['a1c']['result'])) echo sprintf ("%.1f",$content_data['a1c']['result']); ?>" data-mini="true"/><span class="percentage">%</span>
                </div>
            </div>
            <input type="hidden" name="a1c_id" placeholder="" value="<?php if (isset($content_data['a1c']['a1c_id'])) echo $content_data['a1c']['a1c_id']; ?>" data-mini="true"/>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">Select Date</p>
                <div class="ui-block-b per65"><input required  type="date" id="mydate" name="mydate" value="<?php if (isset($content_data['a1c']['a1c_date'])) echo date('m/d/Y', strtotime($content_data['a1c']['a1c_date'])); ?>" data-role="datebox"  data-options='{"mode": "datebox"}'>                  
                                            <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                </div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt20">Notes</p>
                <div class="ui-block-b per65"><input type="text" name="notes" maxlength="250" placeholder="" value="<?php if (isset($content_data['a1c']['notes'])) echo $content_data['a1c']['notes']; ?>" /></div>
            </div>

        </div>
        <div class="mb10 ui-grid-a">
            <div class="ui-block-a smallFont"> 
                <input type="submit" id="save" data-theme='b' value="Save"/>
            </div>
            <div class="ui-block-b smallFont"> 
                <a data-ajax='false' data-role='button' href='<?php echo base_url() ?>aonec/pastdata' id="cancel" data-theme='c'>Cancel</a>
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
        <h1 class="ui-title" role="heading" >Delete A1C?</h1>
    </div>
    <div data-role="content" data-theme="d" role="main">
        <h3 class="ui-title">Are you sure you want to delete this A1C entry?</h3>
        <p>This action cannot be undone.</p>
        <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true">Cancel</a>    
        <a data-ajax='false' data-role='button' href='<?php echo base_url() . 'aonec/delete_aonec/' . $content_data['a1c']['a1c_id'] ?>' id="cancel" data-inline="true" data-theme="red" data-corners="true" data-shadow="true" data-iconshadow="true" >Delete</a>
    </div>
</div>
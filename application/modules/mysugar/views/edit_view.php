
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Edit MySugars</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>mysugar/pastdata"   data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <p id="error">
        <?php
        if (isset($content_data['error']))
        {
            echo '<p>' . $content_data['error'] . '</p>';
            unset($content_data['error']);
        } echo '<p>' . $this->session->flashdata('error') . '</p>'
        ?>
    </p>
    <form data-ajax='false' method="post" action="<?php echo base_url() . 'mysugar/update' ?>" id='sugarform' >
    <div class="groupDivs border">
        <div class="mb10 ui-grid-b">
            <p class="ui-block-a mt5"></p>
            <p class="ui-block-b mt5 center">Before</p>
            <p class="ui-block-c mt5 center">After</p>
        </div>
        <div class="mb10 ui-grid-b">
            <p class="ui-block-a">Breakfast</p>
            <div class="ui-block-b"><input type="number" name="b4b" id='b4b' placeholder="" value="<?php if($content_data[0]['result_number_before_breakfast']==0) echo ''; else echo $content_data[0]['result_number_before_breakfast']; ?>" data-mini="true" /></div>
            <div class="ui-block-c"><input type="number" name="ab" id='ab' placeholder="" value="<?php if($content_data[0]['result_number_after_breakfast']==0) echo ''; else echo $content_data[0]['result_number_after_breakfast']; ?>" data-mini="true"/></div>
        </div>
        <div class="mb10 ui-grid-b">
            <p class="ui-block-a">Lunch</p>
            <div class="ui-block-b"><input type="number" name="b4l" id='b4l' placeholder="" value="<?php if($content_data[0]['result_number_before_lunch']==0) echo ''; else echo $content_data[0]['result_number_before_lunch']; ?>" data-mini="true" /></div>
            <div class="ui-block-c"><input type="number" name="al" id='al' placeholder="" value="<?php if($content_data[0]['result_number_after_lunch']==0) echo ''; else echo $content_data[0]['result_number_after_lunch']; ?>" data-mini="true"/></div>
        </div>
        <div class="mb10 ui-grid-b">
            <p class="ui-block-a">Supper</p>
            <div class="ui-block-b"><input type="number" name="b4s" id='b4s'  placeholder="" value="<?php if($content_data[0]['result_number_before_supper']==0) echo ''; else echo $content_data[0]['result_number_before_supper']; ?>" data-mini="true" /></div>
            <div class="ui-block-c"><input type="number" name="as" id='as' placeholder="" value="<?php if($content_data[0]['result_number_after_supper']==0) echo ''; else echo $content_data[0]['result_number_after_supper']; ?>" data-mini="true"/></div>
        </div>
    </div>
    <div class="groupDivs">
        <div class="mb10 ui-grid-b">
            <p class="ui-block-a mt5">Bedtime</p>
            <div class="ui-block-b"><input type="number"  name="bt" id='bt' placeholder="" value="<?php if($content_data[0]['result_number_bedtime']==0) echo ''; else echo $content_data[0]['result_number_bedtime']; ?>" data-mini="true"/></div>
        </div>
        <div class="mb10 ui-grid-b">
            <p class="ui-block-a">Other</p>
            <div class="ui-block-b"><input type="number"  name="o" id='o' placeholder="" value="<?php if($content_data[0]['result_number_other']==0) echo ''; else echo $content_data[0]['result_number_other']; ?>" data-mini="true"/></div>
        </div>
        <div class="mb10 ui-grid-b">
            <div class="ui-block-b"><input type="hidden"  name="tab" placeholder="" value="<?php echo $content_data['tab']; ?>" data-mini="true"/></div>
        </div>
        <div class="mb10 ui-grid-b">
            <div class="ui-block-b"><input type="hidden" name="sugar_id" placeholder="" value="<?php echo $content_data[0]['sugar_id']; ?>" data-mini="true"/></div>
        </div>
        <div class="mb10">
            <p  class="">
                <input  required='reqiured' name="sugar_date" id="sugar_date" value="<?php echo date("m/d/Y", strtotime($content_data[0]['sugar_date'])); ?>" type="date" data-role="datebox"  data-options='{"mode": "datebox"}' />
                <!--<input name="sugar_date" value="<?php //  echo $content_data[0]['sugar_date'];   ?>" id="mydate" type="text"/>-->                  
                                        <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
        </div>
    </div>
    <div class="mb10 ui-grid-b">
        <div class="ui-block-a smallFont3"> 
            <input type="submit" id="save" class="submit"  data-theme='b' value="Save"/>
        </div>
        <div class="ui-block-b"> 
            <a data-ajax='false' href="<?php echo base_url(); ?>mysugar/pastdata/<?php echo $content_data['tab']; ?>"  class="cancel smallFont3" data-theme='c' data-role="button">Cancel</a>
        </div>
        <div class="ui-block-c"> 
            <a href="#popupBasic" data-rel="popup" class="delete smallFont3" data-theme='red' data-role="button"> Delete </a>
        </div>
    </div>
</form>
</div>

<div data-role="popup"  id="popupBasic" data-theme="c" data-dismissible="false" style="max-width:400px;" data-shadow="true" data-corners="true" data-position-to="origin">
    <div data-role="header" data-theme="a" role="banner">
        <h1 class="ui-title" role="heading" >Delete Sugar?</h1>
    </div>
    <div data-role="content" data-theme="d" role="main">
        <h3 class="ui-title">Are you sure you want to delete this Sugar?</h3>
        <p>This action cannot be undone.</p>
        <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true">Cancel</a>    
        <a data-ajax='false' href="<?php echo base_url(); ?>mysugar/delete/<?php echo $content_data[0]['sugar_date'] . '/' . $content_data['tab']; ?>" data-role="button" data-inline="true" data-theme="red" data-corners="true" data-shadow="true" data-iconshadow="true" >Delete</a>  
    </div>
</div>
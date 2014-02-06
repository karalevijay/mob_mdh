<?php $old_data=$this->session->flashdata('old_data'); ?>
<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">MySugars</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>dashboard"  data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div> 
    <div data-role="navbar">
        <ul>
            <li><a  data-ajax='false'  href="<?php echo base_url(); ?>mysugar" <?php if ($content_data[0] == 1) echo 'class="ui-btn-active"'; ?> >Sugar Now</a></li>
            <li><a  data-ajax='false'  href="<?php echo base_url(); ?>mysugar/pastdata" <?php if ($content_data[0] == 2) echo 'class="ui-btn-active"'; ?> >Past Data</a></li>
            <li><a data-ajax='false' href="<?php echo base_url(); ?>mysugar/graph" <?php if ($content_data[0] == 3) echo 'class="ui-btn-active"'; ?> >Graph</a></li>
        </ul>
    </div>
    <p id="error">
        <?php
        if (isset($content_data['error']))
        {
            echo $content_data['error'];
            unset($content_data['error']);
        } echo '<br/>'.$this->session->flashdata('error') ;
        ?>
    </p><!-- /navbar -->
    <form method="post" action="<?php echo base_url() ?>mysugar/submit_sugar" data-ajax='false' id='sugarform' >

        <div class="groupDivs border">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt5"></p>
                <p class="ui-block-b mt5 center">Before</p>
                <p class="ui-block-c mt5 center">After</p>

            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">Breakfast</p>
                <div class="ui-block-b"><input type="number" name="b4b" id='b4b' placeholder="" value="<?php if(isset($old_data['b4b'])) echo $old_data['b4b']; ?>" data-mini="true" /></div>
                <div class="ui-block-c"><input type="number" name="ab" id='ab' placeholder="" value="<?php if(isset($old_data['ab'])) echo $old_data['ab']; ?>" data-mini="true"/></div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">Lunch</p>
                <div class="ui-block-b"><input type="number" name="b4l" id='b4l' placeholder="" value="<?php if(isset($old_data['b4l'])) echo $old_data['b4l']; ?>" data-mini="true" /></div>
                <div class="ui-block-c"><input type="number" name="al" id='al' placeholder="" value="<?php if(isset($old_data['al'])) echo $old_data['al']; ?>" data-mini="true"/></div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">Supper</p>
                <div class="ui-block-b"><input type="number" name="b4s" id='b4s' placeholder="" value="<?php if(isset($old_data['b4s'])) echo $old_data['b4s']; ?>" data-mini="true" /></div>
                <div class="ui-block-c"><input type="number" name="as" id='as' placeholder="" value="<?php if(isset($old_data['as'])) echo $old_data['as']; ?>" data-mini="true"/></div>
            </div>
        </div>
        <div class="groupDivs">
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a  mt15">Bedtime</p>
                <div class="ui-block-b"><input type="number" name="bt" id='bt' placeholder="" value="<?php if(isset($old_data['bt'])) echo $old_data['bt']; ?>" data-mini="true"/></div>
            </div>
            <div class="mb10 ui-grid-b">
                <p class="ui-block-a mt15">Other</p>
                <div class="ui-block-b"><input type="number" name="o" id='o'  placeholder="" value="<?php if(isset($old_data['o'])) echo $old_data['o']; ?>" data-mini="true"/></div>
            </div>
            <div class="mb10">
                <p class="">
                    <input name="sugar_date" id="sugar_date" type="date" data-role="datebox" value="<?php if(isset($old_data['sugar_date'])) echo $old_data['sugar_date']; else echo date('m/d/Y', time()) ?>"
                           data-options='{"mode": "datebox", "overrideDateFormat":"%m/%d/%Y", "overrideTimeFormat":12, "overrideSlideFieldOrder":["y","m","d"]}' />
            </div>
        </div>
        <div class="mb10 ui-grid-a">
            <div class="ui-block-a smallFont"> 
                <input type="submit" id="save" class="submit" data-theme='b' value='Save' />
            </div>
            <div class="ui-block-b"> 
                <a data-ajax='false' href="<?php echo base_url(); ?>" class="smallFont" data-theme='c' data-role="button">Cancel</a>
            </div>
        </div>
    </form>
</div>


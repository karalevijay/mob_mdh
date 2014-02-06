<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Today's Visit</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>
    <div class="menuBg" >
        <div data-role="navbar" class="mb10" >
            <ul>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/1'; ?>" >Vitals</a></li>
                <li><a  data-ajax='false'   href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/2'; ?>" >Meds</a></li>
                <li><a  data-ajax='false'  href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/3'; ?>" >Sugars</a></li>
            </ul>
        </div>
        <div data-role="navbar" >
            <ul>
                <li><a data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/4'; ?>" >Labs</a></li>
                <li><a data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/5'; ?>" class="ui-btn-active" >Questions</a></li>
                <li><a data-ajax='false' href="<?php echo base_url() . 'myvisit/todays_visit/' . $content_data['app_id'] . '/6'; ?>" >Goals</a></li>
            </ul>
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
    </div>
    <div class="today-visit-mid mt10">
        <form action="" method="post" id="quest" name="quest" data-ajax='false' >
            <div style="height:200px; overflow-x:hidden; overflow-y:auto;">
                <div id="questions">
                    <?php
                    $i = 0;
                    if(isset($content_data['old_data']['questions']))
                    foreach ($content_data['old_data']['questions'] as $data)
                    {
                       
                            $i++;
                            ?> 

                            <div class="mb5 fLeft per100">
                                <h4 class='mb5'>Question <?php echo $i; ?></h4>
                                <div class="per80 fLeft">
                                    <input type="text" id="q<?php echo $i ?>" name="q<?php echo $i ?>" placeholder="Loose your 5Kg in 6 months"  value="<?php echo $data['text'] ?>" />              
                                    <input type="hidden" id="qid<?php echo $i ?>" name="qid<?php echo $i ?>" placeholder="Loose your 5Kg in 6 months"  value="<?php echo $data['qid'] ?>" />              
                                </div>
                                <span class="fLeft mt15 ml10"><a href="javascript:void(0);" onclick="loadanswer(<?php echo "'a$i'"; ?>);" ><img src="<?php echo img_url()  ?>enterAns.png"></a></span> 
                            </div>
                            <div class="mb5 fLeft per80">
                                <textarea maxlength="250" cols="40" class="mt0" id="a<?php echo $i ?>" rows="8" name="a<?php echo $i ?>" placeholder="Enter your Answer" <?php if($data['ans']=='') echo "style='display:none'" ?> id="textarea-1"><?php echo $data['ans'] ?></textarea>
                            </div>
                        <?php 
                    }
                    ?>

                </div>
                <div class="clear"></div>
                <div class="ui-grid-a mb20">
                    <div class="ui-block-a per90 smallFont">
                        <a id="addQuestion" href="javascript:void(0);" data-role="button" onclick="loadquestion();"  data-theme='b'>Add More Questions</a>
                    </div>
                </div>
            </div>
            <div class="noteBg">
                <div class="fLeft per100">
                    <!--                    <div class="per65 fLeft">
                                            <textarea cols="40" rows="8" name="textarea-1" placeholder="Add notes" id="textarea-1"></textarea>
                                        </div>-->
                    <div class="fLeft per100 mt5 smallFont ml00" >
                        <a id="submitQuestion" href="javascript:void(0);" data-role="button" onclick="submit_questions();" data-theme='b'>Next</a>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </form>
    </div>
</div>
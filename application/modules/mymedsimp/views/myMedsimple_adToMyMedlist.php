<div id="mysugar_sugarNow">
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Add to My Med List</h2>
        <a data-ajax='false'  href="<?php echo base_url() ?>mymedsimp/myMedsimple_view" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div>

    <div class="mt20">
        <h3 class="mb20 center">12 Hours Decongestant (Oral)</h3>
        <form method="post" action="<?php echo base_url() ?>mymedsimp/add_medlist" data-ajax='false' id='add_med'>
            <div class="mb15">
                <div class="mb10 fLeft per100">
                    <h4 class="mb5">Select dosage form:</h4>
                    <div class="per100 fLeft">
                        <input type="text" name="sdf" id="sdf1" placeholder="Tablet, Extended Release" value="" />
                    </div>
                </div>
                <div class="mb10 fLeft per100">
                    <h4 class="mb5">Select dose strenght:</h4>
                    <div class="per100 fLeft">
                        <input type="text" name="sds" id="sds1" placeholder="120 mg" value="" />
                    </div>
                </div>
                <div class="mb10 fLeft per100">
                    <h4 class="mb5">How much do you take?</h4>
                    <div class="per75 fLeft">
                        <input type="text" name="hm" id="hm1" placeholder="3" value="" />
                    </div>
                    <span class="fLeft mt25 ml10">tablet(s)</span> 
                </div>
                <div class="mb10 fLeft per100">
                    <h4 class="mb5">How often do you take it?</h4>
                    <div class="per30 fLeft">
                        <div data-role="fieldcontain">
                            <select name="select-native-1" id="select-native-1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <span class="fLeft mt25 mr10 per20 ml10">times per</span>
                    <div class="per35 fLeft">
                        <div data-role="fieldcontain">
                            <select name="select-native-1" id="select-native-1">
                                <option value="1">Day</option>
                                <option value="2">Month</option>
                                <option value="3">Year</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="mb10 fLeft per100">
                    <h4 class="mb5">What are you taking this medication for?</h4>
                    <div class="per75 fLeft">
                        <input type="text" name="wmtf" id="wmtf1" placeholder="" value="" />
                    </div>
                    <span class="fLeft mt25 ml10">Tablet(s)</span> 
                </div>
                <div class="mb10 fLeft per100">
                    <h4 class="mb5">Special instructions</h4>
                    <div class="per100 fLeft">
                        <input type="text" name="si" id="si1" placeholder="" value="" />
                    </div>
                </div>
                <div class="ui-block-b per100 smallFont"> 
                    <input type="submit" data-theme='b' value="Save & Next">

                </div>
            </div>  
        </form>
    </div>

</div>
</div>

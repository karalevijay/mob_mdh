<div style="min-height: 792px;">
<table width="100%">
    <tr>
        <td align="left" width="50%">
            <span id="vo-word-1">Visit</span><span id="vo-word-2">Optimizer</span><br/>
            <span id="vo-word-1"></span><span id="vo-word-2"><?php echo date('m/d/Y', time()) ?></span><br/>
        </td>
        <td align="middle">
            <br/><br/><span id="vo-word-3">www.MyDiabetesHome.com</span>
        </td>
        <td align="right" width="50%" valign="middle">
            <img src="<?php echo imgs_url() ?>img-logo-new.gif" />
        </td>
    </tr>
    <!--tr>
            <td colspan="2" align="middle">
                    <span id="vo-word-3">www.MyDiabetesHome.com</span><br/>
            </td>
    </tr-->
</table>
<div style="width: 100%; padding-top: 5px; padding-bottom: 5px;">
    <div style="float: left; width:34%; border-top: 3px solid #099AD6"></div>
    <div style="float: right; width:66%; border-top: 3px solid #99432E;"></div>
</div>
<table class="nametable" style="margin-bottom: 0px">
    <tr>
        <th colspan="3">&nbsp;</th>
    </tr>
    <tr>
        <td width="25%" valign="top"><b>Name:&nbsp;</b><?php echo $content_data['name'] ?>			</td>
        <td width="30%" valign="top">
            <b>DOB:&nbsp;</b>			</td>
        <td valign="top">
            <div class="physicianlbl"><b>Physician: </b></div>
            <div class="physician">
                <?php
                if(isset($content_data['prescribers']['prescribers']))
                foreach ($content_data['prescribers']['prescribers'] as $ps)
                    echo ' '.$ps['prescriber_name'] . ',';
                ?>				</div>
        </td>
        <td valign="top">
        </td>
    </tr>
    <!--tr>
            <th colspan="3">&nbsp;</th>
    </tr-->
</table>
<table width="100%" class="labtable" cellspacing=0 cellpadding=0>
    <thead>
        <tr>
            <th colspan="7" class="labtop">myNumbers</th>
        </tr>
        <tr>
            <th colspan="6" class="labtop2">VITALS</th>
            <th class="labtop2">Notes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th width="150px" class="firstLeft">Test</th>
            <th width="150px">Goal</th>
            <th width="100px">Date</th>
            <th width="100px">Last Result</th>
            <th class="blankrule">&nbsp;</th>
            <th class="labnote">Today's Result</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td  class="firstLeft">Blood Pressure</td>
            <td>&lt; 140/80</td>
            <td align="center"><?php echo $content_data['latest_bp']['lab_bp']['bp_date'] ?></td>
            <td><?php echo $content_data['latest_bp']['lab_bp']['systolic'] ?>/<?php echo $content_data['latest_bp']['lab_bp']['diastolic'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td  class="firstLeft">Weight</td>
            <td><?php echo $content_data['latest_weight']['lab_weight']['goal'] ?></td>
            <td align="center"><?php echo $content_data['latest_weight']['lab_weight']['weight_date'] ?></td>
            <td><?php echo $content_data['latest_weight']['lab_weight']['weigh'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="last firstLeft">BMI</td>
            <td class="last">< 25 (Ideal)</td>
            <td  class="last" align="center"></td>
            <td class="last"></td>
            <td class="blankrule last">&nbsp;</td>
            <td class="last">&nbsp;</td>
            <td class="last">&nbsp;</td>
        </tr>
    </tbody>
    <!--/table>
    <table width="100%" class="labtable" cellspacing=0 cellpadding=0-->
    <thead>
        <tr>
            <th colspan="7" class="labtop2"></th>
        </tr>
        <tr>
            <th colspan="7" class="labtop2">LABS</th>
        </tr>
        <tr>
            <th width="150px"  class="firstLeft">Test</th>
            <th width="150px">Goal</th>
            <th width="100px">Date</th>
            <th width="100px">Last Result</th>
            <th class="blankrule">&nbsp;</th>
            <th width="100px">Today's Result</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td  class="firstLeft">A1c</td>
            <td>7.0</td>
            <td align="center"><?php echo $content_data['latest_a1c']['lab_a1c']['a1c_date'] ?></td>
            <td><?php echo $content_data['latest_a1c']['lab_a1c']['result'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
        </tr>
        <tr>
            <td class="firstLeft">Total Cholesterol</td>
            <td>&lt; under 200<BR/></td>
            <td align="center"><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['cholesterol_date'] ?></td>
            <td><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['total'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="firstLeft">HDL (good cholesterol)</td>
            <td>&gt; 40 (M), &gt; 50 (F)</td>
            <td align="center"><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['cholesterol_date'] ?></td>
            <td><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['hdl'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="firstLeft">LDL (bad cholesterol)</td>
            <td>&lt; 100</td>
            <td align="center"><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['cholesterol_date'] ?></td>
            <td><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['ldl'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td  class="firstLeft">Triglycerides</td>
            <td>&lt; 150<BR/></td>
            <td align="center"><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['cholesterol_date'] ?></td>
            <td><?php echo $content_data['latest_cholesterol']['lab_cholesterol']['tri'] ?></td>
            <td class="blankrule">&nbsp;</td>
            <td>&nbsp;</td>
            <td class="last"></td>
        </tr>
    </tbody> 
</table>
<table width="100%" class="sugartable" cellspacing=0 cellpadding=0>
    <thead>
        <tr>
            <th colspan="11" class="sugartop">mySugars</th>
        </tr>
        <tr>
            <th colspan="11" class="sugarblank">&nbsp;</th>
        </tr>
        <tr>
            <th width="64px" class="sugardate firstLeft"><br/>Date</th>
            <th width="64px">Before Breakfast</th>
            <th width="64px">After Breakfast</th>
            <th width="64px">Before Lunch</th>
            <th width="64px">After Lunch</th>
            <th width="64px">Before Supper</th>
            <th width="64px">After Supper</th>
            <th width="64px"><bR/>Bedtime</th>
            <th width="64px"><br/>Other</th>
            <th class="sugarnotenotop"><br/>Notes</th>
        </tr>
    </thead>
    <tbody> 
        <?php
        if(isset($content_data['sugar'][0]['sugar_date']))
        foreach ($content_data['sugar'] as $sugar)
        {
            ?>
        <script> var sugarid = 0;</script>
        <tr>
            <td valign="middle" align="center" class='firstLeft'>
                <?php echo $sugar['sugar_date']; ?>			</td>
            <td valign="middle" align="center">
                <?php echo $sugar['result_number_before_breakfast']; ?>				</td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_after_breakfast']; ?>
            </td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_before_lunch']; ?>
            </td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_after_lunch']; ?>
            </td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_before_supper']; ?>
            </td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_after_supper']; ?>
            </td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_bedtime']; ?>
            </td>
            <td valign="middle" align="center"><?php echo $sugar['result_number_other']; ?>
            </td>
            <td class="sugarnote1">&nbsp;</td>
        </tr>
        <?php
    }
    ?>
</tbody> 
</table>
</div>

   <p class="breakhere">    </p>
<table width="100%">
    <tr>
        <td align="left" width="50%">
            <span id="vo-word-1">Visit</span><span id="vo-word-2">Optimizer</span><br/>
            <span id="vo-word-1"></span><span id="vo-word-2"><?php echo date('d M y', time()) ?></span><br/>
        </td>
        <td align="middle">
            <br/><br/><span id="vo-word-3">www.MyDiabetesHome.com</span>
        </td>
        <td align="right" width="50%" valign="middle">
            <img src="<?php echo imgs_url() ?>img-logo-new.gif" />
        </td>
    </tr>
</table>
<div style="width: 100%; padding-top: 5px; padding-bottom: 5px;">
    <div style="float: left; width:34%; border-top: 3px solid #099AD6"></div>
    <div style="float: right; width:66%; border-top: 3px solid #99432E;"></div>
</div>
   
   
<table width="100%" cellspacing="0" cellpadding="5" class="medtable">
            <thead>
                <tr>
                    <th class="medtop" colspan="6">myMeds</th>
                </tr>
                <tr>
                    <th class="medtop1">Medication</th>
                    <th class="medtop2">How to take it</th>
                    <th class="medtop3">Reason</th>
                    <th class="medtop4">Stop</th>
                    <th class="medtop4">Change</th>
                    <th class="medtop5">Notes</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if (isset($content_data['meds']['patient_drugs_base']))
                    foreach ($content_data['meds']['patient_drugs_base'] as $x)
                    {
                        ?> <tr>

                            <td><span class="medicine"><?php echo $x['drug_display_name'] ?></span> (<?php echo $x['gen_drug_display_name'] ?>) </td>
                            <td><?php echo $x['dose_amount'] . " " . $x['unit_display_name'] . ", " . $x['frequency_amount'] . " " . $x['frequency_unit']; ?></td>
                            <td><?php echo $x['disease_state']; ?></td>
                            <td align="center"><span id="box">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                            <td align="center"><span id="box">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                            <td class="mednote1"></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>	
   
   
   
<table width="100%" class="break">
    <tr>
        <td align="left" width="50%">
            <span id="vo-word-1">Visit</span><span id="vo-word-2">Optimizer</span><br/>
            <span id="vo-word-1"></span><span id="vo-word-2"><?php echo date('d M y', time()) ?></span><br/>
        </td>
        <td align="middle">
            <br/><br/><span id="vo-word-3">www.MyDiabetesHome.com</span>
        </td>
        <td align="right" width="50%" valign="middle">
            <img src="<?php echo imgs_url() ?>img-logo-new.gif" />
        </td>
    </tr>
</table>
<div style="width: 100%; padding-top: 5px; padding-bottom: 5px;">
    <div style="float: left; width:34%; border-top: 3px solid #099AD6"></div>
    <div style="float: right; width:66%; border-top: 3px solid #99432E;"></div>
</div>
<table width="100%" class="goaltable" cellpadding="0" cellspacing="0"  style="margin-bottom: 20px">
    <thead>
        <tr>
            <th colspan="2" class="goaltop">myGoals</th>
        </tr>
        <tr>
            <th width="70%">CURRENT GOALS</th>
            <th width="30%">NEW GOALS</th>
        </tr>
    </thead>
    <tbody>     
        <?php
        if (isset($content_data['goals']['goals']))
            foreach ($content_data['goals']['goals'] as $x)
            {
                ?> 
                <tr>
                    <td><span>&gt;</span>&nbsp;&nbsp;<?php echo $x['text'] ?></td>
                    <td></td>
                </tr>

                <?php
            }
        ?>
    <tbody> 
</table>
<table width="100%" class="goaltable" cellpadding="0" cellspacing="0" style="margin-bottom: 20px">
    <thead>
        <tr>
            <th colspan="2" class="goaltop">myQuestions</th>
        </tr>
        <tr>
            <th width="70%" >QUESTIONS</th>
            <th width="30%" >ANSWERS</th>
        </tr>
    </thead>
    <tbody> 

        <?php
        if (isset($content_data['questions']['questions']))
            foreach ($content_data['questions']['questions'] as $x)
            {
                ?> 
                <tr>
                    <td><span>&gt;</span><?php echo $x['text'] ?> </td>
                    <td></td>
                </tr>

                <?php
            }
        ?>

    </tbody>
</table>

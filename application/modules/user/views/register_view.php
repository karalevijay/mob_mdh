<div id="loginPage" >
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5 per60">Create Account</h2>
        <a data-ajax='false' href="<?php echo base_url(); ?>"  data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div> 

    <form  method="POST" data-ajax='false' id='registerform' >
        <div id="error" >
            <?php if(isset($content_data['error'])) { echo $content_data['error']; unset($content_data['error']); } echo $this->session->flashdata('error') ?>
        </div>
        <div class="mb10">
            <input required="required" type="text" placeholder="Your Name" name="firstname" id="firstname" value="<?php if(isset($content_data['data']['firstname'])) echo $content_data['data']['firstname']; ?>" />
        </div>
        <div class="mb10">
            <input required="required" type="email" placeholder="Email Address" name="email" id="email" value="<?php if(isset($content_data['data']['email'])) echo $content_data['data']['email']; ?>" />
        </div>
        <div class="mb10">
            <input required="required" type="password" minlength="6" placeholder="Password" name="password" id="password" value="" />
        </div>
        <div class="mb10">
            <input required="required" type="password" minlength="6" placeholder="Re-Enter Password" name="repassword" id="repassword" value="" />
        </div>
        <div data-role="fieldcontain" class="mb10" style="padding:0px; border-bottom:0px;">
            <select required="required" id="diabetestype" name="diabetestype">
                <option value="">Type of Diabetes</option>
                <option value="1">Type 1</option>
                <option value="2">Type 2</option>
                <option value="3">LADA</option>
                <option value="4">Gestational</option>
                <option value="5">PreDiabetes</option>
            </select>
        </div>
        <div class="mb10">
            <input required="required" type="text" placeholder="Enter Your Zipcode" name="zip" id="zip" value="" />
        </div>
        <div class="mb20 center">
            <label><input type="checkbox" Value="1" name="tac" id='tac' >I have read the terms and conditions</label>
        </div>
        <a href="<?php echo base_url(); ?>user/tac" >Terms and Conditions</a>
        <div class="mb20">
            <button id="register" data-theme='b'>Create Account</button>
        </div>
    </form>
    <br/>
</div>

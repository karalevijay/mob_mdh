<div class="ui-grid-a mb20">
    <h2 class="ui-block-a mt5 per60">Forgot Password</h2>
    <a data-ajax='false' href="<?php echo base_url(); ?>user/login" data-role="button" data-ajax="false" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
</div> 
<p id="error">
    <?php
    if (isset($content_data['error']))
    {
        echo $content_data['error'];
        unset($content_data['error']);
    } echo '<br/>' . $this->session->flashdata('error')
    ?>
</p>
<form action="<?php echo base_url(); ?>user/forgot_pwd_submit" method="POST" data-ajax="false" id='forgotfrm'>
    <label for="email">
        Email
    </label>
    <input required="required" name="email" id="email" placeholder="Please enter your email address." value="" type="email" />
    <input type="submit" name="submit" value="Reset My Password" data-theme='b' />

</form>



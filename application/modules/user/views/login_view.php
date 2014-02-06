<div id="loginPage" >
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Login</h2>
        <a href="<?php echo base_url(); ?>" id="backbutton" data-ajax="false" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div> 
    <p id="error">
        <?php if (isset($content_data['error']))
        {
            echo $content_data['error'];
            unset($content_data['error']);
        } echo $this->session->flashdata('error') ?>
    </p>
    <form action="" method="POST" data-ajax="false" id='loginform' >
        <div class="mb20">
            <input required type="email" name="email" id='email' placeholder="Username" value="<?php if (isset($_COOKIE['remember_me'])) echo $_COOKIE['remember_me']; ?>"   />
        </div>
        <div class="mb20">
            <input required type="password" placeholder="Password" id='password' value="" name="password" />
        </div>
        <div class="mb20">
            <label><input  type="checkbox" name="remember"  <?php if (isset($_COOKIE['remember_me'])) echo 'checked="checked"' ?> > Remember me</label>
        </div>
        <input type='submit' id="login" data-theme='b' value='Login' />
    </form>
    <a href="<?php echo base_url(); ?>user/forgot_pwd" data-ajax="false">Forgot Password?</a>
</div>






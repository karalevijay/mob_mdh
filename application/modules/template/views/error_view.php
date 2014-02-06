<div id="loginPage" >
    <div class="ui-grid-a mb20">
        <h2 class="ui-block-a mt5">Messege:</h2>
        <a href="javascript:void(0);" onclick="goBack()" data-ajax="false" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 fRight smallFont">Back</a>
    </div> 
    <p id="error" data-role="fieldcontain" >
       <?php if(isset($content_data['error'])) { echo $content_data['error']; unset($content_data['error']); } echo $this->session->flashdata('error') ?>
    </p>
</div>
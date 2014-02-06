
<?php
if ($header_data['uid'] != '')
{
    ?>

    <div id="logo" style="text-align: center;" class="ui-block-a">
        <img src="<?php echo img_url(); ?>logo.png"/>
    </div>
    <div class="ui-block-b" id="otherIcons">
        <a  data-ajax='false'  href="<?php echo base_url(); ?>dashboard"><img src="<?php echo img_url(); ?>home.png"/></a>
        <a  data-ajax='false'  href="https://medsimpleapp.zendesk.com/anonymous_requests/new"><img src="<?php echo img_url(); ?>mail.png"/></a>
        <a  data-ajax='false'  href="<?php echo base_url(); ?>dashboard/alert"><img src="<?php echo img_url(); ?>info.png"/></a>
    </div>

    <?php
}
else
{
?>

    <div id="logo" style="text-align: center;" class='per100 center'>
        <img src="<?php echo img_url(); ?>logo.png"/>
    </div>


<?php } ?>

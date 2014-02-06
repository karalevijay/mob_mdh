<div id="dashboard">
    <div class="mb20">
        <h2 class="mt5">Dashboard</h2>  
            <p id="error">
            <?php if(isset($content_data['error'])) { echo $content_data['error']; unset($content_data['error']); } echo $this->session->flashdata('error') ?>
        </p>
        <ul data-role="listview" class="ui-nodisc-icon ui-alt-icon mb10 dashBoardList">
            <li class='mySugar'><a data-ajax='false' href="<?php echo base_url(); ?>mysugar/">mySugars</a></li>
            <li class="myNumbers"><a data-ajax='false' href="<?php echo base_url(); ?>mynumbers/">myNumbers</a></li>
            <li class="myMedSimple"><a data-ajax='false' data-ajax='false' href="<?php echo base_url()?>mymedsimp">myMedSimple</a></li>
            <li class="myVisits"><a  data-ajax='false' href="<?php echo base_url(); ?>myvisit/">myVisits</a></li>
            <li class="myProfile"><a data-ajax='false' href="<?php echo base_url(); ?>mypro/">myProfile</a></li>
        </ul>
        <a data-ajax='false'  data-theme='b' data-ajax="false" id="login" data-role="button" href="<?php echo base_url(); ?>user/logout">
            Logout
        </a>
    </div> 

</div>
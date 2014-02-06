<?php require 'header2.php' ?>

<section>
    <div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Weight</h2>
            <a href="#" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
        </div> 
        <div data-role="navbar">
            <ul>
                <li><a href="#" class="ui-btn-active">Entry Now</a></li>
                <li><a href="#">Past Data</a></li>
                <li><a href="#">Graph</a></li>
            </ul>
        </div><!-- /navbar -->
        <form>
           <div class="per100 dataTable mb20 mt20">
       <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
         <thead>
           <tr class="ui-bar-d">
             <th>Date</th>
             <th>Goal<br>(Lbs)</th>
             <th>Weight<br>(Lbs)</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>Sep 25</td>
             <td>100</td>
             <td>102</td>
           </tr>
         </tbody>
       </table>
       </div>
            <div class="groupDivs">
                <div class="mb10 ui-grid-b">
                    <p class="ui-block-a per30 mt15">Enter Weight</p>
                    <div class="ui-block-b per55 posRel"><input type="text" placeholder="" value="" data-mini="true"/></div>
                    <div class="ui-block-c per10 ml5 mt15">Lbs</div>
                </div>
                <div class="mb10 ui-grid-b">
                    <p class="ui-block-a per30 mt15">Select Date</p>
                    <div class="ui-block-b per65"><input name="mydate" id="mydate" type="date" data-role="datebox"  data-options='{"mode": "datebox"}'>                  
                                                <!--<img src="img/calendar.png" style="position: absolute; top: 0px; right: 2%;"/></p>-->
                     </div>
                </div>
                <div class="mb10 ui-grid-b">
                    <p class="ui-block-a per30 mt20">Notes</p>
                    <div class="ui-block-b per65"><input type="text" placeholder="" value="" /></div>
                </div>
            </div>
            <div class="mb10 ui-grid-a">
                <div class="ui-block-a smallFont"> 
                    <button id="save" data-theme='b'>Save</button>
                </div>
                <div class="ui-block-b smallFont"> 
                    <button id="cancel" data-theme='c'>Cancel</button>
                </div>
            </div>
    </div>
</form>

</section>

<?php require 'footer2.php' ?>
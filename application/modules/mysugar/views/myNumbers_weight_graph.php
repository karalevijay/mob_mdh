<?php require 'header2.php' ?>

<section>
    <div id="mysugar_sugarNow">
        <div class="ui-grid-a mb20">
            <h2 class="ui-block-a mt5">Weight</h2>
            <a href="#" data-role="button" data-icon="arrow-l" data-inline="true" data-theme="a" class="ui-block-b m0 per35 smallFont fRight">Back</a>
        </div> 
        <div data-role="navbar">
            <ul>
                <li><a href="#">Entry Now</a></li>
                <li><a href="#">Past Data</a></li>
                <li><a href="#" class="ui-btn-active">Graph</a></li>
            </ul>
        </div><!-- /navbar -->
        <form>
        <div class="per90 margAuto mt20">
          <img src="img/weight.png" class="per100">
        </div>
           <div class="per90 margAuto dataTable mb20 mt20">
       <table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive">
         <thead>
           <tr class="ui-bar-d">
             <th>Date</th><br>
             <th>Goal<br>(Lbs)</th>
             <th>Weight<br>(Lbs)</th>
             
           </tr>
         </thead>
         <tbody>
           <tr>
             <th>Sep 25</th>
             <td>100</td>
             <td>102</td>
           </tr>
           <tr>
             <th>Oct 10</th>
             <td>90</td>
             <td>98</td>
           </tr>
           <tr>
             <th>Oct 15</th>
             <td>80</td>
             <td>110</td>
           </tr>           
         </tbody>
       </table>
       </div>
            
            
    </div>
</form>

</section>

<?php require 'footer2.php' ?>
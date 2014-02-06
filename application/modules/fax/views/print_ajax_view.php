<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head> 
        <link href="<?php echo css_url(); ?>style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo css_url(); ?>developer.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo css_url(); ?>jquery.mobile-1.3.2.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo fonts_url(); ?>font.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo css_url(); ?>validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo js_url(); ?>jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>jquery.mobile-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>jquery.nicescroll.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>common.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>developer.js"></script>

<!--footer links-->
<link rel="stylesheet" type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.min.css" /> 
<link type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.min.css" rel="stylesheet" /> 
<link type="text/css" href="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.css" rel="stylesheet" /> 
<script type="text/javascript" src="http://dev.jtsage.com/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.core.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.calbox.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.datebox.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/i18n/jquery.mobile.datebox.i18n.en_US.utf8.js"></script>	
<script type="text/javascript" src="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog.min.js"></script>


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="shortcut icon"
              href="/images/favicon.ico"
              type="image/x-icon" />

        <style>
            /* Common Properties
            -------------------------------------------------------------------*/
            body{font-family:Helvetica;font-size:12px;color:#000;line-height:normal;background:#fff ;text-align:left;}
            div,li,dl,dd,dt,h1,h2,h3,h4,h5,h6,span,img,input,form,em,strong{padding:0;margin:0;}
            a, abbr, acronym, address, applet, article, aside, audio, b, blockquote, big, center, canvas, caption, cite, code, command, datalist, dd, del, details, dfn, dl, div, dt, em, embed, fieldset, figcaption, figure, font, footer, form, h1, h2, h3, h4, h5, h6, header, hgroup, html, i, iframe, img, ins, kbd, keygen, label, legend, li, meter, nav, object, output, pre, progress, q, s, samp, section, small, span, source, strike, strong, sub, sup, tfoot, thead, th, tr, tdvideo, tt, u, var {background:transparent;border:0 none;font-size:100%;margin:0;padding:0;border:0;outline:0;vertical-align:top}
            blockquote, q {quotes:none}
            img {vertical-align:top}
            embed {vertical-align:top}


            @font-face{ 
                font-family: 'Museo300';
                src: url('/css/fonts/Museo300-Regular-webfont.eot');
                src: url('/css/fonts/Museo300-Regular-webfont.eot?iefix') format('eot'),
                    url('/css/fonts/Museo300-Regular-webfont.woff') format('woff'),
                    url('/css/fonts/Museo300-Regular-webfont.ttf') format('truetype'),
                    url('/css/fonts/Museo300-Regular-webfont.svg#webfont') format('svg');
            }
            @font-face{ 
                font-family: 'Museo500';
                src: url('/css/fonts/Museo500-Regular-webfont.eot');
                src: url('/css/fonts/Museo500-Regular-webfont.eot?iefix') format('eot'),
                    url('/css/fonts/Museo500-Regular-webfont.woff') format('woff'),
                    url('/css/fonts/Museo500-Regular-webfont.ttf') format('truetype'),
                    url('/css/fonts/Museo500-Regular-webfont.svg#webfont') format('svg');
            }
            @font-face{ 
                font-family: 'Museo700';
                src: url('/css/fonts/Museo700-Regular-webfont.eot');
                src: url('/css/fonts/Museo700-Regular-webfont.eot?iefix') format('eot'),
                    url('/css/fonts/Museo700-Regular-webfont.woff') format('woff'),
                    url('/css/fonts/Museo700-Regular-webfont.ttf') format('truetype'),
                    url('/css/fonts/Museo700-Regular-webfont.svg#webfont') format('svg');
            }

            .blankrule{
                width:2px;
            }
            .nametable{
                width: 100%; 
                font-size: 12px; 
            }
            .nametable td{
                line-height: 1.5em;
                text-transform: capitalize;
            }
            .nametable .physicianlbl{width:30px;float:left;}
            .nametable .physician{padding:0 0 0 63px;}
            .medtable{
                border-bottom: 1pt solid #A9CF00;	
                margin: 0 0 15px 0;
            }
            .medtable th{
                padding: 5px;
                border-right: 0px solid #A9CF00;
                text-align: center;
                color: #A9CF00;
                font-size: 12px;
            }
            .medtable th.medtop{
                background-color: #FFFFFF;
                font-family: 'Museo500', Arial, sans-serif; 
                border-top: 0px solid #A9CF00;
                border-bottom: 2pt solid #A9CF00;
                color: #A9CF00;
                text-align: left;
                padding: 5px;
                font-size: 12pt;
            }
            .medtable th.medtop1{
                border: 0px solid #A9CF00;
                border-right:1pt solid #A9CF00;
                text-align: left;
                color: #A9CF00;	
                font-size: 9pt;
                width:258px;
            }
            .medtable th.medtop2{
                border: 0px solid #A9CF00;
                border-right:1pt solid #A9CF00;
                text-align: left;
                color: #A9CF00;	
                font-size: 9pt;
                width:154px;
            }
            .medtable th.medtop3{
                border: 0px solid #A9CF00;
                border-right:1pt solid #A9CF00;
                text-align: left;
                color: #A9CF00;	
                font-size: 9pt;
                width:74px;	
            }
            .medtable th.medtop4{
                border: 0px solid #A9CF00;
                border-right:1pt solid #A9CF00;
                text-align: center;
                color: #A9CF00;	
                font-size: 9pt;
                width:68px;	
            }
            .medtable th.medtop5{
                border-right: 0px solid #A9CF00;
                color: #A9CF00;
                text-align: left;
                font-size: 9pt;
            }
            .medtable td{
                padding: 3px;
                border-top: 1pt solid #A9CF00;
                border-right: 1pt solid #A9CF00;
                background-color: #FFFFFF;
                font-size: 9pt;
                vertical-align: middle;
            }
            .medtable td span.medicine{
                font-weight: bold;
            }
            .medtable td.mednote{
                border: 0pt solid #A9CF00;
                border-right: 0px solid #A9CF00;
                text-align: left;
            }
            .medtable td.mednote1{
                border: 0pt solid #A9CF00;
                border-top: 1pt solid #A9CF00;
                border-right: 0px solid #A9CF00;
                text-align: left;
            }

            #box{
                border: 1px solid #A9CF00;
            }

            .labtable{
                border-bottom: 1pt solid #099AD6;	
                margin: 0 0 20px 0;
            }
            .labtable th{
                padding: 5px;
                border-top: 1pt solid #099AD6;
                border-right: 1pt solid #099AD6;	
                text-align: center;
                font-size: 9pt;
            }
            .labtable th.labtop{
                font-family: 'Museo500', Arial, sans-serif; 
                background-color: #FFFFFF;
                border: 0px;
                border-bottom: 2pt solid #099AD6;
                color: #099AD6;
                text-align: left;
                padding: 5px;
                font-size: 12pt;
            }
            .labtable th.labtop2{
                border: 0px solid #073756;
                text-align: left;
                color: #099AD6;	
                font-size: 9pt;
            }
            .labtable th.labnote{
                border-top: 1pt solid #099AD6;
                border-right: 1px solid #099AD6;
                text-align: left;
                font-size: 9pt;
            }
            .labtable td{
                padding: 3px;
                border-top: 1pt solid #099AD6;
                border-right: 1pt solid #099AD6;
                background-color: #FFFFFF;
                font-size: 9pt;
                text-align: center;
            }
        
            .labtable td.labnote{
                border: 0px solid #099AD6;
                text-align: left;
            }
            .labtable td.last{
                border-bottom: 1pt solid #099AD6;
            }

          @media print {
           P.breakhere {page-break-before: always;} 
}
            
            
            .sugartable{
                border-bottom: 1pt solid #99432E; 
                margin:0 0 20px 0;
            }
            .sugartable th.sugartop2{
                border: 0px solid #99432E;
                text-align: left;
                color: #99432E;	
                font-size: 9pt;
            }
            .sugartable th{
                padding: 5px;
                border-top: 1pt solid #99432E;
                border-right: 1pt solid #99432E;
                text-align: center;
                font-size: 9pt;
            }
            .sugartable th.sugartop{
                background-color: #FFFFFF;
                font-family: 'Museo500', Arial, sans-serif; 
                border: 0px;
                border-bottom: 2pt solid #99432E;
                color: #99432E;
                text-align: left;
                padding: 5px;
                font-size: 12pt;
            }
            .sugartable th.sugarblank{
                padding: 0px;
                border-right: 0px solid #99432E;
            }
            .sugartable th.sugarnobottom{
                border-bottom: 0px solid #99432E;
            }
            .sugartable th.sugarnotop{
                border-top: 0px solid #99432E;
            }
            .sugartable th.sugardate{
                border-top: 1px solid #99432E;
                border-right: 1pt solid #99432E;
            }
            .sugartable th.firstLeft, .sugartable td.firstLeft{
                border-left: 1pt solid #99432E;
            }
            
            .sugartable th.sugarnotenobottom{
                border-top: 0px solid #99432E;
                border-right: 0px solid #99432E;
                border-bottom: 0px solid #99432E;
            }
            .sugartable th.sugarnotenotop{
                border-top: 0px solid #99432E;
                border-right: 0px solid #99432E;
                border-bottom: 0pt solid #99432E;
                text-align: left;
            }
            .sugartable td{
                padding: 3px;
                border-top: 1pt solid #99432E;
                border-right: 1pt solid #99432E;
                background-color: #FFFFFF;
                font-size: 9pt;
                text-align: center;
                white-space: nowrap;
            }
            .sugartable td.sugarnote{
                border-right: 0px solid #99432E;
                border-bottom: 0px solid #99432E;
                border-top: 0px solid #99432E;
                text-align: left;
            }
            .sugartable td.sugarnote1{
                border-right: 0px solid #99432E;
                border-bottom: 0px solid #99432E;
                border-top: 1px solid #99432E;
                text-align: left;
            }

            .goaltable th{
                text-align: left;
                border-bottom: 2pt solid #099AD6;
                padding: 5px;
                color: #099AD6;
                font-size: 9pt;

            }
            .goaltable th.goaltop{
                font-family: 'Museo500', Arial, sans-serif; 
                font-size: 12pt;
            }

            .goaltable td{
                padding-left: 5px;
                line-height: 1.3em;
                font-size: 9pt;
                border: 0;
                word-break: break-all;
            }
            .goaltable td.bottom-border{
                padding-bottom: 10px;
                border-bottom: 1pt solid #099AD6;
            }
            .goaltable td span{
                font-weight: bold;
            }

            .othernotetable th{
                text-align: left;
                border-bottom: 2pt solid #000;
                padding: 5px;
                color: #00;
                font-size: 9pt;

            }
            .othernotetable th.othernotetop{
                font-family: 'Museo500', Arial, sans-serif; 
                font-size: 12pt;
            }

            .othernotetable td{
                padding-left: 5px;
                line-height: 1.3em;
                font-size: 9pt;
                border: 0;
            }

            #vo-word-1
            {
                font-family: 'Museo700', Arial, sans-serif; 
                font-size: 15px; 
                color: #000;
            }
            #vo-word-2 
            {
                font-family: 'Museo500', Arial, sans-serif; 
                font-size: 15px; 
                color: #000;
            }
            #vo-word-3 
            {
                font-family: 'Museo500', Arial, sans-serif; 
                font-size: 10pt; 
                color: #000;
            }
            .box_rotate {
                -moz-transform: rotate(90deg);  /* FF3.5+ */
                -o-transform: rotate(90deg);  /* Opera 10.5 */
                -webkit-transform: rotate(90deg);  /* Saf3.1+, Chrome */
                filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.5);  /* IE6,IE7 */
                -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.5)"; /* IE8 */
            }
            
             .labtable td.firstLeft, .labtable th.firstLeft{               
                border-left: 1pt solid #099AD6;
            }
        </style>
        <script type="text/javascript">
            $(window).ready(function() {
                

                $.ajax({
                    url: '<?php echo base_url(); ?>fax/ajax_print',
                    beforeSend: function() {
                    
                        $.mobile.loading("show", {
                            text: "Your report is being generated. Please wait.",
                            textVisible: true
                        });
                    },
                    error: function() {
                        $.mobile.loading("hide");
                        $('#body').html('<font color="red">Server Error!</font>');
                    },
                    success: function(data) {
                        $.mobile.loading("hide");
                        $('#body').html(data);
//                        $(data).appendTo("#body").trigger("create");
                        window.print();
                    }
                });




            });

        </script>
    </head>
    <body id="body">
    </body>
</html>

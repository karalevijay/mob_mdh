$(window).on('load', function() {
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var documentHeight;

    function setSectionTop()
    {
        return;
        var headerHeight = $('header').outerHeight();
        console.log(headerHeight);
        $('section').css({
            top: headerHeight
        });

    }

    function setSectionHeight()
    {
        return;
        var headerHeight = $('header').outerHeight();
        var footerHeight = $('footer').outerHeight();
        //var sectionHeight = headerHeight + footerHeight;
        documentHeight = $(window).height();
        //alert(documentHeight);
        // console.log("Document Height>>" + documentHeight + "| Header Height>>" + headerHeight + "| Footer Height>>" + footerHeight);
        var sectionHeight = documentHeight - (headerHeight + footerHeight);
        if (isMobile.iOS()) {
            $('section').height(sectionHeight - 75);
        }
        else
        {
            $('section').height(sectionHeight);
        }
        $("section").niceScroll();
    }

    setInterval(function() {
        setSectionHeight();
        setSectionTop();
    }, 200);
    $(window).resize(function() {
        setSectionTop();
        setSectionHeight();
    });

    $(window).on("orientationchange", function(event) {
        setSectionTop();
        setSectionHeight();
    });

    $('footer').on("load", function() {
        alert('footer has loaded!!');

    });


    $('#more').on('click',function(e) {
        e.preventDefault();
        $('.hiddenFooter').animate({
            left: '0%'
        }, 200);
    });
    $('#back').on('click',function(e) {
        e.preventDefault();
        $('.hiddenFooter').animate({
            left: '110%'
        }, 200);
    });

    $(document).ready(
            function() {
                $("#thisdiv").niceScroll({cursorcolor: "#00F"});
            }
    );
//    $('form').validationEngine('attach', {
//        promptPosition: "topLeft", 
//        scroll: false
//    });
    $( "#myPopupDiv" ).popup( "open" );
    $( "#myPopupDiv" ).popup( "close");
        
    
});


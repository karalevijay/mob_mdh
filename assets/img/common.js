$(window).on( "load",function() {
    var documentHeight;
    function setSectionTop()
    {
        var headerHeight = $('header').outerHeight();
        console.log(headerHeight);
        $('section').css({top: headerHeight + 10});
    }

    function setSectionHeight()
    {
        var headerHeight = $('header').outerHeight();
        var footerHeight = $('footer').outerHeight();
        var sectionHeight = headerHeight + footerHeight;
        documentHeight = $(document).height();
        sectionHeight = documentHeight - sectionHeight;
        $('section').height(sectionHeight - 25);

    }
    setSectionHeight();
   // setSectionTop();

    $("section").niceScroll();
    $("section").getNiceScroll().hide();

    $(window).resize(function() {
        setSectionTop();
        setSectionHeight();
    });
    
    $('#more').click(function(e){
        e.preventDefault();
        $('.hiddenFooter').animate({left:'0%'},200);
    });
    $('#back').click(function(e){
        e.preventDefault();
        $('.hiddenFooter').animate({left:'110%'},200);
    });
});
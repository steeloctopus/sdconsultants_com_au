(function ($) {

    Drupal.behaviors.caseStudyBind =
    {
        attach: function(context, settings)
        {
            $(".case-study-category").bind("click" , getCaseStudies);
            $(window).bind('load', function() {
                var pathname = window.location.pathname;
                var index = pathname.lastIndexOf("/") + 1;
                var filename = pathname.substr(index);
                var node = 'node-'+filename;
                $("#" + node +" summary").slideDown(1000,"swing",true);
                $("#" + node +" summary").attr('id','expanded');
                $("#" + node +" h2").attr('class','minus');
                $(".case-study").bind("click", displayCaseStudy);
            });
        }
    }

    function getCaseStudies(evt) {
        $(".case-study-category").removeClass("chosen");

        var category = $(this).attr('id');
        var url = '/filtered-case-studies/'+ category;
        $("body").addClass("loading");
        $.ajax({
            url: url,
            dataType: "html",
            success: function(data){
                var content = $(data).filter(".content");
                var inner_content = $(content).html();
                var filtered_content = $(inner_content).find(".filtered-case-studies");
                $('.case-studies').html(filtered_content);
                $("summary:first").attr('id','expanded');
                $("h2:first").attr('class','minus');
                $(".case-study").bind("click", displayCaseStudy);
                $(".case-studies").fadeIn("slow", "linear");
                $("#expanded").fadeIn("slow", "linear");
                $("body").removeClass("loading");
                },
            error: function () {
                alert("Problem loading page");
                $("body").removeClass("loading");
                }
        });
        $(this).addClass("chosen");
        return false;

    };


    function displayCaseStudy (evt) {
        $("#expanded").slideUp(1000,"swing",true);
        $("#expanded").attr('id',null);
        $(".case-study h2").attr('class','plus');
        $(this).find("summary").slideDown(1000,"swing",true);
        $(this).find("h2").attr('class','minus');
        $(this).find("summary").attr('id','expanded');

    };

}(jQuery));

//jQuery(document).ready(function($)
//{
//
//});
//
//    function getCaseStudies(evt) {
//        $(".case-study-category").removeClass("chosen");
//
//        var category = $(this).attr('id');
//        var url = 'filtered-case-studies/'+ category;
//        $("body").addClass("loading");
//        jQuery.get(url,function(data) {
//            var content = $(data).filter(function(){return $(this).is('.content')});
//            $('.case-studies').html(content);
//        }).done(function() {
//                $("summary:first").attr('id','expanded');
//                $(".case-study").bind("click", displayCaseStudy);
//                $(".case-studies").fadeIn("slow", "linear");
//                $("#expanded").fadeIn("slow", "linear");
//                $("body").removeClass("loading");
//            })
//        .fail(function() {
//                    alert("Problem loading page");
//                    $("body").removeClass("loading");
//                    },"html");
//        $(this).addClass("chosen");
//
//        return false;
//    };
//
//
//    function displayCaseStudy (evt) {
//
//
//       $("#expanded").slideUp(1000,"swing",true);
//       $("#expanded").attr('id',null);
//       $(".case-study h2").attr('class','plus');
//       $(this).find("summary").slideDown(1000,"swing",true);
//       $(this).find("h2").attr('class','minus');
//       $(this).find("summary").attr('id','expanded');
//
//    }


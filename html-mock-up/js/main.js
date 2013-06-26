
$(document).ready(function ()
{
    $(".case-study-category").bind("click" , getCaseStudies);
});

function getCaseStudies(evt) {
    $(".case-study-category").removeClass("chosen");

    var category = $(this).attr('id');
    var url = category + ".html";
    $("body").addClass("loading");
    jQuery.get(url,function(data) {
        var page = jQuery.parseHTML(data);
        var content = $('.content').page;
        $('.case-studies').html(content);
    }).done(function() {
            $("summary:first").attr('id','expanded');
            $(".case-study").bind("click", displayCaseStudy);
            $(".case-studies").fadeIn("slow", "linear");
            $("#expanded").fadeIn("slow", "linear");
            $("body").removeClass("loading");
        })
    .fail(function() {
                alert("Problem loading page");
                $("body").removeClass("loading");
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

}
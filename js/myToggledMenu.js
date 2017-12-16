  $(document).ready(function() {

    const mobileScreen = 768;

    $("#header").addClass("animated bounce");


      $("li.dropdownsp").on("click",function(){

        const bodyWidth = $('body').width();
        if  (bodyWidth < mobileScreen) {

          $(this).children("ul").css({"display":"inline-block","width":"100%"});

          $('li.dropdownsp li').on("click",function(){
            //console.log($(this));
            $(this).css({"position":"relative"});
            $(this).children("ul").css({'display':'block','transition':'all 2s 0s linear'});
            $(this).on("mouseleave",function(){
              $(this).children("ul").css({"display":"none","transition":"all 2s 0s linear"});
              //console.log("leave");
            });
          });

        } else {
          $(this).children("ul").css({"display":"inline-block","position":"absolute","top":"100%","left":"0"});
          $("li.dropdownsp li").on("click",function(){
            $(this).css({"position":"relative"});
            //console.log($(this).children('ul'));
            $(this).children("ul").css({"display":"inline-block","position":"absolute","top":"0","left":"100%"});
            $(this).on("mouseleave",function(){
              $(this).children("ul").css("display","none");
              //console.log("leave");
            });
            //console.log("Click");
          });
        }
      });
      $("#myNavbar > ul > li").on("mouseleave",function(){
        //$("#myNavbar > ul > li").off("click");
        $("li.dropdownsp > ul").css("display","none");
      });

      $("#catagory").on("click",function(){

        const bodyWidth = $('body').width();
        if  (bodyWidth < mobileScreen) {

          $("#button-bars").click();

          $("#myNavbar").css("z-index","199");

          $("#myNavbar,#button-bars").attr("disabled","disabled");
        }
      });
      $("#myNavbar").on("mouseleave",function(){
        const bodyWidth = $('body').width();
        if  (bodyWidth < mobileScreen) {
            //console.log("leave");
            $("div#main > div,#main,#header").on("click",function(){
              $("#myNavbar,#button-bars").removeAttr("disabled","disabled");
              // console.log("Click");
              $("#button-bars").click();
              $("div#main > div,#main").off("click");
            });
        }
      });
})

//var App=function(){
//    var r=function(){
//         $("#post-job").click(function()
//        {
//            $(".logformf").hide(),$(".regformf").show();
//        }),
//            
//          $("#jobback-btn").click(function()
//        {
//             $(".regformt").hide(),
//            $(".logformf").show();
//           
//        });
//                
//                
//        
//    };
//    return{
//        init:function(){
//            r(),
//                    
//                   $(".regformf").hide();
//                    
//                     // $('#code_preview0').summernote({height: 300})
//       }};
//       }();
//       jQuery(document).ready(function(){
//           App.init();
//       });
var Login=function(){
    var r=function(){
//        $("#forget-password").click(function()
//        {
//            $(".login-form").hide(),$(".forget-form").show();
//        }),
//           $("#compancreate").click(function()
//        {
//            $(".jobsome").hide(),$(".companysome").show();
//        }), 
//                $("#back-btn").click(function()
//        {
//                    $(".login-form").show(),
//            $(".forget-form").hide();
//        }),
                      $("#post-somer").click(function()
        {
            $(".newsfeeds").hide(),$(".some").show();
        }),
//                             $("#post-job").click(function()
//        {
//            $(".newsfeeds").hide(),$(".companysome").hide(),$(".some").hide(),$(".jobsome").show();
//        }),
//            
//              $("#companyback-btn").click(function()
//        {
//                    $(".jobsome").show(),
//            $(".companysome").hide();
//        }),
                 $("#postback-btn").click(function()
        {
                    $(".newsfeeds").show(),
            $(".some").hide();
        });
//                            $("#jobback-btn").click(function()
//        {
//            $(".newsfeeds").show(),
//            $(".some").hide(),
//            $(".companysome").hide(),
//            $(".jobsome").hide();
//        });
                
                
        
    };
    return{
        init:function(){
            r(),
                    
//                   $(".forget-form").hide(),
                     $(".some").hide();
//                      $(".companysome").hide(),
//                      $(".jobsome").hide();
                    
                     // $('#code_preview0').summernote({height: 300})
       }};}();
       jQuery(document).ready(function(){
           Login.init();
    
            
            
       });

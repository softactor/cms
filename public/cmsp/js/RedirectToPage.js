/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//****** redirecting create complain type
function create_complain_type($newurl){ 

     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
            var box =   $("#content-wrapper");
            $.ajax({
            type: 'get',
            url: $newurl,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
               
            }
        });
         
        });
    });

  

}

 function complain_details($url){
     
  
     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
            var box =   $("#content-wrapper");
            $.ajax({
            type: 'get',
            url: $url,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
                
            }
        });
         
        });
    });

    
 }
 
 function list_complain($url){
     
   
     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
            $.ajax({
            type: 'get',
            url: $url,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
               
            }
        });
         
        });
    });

 }
 function listUsers($url){

     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
            var box =   $("#content-wrapper");
            $.ajax({
            type: 'get',
            url: $url,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
               
            }
        });
         
        });
    });


 }
 function list_complain_types($url){
     

     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
            var box =   $("#content-wrapper");
            $.ajax({
            type: 'get',
            url: $url,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
               
            }
        });
         
        });
    });

 
}

function addNewUser($url){

     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
         
            $.ajax({
            type: 'get',
            url: $url,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
               
            }
        });
         
        });
    });

 }
 
 
  function Viewcomplains($url){
     

     $(function(){ 

        $("#content-wrapper").fadeOut(1000, function () {
           
            $.ajax({
            type: 'get',
            url: $url,
            success: function(data) {
               $("#content-wrapper").html($(data).find('#content-wrapper').html()).fadeIn();
               
            }
        });
         
        });
    });

 
}
 
 
 
 

$(document).ready(function(){

     //alert("hello , load already");
     test();
});


function test(){

             ajax_url = "/api/data/test";
             jQuery.ajax({
                    url:ajax_url,
                    type:'POST',
                    data:{"page":100},
                    dataType:"json",
                    //contentType:"application/json; charset=utf-8",
                    success:function(data){
                         console.log("replay data is : " + JSON.stringify(data));
                         //localStorage.setItem("ItemData", JSON.stringify(data));
                    }
              });


}

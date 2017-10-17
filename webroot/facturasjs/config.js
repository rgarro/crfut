$(document).ready(function(){

  $.ajax({
    //url:"http://localhost:8766/contester/test_service",
    url:"http://crfut.com/contester/test_service",
    dataType:"JSON",
    data:{},
    type:"GET",
    success:function(data){
      console.log(data);
    }
  });

});

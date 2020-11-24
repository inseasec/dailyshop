$(document).ready(function(){
    getCategories();
    createCategories();
    changeImage();
    addToCart();
 
});
function addToCart (){
  $('#cart_button').on('click',function(){
    var id = $(this).attr('data-id');
    $.ajax({
      type:'get',
      url:'../product-cart/'+id,
      data:{id:id},
      success: function(response){
        $('#cart_products').html(response);
         //alert(response);
      }
  }); 
   
  });
}

function getCategories(){
       $('#dep_id').on('change',function(){
        var dep_id =  $('#dep_id').val();
        //alert(dep_id);
        //var dep_name =  $('#dep_id').val();
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $.ajax({
                type:'post',
                url:'../department-categories/'+dep_id,
                data:{id:dep_id},
                success: function(response){
                   $('#categories').html(response);
                   //alert(response);
                }
            }); 
        });   
   }
/* dynamic department - categories while creating page*/
   function createCategories(){
       $('#dep_id').on('change',function(){
        var dep_id =  $('#dep_id').val();
        //alert(dep_id);
        //var dep_name =  $('#dep_id').val();
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $.ajax({
                type:'post',
                url:'./department-categories/'+dep_id,
                data:{id:dep_id},
                success: function(response){
                   $('#categories').html(response);
                   //alert(response);
                }
            }); 
        });   
   }
 

  function changeImage(){
   $('.single_image').on('click',function(){
    var single_image = $(this).attr('src');
    /* var primary_image = $('#primary_image').attr('src');
    alert(primary_image);*/
      $('#primary_image').attr('src',single_image);

   });
  }
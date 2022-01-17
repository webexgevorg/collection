count=0
$('.card-image').each(function(){
 count++;
 console.log(count)
 if(count>3){
   $('.add-img-cont').hide()
 }
})
$('#add-image').on('change', function(){
    console.log('pppp')
    var fd = new FormData(document.querySelector("#save-imge"));
    console.log(fd)
    $.ajax({
        url: "user_form/add-image.php",
        type: "POST",
        data: fd,
        processData: false,  
        contentType: false,
        success: function(res){
           console.log(res)
           $('.res-img').html(res)

           setTimeout(() => {
               location.reload()
               console.log(1111111111)
           }, 2000);
        }
      });
})
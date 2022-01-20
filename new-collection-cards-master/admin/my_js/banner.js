$(document).ready(function() {
       
        $(".btn-icon").click(function(){
           
            if($(this).find('i').hasClass('fa-edit')){
                $(this).parent().parent().find('.tittle').attr("contenteditable","true")
                $(this).parent().parent().find('.desc').attr("contenteditable","true")
                $(this).parent().parent().find('.tittle').css("border","1px solid #133690")
                $(this).parent().parent().find('.desc').css("border","1px solid #133690")
            }
             
             else{
            var titl=$(".tittle").html();
            var desc=$(".desc").html();
            console.log(titl)
            $.ajax({
                type: "post",
                url: "banner_save_text.php",
                data: {tittle: titl, description: desc},
                success: function(ard){
                    location.reload()
                }
            })
             }
             
             $(this).find('i').toggleClass('fa-save')
             $(this).find('i').toggleClass('fa-edit')
        })
        
        // -----------------------show image--------------------
    
        $('.show').click(function(){
            var s=$(this).html()
            $.ajax({
                type: "post",
                url: "show_banner_images.php",
                data: {show: s},
                success: function(ard){
                    $('.img_cont').html(ard)
                    
          // ----------------change banner image-----------------------------           
            $('.banner_img').click(function(){
            var img_name=$(this).attr('name')
            console.log(img_name)
            $.ajax({
                method: "post",
                url: "change_banner_images.php",
                data: {image_name: img_name},
                success: function(ard1){
                  location.reload()
                
                }
            })
            
        })
           
                }
            })
            
        })
       
      
        
        
})    
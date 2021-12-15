// ----------------add_collection------------------------
    $('.choose_file .file_label input').bind('change', function () {
        var filename = $(this).val();
       $(".file-text").text(filename.replace("C:\\fakepath\\", ""));
    })

    $('.save-collection').click(function(event){
        let that=$(this)
        let n=$('.namecoll').val()
        let d=$('.desc').val()
        let f=$('.file').val()
        let ext=f.split('.')
        let extantion=ext.pop()
        let k=false
        let file_extantions=['png', 'jpeg', 'JPEG', 'PNG', 'JPG', 'jpg']
        if(d=='' || n=='' || f==''){
          event.preventDefault()
           $('.message-result').html('Fill all filds')
        }
        else{
            file_extantions.forEach(element => {
                if(extantion==element){
                     k=true
                }
            })
            if(!k){
                event.preventDefault()
                $('.message-result').html('Plese chose image in png, jpg, jpeg')
            }
            else{
                    $(this).attr('type', 'submit')
            }
            // if(ext.pop()!='png' && ext.pop()!='jpg' && ext.pop()!='jpeg' && ext.pop()!='JPEG' && ext.pop()!='JPG' && ext.pop()!='PNG'){
            //     event.preventDefault()
            //     $('.message-result').html('Plese chose image in png, jpg, jpeg')
            // }
            // else{
            //     $(this).attr('type', 'submit')
            // }
        }
    })
       

$(".collection-item-a").on('click', function (e) {
    let hr=$(location).attr('search').split('&')
    let id='?coll-id='+$(this).attr('data-id')
    if (hr[0]==id){
        $(this).attr('href','user-collection.php'+hr[0]+'')
    }
    // let id=$(this).attr('data-id')
});
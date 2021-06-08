var canvas = new fabric.Canvas('canvas');
let img;
let json;
$('.change-this-card-template').on('click', function(){
    let tbl_name=$(this).attr('data-tbl')
    let card_id=$(this).attr('data-id')
    let template_id=$('.active-template').attr('id')

    
    let path=''
    $.ajax({
        type: 'post',
        url: 'user_form/change-card-template.php',
        data: {tbl_name, card_id, template_id},
        success: function(res){
        let arr=JSON.parse(res)
         json=arr['json']
         img=arr['img']
        console.log(img)
        let jsonResponseCard = $.getJSON( json )
            jsonResponseCard.then(function (data) {
              canvas.loadFromJSON(data, function(){
              canvas.setDimensions({width:data.objects[0].width+60, height:data.objects[0].height+60})
         })
        })
        
        setTimeout(function(){$('.modal-btn').trigger('click')},1000)
        }
    })
})

$('.modal-btn').on('click', function(){
    canvas.renderAll()
              
    var data=canvas.toDataURL()

    var change_img='change_img'
    if(canvas.getObjects().length>0 ){
        console.log('pppppppp')
    }
    console.log(data)

           $.ajax({
             type: 'post',
             url: 'user_form/change-card-template.php',
             data: {data, change_img, img},
             success: function(res){
               console.log(res+'-=-=-=-=')
                //  $('.add-card-result').html(res)
                 setTimeout(function(){window.location.reload()},1000)
             }
           })
    
})
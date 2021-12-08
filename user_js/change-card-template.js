var canvas = new fabric.Canvas('canvas');
// var canvasForName = new fabric.Canvas('canvasForName');
let img;
let json;
$('.change-this-card-template').on('click', function(){
    let tbl_name=$(this).attr('data-tbl')
    let card_id=$(this).attr('data-id')
    let template_id=$('.active-template').parent().attr('id')
console.log(template_id)
    let path=''
    if(typeof(template_id)!='undefined'){
    $.ajax({
        type: 'post',
        url: 'user_form/change-card-template.php',
        data: {tbl_name, card_id, template_id},
        beforeSend: function(){$('.change-this-card-template').html('Chenging . . .')},
        success: function(res){
            console.log(res)
        let arr=JSON.parse(res)
         json=arr['json']
         img=arr['img']
        //  name_json=arr['name-json']
        //  name_img=arr['name-img']
        console.log(img)
        // console.log(name_img)
        // let canvas_width=''
        let jsonResponseCard = $.getJSON( json )
            jsonResponseCard.then(function (data) {
              canvas.loadFromJSON(data, function(){
              canvas.setDimensions({width:data.objects[0].width+60, height:data.objects[0].height+60})
         })
        })
        // ---------for name-----------------
        // let jsonResponseCardName = $.getJSON( name_json )
        //     jsonResponseCardName.then(function (data) {
        //       canvasForName.loadFromJSON(data, function(){
        //       canvasForName.setDimensions({width:canvas.width, height:100})
        //  })
        // })
        setTimeout(function(){$('.modal-btn').trigger('click')},1000)
        }
    })
  }
})

$('.modal-btn').on('click', function(){
    canvas.renderAll()
    // canvasForName.renderAll()
    console.log('cccc')
    var data=canvas.toDataURL()
    // var name_data=canvasForName.toDataURL()
    var change_img='change_img'
    if(canvas.getObjects().length>0 ){
        console.log('pppppppp')
    }
    console.log(data)
    console.log(img)

           $.ajax({
             type: 'post',
             url: 'user_form/change-card-template.php',
             data: {data, change_img, img},
            //  ------- for card and card name-----------------------------
            //  data: {data, name_data, change_img, img, name_img},
             success: function(res){
                //  $('.add-card-result').html(res)
                canvas.clear()
                // canvasForName.clear()
                 setTimeout(function(){window.location.reload()},1000)
             }
           })
    
})

// -----------------change-cards-template--(first or second folders)-------------------------
$('.change-cards-template').click(function(){
    let tbl_name=$(this).attr('data-tbl')
    let folder_id=$(this).attr('data-id')
    let template_id=$('.active-template').parent().attr('id')
    let that=$(this)
    console.log(template_id)

    console.log('bbb')
    let path=''
    let arr_img=[]
    // let arr_name_img=[]
    if(typeof(template_id)!='undefined'){
    $.ajax({
        type: 'post',
        url: 'user_form/change-cards-template.php',
        data: {tbl_name, folder_id, template_id},
        beforeSend: function(){that.parent().parent().html('<span class="btn"> Chenging . . .  </span>')},
        success: function(res){
            console.log(res)
            let json_arr=JSON.parse(res)
            let i=0
            let setinterval=setInterval(forJson,500)
                function forJson(){
                    if(i>=json_arr.length){
                        // clearInterval(setinterval)
                        setTimeout(function(){clearInterval(setinterval)},10)
                        let arr_data='arr_data'
                        // let arr_name_data='arr_name_data'

                         $.ajax({
                             type: 'post',
                             url: 'user_form/change-cards-template.php',
                             data: {arr_data, arr_img},
                            // ---------for card and card name------------------------
                            //  data: {arr_data, arr_img, arr_name_data, arr_name_img},
                             success: function(res){
                           setTimeout(function(){window.location.reload()},1000)
                            }
                        })
                    }
                   let json=json_arr[i]['json']
                    let img=json_arr[i]['img']
                    // name_json=json_arr[i]['name-json']
                    // name_img=json_arr[i]['name-img']
                        canvas.clear()
                        // canvasForName.clear()
                
                    let jsonResponseCard = $.getJSON( json )
                        jsonResponseCard.then(function (data) {
                          canvas.loadFromJSON(data, function(){
                          canvas.setDimensions({width:data.objects[0].width+60, height:data.objects[0].height+60})
                     })
                    })
                    // ---------for name-----------------
                //     let jsonResponseCardName = $.getJSON( name_json )
                //         jsonResponseCardName.then(function (data) {
                //         canvasForName.loadFromJSON(data, function(){
                //         canvasForName.setDimensions({width:canvas.width, height:100})
                //     })
                //    })
                    setTimeout(function(){
                         canvas.renderAll()
                        //  canvasForName.renderAll()
                         var data=canvas.toDataURL()
                        //  var name_data=canvasForName.toDataURL()
                         arr_img.push({'data': data, 'path': img })
                        //  arr_name_img.push({'name_data': name_data, 'name_path': name_img })
                          i++
                    },200)
                }
        }
    })
  }
})


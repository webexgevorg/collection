var canvas = new fabric.Canvas('canvas');
// var canvasForName = new fabric.Canvas('canvasForName');


// var can =document.getElementById('canvas')
// ------------------create new project (canvas)---------------------

 $('#create-canvas').click(function(){
  canvas.clear()
    $('#divHabilitSelectors').remove()
    $('.canvas-cont').removeClass('hide')
    $('.bord-dotted').css({'width': 'max-content', 'height':'max-content'})

   canvas.isDrawingMode = false;
 
  // --------------------------
       var width=$('#width').val()
       var height=$('#height').val()
       if (width<=460 && height<=400){
        $('.error-message').addClass('hide')
          canvas.setDimensions({width:width, height:height})
          canvas.renderAll(); 
       }
       else{
         $('.bord-dotted').css({'height': '85px', 'width': '200px', 'padding': '12px'})
         $('.error-message').removeClass('hide')
         $('.canvas-cont').remove()
         $('.error-message').html('max width: 460px<br> max height: 400px')
       }  
});

 $('#new').click(function(){
   $('.new-file-div').removeClass('active-file')
   $('#no-save').attr('data-dismiss', '')
  canvas.renderAll();
  var count_objects=canvas.getObjects().length
  if(count_objects>0){
    $('.create-new').css('display', 'none')
    $('.yes-no').css('display', 'block')
  }
  else{
      $('.yes-no').css('display', 'none')
      $('.create-new').css('display', 'block')
  }
  console.log(canvas.getObjects().length+'  c')

})
$('#no-save').click(function(){
      
      if($('.new-file-div').hasClass('active-file')){
        $('#new-file').attr('type', 'file')
        $(this).attr('data-dismiss', 'modal')
        $('#new-file').trigger('click')
      }
      else{
        $('.yes-no').css('display', 'none')
        $('.create-new').css('display', 'block')
      }
})

$('#yes-save').click(function(){
       $('#saveProject').trigger('click')
       setTimeout(function(){
            $('.yes-no').css('display', 'none')
            $('.create-new').css('display', 'block')
       },1500)
})

$('#new-file').on("input", function (e) {
    var file = e.target.files[0];
    createFormData(file);
})

function createFormData(file) {
    $('#divHabilitSelectors').remove()
    $('.canvas-cont').removeClass('hide')
    $('.bord-dotted').css({'width': 'max-content', 'height':'max-content'})
    $('.canvas-for-name').css({'width': 'max-content', 'height':'max-content'})
     canvas.clear()
     canvas.isDrawingMode = false;
    var reader = new FileReader();

 reader.onloadend = function (event) {
         image = new Image();
         image.src = event.target.result;

   image.onload = function() {
         var imgWidth=image.width
         var imgHeight=image.height
         var data = event.target.result;

         if (imgWidth > imgHeight) {
            if (imgWidth > 460) {
              imgHeight *= 500 / imgWidth;
              imgWidth = 500;
            }
          } 
          else {
            if (imgHeight > 400) {
              imgWidth *= 350 / imgHeight;
              imgHeight = 350;
            }
          }
  fabric.Image.fromURL(data, function (img) {
      var oImg = img.set({ left: 30, top: 30, angle: 00,width: imgWidth, height: imgHeight, id: 'backimage'}).scale(1);
          // oImg.scaleToHeight(imgHeight);
          // oImg.scaleToWidth(imgWidth);
          canvas.add(oImg).renderAll();

      var a = canvas.setActiveObject(oImg);
      var dataURL = canvas.toDataURL({ format: 'png',});
          quality: 0.8});
         canvas.setDimensions({width:imgWidth+60, height:imgHeight+60})
  };
}
reader.readAsDataURL(file); 

}
// --------------------upload image--------------------------------
var image
  // document.getElementById('fileupload').addEventListener("input", function (e) {
$('#fileupload').on("input", function (e) {
    var file = e.target.files[0];
         createFormData(file);
});
$('.new-file-div').click(function(){
  $(this).addClass('active-file')
  canvas.renderAll();
  var count_objects=canvas.getObjects().length
  if(count_objects>0){
    $('#new-file').attr('type', '')
    $(this).attr('data-target', '#newModal')
    $('.create-new').css('display', 'none')
    $('.yes-no').css('display', 'block')
  }
  else{
    $(this).attr('data-target', '')
    $('#new-file').attr('type', 'file')
  }
})


// ------------------add frames----------------------------------------
  var arr=document.getElementsByClassName('aa')
    for(var i=0; i<arr.length; i++){
         arr[i].addEventListener("click", addFrame)
    }

 var frame = new Image();
    var oImg1
 function addFrame(a){
   canvas.isDrawingMode = false;
     var src=this.src
     frame.src = src

  fabric.Image.fromURL(src, function(img, isError) {
     oImg1=img.set({ left: 0, top: 0, id: 'frame'}).scale(1);
    
    oImg1.scaleX=canvas.width / img.width
    oImg1.scaleY=canvas.height / img.height
    canvas.add(oImg1).renderAll();

document.getElementById('hue').addEventListener('input', changeFrameColor)
          
          function changeFrameColor(){
            var color=this.value
            var filter = new fabric.Image.filters.Tint({
                         color: color,
                         mode: 'tint',
                         alpha: 1
                });
                
                img.filters.push(filter);
                img.applyFilters(canvas.renderAll.bind(canvas));
       }    

   });
}

// ---------------------overlay image--------------------------
  var over_img
  document.getElementById('overlay-img').addEventListener("input", function (e) {

       var o_file = e.target.files[0];
       var reader = new FileReader();

   reader.onloadend = function (event) {
           over_img = new Image();
           over_img.src = event.target.result;

     over_img.onload = function() {
      var data = event.target.result;
      var canvasHeight = canvas.height;
      var canvasWidth = canvas.width;
      fabric.Image.fromURL(data, function (img) {
        var oImg = img.set({ left: 20, top: 10, angle: 00});
      canvas.add(oImg).renderAll();
       
    })
     }
   }
 reader.readAsDataURL(o_file);
 
})
// ----------------------layer for selected object-----------------------------------------
      canvas.preserveObjectStacking = true;
      canvas.stopContextMenu = true;
      var selectedObject;
      canvas.on('object:selected', function(event) {
           selectedObject = event.target;
           selectedObject.hasBorders = true;
           selectedObject.set({
                              borderColor: '#133960',
                              cornerColor: '#fad565',
                              cornerSize: 8,
                              cornerStyle: 'circle',
                              borderWidth: 3,
                              lineWidth:5,
                              transparentCorners: false,
          });
           canvas.forEachObject(function (obj) {
       });
           sendSelectedObjectBack()
         });

var sendSelectedObjectBack = function() {
      
        if(selectedObject.id=='backimage'){
              canvas.bringForward(selectedObject);
        }
        if(selectedObject.id=='frame'){
              canvas.bringToFront(selectedObject);
        }
        if(selectedObject.id=='sport' ){
              canvas.bringToFront(selectedObject);
        }
        // if(selectedObject.id=='text' ){
        //       // canvas.sendToBack(selectedObject);
        // }
        if(selectedObject.id=='rect' ){
              canvas.sendToBack(selectedObject);
        }
     canvas.renderAll();
     // sendToBack
     // sendBackwards
     // bringToFront
     // bringForward
}
// -----------------------delete selected object--------------------------

$('html').keyup(function(e){
        if(e.keyCode == 46 ) {
            deleteSelectedObjectsFromCanvas();
        }
});    

function deleteSelectedObjectsFromCanvas(){
       var selection = canvas.getActiveObject();
         canvas.remove(selection);
  
  canvas.discardActiveObject();
}
canvas.on('selection:updated selection:created', function(e){
  console.log(e)
})


$('.canvas-cont').blur(function(){
  console.log('fff')
  canvas.isDrawingMode = false;
})

// ---------------------------background color------------------
$('canvas').click(function(){
  let canvas_id=$(this).parent().find('.lower-canvas').attr('id')
  $('.bord-er').removeClass('activeCanvas')
  $(this).parent().parent().addClass('activeCanvas')
  console.log($(this).parent().parent())
    canvas.selection = true;
  
})
$('.background-color').click(function(){

    var color=$(this).attr('data-color')
    if(canvas.selection) {
        canvas.setBackgroundColor(color)
        canvas.renderAll();
    }
    
})
$('#color-inp').on('input', function(){
    var color=$(this).val()
    console.log(color)
   
  if(canvas.selection) {
      canvas.setBackgroundColor(color)
      canvas.renderAll();
  }
  

})
// ---------------------background image--------------------------
  var back_img
  document.getElementById('background-img').addEventListener("input", function (e) {

       var b_file = e.target.files[0];
       var reader = new FileReader();
      var dd
   reader.onloadend = function (event) {
           back_img = new Image();
           back_img.src = event.target.result;

     back_img.onload = function() {
      var data = event.target.result;
      var canvasHeight = canvas.height;
      var canvasWidth = canvas.width;
      fabric.Image.fromURL(data, function (img) {
        var oImg = img.set({ left: 0, top: 0, angle: 00, scaleX: canvasWidth/back_img.width,
        scaleY: canvasHeight/back_img.height,
        originX: 'left', originY: 'top'});
      canvas.setBackgroundImage(oImg).renderAll();
       
    })
     }
   }
 reader.readAsDataURL(b_file);  
 
})
  $('.delete-background').click(function(){
  
  canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
})

  // --------------------clear canvas-------------------------
  $('#clear').click(function(){
     canvas.clear()
  })
// ---------------download image------------------------------
// var imageSaver = document.getElementById('lnkDownload');
// imageSaver.addEventListener('click', saveImage);

// function saveImage(e) {
//     this.href = canvas.toDataURL({
//         format: 'jpeg',
//         quality: 0.8
//     });
//     this.download = 'canvas.png'
// }


$('#lnkDownload').click(function(e){
     var th=this

     canvas.renderAll();
     var data=new fabric.Image(canvas.lowerCanvasEl);
     console.log(canvas.lowerCanvasEl.width)
     console.log(canvas.width)

     var name=$('#image-name').val()
     var format=''
     $('.format').each(function(){
      if($(this).prop('checked')==true){
         format=$(this).attr('data-format')
      }
     })
     $('.canvas-container').html('<canvas id="new-canvas" class="d-flex flex-column"></canvas>')
     
      var newCanvas = new fabric.Canvas('new-canvas');
      newCanvas.add(data);

      let newImg=newCanvas.toDataURL({ format: 'jpeg', quality: 1})
          th.href = newImg
          th.download = name+'.'+format
        })

// ---------------------add cards---------------------------------------
     
$('#add-sport-card').click(function(e){
  var th=this
  canvas.renderAll();
  var data=canvas.toDataURL()
  // var p=canvas.toDatalessJSON()
  
  // var w=canvas.width
  // p.objects[0].width = w;
  // p.objects[0].height= canvas.height;
  // p.objects[0].scaleX=1
  // p.objects[0].scaleY=1
  var filedata = JSON.stringify(canvas.toDatalessJSON())
//  console.log(filedata+'fffffff')
  var user_id=$('#user_id').val()
  var width=canvas.width
  var height=canvas.height

  if(canvas.getObjects().length>0 ){
         $.ajax({
           type: 'post',
           url: 'card-editor/file.php',
           data: {data, filedata, user_id, width, height},
           success: function(res){
             console.log(res)
               $('.add-card-result').html(res)
               setTimeout(function(){window.location.reload()},1000)
           }
         })
       }
       else{
             $('.add-card-result').html('You do not have opject')
       }
     })

// ----------------save-chenged-card------------------------------
     $('#save-chenged-card').click(function(e){
      var th=this
      canvas.renderAll();
      var data=canvas.toDataURL()
      var filedata = JSON.stringify(canvas.toDatalessJSON())
      var user_id=$('#user_id').val()
      var width=canvas.width
      var height=canvas.height
      var card_id=$(this).attr('data-card-id')
      var tbl_name='card'+$(this).attr('data-tbl')
    
      if(canvas.getObjects().length>0 ){
             $.ajax({
               type: 'post',
               url: 'card-editor/save-chenged-card.php',
               data: {card_id, tbl_name, data, filedata, user_id, width, height},
               success: function(res){
                 console.log(res)
                   $('.add-card-result').html(res)
                   setTimeout(function(){window.location.reload()},1000)
               }
             })
           }
           else{
                 $('.add-card-result').html('You do not have opject')
           }
         })
         
// -------------------save card_templateste----------------------------------------

$('#addTemplate').click(function(){
     var th=this
         canvas.renderAll();
     var user_id=$('#user_id').val()
     var width=canvas.width
     var height=canvas.height
     var img_object
     var text
   canvas.forEachObject(function (obj) {
    console.log(obj)
    var type
    var src=obj.src
        if(typeof(src)!='undefined'){
          var sp_src=src.split(':')
              type=sp_src[0]
        }

        if(obj.id=='backimage' || type=='data'){
           img_object=obj
        }
        
   });
  
  // ----------------------------------
  canvas.remove(img_object)

  var data=canvas.toDataURL()
  var filedata = JSON.stringify(canvas.toDatalessJSON());

     if(canvas.getObjects().length>0 ){
         $.ajax({
              type: 'post',
              url: 'card-editor/card_templates.php',
              data: {filedata, data, user_id, width, height},
              success: function(res){
                console.log(res)
                  $('.json-res').html(res)
                      setTimeout(function(){
                          $('.json-res').html('')
                      },1500)
              }
          })
      }
  })

  
// -----------------json--when click edit button--------------------
let data_card_json=$('.inp-json').attr('data-card-json')

if(typeof data_card_json!=='undefined'){
    let jsonResponseCard = $.getJSON( $('.inp-json').attr('data-card-json') )
    jsonResponseCard.then(function (data) {
        // var new_o=JSON.stringify(data)
        // var object = JSON.parse( new_o)
          canvas.loadFromJSON(data, function(){
            console.log(data.objects[0])
            // data.objects[0].scaleX=1
            // data.objects[0].scaleY=1

          canvas.setDimensions({width:data.objects[0].width+60, height:data.objects[0].height+60})
          // canvas.setDimensions({width:data.objects[0].width, height:data.objects[0].height})

     })
    })
    // jsonResponseCardName.then(function (data) {
        
    // })
         $('#divHabilitSelectors').remove()
         $('.canvas-cont').removeClass('hide')
         $('.bord-dotted').css({'width': 'max-content', 'height':'max-content'})

          canvas.renderAll()
  }
  else{
    console.log(222)
  }
  
// ---------------------------json----Add project----------------

$(".project-div").click(function() {
  canvas.clear()
    
   canvas.isDrawingMode = false;
       
    var project=$(this).attr('data-project')
    var wd=$(this).attr('data-width')
    var hg=$(this).attr('data-height')
console.log(hg)
    var json="card-editor/"+project
    var jsonResponse = $.getJSON( json )

    jsonResponse.then(function (data) {
        var new_o=JSON.stringify(data)
        var object = JSON.parse( new_o)

         canvas.loadFromJSON(new_o, function(){
               canvas.width = wd;
               canvas.height = hg;
         });
    })
    $('#divHabilitSelectors').remove()
    $('.canvas-cont').removeClass('hide')
    $('.bord-dotted').css({'width': 'max-content', 'height':'max-content'})

// console.log(JSON.parse(jsonResponse))
// var object = JSON.parse(jsonResponse)
//     canvas.loadFromJSON(jsonResponse, function(){
//                canvas.width = object.width;
//                canvas.height = object.height;
// });
          canvas.setDimensions({width:wd, height:hg})
          canvas.renderAll()

});

// --------------------test crop---------------------------
let rect;
$('.crop-item').click(function(){
    $('.crop-item').removeClass('active-crop-item')
    $(this).addClass('active-crop-item')

    let c_width=$(this).attr('data-width')*1
    let c_height=$(this).attr('data-height')*1
console.log(c_width)
  rect = new fabric.Rect({
    
    width: c_width,
    height: c_height,
    fill: 'rgb(0,0,0,0.7)'
});
  // rect.scaleToWidth(300);
  canvas.centerObject(rect);
  rect.visible = true;
  canvas.add(rect);
})
$('#bradius').on('input', function(){
   let r=$(this).val()
   $(this).attr('data-radius', r)
   rect.set({
       stroke: '#6ea4ae',
       strokeWidth: 3,
       rx:r,
       ry:r
   })
  canvas.renderAll()
})
$('#crop-image').click(function(){
    canvas.remove(rect); 
let cropWidth=rect.getWidth()
let cropHeight=rect.getHeight()
let cropLeft=rect.left
let cropTop=rect.top
let radius=$('#bradius').attr('data-radius')
console.log(rect.angle+'----ngle')
console.log(rect.width+'----width')

    var cropped = new Image();
       cropped.src = canvas.toDataURL({
        left: cropLeft,
        top: cropTop,
        width: cropWidth,
        height: cropHeight,
    });
        // console.log(cropped)

    cropped.onload = function() {
        canvas.clear();
        let currentImage = new fabric.Image(cropped);
        currentImage.left = 0;
        currentImage.top = 0;
        // currentImage.setCoords();
        canvas.add(currentImage);
        canvas.setDimensions({width: currentImage.width, height: currentImage.height})
        canvas.renderAll();
   }
})


// -------------drag drop-----------------------
$(".input-file-trigger").on('dragenter', function (e){
  e.preventDefault();
  $(this).css('background', '#BBD5B8');
  });

  $(".input-file-trigger").on('dragover', function (e){
  e.preventDefault();
  });

  $(".input-file-trigger").on('drop', function (e){
      $(this).css('background', '#D8F9D3');
      e.preventDefault()
      var file = e.originalEvent.dataTransfer.files[0];
  });


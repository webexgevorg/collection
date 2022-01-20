var canvas = new fabric.Canvas('canvas');
var can =document.getElementById('canvas')
// ------------------create new project (canvas)---------------------

 $('#create-canvas').click(function(){
  canvas.clear()
    $('#divHabilitSelectors').remove()
    $('.canvas-cont').removeClass('hide')
    $('.bord-dotted').css({'width': 'max-content', 'height':'max-content'})

   canvas.isDrawingMode = false;
       
       var width=$('#width').val()
       var height=$('#height').val()
       if (width<=500 && height<=500){
        $('.error-message').addClass('hide')
          canvas.setDimensions({width:width, height:height})
          canvas.renderAll();
       }
       else{
         $('.bord-dotted').css({'height': '85px', 'width': '200px', 'padding': '12px'})
         $('.error-message').removeClass('hide')
         $('.error-message').html('max width: 500px<br> max height: 500px')
       }
  
});

 $('#new').click(function(){
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
      $('.yes-no').css('display', 'none')
      $('.create-new').css('display', 'block')
})

$('#yes-save').click(function(){
       $('#saveProject').trigger('click')
       setTimeout(function(){
            $('.yes-no').css('display', 'none')
            $('.create-new').css('display', 'block')
       },1500)
})

// --------------------upload image--------------------------------
var image
  // document.getElementById('fileupload').addEventListener("input", function (e) {
  $('#fileupload').on("input", function (e) {

       var file = e.target.files[0];
       createFormData(file);
});

 function createFormData(file) {
      $('#divHabilitSelectors').remove()
      $('.canvas-cont').removeClass('hide')
      $('.bord-dotted').css({'width': 'max-content', 'height':'max-content'})

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
              if (imgWidth > 600) {
                imgHeight *= 500 / imgWidth;
                imgWidth = 500;
              }
            } 
            else {
              if (imgHeight > 450) {
                imgWidth *= 350 / imgHeight;
                imgHeight = 350;
              }
            }
    fabric.Image.fromURL(data, function (img) {
        var oImg = img.set({ left: 40, top: 40, angle: 00, id: 'backimage'}).scale(1);
            oImg.scaleToHeight(imgHeight);
            oImg.scaleToWidth(imgWidth);
            canvas.add(oImg).renderAll();

        var a = canvas.setActiveObject(oImg);
        var dataURL = canvas.toDataURL({ format: 'png',});
 quality: 0.8});
           canvas.setDimensions({width:imgWidth+80, height:imgHeight+160})
    };
  }
reader.readAsDataURL(file); 

}
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
// ---------------------add sport icons----------------------------

$('.sport-icon').click(function(){
  var icon=$(this).attr('src')
  console.log(icon)
  fabric.loadSVGFromURL(icon, function(objects, options) {
    var shape = fabric.util.groupSVGElements(objects, options);
    shape.set({
      left: 20,
      top: 100,
    }).scale(0.2);

    $('#color-sport-icon').on('input', function(){
      var colorSet=$(this).val()
      console.log(colorSet)
      if (shape.isSameColor && shape.isSameColor() || !shape.paths) {
          shape.setFill(colorSet);
      }
      else if (shape.paths) {
           for (var i = 0; i < shape.paths.length; i++) {
                 shape.paths[i].setFill(colorSet);
            }
      }
    canvas.add(shape);
    canvas.renderAll();
    })
    canvas.add(shape);
    canvas.renderAll();
  }); 
});

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
              canvas.sendToBack(selectedObject);
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
        if(e.keyCode == 46 || e.keyCode==8) {
          console.log('dd')
            deleteSelectedObjectsFromCanvas();
        }
});    

function deleteSelectedObjectsFromCanvas(){
    var selection = canvas.getActiveObject();
    if (selection.type === 'activeSelection') {
        selection.forEachObject(function(element) {
            console.log(element);
            canvas.remove(element);
        });
    }
    else{
        canvas.remove(selection);
    }
    canvas.discardActiveObject();
    // canvas.RenderAll();
}

canvas.on('selection:updated selection:created', function(e){
  console.log(e)
})

// ----------------draw ---------------------------------
$('.draw').click(function(){
  var color=$('#draw-color').val()
  var size=$('.active-size').attr('data-size')
  var draw_type=$('#draw-type').val()
  console.log(size)

  canvas.isDrawingMode = true;
  if(draw_type=='Spray'){
         canvas.freeDrawingBrush = new fabric.SprayBrush(canvas);
  }
  if(draw_type=='Pencil'){
         canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
  }
  if(draw_type=='Pencil'){
         canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
  }
  if(draw_type=='Circle'){
         canvas.freeDrawingBrush = new fabric.CircleBrush(canvas);
  }
  if(draw_type=='Pattern'){
         canvas.freeDrawingBrush = new fabric.PatternBrush(canvas);
  }
  canvas.freeDrawingBrush.width = size;
  canvas.freeDrawingBrush.color = color;

canvas.on('path:created', function(e) {
  e.path.set();
  canvas.sendBackwards(e.path);
  canvas.renderAll();
})

})
$('.arrow').click(function(){
  console.log('oooo')
  $('.draw').off()
})
// $('canvas').on('mousedown', function(e){
//   console.log('ddd')
//   if($('.draw').hasClass('active')){
//     // canvas.isDrawingMode = true;
//      $(".draw").trigger('click')
//   }
// })

$('.canvas-cont').blur(function(){
  console.log('fff')
  canvas.isDrawingMode = false;
})
$('#draw-color').blur(function(){
  console.log('ccc')
})
$('#draw-color').change(function(){
  $(".draw").trigger('click')
})
$('.draw-size').click(function(){
   $('.draw-size').removeClass('active-size')
   $(this).addClass('active-size')
  $(".draw").trigger('click')
})
$('#draw-type').change(function(){
  $(".draw").trigger('click')
})
// -------------------------shapes-------------------------------------
var myPoly
$('.shapes').click(function(){
  var sh_name=$(this).attr('name')
  var point=$(this).attr('data-angle')

var points=regularPolygonPoints(point,50);
var top=canvas.height*2/3
function regularPolygonPoints(sideCount,radius){
  var sweep=Math.PI*2/sideCount;
  var cx=radius;
  var cy=radius;
  var points=[];
  for(var i=0;i<sideCount;i++){
    var x=cx+radius*Math.cos(i*sweep);
    var y=cy+radius*Math.sin(i*sweep);
    points.push({x:x,y:y});
  }
  return(points);
}

if(sh_name=='elipse'){
       myPoly = new fabric.Ellipse({
        top: top,
        left: 60,
       /* Try same values rx, ry => circle */
        rx: 75,
        ry: 50,
        fill: 'blue',
        // stroke: 'blue',
        strokeWidth: 4
    });
}
else if(sh_name=='rectangle'){
     myPoly = new fabric.Rect({
    top: top,
    left: 60,
    width: 75,
    height: 100,
    fill: 'blue',
    strokeWidth: 2
});
}
else{
     myPoly = new fabric.Polygon(points, {
        left: 60,
        top: top,
        fill: 'blue',
      },false);
}
canvas.add(myPoly);
// rec.sendBackwards()
canvas.sendToBack(myPoly);
canvas.renderAll();
})
$('.shape-color').click(function(){
    var color=$(this).attr('data-color')

    myPoly.setFill(color)
    canvas.renderAll();
})
$('#shape-color-inp').on('input', function(){
    var color=$(this).val()
    myPoly.setFill(color)
    canvas.renderAll();
})
// ---------------------------text boxes------------------------------
var arr_boxes=document.getElementsByClassName('text-box')
    for(var i=0; i<arr_boxes.length; i++){
         arr_boxes[i].addEventListener("click", addTextBox)
    }

 var textBox = new Image();
    var oImg2
 function addTextBox(a){
   canvas.isDrawingMode = false;
  
     var src=this.src
     textBox.src = src

  fabric.Image.fromURL(src, function(img, isError) {
     oImg2=img.set({ left: 30, top: canvas.height*2/3}).scale(0.3);
    
    // oImg2.scaleX=canvas.width / img.width
    // oImg2.scaleY=canvas.height / img.height
    canvas.add(oImg2).renderAll();
    canvas.sendToBack(oImg2);
    
  })
}
// -----------------------------add text-------------------------------
$('#fill').on('input', function(){
  var obj = canvas.getActiveObject();

  if(obj){
    obj.set("fill", this.value);
  }
  canvas.renderAll();
});

$('#font').change(function(){
  var obj = canvas.getActiveObject();
  
  if(obj){
    obj.set("fontFamily", this.value);
  }
  
  canvas.renderAll();
});
$('#font-size').change(function(){
  var obj = canvas.getActiveObject();
  
  if(obj){
    obj.set("fontSize", this.value);
  }
  
  canvas.renderAll();
});
$('#bold').click(function(){
    var obj = canvas.getActiveObject();
    $(this).toggleClass('bold-active')
    if(obj){
        if($('#bold').hasClass('bold-active')){
      obj.set("fontWeight", 'bold');
      }
      else{
        obj.set("fontWeight", 'normal');
      }
    }
    canvas.renderAll();
});
$('#italic').click(function(){
    var obj = canvas.getActiveObject();
    $(this).toggleClass('italic-active')
    if(obj){
        if($('#italic').hasClass('italic-active')){
          obj.set("fontStyle", 'italic');
        }
        else{
          obj.set("fontStyle", 'normal');
        }
    }
    canvas.renderAll();
});
$('#underline').click(function(){
    var obj = canvas.getActiveObject();
    $(this).toggleClass('u-active')
    if(obj){
       if($('#underline').hasClass('u-active')){
      obj.set("textDecoration", 'underline');
      }
      else{
        obj.set("textDecoration", 'normal');
      }
    }
    canvas.renderAll();
});

$('#text').click(function(){
   canvas.isDrawingMode = false;
   var bold
   var italic
   var underline
   if($('#bold').hasClass('bold-active')){
      bold=$('#bold').attr('id')
   }
   else{
      bold='normal'
   }
   if($('#italic').hasClass('italic-active')){
      italic=$('#italic').attr('id')
   }
   else{
      italic='normal'
   }
   if($('#underline').hasClass('u-active')){
      underline=$('#underline').attr('id')
   }
   else{
     underline='normal'
   }
   var font_size=$('#font-size').val()
   var color=$('#fill').val()
   var font=$('#font').val()

var oText = new fabric.IText('Tap and Type', { 
    left: 50, 
    top: canvas.height-100,
    id: 'text',
    fill: color,
    fontSize: font_size,
    fontFamily: font,
    fontWeight: bold,
    fontStyle: italic,
    textDecoration: underline
  });

  canvas.add(oText);
  oText.bringToFront();
  canvas.setActiveObject(oText);
})
// ---------------------------background color------------------
$('.background-color').click(function(){
    var color=$(this).attr('data-color')

    canvas.setBackgroundColor(color)
    canvas.renderAll();
})
$('#color-inp').on('input', function(){
    var color=$(this).val()
console.log(color)
    canvas.setBackgroundColor(color)
    canvas.renderAll();
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
     var data=canvas.toDataURL()
     console.log(canvas.width)
     var name=$('#image-name').val()
     var format=''
     $('.format').each(function(){
      if($(this).prop('checked')==true){
         format=$(this).attr('data-format')
      }
     })

     th.href = canvas.toDataURL({
                     width: canvas.lowerCanvasEl.width-canvas.width/2.23,
                     height: canvas.lowerCanvasEl.height-canvas.height/2.23,
                     format: 'jpeg',
                     quality: 1
              });
     
     th.download = name+'.'+format
        })

// ---------------------add cards---------------------------------------
     
$('#add-sport-card').click(function(e){
     var th=this

     canvas.renderAll();
     // var data=canvas.toDataURL({
     //                 width: canvas.lowerCanvasEl.width-canvas.width/2.23,
     //                 height: canvas.lowerCanvasEl.height-canvas.height/2.23})
     var data=canvas.toDataURL()
     // var name=$('#image-name').val()
     // var format=''
     // $('.format').each(function(){
     //  if($(this).prop('checked')==true){
     //     format=$(this).attr('data-format')
     //  }
     // })

     // th.href = canvas.toDataURL({
     //                 format: 'jpeg',
     //                 quality: 0.8
     //          });
     // th.download = name+'.'+format
     console.log(data)
     if(canvas.getObjects().length>0){
            $.ajax({
              type: 'post',
              url: 'card-editor/file.php',
              data: {data: data},
              beforeSend:function(){
                      $('.add-card-result').html('Аdded...');
              },
              success: function(res){
                console.log(res)
                  $('.add-card-result').html(res)
                    // var a = document.createElement('a');
                    // a.href ='card-editor/'+ res;
                    // a.download = name;
                    // document.body.appendChild(a);
                    // a.click();
                    // document.body.removeChild(a);
              }
            })
          }
          else{
                $('.add-card-result').html('You do not have opject')
          }
        })
// -------------------save project----------------------------------------

$('#saveProject').click(function(){
     var filedata = JSON.stringify(canvas.toDatalessJSON()); 
     var th=this
         canvas.renderAll();
     // var data=canvas.toDataURL({
     //                 width: canvas.lowerCanvasEl.width-canvas.width/2.23,
     //                 height: canvas.lowerCanvasEl.height-canvas.height/2.23})
     var data=canvas.toDataURL()
     var u_id=$('#user_id').val()
     var w=canvas.width
     var h=canvas.height
   
     if(canvas.getObjects().length>0){
         $.ajax({
              type: 'post',
              url: 'card-editor/projects_json.php',
              data: {myjson: filedata, data: data, user_id: u_id, width: w, height: h},
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
      createFormData(file);
  });


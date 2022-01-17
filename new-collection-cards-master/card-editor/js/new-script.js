var canvasForName = new fabric.Canvas('canvasForName');
// var can =document.getElementById('canvas')
// ------------------create new project (canvas)---------------------


// ------------------add frames----------------------------------------
  var arr=document.getElementsByClassName('aa')
    for(var i=0; i<arr.length; i++){
         arr[i].addEventListener("click", addFrame)
    }

 var frame = new Image();
    var oImg1
 function addFrame(a){
    canvasForName.isDrawingMode = false;
  
     var src=this.src
     frame.src = src

  fabric.Image.fromURL(src, function(img, isError) {
     oImg1=img.set({ left: 0, top: 0, id: 'frame'}).scale(1);
    
    oImg1.scaleX=canvasForName.width / img.width
    oImg1.scaleY=canvasForName.height / img.height
    canvasForName.add(oImg1).renderAll();

document.getElementById('hue').addEventListener('input', changeFrameColor)
          
          function changeFrameColor(){
            var color=this.value
            var filter = new fabric.Image.filters.Tint({
                         color: color,
                         mode: 'tint',
                         alpha: 1
                });
                
                img.filters.push(filter);
                img.applyFilters(canvasForName.renderAll.bind(canvasForName));
       }    

   });
}



// ----------------draw ---------------------------------
$('.draw').click(function(){
    var color=$('#draw-color').val()
    var size=$('.active-size').attr('data-size')
    var draw_type=$('#draw-type').val()
    console.log(canvasForName.width+'----width')
  
    // canvas.isDrawingMode = true;
    canvasForName.isDrawingMode = true;
    if(draw_type=='Spray'){
          //  canvas.freeDrawingBrush = new fabric.SprayBrush(canvas);
      canvasForName.freeDrawingBrush = new fabric.SprayBrush(canvasForName);
  
    }
    if(draw_type=='Pencil'){
          //  canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
      canvasForName.freeDrawingBrush = new fabric.PencilBrush(canvasForName);
  
    }
    // if(draw_type=='Pencil'){
    //   canvasForName.freeDrawingBrush = new fabric.PencilBrush(canvasForName);
    // }
    if(draw_type=='Circle'){
          //  canvas.freeDrawingBrush = new fabric.CircleBrush(canvas);
           canvasForName.freeDrawingBrush = new fabric.CircleBrush(canvasForName);
    }
    if(draw_type=='Pattern'){
          //  canvas.freeDrawingBrush = new fabric.PatternBrush(canvas);
           canvasForName.freeDrawingBrush = new fabric.PatternBrush(canvasForName);
    }
    // canvas.freeDrawingBrush.width = size;
    // canvas.freeDrawingBrush.color = color;
    canvasForName.freeDrawingBrush.width = size;
    canvasForName.freeDrawingBrush.color = color;
  
  // canvas.on('path:created', function(e) {
  //   e.path.set();
  //   canvas.sendBackwards(e.path);
  //   canvas.renderAll();
  // })
  
  canvasForName.on('path:created', function(e) {
    e.path.set();
    // canvasForName.sendBackwards(e.path);
    canvasForName.renderAll();
  })
  
  })
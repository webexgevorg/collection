$('#Add_About').on('click',function(){
var title = $('#title').val()
var discription = $('#discription').val()
var id = $('#id').val()
alert(id)

    $.ajax({
    type:'POST',
    url:'check_aboutus.php',
    data: { title: title,
                    discription: discription,
                    id:id
            },
            success:function(result){
            console.log(result)
            }
           
    })

   
})
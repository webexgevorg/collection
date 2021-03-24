// -------------------add_folder---------------------
          $('.add_folder').click(function(){
            let folder_position=$(this).attr('data-position')
             $('#add_folder').find('.folder-position').val(folder_position)

          })
// ----------------inner modal add_folder------------------------
          $('#addFolder').click(function(event){
            let n=$('.f-name').val()
            let d=$('.f-description').val()
            let f=$('.f-file').val()

            if(d=='' || n=='' || f==''){
              event.preventDefault()
              $('.message-folder').html('Fill all filds')
            }
            else{
              $(this).attr('type', 'submit')
            }
          })
// -------------------add-card----------------------
$('.add-card').click(function(){
  let name=$(this).attr('data-name')
  $('#add_card').find('.card-name').val(name)
})


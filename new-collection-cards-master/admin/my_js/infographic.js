    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search ",
                
            }

        });




        var table = $('#datatables').DataTable();

        // ------change color---------------------
        	table.on('change', '.co_lor', function() {
                var color=$(this).val()
                var s_type=$(this).parent().parent().find('.c_set_type').html()
                var par=$(this).parent().parent().find('.c_parallel').html()
                // $('.page-item ').each(function(){
                //      if($('this').hasClass('active')){
                // var active_page=$('this').html()
                //  console.log('ok')
                // console.log(active_page)

                // }
                // })
               var ttt=$('.paginate_button .page-item .active > a').html()
                console.log(ttt)
                 $.ajax({
                    type: "post",
                    url: "save_changed_infographic.php",
                    data: {p_color: color, set_type: s_type, parallel: par },
                    success: function(){
                        location.reload()
                    }
                })

            })

            // -------------show textures----------------------------
            table.on('click', '.show', function() {
             	$('input[type="hidden"]').val('')
                var s_type=$(this).parent().parent().find('.c_set_type').html()
                var par=$(this).parent().parent().find('.c_parallel').html()
                console.log(s_type)
                var name=s_type+'@'+par
                $('input[type="hidden"]').val(name)

                
            })

            $('.texture_img').click(function(){
            	
            	$('.texture_img').each(function(){
            		$(this).css('border', '1px solid #ddd')
            		$(this).removeClass('selected')

            	})
            	$(this).addClass('selected')
            	$(this).css('border', '2px solid #133960')
            	$("input[type='file']").prop('disabled', true)
            	$("input[type='file']").val('')
            	$('.save').val('Save choosen image')
            })

            $("input[type='file']").click(function(){
            	$('.texture_img').each(function(){
            		$(this).css('border', '1px solid #ddd')
            		$(this).removeClass('selected')
            	})
            	$('.save').val('Save choosen file')
            	// $('.form').attr('id','texture_upload_form')

            })
            // --------------------save chosen texture--------------
            $('#texture_upload_form').on('submit', function(event){
            	event.preventDefault();
            	console.log($(this))
            	var n=$('input[type="hidden"]').val()
            	var submit_val=$(this).val()
            	if($("input[type='file']").val()!="" || $('.texture_img').hasClass('selected')){
            	if($("input[type='file']").val()==""){

            	$('.texture_img').each(function(){
            		if($(this).hasClass('selected')){
            			var arr=n.split('@')
            	         var s_type=arr[0]
            	         var par=arr[1]
            			var texture=$(this).attr('name')
            			console.log('if-'+texture)

            			$.ajax({
                                type: "post",
                                url: "save_texture.php",
                                data: {p_texture: texture, set_type: s_type, parallel: par, import: submit_val},
                                success: function(ard){
                               $('.message_texture').html(ard)
                               setTimeout(function (){
                                     location.reload()
                               },1000)
                                  
                                }
                          })
            		}
            	})
            }
            		else{
            			console.log('else')

                         $.ajax({
                             url:"save_texture.php",
                             method:"POST",
                             data:new FormData(this),
                             contentType:false,
                             cache:false,
                             processData:false,
                             success:function(data){
                               $('.message_texture').html(data)
                               setTimeout(function (){
                                     location.reload()
                               },1000)
                             }
                        })
            		}
            	}
            	else{
            		$('.message_texture').append("<p class='text-danger'>Chossen file</p>")
            	}
            	

            })
        
    });
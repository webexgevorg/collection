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
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.a_edit', function(event) {
            event.preventDefault();
                
                if($(this).hasClass('edit')){
                     
                    $(this).parent().parent().find('td').not($(this).parent()).not(':first').attr("contenteditable","true")
                    $(this).parent().parent().find('td').not($(this).parent()).not(':first').css("border","1px solid #133690")
                    
                }
                else if($(this).hasClass('save')){
                    
                     $(this).parent().parent().find('td').attr("contenteditable","false")
                     $(this).parent().parent().find('td').css("border","none")
                     var t=$(this).parent().parent()
                                          var s_id=$(this).attr('name')
                                          var s_type=t.find('.sport_type').html()
                                         
                                     console.log(s_type)
                                          $.ajax({
                                             type: "post",
                                             url: "save_changed_sport_type.php",
                                             data: {sport_id: s_id, sport_type: s_type },
                                             success: function(){
                                                 location.reload()
                                             }
                                            })
                }
                // else{}

                 $(this).toggleClass('edit').toggleClass("save");
                    $(this).find('i').toggleClass('fa-save').toggleClass('fa-edit')
            
        });

         // Delete a record
        table.on('click', '.remove', function(e) {
            e.preventDefault();
            var s_id = $(this).attr('data_name');
         
            $.ajax({
                    type: "post",
                    url: "save_changed_sport_type.php",
                    data: {remove_id: s_id },
                    success: function(){
                        location.reload()
                    }
                })
            
        });
    
    });
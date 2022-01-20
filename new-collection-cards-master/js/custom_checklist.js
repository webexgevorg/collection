    $(document).ready(function() {
        $('#bootstrap-table-2').DataTable({
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


        var table = $('#bootstrap-table-2').DataTable();

        // Edit record
        table.on('click', '.a_edit', function(event) {
            event.preventDefault();
                
                if($(this).hasClass('edit')){
                     // $("#sortable").sortable('destroy');
                    console.log('eeeeedit')
                    $(this).parent().parent().find('td').not($(this).parent()).not(':first').attr("contenteditable","true")
                    $(this).parent().parent().find('td').not($(this).parent()).not(':first').css("border","1px solid #133690")
                    
                }
                else if($(this).hasClass('save')){
                    // $("#sortable").sortable();
                    console.log('sssssssave')
                     $(this).parent().parent().find('td').attr("contenteditable","false")
                     $(this).parent().parent().find('td').css("border","none")
                     var t=$(this).parent().parent()
                                          var c_id=$(this).attr('name')
                                          var c_number=t.find('.c_number').html() 
                                          var c_name=t.find('.c_name').html()       
                                          var c_team=t.find('.c_team').html()
                                          var c_set_type=t.find('.c_set_type').html()
                                          var c_parallel=t.find('.c_parallel').html()
                                          var c_print_run=t.find('.c_print_run').html()
                                     
                                          $.ajax({
                                             type: "post",
                                             url: "save_changed_base_checklist.php",
                                             data: {card_id: c_id, card_number: c_number, card_name: c_name, team: c_team, set_type: c_set_type, 
                                              parallel: c_parallel, print_run: c_print_run },
                                             success: function(){
                                                //  location.reload()
                                                 var table = $('#bootstrap-table-2').DataTable();
                                                 var tr = $('#bootstrap-table-2 tbody tr:eq(0)');
 
                                                 tr.find('td:eq(0)').html( 'Updated' );
                                                 table
                                             .rows( tr )
                                             .invalidate()
                                             .draw();
                                             }
                                            })



                }
                // else{}

                 $(this).toggleClass('edit').toggleClass("save");
                    $(this).find('i').toggleClass('fa-save').toggleClass('fa-edit')
            
        });

        // ---------copy row--------------------
        var array=[]
        table.on('click', '.copy', function(e) {
            e.preventDefault();
              var t=$(this).parent().parent()
                var rel_id=t.attr('name')

                  var c_id=$(this).attr('name')
                  var c_number=t.find('.c_number').html() 
                  var c_name=t.find('.c_name').html()       
                  var c_team=t.find('.c_team').html()
                  var c_set_type=t.find('.c_set_type').html()
                  var c_parallel=t.find('.c_parallel').html()
                  var c_print_run=t.find('.c_print_run').html()
                  var actions=$(this).parent().html()
                  var max_id=$(this).attr('data-id')*1+1
                  var index=t.index();


    var index_sort=index*1+2
    var newRow = '<tr name="'+rel_id+'" role="row" class="even ui-sortable-handle">'+
        '<td class="first_td sorting_1" tabindex="0">'+index_sort+'<input type="hidden" value="'+max_id+'"></td>' +
        '<td class="c_number">'+c_number+'</td>'+
        '<td class="c_name">'+c_name+'</td>'+
        '<td class="c_team">'+c_team+'</td>'+
        '<td class="c_set_type">'+c_set_type+'</td>'+
        '<td class="c_parallel">'+c_parallel+'</td>' +
        '<td class="c_print_run">'+c_print_run+'</td>'+
        '<td>'+actions+'</td>'+
        '</tr>';
   
    // dataTable.fnDestroy();
    $("#bootstrap-table-2 tbody tr").eq(index).after(newRow);   
var c=0
$("#bootstrap-table-2 tbody tr").each(function(){
  c++
  $(this).find('input').val()
  $(this).find('.copy').attr('data-id', max_id)

array.push($(this).find('input').val())


})
        console.log(array)
    
    // initDataTable();
    // attachClickHandler();
    // newRow.find('.copy').attr('name', c_id+1)
    console.log('iiined----'+index)

                   $.ajax({
                          type: "post",
                          url: "copy_row_base_checklist.php",
                          data: {realese_id: rel_id, card_id: c_id, card_number: c_number, card_name: c_name, team: c_team, set_type: c_set_type,
                                 parallel: c_parallel, print_run: c_print_run, sort_id: index_sort, arr: array},
                          success: function(){
                             // location.reload()
                              var table = $('#bootstrap-table-2').DataTable();
                                                 
                                                 table
                                             .rows( tr )
                                             .invalidate()
                                             .draw();
                          }
                        })
           

          })

        // Delete a record
        table.on('click', '.remove', function(e) {
            e.preventDefault();
            var r_id = $(this).attr('data_name');
            console.log(r_id)
            $.ajax({
                    type: "post",
                    url: "save_changed_base_checklist.php",
                    data: {remove_id: r_id },
                    success: function(){
                        location.reload()
                    }
                })
            
        });


        // -----------------------sort------------
      //  var arr=[]
      //  $("#sortable").sortable({
      //       axis: 'y',
      //       update: function(event, ui) {
      //     var index = ui.item.index();
    
      //     $("input[type='hidden']").each(function(){
      //         arr.push($(this).val())
      //     })
   
      //                   $.ajax({
      //                            type: "post",
      //                            url: "save_changed_base_checklist.php",
      //                            data: {array: arr ,index1: index },
      //                            success: function(ard){
      //                                location.reload()
      //                            }
      //                           })
    
      //  }
      // })



       // --------------------------------------
//        var dataTable;
// var options = {
//     bSort: false,
//     bPaginate: false
// };

// function initDataTable() {
//   dataTable = $('#datatables').dataTable(options);
// }
// table.on('click', '.ins', function(event) {
//   event.preventDefault();

// })
// function attachClickHandler() {
//     $("#datatables tbody tr").click(function(event) {
//         var index=$(this).index();
//         console.log('index--'+index)
//         $("#insert").text('insert a row below the row you just clicked ('+index+')').attr('index',index).show();
//     });
// }

// $(".ins").click(function() {
//   if($(this).html()=='insert'){

        
//       }
// });

// initDataTable();
// attachClickHandler();
    });
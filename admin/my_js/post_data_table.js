$(function(){

    let search=$('#datatables_filter').find('input')
    let tblName=$('#datatables').attr('data-tblname')
     $('#datatables_info').remove()
     $('#datatables_length').remove()
     $('#datatables_paginate').parent().removeClass('col-md-7')
     $('.pagination').addClass('w-100 justify-content-center')
     let limit=10
     let obj=filds_search()
     let search_all=search.val()
     let='';
     if(tblName=='base_checklist'){
        url='../base_checklist/post_base_checklist.php';
     }
     else{
        url='../post_data_table.php';
     }
     $.ajax({
         'method': 'post',
         'url': url,
         'data': {obj, limit, tblName, search_all},
         success:function(res){
             let result=JSON.parse(res)
             $('#tbody').html(result.tbody)
             $('.pagination').html(result.pagination)
             $('#datatables_paginate').parent().removeClass('col-md-7')
             $('.pagination').addClass('w-100 justify-content-center')
         }
     })
     $('body').on('click', '.pg-link', function(event){
         event.preventDefault()
         let limit=10;
         let page=$(this).attr('data-value')*1
         let search_all=search.val()

         $('.pg-link').removeClass('active-link')
         $(this).addClass('active-link')
         $.ajax({
             'method': 'post',
             'url': url,
             'data': {obj, page, limit, tblName, search_all},
             success:function(res){
                 let result=JSON.parse(res)
                 $('#tbody').html(result.tbody)
                 $('.pagination').html(result.pagination)
                 $('#datatables_paginate').parent().removeClass('col-md-7')
                 $('.pagination').addClass('w-100 justify-content-center')
             }
         })
     })

     function filds_search(){
         let obj={}
         $('.th').each(function(){
             let name=$(this).attr('data-name')
             obj[name]=''
         })
         return obj
     }
     search.on('input', function(){
         let search_all=search.val()
         let limit=10
         $.ajax({
             'method': 'post',
             'url': url,
             'data': {obj, limit, search_all, tblName},
             success:function(res){
                //  console.log(res)
                 let result=JSON.parse(res)
                 $('#tbody').html(result.tbody)
                 $('.pagination').html(result.pagination)
                 $('#datatables_paginate').parent().removeClass('col-md-7')
                 $('.pagination').addClass('w-100 justify-content-center')
             }
         })
     })
 })
$('body').on('click', '.pg-link', function(event){
    event.preventDefault()
    let limit=10;
    let page=$(this).attr('data-value')*1
    let count_rows=$('#num-rows').attr('data-rows')
    let coll_id=$('#favorite').attr('data-collId')
    let checklist_name=$('#favorite').attr('data-checklistType')
    let search_all=$('.all-search').val()

    let obj=inputs_search()
    $('.pg-link').removeClass('active-link')
    $(this).addClass('active-link')
    $.ajax({
        'method': 'post',
        'url': 'post_check_list.php',
        'data': {obj, page, limit, coll_id, checklist_name, search_all},
        success:function(res){
            let result=JSON.parse(res)
            $('#tbody').html(result.tbody)
            $('.pagination').html(result.pagination)
            checkboxes()
        }
    })
 })

 function inputs_search(){
     let arr=[]
     let obj={}
         console.log('lll')
     $('.inpt2').each(function(){
         let name=$(this).attr('name')
         let value=$(this).val()
         let page=$('.active-link').html()
         let limit=10
         
         obj[name]=value
     })
     return obj
 }
 $('.inpt2').on('input', function(){
    
    $('.all-search').val('')
     let obj=inputs_search()
     let limit=10
     let coll_id=$('#favorite').attr('data-collId')
    let checklist_name=$('#favorite').attr('data-checklistType')
console.log(checklist_name)
     $.ajax({
        'method': 'post',
        'url': 'post_check_list.php',
        'data': {obj, limit, coll_id, checklist_name},
        success:function(res){
            let result=JSON.parse(res)
            $('#tbody').html(result.tbody)
            $('.pagination').html(result.pagination)
            checkboxes()
        }
    })
 })


 $('.add-cards-personal-checklist').click(function(){
     let personal_chl_id=$('#select_name_checklist option:selected').val()
         let check_cards=[]
         let sport_type=$('#sport-type').val()
         $('.check-card').each(function(){
             let row_id=$(this).parent().parent().find('.row-id').val()
             if($(this).prop('checked')){
                 check_cards.push(row_id)
             }
         })
         console.log(check_cards)
         $.ajax({
             'method': 'post',
             'url': 'post_add_cards.php',
             'data': {personal_chl_id, check_cards, sport_type},
                 beforeSend: function() { 
                     $('.res-added-cards').html('In processing . . .')
                 },
                 success: function(res){
                 $('.res-added-cards').html(res)
             }
         })
     
 })

//  ------- all search -----------------
$('.all-search').on('input', function(){
    $('.inpt2').val('')
    let search_all=$(this).val()
    let obj=inputs_search()
    let limit=10
    let coll_id=$('#favorite').attr('data-collId')
    let checklist_name=$('#favorite').attr('data-checklistType')
console.log(coll_id)
    $.ajax({
       'method': 'post',
       'url': 'post_check_list.php',
       'data': {obj, limit, search_all, coll_id, checklist_name},
       success:function(res){
           
           let result=JSON.parse(res)
           $('#tbody').html(result.tbody)
           $('.pagination').html(result.pagination)
           checkboxes()
       }
   })
})
$('.select_column_name').prop('checked', true)
function checkboxes(){
    $('.select_column_name').each(function(){
        let name=$(this).attr('data-name')
        if(!$(this).prop('checked')){
            $('.'+name).addClass('d-none')
        }
         else{
            $('.'+name).removeClass('d-none')
        }
    })
}
$('.select_column_name').on('change', function(){
    checkboxes()
})
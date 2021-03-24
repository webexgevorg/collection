$('.folder').click(function(){
    let folders_id_array=[]
    let coll_id=$(this).parent().parent().attr('data-coll-id')
    let tbl_name=$(this).parent().parent().attr('data-tblname');
	$(this).parent().toggleClass('active-folder')
	$('.folder').each(function(){
       $(this).parent().hasClass('active-folder') ? folders_id_array.push($(this).attr('data-folder-id')) : null
	})
	console.log(folders_id_array)
	    $.ajax({
		        method: 'post',
		        url: 'select-cards-folders.php',
		        data: {folders_id_array: folders_id_array, coll_id: coll_id, tbl_name: tbl_name},
		        success: function(res){
                   location.reload()
                   console.log(res)
		        }
	    })
})

$('.sign-in').on('click', function(){
	
    let coll_id=$(this).parent().parent().attr('data-coll-id')
    let folder_id=$(this).parent().find('.folder').attr('data-folder-id')
    let data_folder=$(this).attr('data-folder')
	    $.ajax({
		        method: 'post',
		        url: 'folder.php',
		        data: {folder_id: folder_id, data_folder: data_folder},
		        success: function(res){
		        	if(res!==0){
	                   location.href = 'user-'+res+'.php';
  		        	}
  		        	else{
	                   location.href = 'user-collections.php';
  		        	}
		        }
	    })
})

$('.all-cards').click(function(){
	let all_cards='all_cards'
	console.log(all_cards)
	$.ajax({
		        method: 'post',
		        url: 'folder.php',
		        data: {all_cards: all_cards},
		        success: function(res){
		        	// location.reload()
		        	console.log(res)
		        }
	    })

})
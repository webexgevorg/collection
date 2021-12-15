   
  let d=new Date();
  let n=d.getFullYear();
  year.innerHTML='2005-'+n;
$(document).ready(function(){

  $('.nav_dr_item').click(function(event){
  	event.preventDefault()
  	var prod=$(this).attr('name');
  	var year=$(this).html()
    var s_type=$(this).parent().parent().parent().find('.s_type').text()
  	console.log(s_type)

	$.ajax({
		type: 'post',
		url: 'post_navbar_products.php',
		data: {product: prod, year_prod: year, sport_type: s_type},
		success: function(ar){
	       $("#nav").html(ar)
		}
	})
  	// $.ajax({
  	// 	type: 'post',
  	// 	url: 'navbar_products.php',
  	// 	data: {product: prod, year_prod: year, sport_type: s_type},
  	// 	success: function(ar){
    //     $("#nav").html(ar)
  	// 	}
  	// })
  })

  })
  
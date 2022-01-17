$('#personal_register').click(function(){

	
	var yearofreleases=$('#a1').val()
	var producer=$('#a2').val()
	var nameofcollection=$('#a3').val()
	var cardnumber=$('#a4').val()
	var cardname=$('#a5').val()
    var team=$('#a6').val()
    var sporttype=$('#a7').val()
    var settype=$('#a8').val()
    var parallel =$('#a9').val()
    var printrun=$('#a10').val()
    var title1=$('#a11').val()
    var title2=$('#a12').val()
    var title3=$('#a13').val()
   
	if(yearofreleases==''||producer==''|| nameofcollection==''||cardnumber==''||cardname==''||team==""|| sporttype=="" || settype=='' || parallel=="" || printrun==""){
	    $('#ard').html("Fill all the fields")
	}else{
    	$.post(
    				"check_personal_checklist.php",
    				{yearofreleases:yearofreleases,producer:producer,nameofcollection:nameofcollection,cardnumber:cardnumber,cardname:cardname,team:team,sporttype:sporttype,settype:settype,parallel:parallel,printrun:printrun,title1:title1,title2:title2,title3:title3},
    				function(rezult){
    				    if(rezult==1){
    				        $('#ard').html("You are successfully enterd dates")
    				       
    				    
    				    }	
    				}	
    					
    		)
    	}
})
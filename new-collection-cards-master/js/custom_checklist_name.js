$('#tinp3').on('input',function(){
    $k1=$('#tinp2').val()
    $k2=$('#tinp3').val()
    $k3=$('#tinp4').val()
    $k4=$('#tinp5').val()
    $k5=$('#tinp6').val()
    // alert($k1+$k2+ $k3+$k4+$k5)
    $('input').val('')

    $.ajax({
        type: 'POST',
        url: "custom_checklist_name_admin.php",
        data:{z1: $k1,z2:$k2,z3:$k3,z4:$k4,z5:$k5},
        success:function(rezult) {
            window.location.href="custom_checklist_name_new.php";
            // let z=rezult.split("*")
            // $('#filter_table').html(z[0])
            // $("#plag").html(z[1])


        }
        // afterSend:function (){
        //
        // }
    })
})

// $('body').on('click', '.a', function(event){
//     event.preventDefault()
//     console.log("aaaaaaaaaaaa")
//
//     let filter_page_id=$(this).attr('data-id')
//     $k1=$('#tinp2').val()
//     $k2=$('#tinp3').val()
//     $k3=$('#tinp4').val()
//     $k4=$('#tinp5').val()
//     $k5=$('#tinp6').val()
//     $k6= $(this).attr('data-id')
//     $.ajax({
//         type: 'POST',
//         url: "custom_checklist_name_admin.php",
//         data:{z1: $k1,z2:$k2,z3:$k3,z4:$k4,z5:$k5,z6:$k6},
//         success:function(rezult) {
//             let z=rezult.split("*")
//             $('#filter_table').html(z[0])
//             $("#plag").html(z[1])
//
//
//         }
//     })

// $('#tinp3').on('input',function(){
//     $k1=$('#tinp2').val()
//     $k2=$('#tinp3').val()
//     $k3=$('#tinp4').val()
//     $k4=$('#tinp5').val()
//     $k5=$('#tinp6').val()
//     // alert($k1+$k2+ $k3+$k4+$k5)
//     $.ajax({
//         type: 'POST',
//         url: "custom_checklist_name_admin.php",
//         data:{z1: $k1,z2:$k2,z3:$k3,z4:$k4,z5:$k5},
//         success:function(rezult) {
//             // window.location.href="custom_checklist_name_new.php";
//             // let z=rezult.split("*")
//             // $('#filter_table').html(z[0])
//             // $("#plag").html(z[1])
//
//
//         }
//     })
// })
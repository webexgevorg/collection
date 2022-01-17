// $(".first_part").click(function() {
//     alert()
// })


let country = ''
let status_country = 0
let city = ''
let status_city = 0
$(".filter").click(function () {
    $(".filtration_status").html("")
    if($(".search_country").val() != "" && $('.select_country').val() != "Country") {
        $(".filtration_status").html("<p class='red'>Fill in only one field for the country</p>")
        status_country = 0
    }else {
        if($(".search_country").val() != "") {
            country = $(".search_country").val()
        }else if($('.select_country').val() != "Country") {
            country = $('.select_country').val()
        }
        status_country = 1
    }

    if($(".search_city").val() != "" && $('.select_city').val() != "City") {
        if($(".filtration_status").html() == "") {
            console.log($(".filtration_status").html())
            $(".filtration_status").html("<p class='red'>Fill in only one field for the city</p>")
        }
        status_city = 0
    }else {
        if($(".search_city").val() != "") {
            city = $(".search_city").val()
        }else if($('.select_city').val() != "City") {
            city = $('.select_city').val()
        }
        status_city = 1
    }

    let all_checkbox = $(".select_rating").find("input:checked")

    for(let i = 0; i < all_checkbox.length; i++) {
        let filter_rating = $(all_checkbox)
    }
})
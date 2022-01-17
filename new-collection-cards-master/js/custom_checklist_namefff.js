
var k=5
   var y=10
   var z=k+y
console.log(z)
console.log("barev")

    function load_data(page,ses,headinp='', cardnumb=' ', cardname='', team='', parallel='', printrun=''){

        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{page:page,session:ses, headinp:headinp,cardnumber:cardnumb,cardname:cardname,team:team,parallel:parallel,printrun:printrun},
            success:function(data){

              var k=data.split('!')
                $('#dinamic_content').html(k[0]);
                $('#tfooter').html(k[1]);

            }
        })
    }

    const myUrl = new URL(window.location.href)
    // console.log(myUrl.searchParams.get("name"))

    load_data(1,myUrl.searchParams.get("name"));
    $('#inp').keyup(function(){

        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel= $('#parallel').val()
        var printrun= $('#print_run').val()
        load_data(1, myUrl.searchParams.get("name"),headinp,cardnumber,cardname,team,parallel,printrun);
    })

    $('#card_number').keyup(function(){
        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel= $('#parallel').val()
        var printrun= $('#print_run').val()
        load_data(1, myUrl.searchParams.get("name"),headinp,cardnumber,cardname,team,parallel,printrun);
    })

    $('#card_name').keyup(function(){
        var dd=[]

        $('input:checkbox').each(function(){
            if($(this).is(':checked')){
                console.log('ttttt')
                dd.push($(this).attr('name'))

            }

        })

        console.log(dd)


        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel= $('#parallel').val()
        var printrun= $('#print_run').val()
        load_data(1, myUrl.searchParams.get("name"),headinp,cardnumber,cardname,team,parallel,printrun);
    })
    $('#team').keyup(function(){
        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel= $('#parallel').val()
        var printrun= $('#print_run').val()
        load_data(1, 61,headinp,cardnumber,cardname,team,parallel,printrun);
    })
    $('#parallel').keyup(function(){
        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel= $('#parallel').val()
        var printrun= $('#print_run').val()
        load_data(1, myUrl.searchParams.get("name"),headinp,cardnumber,cardname,team,parallel,printrun);
    })
    $('#print_run').keyup(function(){
        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel= $('#parallel').val()
        var printrun= $('#print_run').val()
        load_data(1, myUrl.searchParams.get("name"),headinp,cardnumber,cardname,team,parallel,printrun);
    })
    $(document).on('click','.page-link',function(){
        var page = $(this).data('page_number');
        var headinp = $('#inp').val();
        var cardnumber = $('#card_number').val();
        var cardname = $('#card_name').val()
        var team = $('#team').val()
        var parallel = $('#parallel').val()
        var printrun = $('#print_run').val()
        load_data(page,myUrl.searchParams.get("name"),headinp, cardnumber,cardname,team, parallel,printrun);
    })
    $(document).on('click','.id',function(){
        $('.id').parent().removeClass('active_tr')
        $(this).parent().addClass('active_tr')



         $('.baseboll_pic_after').html("<div class='d-flex  flex-column icon'>\n" +
             "                    <div class='d-flex  justify-content-around'>\n" +
             "                        <div class='d-flex flex-column align-items-center four_icon'>\n" +
             "                            <img class='img-fluid' src='images_custom_checklist_collection_name/Заливка цветомman 1  8@2x.png'>\n" +
             "                            <h5 class='mt-1 text-center' id='h3'>11</h5>\n" +
             "                        </div>\n" +
             "                        <div class='d-flex flex-column align-items-center four_icon'>\n" +
             "                            <img class='img-fluid' src='images_custom_checklist_collection_name/Заливка цветом$1@2x.png'>\n" +
             "                            <h5 class='mt-1 text-center' id='h3'>34</h5>\n" +
             "                        </div>\n" +
             "\n" +
             "                    </div>\n" +
             "                    <div>\n" +
             "                        <div class='d-flex justify-content-around'>\n" +
             "                            <div class='d-flex flex-column align-items-center four_icon'>\n" +
             "                                <img class='img-fluid' src='images_custom_checklist_collection_name/Заливка цветомheart 1@2x.png'>\n" +
             "                                <h5 class='mt-1 text-center' id='h3'>3</h5>\n" +
             "                            </div>\n" +
             "                            <div class='d-flex flex-column align-items-center four_icon'>\n" +
             "                                <img class='img-fluid' src='images_custom_checklist_collection_name/Заливка цветомsearch 1@2x.png'>\n" +
             "                                <h5 class='mt-1 text-center' id='h3'>35</h5>\n" +
             "                            </div>\n" +
             "                        </div>\n" +
             "                    </div>\n" +
             "                </div>")




    })


const googleTranslateConfig = {
    lang: "en",
};

function TranslateInit() {
console.log($.cookie('googtrans'))
    let code = TranslateGetCode();
    // Находим флаг с выбранным языком для перевода и добавляем к нему активный класс
    // $('[data-google-lang="' + code + '"]').addClass('language__img_active');

    if (code == googleTranslateConfig.lang) {
        // Если язык по умолчанию, совпадает с языком на который переводим
        // То очищаем куки
        TranslateClearCookie();
    }
    if( $.cookie('googtrans')=='/auto/ru'){
            $('.owl-next>span').css("font-size","58px")
            $('.owl-prev>span').css("font-size","58px")
        console.log('ooo')
        }

    // Инициализируем виджет с языком по умолчанию
    new google.translate.TranslateElement({
        pageLanguage: googleTranslateConfig.lang,
    });

    // Вешаем событие  клик на флаги
    $('[data-google-lang]').click(function () {
        TranslateSetCookie($(this).attr("data-google-lang"))
        let lng=$(this).attr("data-google-lang")
        $.post("googleTranslate/googleTr.php",{
			language: lng},
			function(ardyunq){
                // $("#res").html(ardyunq);
        window.location.reload();
			})
        // Перезагружаем страницу
    });
}

function TranslateGetCode() {
    // Если куки нет, то передаем дефолтный язык
    let lang = ($.cookie('googtrans') != undefined && $.cookie('googtrans') != "null") ? $.cookie('googtrans') : googleTranslateConfig.lang;
    return lang.substr(-2);
}

function TranslateClearCookie() {
    $.cookie('googtrans', null);
    $.cookie("googtrans", null, {
        domain: "." + document.domain,
    });
}

function TranslateSetCookie(code) {
    // Записываем куки /язык_который_переводим/язык_на_который_переводим
    $.cookie('googtrans', "/auto/" + code);
    $.cookie("googtrans", "/auto/" + code, {
        domain: "." + document.domain,
    });
    console.log($.cookie('googtrans'))
    
        
}
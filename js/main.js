$(document).ready(function(){

    $("tr").click(function() {
        $(this).closest("tr").siblings().removeClass("active ok-to-delete");
        $(this).toggleClass("active ok-to-delete");
        var href = $(this).children('td').children('a').attr('href');
        //console.log(href);
        var download = document.querySelector(".download");
        download.setAttribute('onClick', "location.href='" + href + "'");
        //console.log(download.getAttribute("onClick"));
    });

    $("#delete").click(function() {
        var linha = document.querySelector(".ok-to-delete");
        var file = $(linha).children('td').children('a').attr('href');
        //var file = '/Users/ajr/Dropbox/testedw/Emissão%20Boleto%20IPVA.pdf';
        console.log(linha);
        console.log(file);

        var f = file.replace(/^.+=/, "");
        console.log(f);

        $(linha).fadeOut(400, function(){
            linha.remove();
        });

        var download = document.querySelector(".download");
        download.setAttribute('onClick', '');

        var url = '/functions/delete.php?file=' + f;

        $.get(url, function(response){
            console.log(response);
        });
    });
});

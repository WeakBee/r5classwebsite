const responsive = window.matchMedia('(max-width: 992px)');

if (responsive.matches) {
    $('.ket-poin').hide();
    $('.total-poin').hide();
    $( ".list-leaderboard" ).click(function() {
        $(this).children(".ket-poin").slideToggle("slow");
        $(this).children(".total-poin").slideToggle("slow");
        if($(this).attr("open")){
            $(this).removeAttr("open");
        }else{
            $(this).attr("open","");
        }
    });
}
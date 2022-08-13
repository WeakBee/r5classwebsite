$(document).ready(function(){
    $(".ubah").click(function(){
      $(".pilih-icon").toggle();
    });
    $(".kartu-icon").click(function(){
        $('.kartu-icon').attr('pilih','no');
        $(this).attr('pilih','yes');
    });
    $(".cancel-icon").click(function(){
        $('.kartu-icon').attr('pilih','no');
    });
    $(".hapus").click(function(){
        $('.pokemon-icon').attr('pokemon','none');
    });
    $(".ubah-icon").click(function(){
        var pokemon=$(".kartu-icon[pilih=yes]").attr('pokemon');
        $(".pokemon-icon").attr("pokemon", pokemon);
    });
});


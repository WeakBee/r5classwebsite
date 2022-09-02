// =========GREETINGS==========
const greetspan = $( ".greetspan" );
const hour = new Date().getHours();
const greet = ["Selamat Pagi!", "Selamat Siang!", "Selamat Sore!", "Selamat Malam!"];
let welcomeText = "";

if (hour < 11) welcomeText = greet[0];
else if (hour < 15) welcomeText = greet[1];
else if (hour < 19) welcomeText = greet[2];
else welcomeText = greet[3];

$(greetspan).html(welcomeText);
// =========GREETINGS==========

// ===========TIMER============
$(document).ready(function() {
    myTimer();
    var time = new Date();
    $('.senin , .selasa , .kamis , .jumat , .else').hide();
    if(time.getDay() == 1){
        $('.senin').show();
    } else if(time.getDay() == 2){
        $('.selasa').show();
    } else if(time.getDay() == 4){
        $('.kamis').show();
    } else if(time.getDay() == 5){
        $('.jumat').show();
    } else{
        $('.else').show();
    }
});

setInterval(myTimer, 10000);
function myTimer() {
    var time = new Date();
    if (time.getTimezoneOffset() == 0) (a = time.getTime() + (7 * 60 * 60 * 1000))
    else (a = time.getTime());
    time.setTime(a);
    var hari = time.getDay();
    var bulan = time.getMonth();
    var tanggal = time.getDate();
    var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
    var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    document.getElementById("time").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + " | " + (time.getHours() < 10 ? "0" : "") + time.getHours() + ":" + (time.getMinutes() < 10 ? "0" : "") + time.getMinutes() + (" WIB ");
}
// ===========TIMER============

// ========KOLOM KANAN=========
const mediaQuery = window.matchMedia('(max-width: 992px)');

if (mediaQuery.matches) {
    $('.kolom-kanan').hide();
    $(".button-responsive").click(function(){
        $(".kolom-kanan").toggle(700);
        $(".kolom-kiri").toggle(700);
    });
}

// ========KOLOM KANAN=========
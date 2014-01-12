
var coords;

function initiate_geolocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);
    }
    else{
        $("body p strong").html("Cihazınız konum belirleme özelliği desteklemiyor.");
    }
}

function postCoords() {
    $.post("index/corget", coords, function (r) {

        if (r.result) {
            alert('Başarılı bir şekilde konumunuz kaydedildi.');
        }
        else {
            alert('hata oldu')
        }

    }, 'json');
}


function handle_geolocation_query(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    coords =  {
        "lat" : latitude,
        "lng" : longitude
    };


};

function handle_errors(error) {
    switch(error.code)
    {
        case error.PERMISSION_DENIED:
            alert("Konum bilgisi paylaşılmadığı için işlem tamamlanamadı.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Mevcut konumunuz tespit edilemedi");
            break;
        case error.TIMEOUT:
            alert("Konum tespiti sırasında zaman aşımı meydana geldi");
            break;
        default:
            alert("Bilinmeyen Hata");
            break;
    }
}


$(document).ready(function() {

    initiate_geolocation();
    $("#postCoords").click(function () {
        postCoords();
    })

});
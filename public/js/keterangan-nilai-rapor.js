$('body').on('focus', '.hitung', function() {
    var id = $(this).attr('id'), 
        berhitung = id.split('-');

    $(this).bind('keyup mouseup', function(){
        setTimeout(function(){
            var nilai = ($('#nilai_eskul-' + berhitung[1]).val() != '' ? $('#nilai_eskul-' + berhitung[1]).val() : 0);                  
                n     = parseFloat(nilai);

            if((n >= 1) && (n <= 59)) {
                $('#keterangan_eskul-' +berhitung[1]).val("kurang".toUpperCase());

            }else if((n >= 60) && (n <= 79)){
                $('#keterangan_eskul-' +berhitung[1]).val("cukup".toUpperCase());

            }else if((n >= 80) && (n <= 90)){
                $('#keterangan_eskul-' +berhitung[1]).val("baik".toUpperCase());
                
            }else if((n >= 91) && (n <= 100)){
                $('#keterangan_eskul-' +berhitung[1]).val("sangat baik".toUpperCase());
                
            }else{
                $('#keterangan_eskul-' +berhitung[1]).val("");
            }
        }, 50);
        
    });
});
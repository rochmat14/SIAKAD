$('body').on('focus', '.hitung', function() {
    var aydi = $(this).attr('id'),
        berhitung = aydi.split('-');

    $(this).bind('keyup mouseup', function() {
        setTimeout(function() {
            var tugas    = ($('#nTugas-' + berhitung[1]).val() != '' ? $('#nTugas-' + berhitung[1]).val() : 0),
                harian   = ($('#nHarian-' + berhitung[1]).val() != '' ? $('#nHarian-' + berhitung[1]).val() : 0),
                semester = ($('#nSemester-' + berhitung[1]).val() != '' ? $('#nSemester-' + berhitung[1]).val() : 0),
                Nakhir   = ( (parseFloat(tugas) * 2) + (parseFloat(harian) * 3) + (parseFloat(semester) * 5) ) / 10;

            if (!isNaN(Nakhir)) {
                $('#nAkhir-' + berhitung[1]).val(Nakhir);
                var alltotal = 0;

                $('.nAkhir').each(function(){
                    alltotal += parseFloat($(this).val());
                });
                
                $('#nAkhir').val(alltotal);
            }

            // mengambil nilai kkm pada tag paragraf kkm
            var k = $("#paragraf").text();
            // menghapus sepasi dan simbol \s untuk sekaligus banyak spaci yang dihapus
            var kk = k.replace(/\s/g, "");
            // menghaps tanda tambah pada tag paragraf kkm
            var kkm = kk.replace(/=/, "");

            if(kkm < Nakhir){
                $('#keterangan-' + berhitung[1]).val("terlampaui");
                var keterangan = 0;

                $('.keterangan').each(function(){
                    keterangan += parse($(this).val());
                });

                $('#keterangan').val("keterangan");
            }else if(kkm == Nakhir){
                $('#keterangan-' + berhitung[1]).val("tercapai");

                var keterangan = 0;
            }else{
                $('#keterangan-' + berhitung[1]).val("tidak tuntas");
                
                var keterangan = 0;
            }

        }, 50);
    });
});
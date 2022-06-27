jQuery(document).ready(function (){
    // mengambil data dengan tag html
        // jQuery('select[name="kelas"]').on('change',function(){
    // mengambil data dengan attribute id
    jQuery('#kelas').on('change',function(){
        var kelas = jQuery(this).val();
        if(kelas){
            jQuery.ajax({
                url : 'dropdownlist/getSiswa/' +kelas,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    console.log(data);
                // mengambil data dengan tag html
                    // jQuery('select[name="siswa"]').empty();
                // mengambil data dengan attribute id
                    //menambah option kosong ketika data yang berhubungan dengan kelas kosong
                    jQuery('#siswa').empty();
                    
                    // menambah option Pilih Siswa ketika konsisi 'jQuery('#siswa').empty();'
                    if(jQuery('#siswa').empty()){
                        $('#siswa').append('<option value="">'+ "Pilih Siswa" +'</option>');
                    }
                    
                    jQuery.each(data, function(key,value){
                // mengambil data dengan tag html
                    // $('select[name="siswa"]').append('<option value="'+ key +'">'+ value +'</option>');
                // mengambil data dengan attribute id
                    $('#siswa').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }else{
            // mengambil data dengan tag html
            // $('select[name="siswa"]').empty();
            
            // cek jika attribute id kosong
            if(jQuery('#siswa').empty()){
                // mengambil data dengan attribute id dan menambahkan element
                $('#siswa').append('<option value="">'+ "Pilih Siswa" +'</option>');
            }
        }
    });
});
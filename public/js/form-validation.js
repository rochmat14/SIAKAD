// validasi form admin
$('form#form-admin').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.nama-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama harus di isi",
            }
        });
    });

    $('.username-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Username harus di isi",
            }
        });
    });
});
$("#form-admin").validate();

// ===================================================================================================
// validasi form pengumuman
$('form#form-pengumuman').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.pengumuman-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Pengumuman harus di isi",
            }
        });
    });

    $('.tanggal-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tanggal harus di isi",
            }
        });
    });
});
$("#form-pengumuman").validate();

// ===================================================================================================
// validasi form guru
$('form#form-guru').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.username-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Username harus di isi",
            }
        });
    });

    $('.password-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Password harus di isi",
            }
        });
    });

    $('.nip-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            messages: {
                required: "Nip harus di isi",
                number: "Nip harus angka"
            }
        });
    });

    $('.nama-guru-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Guru harus di isi",
            }
        });
    });

    $('.jenis-kelamin-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Jenis Kelamin harus di isi",
            }
        });
    });

    $('.alamat-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Alamat harus di isi",
            }
        });
    });
});
$("#form-guru").validate();

// ===================================================================================================
// validasi form kelas
$('form#form-kelas').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun-ajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran harus di isi",
            }
        });
    });

    $('.nama-kelas-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Kelas harus di isi",
            }
        });
    });

    $('.nama-guru-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Guru harus di isi",
            }
        });
    });
});
$("#form-kelas").validate();

// ===================================================================================================
// validasi form siswa
$('form#form-siswa').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.username-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Username harus di isi",
            }
        });
    });

    $('.password-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Password harus di isi",
            }
        });
    });

    $('.nis-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nis harus di isi",
            }
        });
    });

    $('.nisn-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nisn harus di isi",
            }
        });
    });
    $('.nama-siswa-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Siswa harus di isi",
            }
        });
    });

    $('.tempat-lahir-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tempat Lahir harus di isi",
            }
        });
    });

    $('.tanggal-lahir-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tanggal Lahir harus di tetapkan",
            }
        });
    });

    $('.jenis-kelamin-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Jenis Kelamin harus di pilih",
            }
        });
    });

    $('.agama-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Agama harus di pilih",
            }
        });
    });

    $('.anak-ke-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            messages: {
                required: "Anak Ke harus di isi",
                number: "Anak Ke harus angka",
            }
        });
    });

    $('.alamat-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Alamat harus di isi",
            }
        });
    });

    $('.nomor-telepon-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            messages: {
                required: "Nomor Telepon harus di isi",
                number: "Nomor Telepon harus angka",
            }
        });
    });

    $('.asal-sekolah-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Asal Sekolah harus di isi",
            }
        });
    });

    $('.kelas-awal-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Kelas Awal harus di pilih",
            }
        });
    });

    $('.tanggal-diterima-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tanggal Diterima harus di tetapkan",
            }
        });
    });

    $('.nama-ayah-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Ayah harus di isi",
            }
        });
    });

    $('.nama-ibu-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Ibu harus di isi",
            }
        });
    });

    $('.alamat-orang-tua-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Alamat Orang Tua harus di isi",
            }
        });
    });

    $('.telepon-orang-tua-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            messages: {
                required: "Telepon Orang Tua harus di isi",
                number: "Telepon Orang Tua harus angka",
            }
        });
    });

    $('.pekerjaan-ayah-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Pekerjaan Ayah harus di isi",
            }
        });
    });

    $('.pekerjaan-ibu-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Pekerjaan Ibu harus di isi",
            }
        });
    });
});
$("#form-siswa").validate();

// ===================================================================================================
// validasi form mata pelajaran
$('form#form-mata-pelajaran').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.mata-pelajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Mata Pelajaran harus di isi",
            }
        });
    });
});
$("#form-mata-pelajaran").validate();

// ===================================================================================================
// validasi form jadwal
$('form#form-jadwal').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun-ajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran harus di pilih",
            }
        });
    });

    $('.semester-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Semester harus di pilih",
            }
        });
    });

    $('.nama-kelas-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama Kelas harus di pilih",
            }
        });
    });

    $('.mata-pelajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Mata Pelajaran harus di pilih",
            }
        });
    });

    $('.hari-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Hari harus di pilih",
            }
        });
    });

    $('.waktu-mulai-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Waktu Mulai harus di tetapkan",
            }
        });
    });

    $('.waktu-selesai-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Waktu Selesai harus di tetapkan",
            }
        });
    });

    $('.guru-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Guru harus di pilih",
            }
        });
    });
});
$("#form-jadwal").validate();

// ===================================================================================================
// validasi form pengumuman
$('form#form-pengumuman').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.nama-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nama harus di isi",
            }
        });
    });

    $('.username-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Username harus di isi",
            }
        });
    });
});
$("#form-pengumuman").validate();

// ===================================================================================================
// validasi form cari kkm
$('form#cari_kkm').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun_ajaran_input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran belum dipilih",
            }
        });
    });

    $('.mata_pelajaran_input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Mata Pelajaran belum dipilih",
            }
        });
    });
});
$("#cari_kkm").validate();

// ===================================================================================================
// validasi form kkm
$('form#form_kkm').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.kkm_input').each(function() {
        $(this).rules("add", {
            required: true,
            min: 10,
            max: 100,
            number: true,
            messages: {
                required: "Kkm harus di isi",
                min: "Nilai paling rendah hanya 10",
                max: "Nilai maksimal hanya 100",
                number: "hanya bisa input angka"
            }
        });
    });
});
$("#form_kkm").validate();

// ===================================================================================================
// validasi form kkm
$('form#form_tahun_ajaran').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun_ajaran_input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran harus di isi",
            }
        });
    });
});
$("#form_tahun_ajaran").validate();

// ===================================================================================================
// validasi form eksrakulikuler
$('form#form-eskul').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.ekstrakulikuler-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Ekstrakulikuler harus di isi",
            }
        });
    });
});
$("#form-eskul").validate();

// ===================================================================================================
// validasi kelola nilai siswa
$('form#form-nilai-siswa').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun-ajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran harus di pilih",
            }
        });
    });

    $('.semester-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Semester harus di pilih",
            }
        });
    });

    $('.mata-pelajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Mata Pelajaran harus di pilih",
            }
        });
    });

    $('.kelas-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Kelas harus di pilih",
            }
        });
    });
});
$("#form-nilai-siswa").validate();

// ===================================================================================================
// validasi nilai siswa hak akases guru

$('form#form-tetapkan-nilai-siswa').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.nilai-rata2-tugas-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            min: 10,
            max: 100,
            messages: {
                required: "Nilai Rata-Rata Tugas harus di isi",
                number: "Nilai harus angka",
                min: "Nilai paling rendah hanya 10",
                max: "Nilai maksimal hanya 100"
            }
        });
    });

    $('.nilai-ujian-harian-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            min: 10,
            max: 100,
            messages: {
                required: "Nilai Ujian Harian harus di isi",
                number: "Nilai harus angka",
                min: "Nilai paling rendah hanya 10",
                max: "Nilai maksimal hanya 100"
            }
        });
    });

    $('.nilai-ujian-semester-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            min: 10,
            max: 100,
            messages: {
                required: "Nilai Ujian Semester harus di isi",
                number: "Nilai harus angka",
                min: "Nilai paling rendah hanya 10",
                max: "Nilai maksimal hanya 100"
            }
        });
    });
});
$("#form-tetapkan-nilai-siswa").validate();

$('form#form-nilai-rapor').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun-ajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran harus di pilih",
            }
        });
    });

    $('.semester-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Semester harus di pilih",
            }
        });
    });

    $('.kelas-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Kelas harus di pilih",
            }
        });
    });

    $('.siswa-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Siswa harus di pilih",
            }
        });
    });
});
$("#form-nilai-rapor").validate();

$('form#form-tetapkan-nilai-rapor').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.nilai-eskul-input').each(function() {
        $(this).rules("add", {
            required: true,
            number: true,
            min: 10,
            messages: {
                required: "Nilai Ekstrakulikuler harus di isi",
                number: "Harus angka",
                min: "Minimal nilai 10"
            }
        });
    });

    $('.akhlak-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nilai Akhlak harus di pilih",
            }
        });
    });

    $('.keperibadian-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Nilai Keperibadian harus di pilih",
            }
        });
    });

    $('.izin-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Jika tidak pernah Izin masukan angka 0",
            }
        });
    });

    $('.sakit-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Jika tidak pernah Sakit masukan angka 0",
            }
        });
    });

    $('.tanpa-keterangan-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Jika tidak pernah Tanpa Keterangn masukan angka 0",
            }
        });
    });

    $('.naik-kelas-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Naik Kelas harus dipilih",
            }
        });
    });
});
$("#form-tetapkan-nilai-rapor").validate();

$('form#form-cetak-rapor').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.tahun-ajaran-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Tahun Ajaran harus di pilih",
            }
        });
    });

    $('.semester-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Semester harus di pilih",
            }
        });
    });

    $('.kelas-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Kelas Harus di pilih",
            }
        });
    });
});
$("#form-cetak-rapor").validate();

$('form#form-login').on('submit', function(event) {
    //Add validation rule for dynamically generated name fields
    $('.username-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Username harus di isi",
            }
        });
    });

    $('.password-input').each(function() {
        $(this).rules("add", {
            required: true,
            messages: {
                required: "Password harus di isi",
            }
        });
    });
});
$("#form-login").validate();
<?php
    function konversi($x){

        $x = abs($x);
        $angka = array ("","satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";

        if($x < 12){
            $temp = " ".$angka[$x];
        }else if($x<20){
            $temp = konversi($x - 10)." belas";
        }else if ($x<100){
            $temp = konversi($x/10)." puluh". konversi($x%10);
        }else if($x<200){
            $temp = " seratus".konversi($x-100);
        }else if($x<1000){
            $temp = konversi($x/100)." ratus".konversi($x%100);   
        }else if($x<2000){
            $temp = " seribu".konversi($x-1000);
        }else if($x<1000000){
            $temp = konversi($x/1000)." ribu".konversi($x%1000);   
        }else if($x<1000000000){
            $temp = konversi($x/1000000)." juta".konversi($x%1000000);
        }else if($x<1000000000000){
            $temp = konversi($x/1000000000)." milyar".konversi($x%1000000000);
        }

        return $temp;
    }

    function tkoma($x){
        $str = stristr($x,",");
        $ex = explode(',',$x);

        if(($ex[1]) >= 1){
            $a = abs($ex[1]);
        }
        
        $string = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan",   "sembilan","sepuluh", "sebelas");
        $temp = "";

        $a2 = $ex[1]/10;
        $pjg = strlen($str);
        $i =1;
            

        if($a>=1 && $a< 12){   
            $temp .= " ".$string[$a];
        }else if($a>12 && $a < 20){   
            $temp .= konversi($a - 10)." belas";
        }else if ($a>20 && $a<100){   
            $temp .= konversi($a / 10)." puluh". konversi($a % 10);
        }else if($a<200){
            $temp = " seratus".konversi($a-100);
        }else if($a<1000){
            $temp = konversi($a/100)." ratus".konversi($a%100);   
        }else{
            if($a2<1){
            
            while ($i<$pjg){     
            $char = substr($str,$i,1);     
            $i++;
            $temp .= " ".$string[$char];
            }
            }
        }
        
        return $temp;
    }

    function terbilang($x){
    if($x<=0){
        $hasil = "minus ".trim(konversi($x));
    }else{
        $searchForValue = ',';

        // kondisi membendingkan variable $x apakan memiliki koma variable $searchForValue
        if(strpos($x, $searchForValue) !== false){
            $poin = trim(tkoma($x));
            $hasil = trim(konversi($x));

            $nomorKeKalimat = ucwords($hasil." koma ".$poin);
            // $hasil = "ada koma";
        }else{
            $hasil = trim(konversi($x));

            $nomorKeKalimat = ucwords($hasil);
            // $hasil = "tidak ada koma";
        }
    }

    return $nomorKeKalimat;  
    }
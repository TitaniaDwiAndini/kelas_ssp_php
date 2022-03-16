<?php

function harian($a){
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
            );
    $hr=date('N',strtotime($a));
    return $hari[$hr];        
}

function bulanan($a){
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
            );
    $bl=date('n',strtotime($a));
    return $bulan[$bl];    
}
?>
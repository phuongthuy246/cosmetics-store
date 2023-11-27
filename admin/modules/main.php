<div class="clear"></div>
<div class="main" id="main">
	<?php
	if (isset($_GET['action']) && $_GET['query']) {
		$tam = $_GET['action'];
		$query = $_GET['query'];
	} else {
		$tam = '';
		$query = '';
	}
	if ($tam == 'quanlyloaisanpham' && $query == 'danhsach') {
		include("modules/quanlyloaisp/lietke.php");
		// include("modules/quanlyloaisp/them.php");

	} elseif ($tam == 'quanlyloaisanpham' && $query == 'them') {
		include("modules/quanlyloaisp/them.php");

	} elseif ($tam == 'quanlyloaisanpham' && $query == 'sua') {
		include("modules/quanlyloaisp/sua.php");

	} elseif ($tam == 'quanlyloaisanphamct' && $query == 'danhsach') {
		include("modules/quanlyloaispct/lietke.php");

	} elseif ($tam == 'quanlyloaisanphamct' && $query == 'them') {
		// include("modules/quanlysp/them.php");
		include("modules/quanlyloaispct/them.php");

	} elseif ($tam == 'quanlyloaisanphamct' && $query == 'sua') {
		// include("modules/quanlysp/them.php");
		include("modules/quanlyloaispct/sua.php");

	} elseif ($tam == 'quanlyloaisanphamct' && $query == 'timkiem') {
		// include("modules/quanlysp/them.php");
		include("modules/quanlyloaispct/timkiem.php");

	}elseif ($tam == 'quanlythuonghieu' && $query == 'danhsach') {
		include("modules/quanlyth/lietke.php");

	} elseif ($tam == 'quanlythuonghieu' && $query == 'them') {
		// include("modules/quanlysp/them.php");
		include("modules/quanlyth/them.php");

	} elseif ($tam == 'quanlythuonghieu' && $query == 'sua') {
		// include("modules/quanlysp/them.php");
		include("modules/quanlyth/sua.php");

	} elseif ($tam == 'quanlythuonghieu' && $query == 'timkiem') {
		// include("modules/quanlysp/them.php");
		include("modules/quanlyth/timkiem.php");

	} elseif ($tam == 'quanlysanpham' && $query == 'danhsach') {
		include("modules/quanlysp/lietke.php");

	} elseif ($tam == 'quanlysanpham' && $query == 'them') {
		include("modules/quanlysp/them.php");

	} elseif ($tam == 'quanlysanpham' && $query == 'sua') {
		include("modules/quanlysp/sua.php");

	} elseif ($tam == 'quanlysanpham' && $query == 'timkiem') {
		include("modules/quanlysp/timkiem.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'danhsach') {
		include("modules/quanlyhttt/lietke.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'them') {
		include("modules/quanlyhttt/them.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'sua') {
		include("modules/quanlyhttt/sua.php");

	} elseif ($tam == 'quanlyhttt' && $query == 'timkiem') {
		include("modules/quanlyhttt/timkiem.php");

	
	} 
	elseif ($tam == 'quanlytintuc' && $query == 'danhsach') {
		include("modules/quanlytt/lietke.php");

	} 
	
	elseif ($tam == 'quanlytintuc' && $query == 'them') {
		include("modules/quanlytt/them.php");
	} 
	elseif ($tam == 'quanlytintuc' && $query == 'sua') {
		include("modules/quanlytt/sua.php");
	} 
	elseif ($tam == 'quanlytintuc' && $query == 'timkiem') {
		include("modules/quanlytt/timkiem.php");
	
	}
	elseif ($tam == 'quanlykh' && $query == 'danhsach') {
		include("modules/quanlykh/lietke.php");
	
	}
	elseif ($tam == 'quanlyptvc' && $query == 'danhsach') {
		include("modules/quanlyptvc/lietke.php");

	} elseif ($tam == 'quanlyptvc' && $query == 'them') {
		include("modules/quanlyptvc/them.php");

	} elseif ($tam == 'quanlyptvc' && $query == 'sua') {
		include("modules/quanlyptvc/sua.php");

	}
	elseif ($tam == 'quanlydh' && $query == 'danhsach') {
		include("modules/quanlydh/lietke.php");

	

	
	}
	elseif ($tam == 'quanlydh' && $query == 'xemdonhang') {
		include("modules/quanlydh/xemdonhang.php");

	

	
	} 
	elseif ($tam == 'quanlybinhluan' && $query == 'danhsach') {
		include("modules/quanlybl/lietke.php");

	

	
	} else {
		include("modules/dashboard.php");
	}

	?>
</div>
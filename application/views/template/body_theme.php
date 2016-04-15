<?php
	switch (UserData::getUserType()) {
		case 'student':
			$color = 'lightred'; break;
		case 'demonstrator':
			$color = 'teal'; break;
		case 'zaposlen':
			$color = 'darkblue'; break;
		case 'admin':
			$color = 'orange'; break;
		default:
			$color = 'grey'; break;
	}
?>
<body class="theme-<?php echo $color; ?>" data-theme="theme-<?php echo $color; ?>">
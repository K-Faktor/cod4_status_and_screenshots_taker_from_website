<?php
    include 'rcon.ini.php';
	
	if(isset($_POST['player_CID']))
	{
		$getss = $_POST['player_CID'];
		$fp = fsockopen( 'udp://' . $server_IP, $server_port, $errno, $errstr, 10 );
	
		if( !$fp )
		{
			//Cannot connect, show error message.
		}
		
		$packet = "\xff\xff\xff\xff" . 'rcon "' . $rcon_password . '" ' .'getss '. $getss . "\n";
		fwrite( $fp, $packet );
		
	}	
?>

<?php

	// This script does a brute force check of all possible 24 hour "hh:mm:ss" combinations
	// to find, and list palindromes which occur.
	//
	// Includes html front-end, and search function.
	// Written by Joe Doherty; http://google.com/profiles/Blu3Gough;
	//
	
	// Script timer
	$starttime = explode(' ', microtime());
	$starttime = $starttime[1] + $starttime[0];
	

	// Padding function
	function Padding( $in ) {
	
		$out = str_pad ( $in, 2, "0", STR_PAD_LEFT );
		return $out;
		
	}
	
	// Checking function
	function IsPalindrome( $str ) {
		
		if ( strlen ( $str ) == 6 ) {
		
			if ( $str[0] == $str[strlen($str)-1] && $str[1] == $str[strlen($str)-2] && $str[2] == $str[strlen($str)-3] ) {
				return true;
			}
		
		} elseif ( strlen ( $str ) == 5 ) {
		
			if ( $str[0] == $str[strlen($str)-1] && $str[1] == $str[strlen($str)-2] ) {
				return true;
			}
		
		}
		return false;
	
	}

?>

<html>

	<head>
	
		<title>PALINDROMIC TIME</title>
		
		<style>
			li:hover {
				background: #c33;
			}
		</style>
		
	</head>
	
	<body style="background: url('bg.png') #000;">

		<div style="width: 323px; border: 5px solid #fff; background: #d66; margin: 0 auto; font-size: 3em; text-align: center;">
			
			<img src="clock.png" />
			
			<a style="font-weight: bold; font-size: .75em; margin: .25em auto;" name="top">Palindromic Time</a>
			
			<input type="text" id="searchfield" "style="margin: .25em auto; width: 225px; border: 3px solid #000; background: #fff; color: #000; font-size: .75em; text-align: center;" onchange="document.getElementById('searchbutton').href='#' + document.getElementById('searchfield').value" value="00000"/><a id="searchbutton" href="#00000"><img src="search.png" style="border:none;"/></a>
			
			<ul style="list-style-image: url(icon.png); margin: .25em auto;">
			<?
				
				// Hour loop
				for ( $h = 0; $h < 24; $h++ ) {
				
					// Minute loop
					for ( $m = 0; $m < 60; $m++ ) {
					
						// Second loop
						for ( $s = 0; $s < 60; $s++ ) {
						
							// Pad, and convert to strings, each value except hours.
							$hours = $h;
							$minutes = Padding( $m );
							$seconds = Padding( $s );
							
							$time = $hours.$minutes.$seconds;
							if ( IsPalindrome( $time ) ) {
							
								echo "<li title=\"" . $time . "\"><a name=\"" . $time . "\">" . $hours . ":" . $minutes . ":" . $seconds . "</a></li>";
								
							}
						
						}
					
					}
				
				}
				
			?>
			
			</ul>
			
		</div>
		
		<?php
			
			// Script timer
			$mtime = explode(' ', microtime());
			$totaltime = substr( $mtime[0] + $mtime[1] - $starttime, 0 , 4 );
			
		?>

		<div style="width: 400px; margin: 0 auto; text-align: center; color: #ccc;">
		
			<a href="#top" style="color: #ccc;">^Top^</a>
			<span style="">Generated in <?php echo $totaltime; ?> seconds.
			<a href="http://google.com/profiles/Blu3Gough" style="color: #ccc;">&copy;2009 Joe Doherty</a>
		</div>
		
	</body>
	
</html>
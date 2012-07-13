<?php
/*
Plugin Name: Hello Dalai Lama
Plugin URI: http://github.com/jeckman/hello-dalai
Description: Based on a joke made on WP-Latenite. Copy of Hello Dolly (http://wordpress.org/extend/plugins/hello-dolly/ ), but 
with quotes from the Dalai Lama. 
Author: John Eckman
Version: 1.0
Author URI: http://www.openparenthesis.org/
*/

function hello_dalai_get_quotes() {
	/** Dalai Lama quotes, one per line */
	$hello_dalai_quotes = "";

	// Here we split it into lines
	$hello_dalai_quotes = explode( "\n", $hello_dalai_quotes );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $hello_dalai_quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dalai() {
	$chosen = hello_dalai_get_quotes();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dalai' );

// We need some CSS to position the paragraph
function dalai_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dalai {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dalai_css' );

?>
<?php

function trait_form($method, $email, $sujet, $nom, $introduction, $redirection, $supplements)
{
	if( $method == 'POST' || $method == 'post' )
	{
		foreach( $_POST as $key => $value )
		{
			$trait_post = ( !empty($value) ) ? $trait_post . "\n" . ucfirst(str_replace('_', ' ', $key)) . ' : ' . $value : $trait_post;
		}
		mail($email, $sujet, $introduction . "\n" . $trait_post . "\n\n" . $supplements, 'From: "' . $nom . '"<' . $email . '>');
		header('location: ' . $redirection);
		exit;
	}
	if( $method == 'GET' || $method == 'get' )
	{
		foreach( $_GET as $key => $value )
		{
			$trait_post = ( !empty($value) ) ? $trait_post . "\n" . ucfirst(str_replace('_', ' ', $key)) . ' : ' . $value : $trait_post;
		}
		mail($email, $sujet, $introduction . "\n" . $trait_post . "\n\n" . $supplements, 'From: "' . $nom . '"<' . $email . '>');
		header('location: ' . $redirection);
		exit;
	}
}

?>
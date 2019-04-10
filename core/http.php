<?php

//These functions are just wrappers around the php request arrays.
//They are defined here to handle input filtering and other prepocessing 
//that other functions may require

function get($var)
{
	return isset($_GET[$var]) ? $_GET[$var]: '';
}

function request($var)
{
	return isset($_REQUEST[$var]) ? $_REQUEST[$var]: '';
}
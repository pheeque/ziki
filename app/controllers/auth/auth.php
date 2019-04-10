<?php

function auth() 
{
	include('Authentication/auth/googleinit.php');
	include('Authentication/auth/facebookinit.php');
	
	include 'views/auth.php';
}
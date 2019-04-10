<?php

include(SITE_ROOT . '/core/http.php');

//Include all controller files here.
//
//Each controller file contains functions that the router will run depending on the 'page'
//var in the http request.
//

include(SITE_ROOT . '/app/controllers/home.php');
include(SITE_ROOT . '/app/controllers/auth/auth.php');
include(SITE_ROOT . '/app/controllers/timeline/timeline.php');
include(SITE_ROOT . '/app/controllers/404.php');
include(SITE_ROOT . '/app/controllers/blog/blog-detail.php');
include(SITE_ROOT . '/app/controllers/contact-us.php');
include(SITE_ROOT . '/app/controllers/drafts/drafts.php');
include(SITE_ROOT . '/app/controllers/feeds/feeds.php');
include(SITE_ROOT . '/app/controllers/editor/editor.php');
include(SITE_ROOT . '/app/controllers/post/post-action.php');
include(SITE_ROOT . '/app/controllers/tags/tags.php');
include(SITE_ROOT . '/app/controllers/temp_landing_page.php');
include(SITE_ROOT . '/app/controllers/template/template.php');
include(SITE_ROOT . '/app/controllers/theme-switcher.php');
include(SITE_ROOT . '/app/controllers/upload_image/upload_image.php');
include(SITE_ROOT . '/app/controllers/user_profile_settings/user_profile_settings.php');


//The router function is called by the index.php file.
//It routes ALL requests in the app. If you want to do anything,
//you register your controller here. your controller will determine whether 
//to include a view file or echo a json output.

function router()
{
	//go to homepage if page is not defined at all.
	if(!request('page')) home();

	//open whatever page is in the 'page' query string.
	//open 404 page if the 'page' in query string is not defined.
	switch (request('page')) {
		case 'home':
			home();
			break;
		case 'auth':
			auth();
			break;
		case 'timeline':
			timeline();
			break;
		case 'blog-detail':
			blog_detail();
			break;
		case 'contact-us':
			contact_us();
			break;
		case 'drafts':
			drafts();
			break;
		case 'feeds':
			feeds();
			break;
		case 'editor':
			editor();
			break;
		case 'post':
			post_action();
			break;
		case 'tags':
			tags();
			break;
		case 'temp_landing_page':
			temp_landing_page();
			break;
		case 'template':
			template();
			break;
		case 'theme-switcher':
			theme_switcher();
			break;
		case 'upload_image':
			upload_image();
			break;
		case 'user_profile_settings':
			user_profile_settings();
			break;

		
		default:
			error_404();
			break;
	}
}
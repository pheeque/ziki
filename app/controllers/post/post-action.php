<?php

function post_action()
{
	require_once SITE_ROOT . '/app/controllers/post/Post.php';

	if (!isset($_SESSION['token'])) {
	    header('Location: /');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	    $title = isset($_POST['title']) ? trim($_POST['title']) : null;
	    $body = isset($_POST['body']) ? trim($_POST['body']) : null;
	    $file = $_FILES['image'];
	    $user = $_SESSION['loggedUserId'];
	    $new_file_name = date('dmYHis').str_replace(" ", "", basename($_FILES['image']['name']));
	    $image_type = strtolower(pathinfo($new_file_name, PATHINFO_EXTENSION));
	    if ($image_type != "jpg" && $image_type != "png" && $image_type != "jpeg") {
	        $response['error'] = true;
	        $response['message'] = 'Please make sure you uploading your image';
	    }
	    else{
	        $target_file = SITE_ROOT.'/uploads/'.$new_file_name;
	        if ($file['error'] === 0) {
	            $upload = move_uploaded_file($file['tmp_name'], $target_file);
	            if ($upload) {
	                $db_json = file_get_contents(SITE_ROOT . "/posts.json");
	                $newPost = new Post();
	                $newPost->setUserId($user);
	                $newPost->setStoryBody($body);
	                $newPost->setStoryTitle($title);
	                $newPost->setStoryImage($target_file);
	                if ($newPost->savePost($db_json)) {
	                    $response = array('error' => false, 'message' => 'post published successfully');
	                } else {
	                    $response = array('error' => true, 'message' => 'error occured while posting');
	                }
	            }
	            else{
	                $response['error'] = true;
	                $response['message'] = 'Error while uploading image';
	            }
	        }
	        else{
	            $response['error'] = true;
	            $response['message'] = 'Error, please select an image';
	        }
	    }
	    die(json_encode($response));
	}

}
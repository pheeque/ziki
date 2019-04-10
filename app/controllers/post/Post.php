<?php
class Post {
    private $id;
    private $userId;
    private $storyTitle;
    private $storyBody;
    private $postTimestamp;
    private $image;
    public function __construct() {
        $this->id = -1;
        $this->userId = -1;
        $this->storyTitle = "";
        $this->storyBody = "";
        $this->postTimestamp = "";
        $this->image = "";
    }
    public function setUserId($newUserId) {
        $this->userId = $newUserId;
    }
    public function setStoryBody($newstoryBody) {
        $this->storyBody = $newstoryBody;
    }
    public function setStoryTitle($newstoryTitle) {
        $this->storyTitle = $newstoryTitle;
    }
    public function setStoryImage($newstoryImage) {
        $this->image = $newstoryImage;
    }
    public function setTimePosted($newTimestamp) {
        $this->postTimestamp = $newTimestamp;
    }
    public function getId() {
        return $this->id;
    }
    public function getUserId() {
        return $this->userId;
    }
    public function getStoryTitle() {
        return $this->storyTitle;
    }
    public function getStoryBody() {
        return $this->storyBody;
    }
    public function getStoryImage() {
        $this->image;
    }
    public function getTimePosted() {
        return $this->postTimestamp;
    }
    static public function fetchAllPosts($postJson) {
        $result = array();
        //run check
        if (!empty($postJson)) {
            foreach ($postJson as $row) {
                $post = new Post();
                $post->id = $row['id'];
                $post->userId = $row['user_id'];
                $post->image = $row['post_image'];
                $post->postTimestamp = $row['post_timestamp'];
                $result[] = $post;
            }
        }
        return $result;
    }
    public function savePost($db) {
        if ($this->id == -1) {
            //Saving new post 
            $filename = $this->userId;
            $time = date("Y-m-d h:i:sa");
            $unix = strtotime($time);
            if (!is_dir(SITE_ROOT."/markdowns/{$filename}")) {
                mkdir(SITE_ROOT."/markdowns/{$filename}");
            }
            $fname = SITE_ROOT."/markdowns/{$filename}/{$filename}-{$unix}.md";
            $postfile = fopen($fname, "w") or die("failed while creating file");
            $result = fwrite($postfile, "<h2>{$this->storyTitle}</h2><p>{$this->storyBody}</p>");
            fclose($postfile);
            if ($result == true) {
                $id = $this->id = (mt_rand(100001,999999));
                $file = $fname;
                $img = $this->image;
                $posts[] = array('id'=> $id, 'user_id'=>$_SESSION['loggedUserId'], 'file_url'=> $file, 'post_image' => $img, 'post_timestamp' => $time);
                $json_db = "posts.json";
                $fp = fopen($json_db, 'w') or die("post DB not found");
                $data = $db;
                $prev_post = json_decode($data, true);
                $new_post = fwrite($fp, json_encode($posts));
                array_push($prev_post, $new_post);
                fclose($fp);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }
}
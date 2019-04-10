# Ziki

Each team is to come up with 2 different themes for the site. The teams will have to collaborate to create the following:
  - The blogging experience
  - Authentication (which should only be possible via google or via facebook, there is no native auth)
  - Commenting
  - Customisation of the sidebar
  - Uploading of the profile image
  
*This app is to be created *without a database*! The posts are to be stored as markdown files.*
_There should be a settings.json file that saves other things like auth token and so on.
To design their themes, each team will need a designer - and not all designers right now are getting positive comments from me. Please recruit the designers I am currently liking their work into your team._


## Installation
 **This project works with PHP**
* `git clone https://github.com/hnginternship5/ziki`
* cd into the folder or directory
* `composer install`
#Step 1
* ```php -S localhost:8000```
* open browser ``http://localhost:8000``    
OR
#Step 2
* ``` use XAMPP or WAMPP```
### Notice
* For every task you, dont push to Master!!!
* All icons are on the designs. Dont use Font Awesome. Thanks.
* Create a well detailed Pull Request please. Add screenshots of tasks done. So we wont take time to review your PR.
* Please and Please , dont override peoples work. So there won't be conflicts up and down.
* Thanks . Enjoy!!!
### 

## Application Architecture
The application uses a Model-View-Controller(MVC) pattern.

### Flow
Every request to the website should be directed at the index.php file located in the root directory. This is to ensure that everything a page requires to display correctly is always included. The index.php file triggers a call to a router function - located in `app/router.php`. This router is what directs all page requests to where they will be processed.  
A request can be processed in any of two ways. It can either echo a json response or display a HTML view located in the `views` directory.  
Processing of requests is done in a controller file. All controllers are located in the app/controllers directory.  
A controller can display a HTML view by including the file containing the html.  
All view files are located inside the `views` directory.

### Example
When a user wants to visit the timeline page which displays their posts, they go to `https://ziki.hng.tech/?page=timeline`.  
The router sees the page parameter in the query string and passes control to the timeline controller in the controllers directory.  
The timeline controller then registers the variables it needs to the view to show/use. After which it displays the corresponding view situated in the views directory.

### Current pages/links, their controllers and their views
Page |Link | Controller | View|
:-- | :--- | :--- | :---
Homepage |index.php?page=home | app/controllers/home.php | views/home.php |
Authentication/Login page |index.php?page=auth | app/controllers/auth/auth.php | views/auth.php |
Timeline |index.php?page=timeline | app/controllers/timeline/timeline.php | views/timeline.php |
Blog details |index.php?page=blog-detail | app/controllers/blog/blog-detail.php | views/blog-detail.php |
Contact |index.php?page=contact | app/controllers/contact-us.php | views/contact-us.php |
Drafts |index.php?page=drafts | app/controllers/drafts/drafts.php | views/drafts.php |
Feeds |index.php?page=feeds | app/controllers/feeds/feeds.php | views/feeds.php |
Editor |index.php?page=editor | app/controllers/editor/editor.php | views/editor.php |
Creating a post |index.php?page=post | app/controllers/post/post-action.php | echo's JSON response |

*This list is a work-in-progress. Please check the controllers, views directories and the app/router.php file to see other missed links* 


### Frontend
All assets required by the views should be located in the `assets` directory. This includes css, js and image files.

### Storage
All uploaded images, cached files, temporary items that are build/server specific should be placed in the `storage` directory

### Composer/Vendor Directory
An important benefit of a the MVC approach is that it centralizes the vendor directory. This way you can just include your dependencies in the `composer.json` file situated in the root directory and run `composer install` to install them.  

### Deployment
Every deploy should trigger a `composer install` to include any new dependencies the app might require since the vendor directory is no longer tracked by git.

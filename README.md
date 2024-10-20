Plan 

1. Implement login, register, and logout via laravel breeze

2. Using tailwind css

3. Make a model ‘Product’ for the post itself

4. Make a new controller for product 

5. Since the main feature of this website is CRUD we need to implement create, edit and delete in the views. We also set the ‘product’ page as the index page instead of the dashboard
The main logic in the index.blade.php is to display posts using ‘for each’ looping for the entire post that has been created and stored from the database, then paginate (using controller) into 3 maximum posts for each page.  

6. CRUD Logic : 

a. Create, there is a form where the user can submit images and then input some description. By the help of the controller, there will be a validate method for the inputs. the image itself then will be stored into the database after that it will be redirected into the index.blade.php.

  
  b. Edit, more or less similar layout to create/add post but the main difference is that in edit the post will retain the values from before (images and description) . After that the user can resubmit the image that the user wants to replace the current image, same logic applies to description. After saving the edit/update the user will be redirected to the index page again. 
  
  
  c. Delete, the delete itself exists in the edit page where the user can delete the post (image and description) that they posted from the database resulting the post will no longer exist on next time when the user reloads the website.  



Recording for project review :
- https://youtu.be/9FnphyspUao

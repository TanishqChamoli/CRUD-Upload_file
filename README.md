# Eiancoder_Tasks

## The flow of Task1:

    index.html:
      Has the form with the upload file option.
    display.php:
      Has a table which shows the data in the databse with two option
      Update and Delete
    update.php:
      On the basis of the id the data will be pulled from the database
      and we are able to change the values of the email id
    update_back.php:
      This is for the updation of the email id and makes the changes in the databse.
    delete.php:
      This will run the query on the basis of the id and then delete the data in the databse.

## The flow of Task2:
        
    The files are sel-explanatory.
    The structure is like:
        1. signup.php
            Form with the password validator on its backend
            Conditons are:
                a.Min len 8
                b.One lowercase char
                c.One uppercase char
                d.One number
        2. login.php
            Has a form for email and pass
        3. signup_back.php
            inserts the data in the php with the backend validator 
        4. login_back.php
            creates a session
        5. logout.php
            destroys the session
            
## The flow of Task3:
    
    The url in which we can see the table of the images.
    http://localhost/Task3/
    As we have already changed the name of the default_controller to the home page
    so we are directly gonna go on that page.
   
## The flow of Task4:
    
    The goal of this task was to make a CRUD application and to display
    all the data from the database on the same page, with the updatate and delete buttons.
  
    We are using User.php as the model and the Usermodel.php as the one which deasl with
    the data base.
    This is the url http://localhost/Task4/user/create

## The flow of Task5:

    I've made the SB Admin from bootstrap into a template which is available in CI.

## The flow of Task6:
    
    I've made a login and signup connection with the database and will also give out
    the results in flashdata and will be displayed in h5 of both of them
    lorem@ipsum.com:test [INSERTED USER]
    If needed you can insert the values after importing the database

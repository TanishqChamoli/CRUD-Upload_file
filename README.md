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

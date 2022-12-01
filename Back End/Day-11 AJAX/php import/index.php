<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Show all users</title>
</head>

<body>

   <button id="button">Get users</button>
 
   <h1>Users</h1>
   <div id="users">
 <!--our users will be displayed in this div-->
   </div>

   <script>
     
       document.getElementById("button").addEventListener("click", getUsers, false); //create an eventlistener to call getUsers() function when button clicked

       function getUsers() {
           const request = new XMLHttpRequest(); //create new request
           request.open("GET", "users.php", true); //set request as a GET method connecting to users.php
           request.onload = function () {
               if (this.status == 200) {
                   let users = JSON.parse(this.responseText); //data received are turned to objects
                   console.log(users) //see the array of objects in your console
                   let output = ''; //create container variable
                   // users.forEach(user => {
                   for (let i in users) {
                       output += `<p>first name: ${users[i].fname} 
                       last name: ${users[i].lname}</p>`; //loop through each object and display their properties
                   }
                   document.getElementById('users').innerHTML = output; //output results in div#users
                   // });
               }
           }
           request.send(); //send request
       }
   </script>
</body>
</html>
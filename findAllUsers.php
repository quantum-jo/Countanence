<?php
  session_start();
  include 'connection.php';
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Other Users</title>
     <style>

      body {
          background: #333;
      }

       header {
         height: 50px;
         background: #ddd;
       }

       header nav {
         margin: auto;
       }

       header nav ul {
         text-decoration: none;
         padding-top: 13px;
         text-align: center;
       }

       header nav ul li {
         display: inline;
         width: 30px;
         padding: 5px;
         background:rgb(0, 153, 255);
         border-radius: 4px;
       }

       header nav ul li:hover {
         cursor: pointer;
         background: #aaa;
         color: #fff;
       }

       header nav ul li a {
         text-decoration: none;
         color: #222;
       }

       .content {
         width: 60%;
         margin: auto;
         background: #ddd;
       }

       .items {
         position: relative;
         height: 50px;
         border: 2px solid #ccc;
         margin-bottom: 20px;
         background: #fff;
       }

       .items:hover {
         background: rgb(18, 22, 33);
         color: #fff;
         cursor: pointer;
       }

       .items .friendZone {
         position: absolute;
         top: 17px;
         right: 20px;
       }

       .addFriendButton {
         background: lightblue;
         padding: 5px;
         border: 0;
         border-radius: 4px;
         color: #444;
       }

       .addFriendButton:hover {
         cursor: pointer;
       }

     </style>
   </head>
   <body>
     <header>
         <nav>
           <ul>
             <li><a href="home.php">Home</a></li>
             <li><a href="#">Other Users</a></li>
           </ul>
         </nav>
     </header>

     <div class="main-wrapper">
       <div class="content"></div>
     </div>

     <script type="text/javascript">
        var wrapper = document.getElementsByClassName('content')[0];
        var users = new Array();
        var otherUserPlaces = new Array();
        var i = 0;
        var eventReg;

       function getAllUsers() {
         var xhttp = new XMLHttpRequest;
         xhttp.onreadystatechange = function() {
           if(this.readyState == 4 && this.status == 200) {
             users = JSON.parse(this.responseText);
             drawToDOM(users);
           }
         };
         xhttp.open('GET', 'getUsersList.php', true);
         xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
         xhttp.send();
       }


       function drawToDOM(users) {

         while(i != users.length) {
           var items = document.createElement('div');
           items.classList.add('items');
           items.id = i;
           items.setAttribute('onclick', 'userPlaceList(this)');

           var text = document.createTextNode(users[i]);
           items.appendChild(text);

           // var friendZone = document.createElement('div');
           // friendZone.classList.add('friendZone');
           //
           // var addFriendButton = document.createElement('button');
           // addFriendButton.innerHTML = 'Add Friend';
           // addFriendButton.classList.add('addFriendButton');
           // addFriendButton.setAttribute('onclick', 'friendZoneUser(this)')
           // friendZone.appendChild(addFriendButton);
           // items.appendChild(friendZone);

           wrapper.appendChild(items);
           i++;
         }
       }

       function userPlaceList(event) {
          while(wrapper.firstChild) {
            wrapper.removeChild(wrapper.firstChild);
          }

         var id = event.id;
         var userName = users[id];


         var xhttp = new XMLHttpRequest;
         xhttp.onreadystatechange = function() {
           if(this.readyState == 4 && this.status == 200) {
              otherUserPlaces = JSON.parse(this.responseText);
              var j = 0;
              while(j != otherUserPlaces.length) {
                var tempPlace = otherUserPlaces[j];
                drawPlacesToDOM(tempPlace);
                j++;
              }

           }
         };
         xhttp.open('GET', 'getAllPlaceList.php?q='+userName, true);
         xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
         xhttp.send();
       }

       function drawPlacesToDOM(tempPlace) {

         var items = document.createElement('div');
         items.classList.add('items');

         var placeDetails = document.createElement('div');
         var googleDetails = 'Place: '+tempPlace.place + ',' + tempPlace.address;
         var placeText = document.createTextNode(googleDetails);
         placeDetails.appendChild(placeText);
         items.appendChild(placeDetails);

         var userDetails = document.createElement('div');
         var userRatingText = document.createTextNode('Rating: '+tempPlace.rating+'  ');
         var userReviewText = document.createTextNode('Review: '+tempPlace.review);
         userDetails.appendChild(userRatingText);
         userDetails.appendChild(userReviewText);
         items.appendChild(userDetails);

         wrapper.appendChild(items);
       }

       function friendZoneUser(finder) {
         var id = finder.parentNode.parentNode.id;
         var friendUser = users[id];

       }

       getAllUsers();
     </script>
   </body>
 </html>

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
     <title>Places Library</title>
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
         height: 230px;
         border: 2px solid #ccc;
         margin-bottom: 20px;
         background: #fff;
       }

       .items:hover {
         background: rgb(18, 22, 33);
         color: #fff;
         cursor: pointer;
       }

     </style>
   </head>
   <body>

     <header>
         <nav>
           <ul>
             <li><a href="home.php">Home</a></li>
             <li><a href="#">Saved Places</a></li>
           </ul>
         </nav>
     </header>

     <div class="main-wrapper">
       <div class="content"></div>
     </div>

     <script>
       var data = new Array();

       function getData() {
         var i = 0;
         var xhttp = new XMLHttpRequest;
         xhttp.onreadystatechange = function() {
           if(this.readyState == 4 && this.status == 200) {
             data = JSON.parse(this.responseText);
             while(!data.length) {
               var list = data[i];
               drawToDOM(list, i);
               i++;
             }
           }
         };
         xhttp.open('GET', 'getAllPlaces.php', true);
       }

       function drawToDOM(list, i) {
         var content = document.getElementById('content');

         var items = document.createElement('div');
         items.classList.add('items');
         items.setAttribute('click', expand);
         items.setAttribute('id', 'place'+i);

         var placeDetails = document.createElement('div');
         var googleDetails = list.place + ',' + list.address;
         var placeText = document.createTextNode(googleDetails);
         placeDetails.appendChild(placeText);
         items.appendChild(placeDetails);

         var userDetails = document.createElement('div');
         var userRatingText = document.createTextNode(list.rating);
         var userReviewText = document.createTextNode(list.review);
         userDetails.appendChild(userRatingText);
         userDetails.appendChild(userReviewText);
         items.appendChild(userDetails);

         content.appendChild(items);
       }

       getData();
     </script>
   </body>
 </html>

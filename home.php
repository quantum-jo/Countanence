<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="reset.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

    <style>
      #map {
        width: 100%;
        height: 620px;
        position: absolute;
      }
      .main-search {
        display: inline;
        z-index: 2;
        position: absolute;
      }
      input {
        width: 200px;
        height: 30px;
        margin-left: 10px;
        margin-top: 50px;
        padding-left: 10px;
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
        padding-top: 20px;
        text-align: center;
      }

      header nav ul li {
        display: inline;
        width: 30px;
        padding: 5px;
        background: #bbb;
      }

      header nav ul li:hover {
        cursor: pointer;
        background: #aaa;
        color: #fff;
      }

      header nav ul li a {
        text-decoration: none;
      }
    </style>

    <style>
    /* The side navigation menu */
    .sidenav {
        height: 100%; /* 100% Full-height */
        width: 0; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        background-color: #111; /* Black*/
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 60px; /* Place content 60px from the top */
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
    }

    /* The navigation menu links */
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #f1f1f1;
    }

    /* Position and style the close button (top right corner) */
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

    </style>

  </head>
  <body>
    <header>
        <nav>
          <ul>
            <li><a href="#" onclick="activity()">Activity</a></li>
            <li><a href="#" onclick="findUsers()">Find Users</a></li>
            <li><a href="#" onclick="logout()">Log Out</a></li>
          </ul>
        </nav>
    </header>

    <div id="mySidenav" class="sidenav">
      <div id="sideContent0">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" class="information"></a>
        <a href="#" class="information"></a>
        <a href="#" class="information"></a>
        <a href="#" class="information" onclick="rate()"></a>
        <a href="#" class="information" onclick="review()"></a>
      </div>
      <div id="sideContent1"></div>
   </div>



<!--<span onclick="openNav()">open</span>-->


<div id="main">
  <div id="map"></div>
  <div class="main-search">
    <input type='text' placeholder='Search Box' id="pac-input" class="controls">
  </div>
</div>


    <script src="map.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcU2ezo7uiu-Xe78VMF7dByAD4mnpLD4g&libraries=places&callback=initMap"
  type="text/javascript"></script>
    <script type="text/javascript" src="operation.js"></script>



  <script type="text/javascript">

      /* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
    function openNav(placeInfo) {

      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

      document.getElementsByClassName('information')[0].innerText = placeInfo.name;
      document.getElementsByClassName('information')[1].innerText = placeInfo.formatted_address;

      if(placeInfo.rating) {
        document.getElementsByClassName('information')[2].innerText = placeInfo.rating;
      }
      document.getElementsByClassName('information')[3].innerText = 'Rate this place';
      document.getElementsByClassName('information')[4].innerText = 'Write a Review';
    }

    /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
    function closeNav() {

      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
      document.body.style.backgroundColor = "white";

    }

  </script>



  <script>
    function logout() {

      window.location = 'welcome.html';

    }

    function findUsers() {

      window.location = 'users.php';

    }

    function activity() {

      window.location = 'activity.php';

    }
  </script>



  </body>
</html>

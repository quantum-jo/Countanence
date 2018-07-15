var text;

//Function to write review
function review() {
  document.getElementById('mySidenav').style.backgroundColor = '#ccc';

  var wrapper = document.getElementsByClassName('review-wrapper')[0];
  wrapper.style.display = 'block';

  text = document.getElementById('review-textarea').innerText;
}

//Function to store review in database
function addReview() {
  console.log('enters function');
  var wrapper = document.getElementsByClassName('review-wrapper')[0];
  wrapper.style.display = 'none';

  var areaName = document.getElementsByClassName('information')[0].innerHTML;

  if(text) {
    var xhttp = new XMLHttpRequest;
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
          console.log('success');
      }
    };
    xhttp.open('GET', 'addInfo.php?q='+areaName+'&p='+text, true);
    xhttp.send();
  }
}

//Function to save a place to user library
function save() {
  var placeName = document.getElementsByClassName('information')[0].innerText;
  var address = document.getElementsByClassName('information')[1].innerText;
  var rating = document.getElementsByClassName('information')[2].innerText;

  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      review();
    }
  };
  if(!rating) {
    rating = 0;
  }
  xhttp.open('GET', 'savePlace.php?q='+placeName+'&p='+address+'&r='+rating);
  xhttp.send();
}

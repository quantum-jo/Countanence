function review() {
  document.getElementById('sideContent0').style.display = 'none';

  var content = document.getElementById('sideContent1')
  var textarea = document.createElement('textarea');
  textarea.setAttribute('class', 'reviewArea');
  content.appendChild(textarea);

  var submit = document.createElement('button');
  submit.setAttribute('click', text(this));
  content.appendChild(submit);
}

function text() {
  var reviewText = this.parentNode.firstChild.innerText;
  console.log(reviewText);

  var xhttp = new XMLHttpRequest;
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      conosle.log('success');
    }
  };
  xhttp.open('GET', 'addInfo.php?q='+reviewText, true);
  xhttp.send();
}

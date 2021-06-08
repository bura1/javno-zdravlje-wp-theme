/* Front page youtube video */
$('#yt-img').click(function(){
    video = '<iframe width="511" height="287" src="'+ $(this).attr('data-video') +'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $(this).replaceWith(video);
});


/* Fixed sidebar */
/*var topLimit = $('#bar-fixed').offset().top;
$(window).scroll(function() {
  if (topLimit <= $(window).scrollTop()) {
    $('#bar-fixed').addClass('stickIt')
  } else {
    $('#bar-fixed').removeClass('stickIt')
  }
})*/


/* Živi zdravo (Više button) */
function zivizdravoDisplay() {
  var displ = document.getElementsByClassName('zivizdravo-display');
  var i;
  for (i = 0; i < displ.length; i++) {
      displ[i].style.display = 'block';
  }

  document.getElementById('zz-button').style.display = 'none';
}


/* Pitanja i odgovori / PHP - AJAX Live Search */
function showResult(str) {
  if (str.length<=0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.backgroundColor="#f7f7f7";
    }
  }
  xmlhttp.open("GET","/wp-content/themes/jz/inc/search-pitanja-odgovori/livesearch.php?q="+str,true);
  xmlhttp.send();
}
/* Disable enter on input form */
function disableEnter(e) {
    if (e.keyCode == 13) {
        e.preventDefault();
    }
}
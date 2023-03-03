$(document).ready(function()
{
    //Check each 5 seconds
    window.setInterval(function(){
    	var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	// alert(xhttp.responseText);

				if(xhttp.responseText == "1")
				{
					// window.location.replace("logout.php");
					alert("It's time to logout!");
					location.replace("../logout.php");
				// 	x = true;
				}
				// alert(xhttp.responseText);
            }
        };
        xhttp.open("POST", "logtime.php", true);
        xhttp.send();
    }, 5000);
});

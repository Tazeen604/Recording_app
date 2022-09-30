<html>
    <head>
<script>
    if(navigator.mediaDevices.getUserMedia)
    {
        navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(stream => {
        document.getElementById("web-cam-container").srcObject = stream;
    }
     else{
console.log("No");
    }
</script>
        
    </head>
    <body>
    <video autoplay controls id="web-cam-container" 
            style="background-color: black;">
          
        </video>
        </body>
</html>
<html>
<head><title>Update Time</title>
<script>
    function UpdateTime(){
        
        var today = new Date();
        var hour = today.getHours();
        var mins = today.getMinutes();
        var secs = today.getSeconds();

        if (secs <=9){
            secs = "0" + secs
        }

        var TotalTime = hour + ":" + mins + ":" + secs;

        if (document.layers) { 
            document.layers.time.document.write(TotalTime); 
            document.layers.time.document.close(); 
        }else if (document.all) { 
            time.innerHTML = TotalTime; 
        } 

        setTimeout("UpdateTime()", 1000) 

}
</script>


</head>

<body onload="UpdateTime()">

<span id=time style="position:absolute;"></span>

</body>
</html>




<?php




?>


<head>
	<!-- Load plotly.js into the DOM -->
	<script src='https://cdn.plot.ly/plotly-2.4.2.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
</head>
<body>
  
<h1>

</h1>
<div id="chart1"></div>

<div id="chart"></div>

<script>
	setInterval( function getData() {
     xmlreq =  new XMLHttpRequest();
     xmlreq.open("GET","unload2.php",false);
     xmlreq.send(null);
     document.getElementById("chart1").innerHTML = JSON.parse(xmlreq.responseText);
     return  JSON.parse(xmlreq.responseText);
} , 1000);
  getData()
  



Plotly.newPlot('chart',[{
    y:[getData()],
    type:'line'
}]);
var cnt = 0;
            setInterval(function(){
                Plotly.extendTraces('chart',{ y:[[getData()]]}, [0]);
                cnt++;
                if(cnt > 300) {
                    Plotly.relayout('chart',{
                        xaxis: {
                            range: [cnt-300,cnt]
                        }
                    });
                }
            },15);

</script>
</body>
</html>

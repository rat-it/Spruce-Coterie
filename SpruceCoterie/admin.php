<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top:50px">
	<div class="row">
		<div class="col-sm-3">
    		<h3>You and just you!</h3>
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<label class="nav-link active" >Members</label>
				</li>
				<li class="nav-item">
					<label class="nav-link active" >Interests!</label>
				</li>
				<li class="nav-item">
					<label class="nav-link active" >Interests!</label>
				</li>
				<li class="nav-item">
					<label class="nav-link active" >Interests!</label>
				</li>
			</ul>


<!--
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<input type="hidden" name="xvalue" value="Jan" />
<input type="hidden" name="yvalue" value="45" />

<input type="hidden" name="xvalue" value="Jan1" />
<input type="hidden" name="yvalue" value="54" />

<input type="hidden" name="xvalue" value="Jan2" />
<input type="hidden" name="yvalue" value="8" />

<input type="hidden" name="xvalue" value="Jan3" />
<input type="hidden" name="yvalue" value="95" />

<input type="hidden" name="xvalue" value="Jan4" />
<input type="hidden" name="yvalue" value="12" />

<input type="hidden" name="xvalue" value="Jan5" />
<input type="hidden" name="yvalue" value="77" />

<input type="hidden" name="xvalue" value="Jan6" />
<input type="hidden" name="yvalue" value="22" />

<input type="hidden" name="xvalue" value="Jan7" />
<input type="hidden" name="yvalue" value="64" />

<input type="hidden" name="xvalue" value="Jan8" />
<input type="hidden" name="yvalue" value="34" />

<input type="hidden" name="xvalue" value="Jan9" />
<input type="hidden" name="yvalue" value="89" />

<script>
var xvalue= document.getElementsByName("xvalue");
var chartdata = "[";
var yvalue= document.getElementsByName("yvalue");
for(var i=0;i<xvalue.length;i++)
{
	chartdata = chartdata+ '{"name":"'+xvalue[i].value+'","y":'+parseFloat(yvalue[i].value)+'}';
	if(i!=xvalue.length-1)
	{
	chartdata = chartdata+ ',';
	}
}
chartdata = chartdata+"]";
console.log(JSON.parse(chartdata));
Highcharts.chart({
    chart: {
	renderTo:"container",

        type: 'pie'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
     plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
	series:  [{
        name: 'Brands',
        colorByPoint: true,
        data:JSON.parse(chartdata)
		}]	
});
</script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<input type="hidden" name="xvalue" value="Jan" />
<input type="hidden" name="yvalue" value="45" />

<input type="hidden" name="xvalue" value="Jan1" />
<input type="hidden" name="yvalue" value="54" />

<input type="hidden" name="xvalue" value="Jan2" />
<input type="hidden" name="yvalue" value="8" />

<input type="hidden" name="xvalue" value="Jan3" />
<input type="hidden" name="yvalue" value="95" />

<input type="hidden" name="xvalue" value="Jan4" />
<input type="hidden" name="yvalue" value="12" />

<input type="hidden" name="xvalue" value="Jan5" />
<input type="hidden" name="yvalue" value="77" />

<input type="hidden" name="xvalue" value="Jan6" />
<input type="hidden" name="yvalue" value="22" />

<input type="hidden" name="xvalue" value="Jan7" />
<input type="hidden" name="yvalue" value="64" />

<input type="hidden" name="xvalue" value="Jan8" />
<input type="hidden" name="yvalue" value="34" />

<input type="hidden" name="xvalue" value="Jan9" />
<input type="hidden" name="yvalue" value="89" />

<script>
var xvalue= document.getElementsByName("xvalue");
var chartdata = "[";
var yvalue= document.getElementsByName("yvalue");
for(var i=0;i<xvalue.length;i++)
{
	chartdata = chartdata+ '{"name":"'+xvalue[i].value+'","y":'+parseFloat(yvalue[i].value)+'}';
	if(i!=xvalue.length-1)
	{
	chartdata = chartdata+ ',';
	}
}
chartdata = chartdata+"]";
console.log(JSON.parse(chartdata));
Highcharts.chart({
    chart: {
	renderTo:"container",

        type: 'pie'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
     plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
	series:  [{
        name: 'Brands',
        colorByPoint: true,
        data:JSON.parse(chartdata)
		}]	
});
</script>
 -->
</body>
</html>
$(document).ready(function(){
 $.ajax({
   url: "http://localhost/data.php",
   method: "GET",
   success: function(data1) {
     console.log(data);
     var data = JSON.parse(data1)
     var name = [];
     var id = [];
     console.log(typeof(data));
     console.log(data[1]);
     for(var i in data) {
       name.push("name " + data[i].name);
       id.push(data[i].id);
     }

     var chartdata = {
       labels: name,
       datasets : [
         {
           label: 'Pl  ',
           backgroundColor: 'red',
           borderColor: 'rgba(200, 200, 200, 0.75)',
           hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
           hoverBorderColor: 'rgba(200, 200, 200, 1)',
           data: id
         }
       ]
     };

     var ctx = $("#mycanvas");

     var barGraph = new Chart(ctx, {
       type: 'bar',
       data: chartdata
     });
   },
   error: function(data) {
     console.log(data);
   }
 });
});

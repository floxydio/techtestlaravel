<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>

  <div id="data_timestamp">
  <canvas id="pie-chart" width="1" height="1"></canvas>

  </div>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
    let dataTimeStamp = document.getElementById("data_timestamp")
    let getPieChart  = document.getElementById("pie-chart")
    console.log(dataTimeStamp)
    fetch("http://192.168.43.110:9000/api/timestamp-user").then((data) => data.json()).then((res) => {
      console.log(res.result[0].minute)
      console.log(res.result.length)
      new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: res.result.map((e) => e.name),
      datasets: [{
        label: "Activity Minutes",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: res.result.map((e) => e.minute)
      }]
    },
   });
      })
</script>
</body>
</html>

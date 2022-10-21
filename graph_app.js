$(document).ready(function(){
  $.ajax({
    url: "graph_data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var date_ = [];
      var time_difference = [];

      for(var i in data) {
        date_.push("Date " + data[i].date_);
        time_difference.push(data[i].time_difference);
      }

      var chartdata = {
        labels: date_,
        datasets : [
          {
            label: 'Time Difference',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: time_difference
          }
        ]
      };

      var ctx = $("#paramChart");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});// JavaScript Document
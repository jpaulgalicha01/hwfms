// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

$(document).ready(function(){
        $.ajax({
          type:"POST",
          url:"inputConfig.php",
          data:{function:"fetch_active_user"},
          dataType: "JSON",
          success:function(data){
              // var count_active = [];
              var brgy = [];
              // var color = [];

              $.each(data,function (){
                // count_active.push(this['count_active']);
                brgy.push(this['brgy_name']);
                // color.push(this['color']);
              });            

            console.log(brgy);

            var ctx = document.getElementById("myBarChart");
            var myLineChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: brgy,
                datasets: [{
                  label: "Active Users",
                  backgroundColor: "rgba(2,117,216,1)",
                  borderColor: "rgba(2,117,216,1)",
                  data: [22,33,4,1,24,56,12,4,22,11,5,6,1,5,3],
                }],
              },
              options: {
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'month'
                    },
                    gridLines: {
                      display: false
                    },
                  }],
                  yAxes: [{
                    ticks: {
                      min: 1,
                      max: 100,
                      maxTicksLimit: 10
                    },
                  }],
                },
                legend: {
                  display: false
                }
              }
            });
          }
        })
      });

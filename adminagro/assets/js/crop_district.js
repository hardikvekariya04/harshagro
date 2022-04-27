var path = "http://localhost/newagro/pages/";
var d_id ='';
var year = '';
var week = '';
var per_id = '';
var period_id = '';

var d_id = document.getElementById("district").value;
fetch_data();
console.log(d_id);
var week = document.getElementById("weeks").value;
console.log(week);
fetch_data();
var year = document.getElementById("years").value;

fetch_data();
var per_id = document.getElementById("type").value;

fetch_data();
var period_id = document.getElementById("per").value;

$(function(){
    $(document).on('change','#district',function(){
        d_id = $(this).children(":selected").attr("id");
        fetch_data();
    })
    $(document).on('change','#weeks',function(){
      week = $(this).val();
      fetch_data();
  })
    $(document).on('change','#years',function(){
        year = $(this).val();
        fetch_data();
    })
    $(document).on('change','#type',function(){
      per_id = $(this).val();
      fetch_data();
  })
  $(document).on('change','#per',function(){
    period_id = $(this).val();
    fetch_data();
})
});
function fetch_data(){
$.ajax({
    url: path +"crop_district_fetch_data.php"  ,
    type: 'post',
    data: { d_id: d_id , week: week, year: year ,per_id: per_id,period_id: period_id},
    success: function (result) {
        result = JSON.parse(result); 
        update_chart(result);  
    }
});

$.ajax({
  url: path +"crop_district_fetch_bar_data.php"  ,
  type: 'post',
  data: { d_id: d_id , week: week , year: year ,per_id: per_id,period_id: period_id},
  success: function (result1) {
      result1 = JSON.parse(result1);
      update_chart1(result1); 
  }
});
}

function update_chart(result){
    $("canvas#chart-line").remove();
  $("div#chart_data").append('<canvas id="chart-line" class="chart-canvas" height="270" width="300" style="margin-left:-5px"></canvas>');
      var ctx2 = document.getElementById("chart-line").getContext("2d");
  if(per_id == "NDVI"){
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: result.final_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(46, 204, 113)",
          pointBorderColor: "transparent",
          borderColor: "rgba(46, 204, 113)",
          borderColor: "rgba(46, 204, 113)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: result.month_final,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'NDVI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
  }
  else if(per_id == "VCI"){
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: result.final_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(76,152,107, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(76,152,107, .8)",
          borderColor: "rgba(76,152,107, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: result.month_final,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'VCI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
  }
  else if(per_id == "VHI"){
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: result.final_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(106,122,106)",
          pointBorderColor: "transparent",
          borderColor: "rgba(106,122,106)",
          borderColor: "rgba(106,122,106)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: result.month_final,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'VHI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
  }
  else{
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: result.final_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(000,000,000, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(000,000,000, .8)",
          borderColor: "rgba(000,000,000, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: result.month_final,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'NDVI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
  }
}

function update_chart1(result1){
  $("canvas#chart-bars").remove();
$("div#chart_data1").append('<canvas id="chart-bars" class="chart-canvas" height="280" width="300"></canvas>');
var ctx = document.getElementById("chart-bars").getContext("2d");
if(per_id == "NDVI"){
  new Chart(ctx, {
      type: "bar",
      data: { 
        labels: result1.date_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          borderRadius: 3,
          borderSkipped: false,
          backgroundColor: "rgba(46, 204, 113)",
          data: result1.yearly_month_array,
          maxBarThickness: 15
        }, ],
      },
    
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'NDVI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
              color: "#000"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
}
else if(per_id == "VCI"){
    new Chart(ctx, {
        type: "bar",
        data: { 
          labels: result1.date_array,
          datasets: [{
            label: `${per_id}`+` `+`Temp`,
            tension: 0,
            borderWidth: 0,
            borderRadius: 3,
            borderSkipped: false,
            backgroundColor: "rgba(76,152,107)",
            data: result1.yearly_month_array,
            maxBarThickness: 15
          }, ],
        },
      
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              display: true,
            title: {
              display: true,
              text: 'VCI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(000, 000, 000, .2)'
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 10,
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 1.5
                },
                color: "#000"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(000, 000, 000, .2)'
              },
              ticks: {
                display: true,
                color: '#000',
                padding: 10,
                font: {
                  size: 15,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 1.5
                },
              }
            },
          },
        },
      });
}
else if(per_id == "VHI"){
  new Chart(ctx, {
      type: "bar",
      data: { 
        labels: result1.date_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          borderRadius: 3,
          borderSkipped: false,
          backgroundColor: "rgba(106,122,106)",
          data: result1.yearly_month_array,
          maxBarThickness: 15
        }, ],
      },
    
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'VHI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
              color: "#000"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
}
else{
  new Chart(ctx, {
      type: "bar",
      data: { 
        labels: result1.date_array,
        datasets: [{
          label: `${per_id}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          borderRadius: 3,
          borderSkipped: false,
          backgroundColor: "rgba(000,000,000, .8)",
          data: result1.yearly_month_array,
          maxBarThickness: 15
        }, ],
      },
    
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'NDVI',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
              color: "#000"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
              },
            }
          },
        },
      },
    });
}
}
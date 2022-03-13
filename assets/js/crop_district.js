var path = "http://localhost/newagro/pages/";
var d_id ='';
var year = '';
var week = '';
var per_id = '';
// var $district = $( '#district' ),
// 		$taluka = $( '#taluka' ),
//     $options = $taluka.find( 'option' );
    
// $district.on( 'change', function() {
// 	$taluka.html( $options.filter( '[value="' + this.value + '"]' ) );
// } ).trigger( 'change' );
// let d_id = document.getElementById("taluka");
// // let ahmadabad = document.getElementById("1");

// d_id.addEventListener("change", (e) => {
//   $selected_taluka_id = e.target.selectedIndex+1;
//   console.log(selected_taluka_id);
// });
var year = document.getElementById("years").value;
console.log(year);
fetch_data();
var week = document.getElementById("weeks").value;
console.log(week);
fetch_data();
$(function(){
    $(document).on('change','#district',function(){
        d_id = $(this).children(":selected").attr("id");
        console.log(d_id);
        fetch_data();
    })
    $(document).on('change','#years',function(){
        year = $(this).val();
        // console.log(year);
        fetch_data();
    })
    $(document).on('change','#weeks',function(){
        week = $(this).val();
        // console.log(week);
        fetch_data();
    })
//     $(document).on('change','#per',function(){
//       per_id = $(this).val();
//       console.log(per_id);
//       fetch_data();
//   })
});
function fetch_data(){
$.ajax({
    url: path +"crop_district_fetch_data.php"  ,
    type: 'post',
    data: { d_id: d_id , year: year , week: week},
    success: function (result) {
        result = JSON.parse(result);
        // console.log(result.final_array);  
        update_chart(result);  
        // update_chart1(result); 
    }
});

$.ajax({
  url: path +"crop_district_fetch_bar_data.php"  ,
  type: 'post',
  data: { d_id: d_id , year: year , week: week,per_id: per_id},
  success: function (result1) {
      result1 = JSON.parse(result1);
      console.log(result1.date_array);
      update_chart1(result1); 
  }
});
}

function update_chart(result){
    $("canvas#chart-line").remove();
  $("div#chart_data").append('<canvas id="chart-line" class="chart-canvas" height="270" width="300"></canvas>');
      var ctx2 = document.getElementById("chart-line").getContext("2d");
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: result.amount,
        datasets: [{
          label: `${week}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(000, 000, 000, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(000, 000, 000, .8)",
          borderColor: "rgba(000, 000, 000, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: result.month,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
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
                lineHeight: 2
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
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
}

function update_chart1(result1){
  $("canvas#chart-bars").remove();
$("div#chart_data1").append('<canvas id="chart-bars" class="chart-canvas" height="280" width="300"></canvas>');
var ctx = document.getElementById("chart-bars").getContext("2d");
  new Chart(ctx, {
      type: "bar",
      data: { 
        labels: result1.date_array,
        datasets: [{
          label: `${week}`+` `+`Temp`,
          tension: 0,
          borderWidth: 0,
          borderRadius: 5,
          borderSkipped: false,
          backgroundColor: "rgba(000, 000, 000, .8)",
          data: result1.final_array,
          maxBarThickness: 6
        }, ],
      },
    
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
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
                lineHeight: 2
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
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
    
}
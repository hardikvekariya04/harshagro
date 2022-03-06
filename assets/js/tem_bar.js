var path = "http://localhost/newagro/";
var taluka_id ='';
var date_id = '';
var temp_id = '';
var per_id = '';
var $district = $( '#district' ),
		$taluka = $( '#taluka' ),
    $options = $taluka.find( 'option' );
    
$district.on( 'change', function() {
	$taluka.html( $options.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );
// let taluka_id = document.getElementById("taluka");
// // let ahmadabad = document.getElementById("1");

// taluka_id.addEventListener("change", (e) => {
//   $selected_taluka_id = e.target.selectedIndex+1;
//   console.log(selected_taluka_id);
// });

$(function(){
    $(document).on('change','#taluka',function(){
        taluka_id = $(this).children(":selected").attr("id");
        // console.log(taluka_id);
        fetch_data();
    })
    $(document).on('change','#date',function(){
        date_id = $(this).val();
        // console.log(date_id);
        fetch_data();
    })
    $(document).on('change','#type',function(){
        temp_id = $(this).val();
        // console.log(temp_id);
        fetch_data();
    })
    $(document).on('change','#per',function(){
      per_id = $(this).val();
      console.log(per_id);
      fetch_data();
  })
});
function fetch_data(){
$.ajax({
    url: path +"fetch_data.php"  ,
    type: 'post',
    data: { taluka_id: taluka_id , date_id: date_id , temp_id: temp_id,per_id: per_id},
    success: function (result) {
        result = JSON.parse(result);
        // console.log(result.amount);  
        update_chart(result);  
        // update_chart1(result); 
    }
});

$.ajax({
  url: path +"fetch_bar_data.php"  ,
  type: 'post',
  data: { taluka_id: taluka_id , date_id: date_id , temp_id: temp_id,per_id: per_id},
  success: function (result1) {
      result1 = JSON.parse(result1);
      update_chart1(result1); 
  }
});
}

function update_chart(result){
    $("canvas#chart-line").remove();
  $("div#chart_data").append('<canvas id="chart-line" class="chart-canvas" height="300" width="300"></canvas>');
      var ctx2 = document.getElementById("chart-line").getContext("2d");
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: result.amount,
        datasets: [{
          label: `${temp_id}`,
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
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
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
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
              color: '#f8f9fa',
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
$("div#chart_data1").append('<canvas id="chart-bars" class="chart-canvas" height="300" width="300"></canvas>');
var ctx = document.getElementById("chart-bars").getContext("2d");
  new Chart(ctx, {
      type: "bar",
      data: { 
        labels: result1.date_array,
        datasets: [{
          label: "Temperature",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
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
              color: 'rgba(255, 255, 255, .2)'
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
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
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
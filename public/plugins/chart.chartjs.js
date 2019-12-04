window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(201, 203, 207)'
};


    var config = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            231,
            231,
            172,
            103,
            76,
            127,
          ],
          backgroundColor: [
            window.chartColors.red,
            window.chartColors.orange,
            window.chartColors.yellow,
            window.chartColors.green,
            window.chartColors.blue,
          ],
          label: 'Dataset 1'
        }],
        labels: [
          'Obra pública',
          'Presidente',
          'Inseguridad',
          'Violencia',
          'Narco',
          'Otros',
        ]
      },
      options: {
        responsive: true,
         legend: {
            display: true,
        }
      },
      plugins:{
        labels: {
            render: 'label',
            fontColor: ['green', 'white', 'red'],
          }
      }
      /*plugins: {
        legend: false,
        outlabels: {
           backgroundColor: "#8C1DFF", // Background color of Label
            borderColor: "#001BFF", // Border color of Label
            borderRadius: 17, // Border radius of Label
            borderWidth: 10, // Thickness of border
            color: 'white', // Font color
            display: true,
            lineWidth: 10, // Thickness of line between chart arc and Label
            padding: 17,
            stretch: 100, // The length between chart arc and Label
            text: "%l (%p)",
            textAlign: "center"
                   
        }
     }*/

    };

    window.onload = function() {
      var ctx = document.getElementById('chart-area').getContext('2d');
      window.myPie = new Chart(ctx, config);
    };

    
    var colorNames = Object.keys(window.chartColors);
    

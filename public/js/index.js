$(function(){
  'use strict'

  var area1 = new Chartist.Line('#chartArea1', {
    labels: [1, 2, 3, 4, 5, 6, 7, 8],
    series: [
      [6, 8, 7, 10, 14, 11, 16, 18],
      [2, 4, 3, 4, 5, 3, 5, 4]
    ]
  }, {
    high: 30,
    low: 0,
    axisY: {
      onlyInteger: true,
      offset: 0
    },
    axisX: {
      offset: 0
    },
    showArea: true,
    fullWidth: true,
    chartPadding: {
      bottom: 0,
      left: 0,
      right: 0,
      top: 0
    }
  });
}

// resize chart when container changest it's width
  new ResizeSensor($('.dash-chartist'), function(){
    area1.update();
  });
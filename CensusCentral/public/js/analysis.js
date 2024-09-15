
const ctx = document.getElementById('myChart');
const years = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019];
const values1 = [700, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478];
const values2 = [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000];
const values3 = [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100];

new Chart(ctx, {
  type: "line",
  data: {
    labels: years,
    datasets: [{
      data: values1,
      borderColor: "red",
      fill: false
    },{
      data: values2,
      borderColor: "green",
      fill: false
    },{
      data: values3,
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: { display: false },
    scales: {
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Years'
        }
      }],
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Values'
        }
      }]
    }
  }
});

const ctx2 = document.getElementById('myChart2');
const years2 = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019];
const v1 = [1000, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478];
const v2 = [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000];
const v3 = [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100];

new Chart(ctx2, {
  type: "line",
  data: {
    labels: years,
    datasets: [{
      data: v1,
      borderColor: "red",
      fill: false
    },{
      data: v2,
      borderColor: "green",
      fill: false
    },{
      data: v3,
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: { display: false },
    scales: {
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Years'
        }
      }],
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Values'
        }
      }]
    }
  }
});

const ctx3 = document.getElementById('myChart3');
const years3 = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019];
const v4 = [500, 1150, 1070, 1075, 1090, 1130, 1350, 2250, 7900, 2500];
const v5 = [5040, 1720, 1750, 1920, 2050, 2750, 4100, 5150, 6100, 7100];
const v6 = [320, 730, 2050, 5100, 6250, 4150, 2050, 1050, 220, 120];

new Chart(ctx3, {
  type: "line",
  data: {
    labels: years,
    datasets: [{
      data: v4,
      borderColor: "red",
      fill: false
    },{
      data: v5,
      borderColor: "green",
      fill: false
    },{
      data: v6,
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: { display: false },
    scales: {
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Years'
        }
      }],
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Values'
        }
      }]
    }
  }
});

const ctx4 = document.getElementById('myChart4');
const years4 = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019];
const v7 = [10000, 1200, 1080, 1100, 1150, 1180, 1400, 2300, 7900, 2500];
const v8 = [1650, 1750, 1800, 9500, 2100, 2800, 4200, 5100, 6200, 7200];
const v9 = [350, 750, 2100, 5100, 6200, 4100, 2100, 1050, 250, 150];


new Chart(ctx4, {
  type: "line",
  data: {
    labels: years,
    datasets: [{
      data: v7,
      borderColor: "red",
      fill: false
    },{
      data: v8,
      borderColor: "green",
      fill: false
    },{
      data: v9,
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: { display: false },
    scales: {
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Years'
        }
      }],
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Values'
        }
      }]
    }
  }
});


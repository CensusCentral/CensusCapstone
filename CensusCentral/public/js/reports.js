
  const highlightButton = (buttonType) => {
    const overallBtn = document.getElementById('overall-btn');
    const barangayBtn = document.getElementById('barangay-btn');

    if (buttonType === 'overall') {
        overallBtn.classList.add('active');
        barangayBtn.classList.remove('active');
    } else {
        overallBtn.classList.remove('active');
        barangayBtn.classList.add('active');
    }
}

const selectBarangay = (barangayName) => {
    highlightButton('barangay');
    document.getElementById('barangay-btn').innerHTML = `<span>${barangayName}</span> <i class="fas fa-angle-down"></i>`;
}

document.addEventListener('DOMContentLoaded', function() {
  const chartData = JSON.parse(document.getElementById('chartData').textContent);
  
  const barangays = chartData.map(item => item.barangay);
  const populations = chartData.map(item => item.population);
  const pwdData = chartData.map(item => item.pwd);
  const seniorData = chartData.map(item => item.senior);
  const data4ps = chartData.map(item => item['4ps']);
  const housingLoanData = chartData.map(item => item.housingLoan);

  function createChart(canvasId, label, data, color) {
      const ctx = document.getElementById(canvasId).getContext('2d');
      return new Chart(ctx, {
          type: 'bar',
          data: {
              labels: barangays,
              datasets: [{
                  label: label,
                  data: data,
                  backgroundColor: color,
                  borderColor: color,
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true,
                      title: {
                          display: true,
                          text: 'Count'
                      }
                  },
                  x: {
                      title: {
                          display: true,
                          text: 'Barangay'
                      }
                  }
              },
              plugins: {
                  title: {
                      display: true,
                      text: label + ' by Barangay'
                  }
              }
          }
      });
  }

  createChart('populationChart', 'Population', populations, 'rgba(75, 192, 192, 0.6)');
  createChart('pwdChart', 'PWD', pwdData, 'rgba(255, 99, 132, 0.6)');
  createChart('seniorChart', 'Senior Citizens', seniorData, 'rgba(255, 206, 86, 0.6)');
  createChart('4psChart', '4Ps Beneficiaries', data4ps, 'rgba(54, 162, 235, 0.6)');
  createChart('housingLoanChart', 'Housing Loan (Pag-IBIG)', housingLoanData, 'rgba(153, 102, 255, 0.6)');
});



// const ctx1 = document.getElementById('populationChart');

// new Chart(ctx1, {
//   type: 'bar',
//   data: {
//     labels: [
//       'Baclaran', 'Banay-Banay', 'Banlic', 'Bigaa', 'Butong', 'Casile',
//       'Diezmo', 'Gulod', 'Mamatid', 'Marinig', 'Niugan', 'Pittland', 
//       'Pulo', 'Sala', 'San Isidro', 'Brgy. I', 'Brgy. II', 'Brgy. III'
//   ],
//     datasets: [{
//       label: '# of Population',
//       data: [
//         0, 1, 10, 20, 30, 40, 50, 
//         60, 70, 80, 90, 100, 110,
//         120, 130, 140, 150, 200
//         // Add corresponding data values
//     ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     reponsive: true
//   }
// });

// const ctx2 = document.getElementById('beneficiariesChart');

// new Chart(ctx2, {
//   type: 'bar',
//   data: {
//     labels: [
//       'Baclaran', 'Banay-Banay', 'Banlic', 'Bigaa', 'Butong', 'Casile',
//       'Diezmo', 'Gulod', 'Mamatid', 'Marinig', 'Niugan', 'Pittland', 
//       'Pulo', 'Sala', 'San Isidro', 'Brgy. I', 'Brgy. II', 'Brgy. III'
//   ],
//     datasets: [{
//       label: '# of 4Ps Beneficiaries',
//       data: [
//         0, 1, 10, 20, 30, 40, 50, 
//         60, 70, 80, 90, 100, 110,
//         120, 130, 140, 150, 200
//         // Add corresponding data values
//     ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     reponsive: true
//   }
// });

// const ctx3 = document.getElementById('pwdChart');

// new Chart(ctx3, {
//   type: 'bar',
//   data: {
//     labels: [
//       'Baclaran', 'Banay-Banay', 'Banlic', 'Bigaa', 'Butong', 'Casile',
//       'Diezmo', 'Gulod', 'Mamatid', 'Marinig', 'Niugan', 'Pittland', 
//       'Pulo', 'Sala', 'San Isidro', 'Brgy. I', 'Brgy. II', 'Brgy. III'
//   ],
//     datasets: [{
//       label: '# of Person with Disabilities',
//       data: [
//         0, 1, 10, 20, 30, 40, 50, 
//         60, 70, 80, 90, 100, 110,
//         120, 130, 140, 150, 200
//         // Add corresponding data values
//     ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     reponsive: true
//   }
// });

// const ctx4 = document.getElementById('seniorChart');

// new Chart(ctx4, {
//   type: 'bar',
//   data: {
//     labels: [
//       'Baclaran', 'Banay-Banay', 'Banlic', 'Bigaa', 'Butong', 'Casile',
//       'Diezmo', 'Gulod', 'Mamatid', 'Marinig', 'Niugan', 'Pittland', 
//       'Pulo', 'Sala', 'San Isidro', 'Brgy. I', 'Brgy. II', 'Brgy. III'
//   ],
//     datasets: [{
//       label: '# of Senior Citizens',
//       data: [
//         0, 1, 10, 20, 30, 40, 50, 
//         60, 70, 80, 90, 100, 110,
//         120, 130, 140, 150, 200
//         // Add corresponding data values
//     ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     reponsive: true
//   }
// });

// const ctx5 = document.getElementById('ISFChart');

// new Chart(ctx5, {
//   type: 'bar',
//   data: {
//     labels: [
//       'Baclaran', 'Banay-Banay', 'Banlic', 'Bigaa', 'Butong', 'Casile',
//       'Diezmo', 'Gulod', 'Mamatid', 'Marinig', 'Niugan', 'Pittland', 
//       'Pulo', 'Sala', 'San Isidro', 'Brgy. I', 'Brgy. II', 'Brgy. III'
//   ],
//     datasets: [{
//       label: '# of Informal Settlers Families',
//       data: [
//         0, 1, 10, 20, 30, 40, 50, 
//         60, 70, 80, 90, 100, 110,
//         120, 130, 140, 150, 200
//         // Add corresponding data values
//     ],
//       borderWidth: 1
//     }]
//   },
//   options: {
//     reponsive: true
//   }
// });





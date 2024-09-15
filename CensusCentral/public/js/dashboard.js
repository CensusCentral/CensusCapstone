document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed');

    // Ensure that chartDataElement exists
    const chartDataElement = document.getElementById('chartData');
    if (!chartDataElement) {
        console.error('Cannot find element with id "chartData"');
        return;
    }

    // Parse the data from the chartDataElement
    let data;
    try {
        data = JSON.parse(chartDataElement.textContent);
        console.log('Parsed chart data:', data);
    } catch (error) {
        console.error('Error parsing chart data:', error);
        return;
    }

    // Check if data is a valid array with content
    if (!Array.isArray(data) || data.length === 0) {
        console.error('Invalid or empty chart data');
        return;
    }

    // Set up the canvas context for Chart.js
    const ctx = document.getElementById('populationChart').getContext('2d');
    console.log('Canvas context:', ctx);



    
    // Prepare labels and population data for the chart
    const labels = data.map(item => item.barangay || 'Unknown');
    const populationData = data.map(item => item.population || 0);


    function goToBarangay(barangay) {
        // Construct the URL with the barangay parameter
        const url = `/admin/barangay?barangay=${encodeURIComponent(barangay)}`;
    
        // Redirect to the constructed URL
        window.location.href = url;
    }
    // Initialize the Chart.js chart
    let chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Population',
                data: populationData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            onClick: function(event, elements) {
                if (elements.length > 0) {
                    const element = elements[0];
                    const index = element.index;
                    const barangay = this.data.labels[index];
                    goToBarangay(barangay);
                }
            }
        }
    });

    console.log('Initial chart created:', chart);



    // Function to update the chart based on card clicks
    function updateChart(chartType) {
        console.log('Updating chart with type:', chartType);
        
        // Validate chartType
        const validChartTypes = ['totalPopulation', 'totalPwd', 'totalSenior', 'total4ps', 'totalHousingLoan']; // Add other valid types
        if (!validChartTypes.includes(chartType)) {
            console.error('Invalid chart type:', chartType);
            return;
        }
        
        // Check the structure of data
        console.log('Data structure:', data);
        
        // Map new values based on the clicked card's chart type
        const values = data.map(item => {
            console.log('Item:', item);
            console.log('Value for type', chartType, ':', item[chartType]);
            return item[chartType] || 0;
        });
        
        console.log('New values:', values);
        
        // Update the chart with the new data and label
        chart.data.datasets[0].data = values;
        chart.data.datasets[0].label = chartType.charAt(0).toUpperCase() + chartType.slice(1);
        chart.update();
        console.log('Chart updated with new data');
    
        // Update the chart title
        const chartTitleElement = document.getElementById('chartTitle');
        if (chartTitleElement) {
            chartTitleElement.textContent = `${chartType.charAt(0).toUpperCase() + chartType.slice(1)} by Barangay`;
        }
    }
    

    // Set up click event listeners for the cards
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function() {
            const chartType = this.getAttribute('data-chart');
            updateChart(chartType);
        });
    });
});

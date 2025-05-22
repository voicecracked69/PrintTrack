// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
const ctx = document.getElementById('myPieChart').getContext('2d');
const myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Running', 'Idle', 'Not Working'],
        datasets: [{
            data: [runningCount, idleCount, notWorkingCount],
            backgroundColor: ['#4e73df', '#1cc88a', '#e74a3b'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#be2617'],
            hoverBorderColor: 'rgba(234, 236, 244, 1)',
        }]
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 60,
    },
});


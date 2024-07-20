
// Fungsi untuk format angka
function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function (n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
      };
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart").getContext('2d');
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: tingkatanLabels,
      datasets: [{
          label: "Jumlah Anggota",
          backgroundColor: "#4e73df",
          hoverBackgroundColor: "#2e59d9",
          borderColor: "#4e73df",
          data: jumlahAnggota,
      }],
  },
  options: {
      layout: {
          padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
          }
      },
      scales: {
          xAxes: [{
              time: {
                  unit: 'level'
              },
              gridLines: {
                  display: false,
                  drawBorder: false
              },
              ticks: {
                  maxTicksLimit: 12
              },
              maxBarThickness: 25,
          }],
          yAxes: [{
              ticks: {
                  min: 0,
                  max: Math.max(...jumlahAnggota) + 10,
                  maxTicksLimit: 5,
                  padding: 10,
                  callback: function (value, index, values) {
                      return number_format(value);
                  }
              },
              gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
              }
          }],
      },
      legend: {
          display: false
      },
      tooltips: {
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10
      },
  }
});
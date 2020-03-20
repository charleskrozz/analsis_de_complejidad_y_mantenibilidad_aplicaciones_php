
<script type="text/javascript" src="{{ asset('asset/vendor/jquery-3.2.1.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/bootstrap-4.1/popper.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/vendor/slick/slick.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/wow/wow.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/animsition/animsition.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/counter-up/jquery.waypoints.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/counter-up/jquery.counterup.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/circle-progress/circle-progress.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/chartjs/Chart.bundle.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/vendor/select2/select2.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('asset/js/main.js') }}" ></script>


<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);
 
    setTimeout(function() {
        $(".content2").fadeIn(1500);
    },6000);
});
</script>
<script type="text/javascript">
    // Percent Chart
try{
    var ctx = document.getElementById("percent-chart1");
    if (ctx) {
      ctx.height = 260  ;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [20, 80],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'IM',
            'Faltante'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }
</script>

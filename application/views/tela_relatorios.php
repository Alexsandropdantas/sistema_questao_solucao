<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Conversas com o bot nos últimos 30 dias</h3>
              </div>
              <!-- /.card-header -->
              <div id="chart"></div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->



<script>
var chart = c3.generate({
    data: {
        x: 'x',
        columns: [
            ['x', '2021-03-01', '2021-03-02', '2021-03-03', '2021-03-04', '2021-03-05', '2021-03-06','2021-03-07', '2021-03-08', '2021-03-09', '2021-03-10', '2021-03-11'],
            ['Privado com o bot', 15, 30, 18, 24, 30, 22, 15, 30, 18, 24, 31],
            ['Mencionado o bot', 11, 20, 22, 10, 20, 30, 11, 20, 22, 10, 11],
			['média', 13, 25, 20, 17, 25, 26, 13, 25, 20, 17, 21]
        ],
        axes: {
         'média': 'y'
        },
        type: 'bar',
        types: {
          média: 'line'
        },
    },
    legend: {
        show: true
    },
    subchart: {
      show: false
    },
    zoom: {
      enabled: true
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '%Y-%m-%d'
            }
        },
        y: {
          label: {
            text: 'Some data',
            position: 'outer-middle'
          }
        },
        y2: {
          show: true,
          label: {
            text: 'avg. Média dia',
            position: 'outer-middle'
          },
          max: 30,
          min: -10
        }
    }
});
</script>



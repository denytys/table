<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>e-cert database</title>

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="assets/css/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

</head>
<body>
      <div class="col-md-8 col-md-offset-2">
        <div class="description">
          <h1>Table e-cert in</h1>
        </div>
        <div class="fresh-table full-color-orange">
          <table id="fresh-table" class="table">
            <thead>
              <tr>
                <th data-field="no_cert">Cert Number</th>
                <th data-field="tgl_cert" data-sortable="true">Cert Date</th>
                <th data-field="komo_eng" data-sortable="true">Comodity name</th>
                <th data-field="neg_asal" data-sortable="true">Country of origin</th>
                <th data-field="tujuan" data-sortable="true">Place of shipment</th>
                <th data-field="port_tuju" data-sortable="true">Port of destination</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'koneksi.php';
              $sql= mysqli_query ($koneksi, "SELECT * FROM ecert_in");
              if(mysqli_num_rows($sql) == 0){ 
                        echo '<tr><td colspan="7">Data Tidak Ada.</td></tr>';  
                        }else{  
                          $no = 1; // mewakili data dari nomor 1
                          while($row = mysqli_fetch_assoc($sql)){  
                            echo '
                            <tr>
                              <td>'.$row['no_cert'].'</td>
                              <td>'.$row['tgl_cert'].'</td>
                              <td>'.$row['komo_eng'].'</td>
                              <td>'.$row['neg_asal'].'</td>
                              <td>'.$row['tujuan'].'</td>
                              <td>'.$row['port_tuju'].'</td>
                            </tr>
                            ';
                            $no++;
                          }
                        }
                ?>
            </tbody>
          </table>
        </div>
      </div>
</body>
  <script type="text/javascript">
    var $table = $('#fresh-table')

    $(function () {
      $table.bootstrapTable({
        classes: 'table table-hover table-striped',
        toolbar: '.toolbar',

        search: true,
        showColumns: true,
        pagination: true,
        striped: true,
        sortable: true,
        pageSize: 10,
        pageList: [10, 25, 50, 100],

        formatShowingRows: function (pageFrom, pageTo, totalRows) {
          return ''
        },
        formatRecordsPerPage: function (pageNumber) {
          return pageNumber + ' rows visible'
        }
      })

    })
  </script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga')

    ga('create', 'UA-46172202-1', 'auto')
    ga('send', 'pageview')
  </script>
</html>

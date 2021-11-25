<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
    <style>
    @media print
    {
        @page 
        {
            size: landscape;
        }
    }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script>
    window.print();
    </script>
</head>
<body>
    <article class="uk-article">

        <h1 class="uk-article-title uk-margin-remove uk-padding-remove uk-text-center">Laporan Transaksi</h1>

        <table class="uk-table uk-table-hover uk-table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penerima</th>
                    <th>No HP Penerima</th>
                    <th>Alamat Penerima</th>
                    <th>Sub Harga</th>
                    <th>Admin</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Tgl Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($transaksi as $a) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $a['nama_penerima']; ?></td>
                    <td><?php echo $a['nohp_penerima']; ?></td>
                    <td><?php echo $a['alamat_penerima']; ?></td>
                    <td><?php echo 'Rp '.number_format($a['sub_harga']); ?></td>
                    <td><?php echo 'Rp '.number_format($a['admin']); ?></td>
                    <td><?php echo 'Rp '.number_format($a['total_harga']); ?></td>
                    <td><?php echo $a['metode_pembayaran']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($a['create_at'])); ?></td>
                </tr>
                <?php
                $no++;
                }
                ?>
            </tbody>
        </table>
    </article>
</body>
</html>
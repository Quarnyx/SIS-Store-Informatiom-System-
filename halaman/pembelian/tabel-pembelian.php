<table id="tabel-data" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Nama Supplier</th>
            <th>Tgl. Masuk</th>
            <th>Harga Beli</th>
            <th>Qty</th>
            <th>Satuan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";
        $query = mysqli_query($conn, query: "SELECT * FROM v_pembelian");
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $data['kode_pembelian'] ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['nama_supplier'] ?></td>
                <td><?= $data['tanggal_masuk'] ?></td>
                <td>Rp. <?= number_format($data['harga_beli'], 0, ',', '.') ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['satuan'] ?></td>
                <td>Rp. <?= number_format($data['harga_beli'] * $data['jumlah'], 0, ',', '.') ?></td>
                <td>
                    <button data-id="<?= $data['id_barang'] ?>" data-kodetransaksi="<?= $data['kode_pembelian'] ?>"
                        id="delete" type="button" class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        try {
            new simpleDatatables.DataTable("#tabel-data", {
                searchable: true,
                fixedHeight: false,
                order: [0, 'desc']
            })
        } catch (err) { }
        $('#tabel-data').on('click', '#delete', function () {
            const kode_transaksi = $(this).data('kodetransaksi');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus transaksi ini? ', function () {
                $.ajax({
                    type: 'POST',
                    url: 'halaman/pembelian/proses-pembelian.php?aksi=hapus-pembelian',
                    data: {
                        kode_transaksi: kode_transaksi
                    },
                    success: function (data) {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            alertify.success(response.message);
                            loadTable();
                        } if (response.status == 'error') {
                            alertify.error(response.message);
                        }
                    },
                    error: function (data) {
                        alertify.error('Gagal');
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });
    });
</script>
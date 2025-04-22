<table id="table-data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Satuan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../config.php';
        $no = 1;
        $sql = "SELECT * FROM barang";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kode_barang'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['satuan'] ?></td>
                <td><?= 'Rp. ' . number_format($row['harga_beli'], 0, ',', '.') ?></td>
                <td><?= 'Rp. ' . number_format($row['harga_jual'], 0, ',', '.') ?></td>
                <td>
                    <button id="lihat-gambar" data-nama="<?= $row['nama_barang'] ?>" data-id="<?= $row['id_barang'] ?>"
                        class="btn btn-primary btn-sm">Lihat Gambar</button>
                    <button id="edit" data-nama="<?= $row['nama_barang'] ?>" data-id="<?= $row['id_barang'] ?>"
                        class="btn btn-primary btn-sm">Edit</button>
                    <button id="delete" data-nama="<?= $row['nama_barang'] ?>" data-id="<?= $row['id_barang'] ?>"
                        class="btn btn-danger btn-sm">Hapus</button>

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
            new simpleDatatables.DataTable("#table-data", {
                searchable: true,
                fixedHeight: false,
            })
        } catch (err) { }
        $('#table-data').on('click', '#edit', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $.ajax({
                type: 'POST',
                url: 'halaman/barang/edit-barang.php',
                data: 'id=' + id + '&nama=' + nama,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data ' + nama);
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#table-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + nama + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'halaman/barang/proses-barang.php?aksi=hapus-barang',
                    data: 'id=' + id,
                    success: function (data) {
                        if (data == "ok") {
                            loadTable();
                            $('.modal').modal('hide');
                            alertify.success('Barang Berhasil Dihapus');

                        } else {
                            alertify.error('Barang Gagal Dihapus');

                        }
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });
        $('#table-data').on('click', '#lihat-gambar', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $.ajax({
                type: 'POST',
                url: 'halaman/barang/lihat-gambar.php',
                data: 'id=' + id + '&nama=' + nama,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Lihat Gambar ' + nama);
                    $('.modal .modal-body').html(data);
                }
            })
        });
    });
</script>
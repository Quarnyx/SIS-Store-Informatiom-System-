<div class="container-fluid">
    <button class="btn btn-primary mb-3 mt-3" id="tambah">Tambah Pembelian</button>

    <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Histori Pembelian</h4>
                    <div id="load-table">

                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div>
<script>
    function loadTable() {
        $('#load-table').load('halaman/pembelian/tabel-pembelian.php')
    }
    $(document).ready(function () {
        loadTable();
        $('#tambah').on('click', function () {
            $('.modal').modal('show');
            $('.modal-title').html('Tambah Pembelian');
            // load form
            $('.modal-body').load('halaman/pembelian/tambah-pembelian.php');
        });
    });
</script>
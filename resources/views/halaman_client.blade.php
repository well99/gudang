<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark justify-content-end">
        <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 20px;">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <span class="nav-link" type="button" data-kat="0" onclick="barangId(this)">Semua</span>
                </li>
                @foreach ($menu as $mn)
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{ strtolower($mn->nama_jenis_barang) }}">{{ $mn->nama_jenis_barang }}</a> -->
                    <span class="nav-link" type="button" data-kat="{{ strtolower($mn->id_jenis_barang) }}" onclick="barangId(this)">{{ $mn->nama_jenis_barang }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="ms-auto" style="margin-right: 5px;">
            <a style="text-decoration: none; color:white;" href="">Keranjang <i class="fas fa-chart-area fa-fw"></i></a>
        </div>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <main class="container">
            <div class="container mt-5">
                <div class="row" id="listcard">
                    <!-- @foreach ($barang as $bg)
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{ asset('images/foto_barang/' .$bg->foto) }}" class="card-img-top" style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $bg->nama_barang }}</h5>
                            <p class="card-text">{{ $bg->harga_satuan }}</p>
                            <button type="button" class="btn btn-primary" onclick="showModal({{ $bg->id_barang }})">
                                Beli
                            </button>
                        </div>
                    </div>
                    @endforeach -->
                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form onsubmit="formsubmit(e)">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" readonly class="form-control" id="stok">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlah" min="1" onchange="gantijumlah(this.value)">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="total" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="harga">
                                <input type="text" readonly class="form-control" id="total" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script>
        (function() {
            initialize();
        })()

        async function initialize() {
            url = 'http://127.0.0.1:8000/api/barang'
            data = await getData(url)
            console.log(data);
            datacard = tampilanCard(data)
            document.getElementById("listcard").innerHTML = datacard
        }

        function tampilanCard(data) {
            let card = ''
            asset = 'http://127.0.0.1:8000'
            data.data.map((d, i) => {
                card += `
                        <div class="card m-3" idcard=${d.id}  style="width: 18rem;">
                        <img src="${asset + '/images/foto_barang/' +  d.foto}" class="card-img-top" style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">${d.nama}</h5>
                            <p class="card-text">${d.harga}</p>
                            <button type="button" class="btn btn-primary" onclick="showModal(${d.id})">
                                Beli
                            </button>
                        </div>
                    </div>
                    `
            })
            return card
        }

        async function barangId(e) {
            console.log(e.dataset.kat);
            if (e.dataset.kat == 0) {
                initialize()
            } else {
                const formdata = new FormData();
                formdata.append("id_jenis", e.dataset.kat);
                requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow"
                };
                url = 'http://127.0.0.1:8000/api/byidjenis'
                data = await getData(url, requestOptions)
                console.log(data);
                datacard = tampilanCard(data)
                document.getElementById("listcard").innerHTML = datacard
            }
        }


        async function showModal(idbarang) {
            await fetch('http://127.0.0.1:8000/api/barangbyid/' + idbarang)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById("nama").value = data.data.nama_barang;
                    document.getElementById("stok").value = data.data.jumlah_barang;
                    document.getElementById("harga").value = data.data.harga_satuan;
                });

            $('#exampleModal').modal('show');
        }

        function gantijumlah(a) {
            harga = document.getElementById("harga").value
            document.getElementById("total").value = harga * a
        }

        function getData(url, form = '') {
            if (form == '') {
                return fetch(url)
                    .then(response => response.json())
                    .then(result => result)
                    .catch(error => error);
            }
            return fetch(url, form)
                .then(response => response.json())
                .then(result => result)
                .catch(error => error);
        }

        function formsubmit(e) {
            e.preventDefault();
        }
    </script>
</body>

</html>
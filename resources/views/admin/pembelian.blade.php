    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase</title>
    {{-- style nya --}}
    <link rel="stylesheet" href="petugas/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">



    <body style="font-family: 'Poppins', sans-serif;">
        <div class="app-container">
            <div class="app-header">
                <div class="app-header-left">
                    <span class="">
                        <img src="logo.png" alt="Logo" style="vertical-align: middle;">
                    </span>                
                    <p class="app-name" style="display: inline-block; margin-left: 5px;">
                        <span style="color: #8B4513;">Juan's</span>
                        <span style="color: #8B8589;">Store</span>
                    </p>
                <div class="search-wrapper">
                <input class="search-input" type="text" id="searchInput" placeholder="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
                <defs></defs>
                <circle cx="11" cy="11" r="8"></circle>
                <path d="M21 21l-4.35-4.35"></path>
                </svg>
                </div>
                </div>
                <div class="app-header-right">
                    <div class="message-box" style="overflow: hidden; position: relative;">
                        <img src="{{asset('fotoUsers/'.$img)}}" alt="" style="width: 50px; height: 50px;">
                    </div>
                    <div >
                        <center><span><b>{{ $namaPengguna }}</b></span></center>
                            <center><span style="color: grey">{{ $role }}</span></center>
                    </div>
                </div>
                </div>
                <div class="app-content">
                <div class="app-sidebar">
                    <a href="dashboard" class="app-sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" /></svg>
                        </a>
                        <a href="pembelian" class="app-sidebar-link active">
                        <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-pie-chart" viewBox="0 0 24 24">
                        <defs />
                        <path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
                        </svg>
                        </a>





    {{-- LOGOUT BUTTON ------------------------------------------------------------------------------------------------------------------------------------------}}
                <a href="logout" class="app-sidebar-link" onclick="logout()" data-toggle="tooltip" title="Log Out">
                    <i class="fas fa-sign-out-alt"></i>
                </a>


            </div>

    <!-- CONTENT -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <style>
        .table-hover tbody tr:hover {
            transform: scale(1.08);
            transition: transform 0.3s ease;
        }
        .table-hover tbody tr {
                transition: transform 0.3s ease;
            }

            .table-hover tbody tr:hover {
                transform: scale(1.05);
            }
    </style>

    <div class="app-container">
        <div class="app-content">
            <div class="projects-section" style="box-shadow: 20px 20px 50px 0px rgba(0, 0, 0, 0.1); overflow: auto;">
                <div class="projects-section-header">
                    <p>Purchase List</p>
                    <a href="{{ route('excel.penjualan') }}" class="btn btn-primary">
                        <i class="bi bi-file-earmark-excel"></i> Excel
                    </a>                    
                    
                </div>
                <div class="projects-section-line">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Product Selected</th>
                                <th>Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $pelanggans = $pelanggans->reverse();
                            @endphp
                            @foreach ($pelanggans as $value)
                            <tr data-target="#purchaseModal" data-toggle="modal" class="nama-box">
                                <td>{{$loop->iteration}}
                                    @if($loop->first && $value->created_at->diffInMinutes() < 30)
                                    <span class="badge badge-success">New</span>
                                    @elseif($value->updated_at->diffInMinutes() < 30)
                                    <span class="badge badge-warning">
                                        New Update
                                        <br>
                                        <span class="text-muted" style="font-size: 10px">at: {{$value->updated_at->format('H : i a')}}</span>
                                    </span>
                                    @endif
                                </td>
                                <td class="nama">{{$value->namapelanggan}}</td>
                                <td>{{$value->telepon}}</td>
                                <td>{{$value->alamat}}</td>
                                <td>Product Name 1, Product Name 2</td>
                                <td>
                                    {{$value->created_at->isoFormat('D MMMM  YYYY')}} <br>
                                    {{$value->created_at->setTimezone('Asia/Jakarta')->format('H:i a')}}
                                </td>

                            </tr>

                            @endforeach
                            <!-- Add more rows for each purchase -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseModalLabel" aria-hidden="true">
            {{-- POPUP DETAIL PEMBELIAN ----------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="purchaseModalLabel">Purchase Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>Nama Pelanggan :</b> <span id="customerName"></span></p>
                                        <p><b>No Telephone :</b> <span id="customerPhone"></span></p>
                                        <p><b>Alamat :</b> <span id="customerAddress"></span></p>
                                        <p><b>Produk :</b> <span id="customerProducts"></span></p>
                                        <p><b>Tanggal Pembelian :</b> <span id="purchaseDate"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        @foreach ($penjualans as $detail)
                                        <tr>
                                            <p></p>
                                            <p>{{number_format($detail->total_price)}}</p>
                                        </tr>
                                    @endforeach
                                    </div>



                                </div>
                            </div>
        </div>

    {{-- JAVASCRIPT UNTUK MENAMPILKAN POPUP DETAIL PEMBELIAN --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rows = document.querySelectorAll('.table-hover tbody tr');
            rows.forEach(function(row) {
                row.addEventListener('click', function() {
                    var cells = this.getElementsByTagName('td');
                    var customerName = cells[1].innerText;
                    var customerPhone = cells[2].innerText;
                    var customerAddress = cells[3].innerText;
                    var customerProducts = cells[4].innerText;
                    var purchaseDate = cells[5].innerText;

                    document.getElementById('customerName').innerText = customerName;
                    document.getElementById('customerPhone').innerText = customerPhone;
                    document.getElementById('customerAddress').innerText = customerAddress;
                    document.getElementById('customerProducts').innerText = customerProducts;
                    document.getElementById('purchaseDate').innerText = purchaseDate;

                    // Show the modal
                    $('#purchaseModal').modal('show');
                });
            });
        });
    </script>
    {{-- END JAVASCRIPT UNTUK MENAMPILKAN POPUP DETAIL PEMBELIAN --}}

    {{-- JS HOVER TEXTT --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var rows = document.querySelectorAll('.table-hover tbody tr');
                rows.forEach(function(row) {
                    row.addEventListener('mouseover', function() {
                        this.style.transform = 'scale(1.02)';
                        this.style.transition = 'transform 0.1s ease';
                    });
                    row.addEventListener('mouseleave', function() {
                        this.style.transform = 'scale(1)';
                        this.style.transition = 'transform 0.3s ease';
                    });
                });
            });
        </script>

    {{-- JAVASCRIPT UNTUK SEARCH --}}
    <script>
        // Fungsi untuk memfilter produk berdasarkan nama saat pencarian berubah
        function searchProducts() {
            var input, filter, projectBoxes, productName, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            projectBoxes = document.getElementsByClassName('nama-box');

            // Iterasi melalui setiap elemen project-box
            for (i = 0; i < projectBoxes.length; i++) {
                // Perhatikan cara Anda mendapatkan nama produk dari konten
                productName = projectBoxes[i].querySelector('.nama').textContent.toUpperCase();
                if (productName.indexOf(filter) > -1) {
                    projectBoxes[i].style.display = '';
                } else {
                    projectBoxes[i].style.display = 'none';
                }
            }
        }

        // Tambahkan event listener untuk memanggil fungsi searchProducts saat nilai pencarian berubah
        document.getElementById('searchInput').addEventListener('input', searchProducts);

    </script>


        <!-- SweetAlert-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = "{{ Session::get('success') }}";
                if(successMessage) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: successMessage,
                        timer: 1000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
    </body>
    </html>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    {{-- style nya --}}
    <link rel="stylesheet" href="petugas/style.css">

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
                    <div class="search-wrapper" style="display: flex; align-items: center; justify-content: center;">
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

                <a href="" class="app-sidebar-link active" title="Dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" /></svg>
                </a>

                <a href="penjualan" class="app-sidebar-link" title="customer List">
                    <i class="fas fa-shopping-cart"></i>
                </a>




    {{-- LOGOUT BUTTON ------------------------------------------------------------------------------------------------------------------------------------------}}
                <a href="logout" class="app-sidebar-link" onclick="logout()" data-toggle="tooltip" title="Log Out">
                    <i class="fas fa-sign-out-alt"></i>
                </a>


            </div>

        <!-- CONTENT -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                    <div class="projects-section" style="box-shadow: 20px 20px 50px 0px rgba(0, 0, 0, 0.1);">
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var successMessage = "{{ Session::get('success') }}";
                                if(successMessage) {
                                    // Tampilkan SweetAlert dengan pesan kesuksesan
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

                    <div class="projects-section-header">
                    <p>Product</p>
                    <p class="time">Cashier</p>
                    </div>
                    <div class="projects-section-line">
                    <!-- Your existing HTML -->
    <div class="projects-status mx-auto">
        <div class="c" style="border: none; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); transition: box-shadow 1s ease; width: 300px;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div style="font-size: 15px; color: darkgray;" > Process
                    <span style="color: darkgray;"><b style="color: red;"></b></span>
                </div>
                <a href="#"  onclick="showSelectedProducts()">
                    <i class="fas fa-arrow-right" style="color: rgb(49, 224, 13); font-size: 20px;" title="Checkout"></i>
                </a>
            </div>
        </div>
    </div>





        <div class="view-actions">

                <button class="view-btn grid-view active" title="Product View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" /></svg>
                </button>
                    </div>
                    </div>

    {{-- PRODUCT ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}

    <div class="project-boxes jsGridView">
        <form id="customer-form" action="{{ route('penjualan.store') }}" method="POST">
            @csrf
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="project-box" style="background-color: white;">
                        <label class="product-option project-box-content-header product-image" style="overflow: hidden; position: relative;">
                            <input type="checkbox" class="PRODUK" name="product_id[{{$product->id}}]"  value="{{ $product->id }}">
                            <div class="product-details" style="width: 100%; height: auto;">
                                <img src="{{ asset('fotoProduk/'.$product->img) }}" alt="img produk" style="width: 90%; height: auto;">
                                <div class="product-info">
                                    <br>
                                    <p class="product-name" style="color: grey">{{ $product->namaproduk }}</p>
                                    <p class="product-price" style="color: grey; font:bold"><b style="color: black">Rp. {{ number_format($product->harga) }} </b>({{$product->stock}})</p>
                                
                                </div>
                                <div class="form-group col-md-6 col-12">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity-{{$product->id}}" name="quantity[{{$product->id}}]" class="form-quantity form-control" >
                            </div>
                            </div>
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="box-progress-bar">
            </div>
    </div>




    <!-- Popup untuk menampilkan produk yang dipilih -->
<!-- Popup untuk menampilkan produk yang dipilih -->
<div class="modal fade" id="selectedProductModal" tabindex="-1" role="dialog" aria-labelledby="selectedProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectedProductModalLabel">Product Chooses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                {{-- <div class="col-md-5" id="selectedProductList">
                </div> --}}
                <!-- Formulir informasi pelanggan di sebelah kanan -->
                <div class="col-md-6">
                    <center><h4>Customer Information</h4></center>
                    <div class="form-group">
                        <label for="nama">Name:</label>
                        <input type="text" id="namapelanggan" name="namapelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Number Phone:</label>
                        <input type="number" id="telepon" name="telepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Address:</label>
                        <input type="text" id="alamat" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bayar">Membayar:</label>
                        <input type="number" id="bayar" name="bayar" class="form-control" oninput="calculateChange()">
                        <script>
                            function calculateChange() {
                                var totalHarga = parseInt(document.getElementById('totalPrice').textContent.replace('Total Price: Rp. ', '').replace(',', ''));
                                var jumlahBayar = parseInt(document.getElementById('bayar').value);
                                var kembalian = jumlahBayar - totalHarga;
                                document.getElementById('kembalian').textContent = 'Kembalian: Rp. ' + kembalian.toLocaleString();
                            }
                        </script>
                        
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <div style="flex: 1; text-align: left;">
                    <p id="kembalian" class="text-center"><b>Kembalian: Rp. 0</b></p>
                </div>
                <div style="flex: 1; text-align: right;">
                    <h4 id="totalPrice" class="text-center">Total Price: Rp. 0</h4>
                </div>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </div>
            
                <!-- JavaScript untuk menghitung total harga -->
<script>
    // Fungsi untuk menghitung total harga
    function calculateTotal() {
    // Mendapatkan semua elemen input quantity
    var quantityInputs = document.querySelectorAll('.form-quantity');
    var totalPrice = 0;

    // Menghitung total harga berdasarkan harga produk dan jumlah yang dimasukkan
    quantityInputs.forEach(function(input) {
        var quantity = parseInt(input.value || 0); // Pastikan nilai quantity adalah angka atau default ke 0
        var price = parseInt(input.parentNode.parentNode.querySelector('.product-price b').textContent.replace('Rp. ', '').replace(',', '')) || 0; // Pastikan harga adalah angka atau default ke 0
        totalPrice += quantity * price;
    });

    // Menampilkan total harga di modal
    document.getElementById('totalPrice').textContent = 'Total Price: Rp. ' + totalPrice.toLocaleString();
    }

    // Panggil fungsi calculateTotal setiap kali input quantity diubah
    document.querySelectorAll('.form-quantity').forEach(function(input) {
    input.addEventListener('input', calculateTotal);
    });

</script>

                <button type="submit" class="btn btn-primary" >Checkout</button>
            </div>
        </div>
    </div>
</div>



                            </div>
                        </div>

                    </div>
                    </div>


    {{-- CSS NYA -----------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
            <style>
                .custom-modal-lg {
                    max-width: 80% !important; /* Sesuaikan lebar modal sesuai kebutuhan */
                }
                .card {
                    border: none;
                    border-radius: 10px;
                    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Efek shadow box */
                    transition: box-shadow 0.5s ease; /* Animasi perubahan shadow box */
                }

                /* Efek 3D ketika card dihover */
                .card:hover {
                transform: translateY(-9px); /* Menggeser card ke atas sedikit saat dihover */
                transition: transform 0.5s ease; /* Menambahkan transisi lembut untuk perubahan transformasi */
                }

            </style>

    <!-- JavaScript untuk menampilkan produk yang dipilih -->
    <script>
        function showSelectedProducts() {
            // Mendapatkan daftar semua checkbox yang dipilih
            var selectedProducts = document.querySelectorAll('input[class="PRODUK"]:checked');
    
            // Mendapatkan elemen modal
            var modal = document.getElementById('selectedProductModal');
    
            // Mendapatkan elemen di dalam modal untuk menampilkan produk yang dipilih
            // var selectedProductList = modal.querySelector('#selectedProductList');
    
            // Mengosongkan daftar produk yang dipilih sebelum menambahkan yang baru
            // selectedProductList.innerHTML = '';
    
            // Loop melalui setiap checkbox yang dipilih
            selectedProducts.forEach(function(checkbox) {
                // Mendapatkan detail produk dari data yang tersimpan dalam atribut data-* checkbox
                var productDetails = checkbox.parentElement.querySelector('.product-details').innerHTML;
                var formQuantity = checkbox.parentElement.querySelector('.form-quantity').value;
                var productId = checkbox.parentElement.querySelector('.form-quantity').id;
    
                // Membuat elemen div baru untuk menampilkan detail produk
                var productDiv = document.createElement('div');
                productDiv.innerHTML = productDetails;
    
               
                // Menambahkan detail produk ke dalam daftar produk yang dipilih
                // selectedProductList.appendChild(productDiv);
                document.getElementById(productId).value =formQuantity;

            });
    
            // Menampilkan modal
            $('#selectedProductModal').modal('show');
        }
    </script>
    </form>

    {{-- JAVASCRIPT UNTUK SEARCH --}}
    <script>

        function searchProducts() {
            var input, filter, projectBoxes, productName, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            projectBoxes = document.getElementsByClassName('project-box');

            // Iterasi melalui setiap elemen project-box
            for (i = 0; i < projectBoxes.length; i++) {
                // Perhatikan cara Anda mendapatkan nama produk dari konten
                productName = projectBoxes[i].querySelector('.product-name').textContent.toUpperCase();
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

{{-- LOADER --}}
{{-- <style>
    #loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 1s ease;
        opacity: ;
    }

    #loader.hidden {
        opacity: 0;
        pointer-events: none;
    }

    #loader video {
        max-width: 50%;
        max-height: 100%;
        border-radius: 50%;
        border: none
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
    }
</style>
<div id="loader">
    <video autoplay loop muted>
        <source src="juanslogo.mp4" type="video/mp4">
    </video>
</div> --}}
<script>
    window.addEventListener('load', function () {
        const loader = document.getElementById('loader');
        const content = document.getElementById('content');

        window.setTimeout(function () {
            loader.classList.add('hidden');
            content.style.display = 'block';
        }, 2000); 
    });
</script>

            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>

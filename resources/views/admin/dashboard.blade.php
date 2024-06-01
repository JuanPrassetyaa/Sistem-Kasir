    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    {{-- style nya --}}
    <link rel="stylesheet" href="admin/style.css">

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
                <input class="search-input" type="text" id="searchInput"  placeholder="Search">
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

    {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


                </div>
                <div class="app-content">
                <div class="app-sidebar">
                <a href="" class="app-sidebar-link active">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" /></svg>
                </a>

                <a href="pembelian" class="app-sidebar-link">
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

                    <div class="projects-section" style="box-shadow: 20px 20px 50px 0px rgba(0, 0, 0, 0.1);">
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Periksa jika ada pesan kesuksesan dalam sesi
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
                    <p class="time">April, 19</p>
                    </div>
                    <div class="projects-section-line">
                    <div class="projects-status" style="margin-left: 250px ">
                    <div class="item-status" style="padding-right: 24px">
                    <span class="status-number" style="text-align: center">{{$totalProduk}}</span>
                    <span class="status-type" >Product</span>
                    </div>
                    <div class="item-status"style="padding-right: 24px">
                    <span class="status-number" style="text-align: center">{{$totalUser}}</span>
                    <span class="status-type">Users</span>
                    </div>
                    <div class="item-status"style="padding-right: 24px">
                    <span class="status-number" style="text-align: center">{{$pelanggans}}</span>
                    <span class="status-type">Purchase</span>
                    </div>
                    </div>
                    <div class="view-actions">
    {{-- BUTTON CREATE PRODUK -------------------------------------------------------------------------------------------------------------------------------------------------------------}}

                <button class="view-btn" title="Create" data-toggle="modal" data-target="#select" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </button>

    {{-- POPUP SELECT CREATE ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
                <div class="modal fade" id="select" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="" style="margin-left: 150px">Select Create</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#createProductModal">
                                            Create Product
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createUserModal">
                                            Create User
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


    {{-- POPUP CREATE PRODUK -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
                <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="" style="margin-left: 150px">Create Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="namaproduk" name="namaproduk" placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="img" class="form-control-file" id="productImage">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


    {{-- POPUP CREATE USERS ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
                <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="" style="margin-left: 150px">Create Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
                                        </div>
                                        <label for="nama">Role</label>
                                        <div class="row">
                                            <div class="col">
                                                <select name="role" id="role" class="form-control" aria-label="Role">
                                                    <option value="" disabled selected>Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="nama">Password</label>
                                            <input type="string" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Foto</label>
                                            <input type="file" name="img" class="form-control-file" id="productImage">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    {{-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

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
                        @foreach ($produk as $value)
                        <div class="project-box-wrapper">
                            <div class="project-box product-image" style="background-color: white;overflow: hidden; position: relative;">
                                <div class="project-box-header">
                                    <span class="nama">{{$value->namaproduk}}</span>
                                </div>
                                <div class="project-box-content-header product-image" style="overflow: hidden; position: relative;">
                                    <img src="{{asset('fotoProduk/'.$value->img)}}" alt="" style="width: 200px; height: 110px;"
                                    data-toggle="modal" data-target="#edithapus{{$value->id}}">
                                </div>
                                <div class="box-progress-wrapper">
                                    <center><p class="box-progress-header">Rp. {{number_format($value->harga)}}
                                        <span style="font-size: 13px; font:unbold">({{$value->stock}})</span></p></center>
                                    <br>
                                    <div class="project-box-header ">
                                        <span>Created :  {{$value->created_at->isoFormat('D MMMM  YYYY')}}</span>
                                    </div>
                                    <div class="box-progress-bar">
                                        <span class="box-progress" style="width: 100%; background-color: #f7e600"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
    {{-- POPUP UNTUK MENAMPILKAN EDIT DAN HAPUS --}}
            <div class="modal fade" id="edithapus{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="edithapus{{$value->id}}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 20px;">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editProductModal{{$value->id}}">
                                        Edit  <i class="bi bi-pen"></i>
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{ route('produk.delete',['id' => $value->id] )}}" method="POST"  style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-primary btn-block" >
                                        Delete  <i class="bi bi-trash2"></i>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    {{-- END POPUP EDIT DAN HAPUS --}}

    {{-- POPUP UNTUK EDIT PRODUK --}}
            <div class="modal fade" id="editProductModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="editProductModal{{$value->id}}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 20px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModal{{$value->id}}Label">Product Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('produk.update', ['id' => $value->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control" id="namaproduk{{$value->id}}" name="namaproduk[{{$value->id}}]" placeholder="Product Name" value="{{$value->namaproduk}}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="harga{{$value->id}}" name="harga[{{$value->id}}]" placeholder="Price" value="{{$value->harga}}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="stock{{$value->id}}" name="stock[{{$value->id}}]" placeholder="Stock" value="{{$value->stock}}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    {{-- END POPUP EDIT PRODUCT --}}
                        @endforeach
                    </div>
                    </div>
    {{-- USERS ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
            <div class="messages-section" style="box-shadow: 20px 20px 50px 0px rgba(0, 0, 0, 0.1);">
                    <div class="projects-section-header">
                    <p style="margin-left: 130px">Users</p>
                    </div>
                    <div class="messages">
                        @foreach ($users as $value)
                    <div class="message-box" id="dropdownMenuButton{{$value->id}}" data-toggle="dropdown{{$value->id}}" data-target="#dropdown{{$value->id}}">
                        <img src="{{asset('fotoUsers/'.$value->img)}}" alt="">
                        <div class="message-content">
                    <div class="message-header">
                    <div class="name">{{$value->nama}}</div>
                    <div class="dropdown" style="margin-right: 150px">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$value->id}}">
                            <form action="{{ route('user.delete',['id' => $value->id] )}}" method="POST"  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background:none">
                            <a class="dropdown-item" type="submit" style="color:firebrick">Delete User</a>
                        </button>
                        </div>
                        </form>
                    </div>
                    </div>
                    <p class="message-line">
                        Role : {{$value->role}}
                    </p>
                    <p class="message-line time">
                    Create at :  {{$value->created_at->isoFormat('D MMMM  YYYY')}} <br>
                    </p>
                    </div>
                    </div>
                    @endforeach
                    </div>
                    </div>
                    </div>
            </div>




    {{-- JAVASCRIPT UNTUK MENAMPILKAN DROPDOWN --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var messageContents = document.querySelectorAll('.message-content');
            messageContents.forEach(function(content) {
                content.addEventListener('click', function(event) {
                    var dropdown = this.querySelector('.dropdown-menu');
                    if (!dropdown.classList.contains('show')) {
                        // Sembunyikan dropdown yang lain sebelum menampilkan yang saat ini
                        var allDropdowns = document.querySelectorAll('.dropdown-menu');
                        allDropdowns.forEach(function(d) {
                            d.classList.remove('show');
                        });

                        dropdown.classList.add('show');
                    } else {
                        dropdown.classList.remove('show');
                    }
                    // Memastikan event klik tidak menyebar ke elemen lain
                    event.stopPropagation();
                });
            });

            // Menutup dropdown saat pengguna mengklik di luar dropdown
            document.addEventListener('click', function(event) {
                var allDropdowns = document.querySelectorAll('.dropdown-menu');
                allDropdowns.forEach(function(dropdown) {
                    dropdown.classList.remove('show');
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
        projectBoxes = document.getElementsByClassName('project-box-wrapper');

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

    {{-- LOADER --}}
    <style>
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
    </div>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>

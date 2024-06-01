    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

    <style>
        body {
            background: linear-gradient(120deg, #bbb7a8, #92b6bd);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .receipt {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: opacity 1.5s ease-in-out;
            width: 50%;
            margin: auto
        }
        .receipt h2 {
            color: #333;
            text-align: center;
            transition: opacity 1.5s ease-in-out;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        .card-body {
            padding: 20px;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        /* Font Style */
        h2, h3, p {
            font-family: 'Poppins', sans-serif;
        }
        /* Buyer's Details Style */
        .buyer-details {
            text-align: left;
        }
    </style>
    </head>
    <body>
    <div class="container">
        <div class="receipt">
            <h2 class="mb-4">ThankYou</h2>
            <!-- Buyer's Details -->
            <div class="buyer-details">
                <p><strong>Name:</strong>  {{$penjualan->pelanggan->namapelanggan}}</p>
                <p><strong>Phone Number:</strong> {{$penjualan->pelanggan->telepon}}</p>
                <p><strong>Address:</strong> {{$penjualan->pelanggan->alamat}}</p>
            </div>

            <div class="row justify-content-center">
                @foreach($detail_penjualan as $jual)
                <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('fotoProduk/'.$jual->product->img) }}" alt="{{ $jual->product->namaproduk }}" style="max-width: 100%; height: auto;">
                        <center><h4>{{$jual->product->namaproduk}}</h4>
                    <center><p class="text-muted">Rp . {{number_format($jual->product->harga)}} </p></center>
                    <center><p class="text-muted">Quantity : ({{$jual->quantity  }})</p></center>
                    </div>
                </div>
            </div>
            @endforeach

            </div>
            @php
    // Menghitung kembalian
    $kembalian = $penjualan->pelanggan->bayar - $penjualan->total_price;
    @endphp

    <div class="total modal-footer" style="display: flex; justify-content: space-between; align-items: center;">
    <h3>Total Amount : Rp. {{ number_format($penjualan->total_price) }}</h3>
    <h5>Total Bayar : Rp. {{ number_format($penjualan->pelanggan->bayar) }}</h5>
    <div style="text-align: left; font-size: 20px">
        <b>Kembalian : Rp. {{ number_format($kembalian) }}</b>
        {{-- <a href="#" class="btn btn-primary btn-lg btn-icon-right float-right" style="margin-left: 20px;">
            <i class="bi bi-file-pdf"></i> Export PDF
        </a> --}}
        <a href="/penjualan" class="btn btn-primary btn-lg btn-icon-right float-right" style="margin-left: 200px" >
            <i class="bi bi-arrow-right"></i> Lanjut
        </a>
    </div>             
    </div>


        </div>
        
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            animateCards();
        });

        function animateCards() {
            var cards = document.querySelectorAll('.card');
            cards.forEach(function(card, index) {
                setTimeout(function() {
                    card.style.opacity = 1;
                }, 200 * index);
            });
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    </body>
    </html>

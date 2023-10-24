<!-- reference
https://colorhunt.co/palette/f0f0f02135554f709ce5d283
https://www.youtube.com/watch?v=McPdzhLRzCg
https://www.youtube.com/watch?v=5JwWqjd4e9o 
https://www.youtube.com/watch?v=WVOmmc0UTiM
https://www.youtube.com/watch?v=7uEqQx4S50E-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductForm</title>
    <link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
         <!-- menu dan logo di wrapper -->
        <div class="wrapper">
            <!-- logo -->
            <div class="logo">
                <a href ="#">ProductForm</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="signup">
        <br><br>
        <!-- form -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            <!-- logo dalam form -->
            <div class="logo">
                <a href ="{{ route('form_product') }}">ProductForm</a>
            </div>
            <br>
            @csrf

            <label for="Jenis">Jenis:</label>
            <select name="Jenis" required>
                <option value="" disabled selected>Pilih Jenis</option>
                @foreach($jenis as $jenis_barang)
                    <option value="{{ $jenis_barang->Jenis }}">{{ $jenis_barang->Jenis }}</option>
                @endforeach
            </select>
            <br>

            <label for="Kondisi">Kondisi:</label>
            <select name="Kondisi" required>
                <option value="" disabled selected>Pilih Kondisi</option>
                @foreach($kondisi as $kondisi_barang)
                    <option value="{{ $kondisi_barang->Kondisi }}">{{ $kondisi_barang->Kondisi }}</option>
                @endforeach
            </select>
            <br>

            <label for="Keterangan">Keterangan:</label>
            <input type="text" name="Keterangan" value="{{ old('Keterangan', $product->Keterangan) }}" required>
            <br>

            <label for="Kecacatan">Kecacatan:</label>
            <input type="text" name="Kecacatan" value="{{ old('Kecacatan', $product->Kecacatan) }}" required>
            <br>

            <label for="Jumlah">Jumlah:</label>
            <input type="number" name="Jumlah" step="1.0" value="{{ old('Jumlah', $product->Jumlah) }}" required>
            <br>

            <label for="Image">Gambar:</label>
            <input type="file" name="Image" accept=".png, .jpg, .jpeg" required>
            <br>
            
            <button type="submit">Save Changes</button>
            @if ($errors->any())
            <!-- <h2>Input Error: </h2> -->
            <div class="alert">
                <ul>
                    <h3>Input Error</h3>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
        </div>
    </div>
</body>
</html>
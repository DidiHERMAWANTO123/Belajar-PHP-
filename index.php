<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengecekan Suhu</title>
    <style>
        /* CSS Inline */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            <?php
            // Mengambil suhu dari input
            $suhu = isset($_POST['suhu']) ? $_POST['suhu'] : null;

            // Memeriksa suhu dan mengatur warna latar belakang sesuai kategori
            if ($suhu < 20) {
                echo 'background-color: #2196F3;'; // Dingin
            } elseif ($suhu > 36) {
                echo 'background-color: #f44336;'; // Panas
            } else {
                echo 'background-color: #4caf50;'; // Sejuk
            }
            ?>
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #4caf50;
        }

        label {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            font-size: 24px;
            margin-top: 30px;
            padding: 20px;
            border-radius: 5px;
            font-weight: bold;
            color: #4caf50;
        }

        .weather-icon {
            width: 100px;
            height: 100px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Pengecekan Suhu</h1>
        <form method="post">
            <label for="suhu">Masukkan Suhu (°C):</label>
            <input type="number" id="suhu" name="suhu" required>
            <button type="submit">Hitung</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $suhu = $_POST["suhu"];
            $gambar_cuaca = '';

            if ($suhu < 20) {
                $gambar_cuaca = 'dingin.jpeg';
                echo "<div class='result cold'>Suhu $suhu adalah dingin ❄️</div><br>"; 
            } elseif ($suhu > 36) {
                $gambar_cuaca = 'panas1.jpeg';
                echo "<div class='result hot'>Suhu $suhu adalah panas 🔥</div> <br>";
            } else {
                $gambar_cuaca = 'sejuk1.jpeg';
                echo "<div class='result cool'>Suhu $suhu adalah sejuk ☁️</div> <br>";
            }

            echo "<img class='weather-icon' src='$gambar_cuaca' alt='Gambar Cuaca'>";
        }
        ?>
    </div>
</body>

</html>

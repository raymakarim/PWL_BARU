<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        
        .input-group {
            margin-bottom: 10px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login_action.php" method="POST"> 
            
            <div class="input-group">
                <label for="username">Nama Pengguna</label>
                <input type="text" id="username" name="txtUsername" placeholder="Masukkan Nama Pengguna" required>
            </div>
            
            <div class="input-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="txtPassword" placeholder="Masukkan Kata Sandi" required>
            </div>
            
            <button type="submit" class="login-button">MASUK</button>
        </form>
    </div>

</body>
</html>
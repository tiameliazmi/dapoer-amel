<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - DapoerAmel</title>

    <style>
        body{
            margin:0;
            font-family:Arial, sans-serif;
            background: linear-gradient(135deg,#92400e,#d97706);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            width:420px;
            background:white;
            border-radius:20px;
            padding:40px;
            box-shadow:0 15px 35px rgba(0,0,0,.25);
        }

        .logo{
            text-align:center;
            font-size:60px;
            margin-bottom:10px;
        }

        h1{
            text-align:center;
            color:#92400e;
            margin-bottom:5px;
        }

        p{
            text-align:center;
            color:#666;
            margin-bottom:30px;
        }

        label{
            display:block;
            font-weight:bold;
            margin-bottom:8px;
            color:#444;
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            margin-bottom:18px;
            box-sizing:border-box;
        }

        input:focus{
            outline:none;
            border-color:#d97706;
        }

        .login-btn{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#d97706;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
        }

        .login-btn:hover{
            background:#b45309;
        }

        .toggle-btn{
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            border:none;
            background:none;
            cursor:pointer;
            font-size:20px;
            width:auto;
            padding:0;
            color:black;
        }

        .error{
            background:#fee2e2;
            color:#991b1b;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;
        }

        .footer{
            text-align:center;
            margin-top:20px;
            color:#777;
            font-size:13px;
        }
    </style>
</head>
<body>

<div class="login-box">

    <div class="logo">🍛</div>

    <h1>DapoerAmel</h1>
    <p>Login Admin / Kasir</p>

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input
            type="email"
            name="email"
            placeholder="Masukkan email"
            required>

        <label>Password</label>

        <div style="position:relative;">

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required
                style="padding-right:50px;">

            <button
                type="button"
                id="toggleBtn"
                class="toggle-btn"
                onclick="togglePassword()">
                👁️
            </button>

        </div>

        <button type="submit" class="login-btn">
            Login
        </button>
    </form>

    <div class="footer">
        Sistem Pemesanan DapoerAmel
    </div>

</div>

<script>
function togglePassword() {

    const password = document.getElementById('password');
    const toggleBtn = document.getElementById('toggleBtn');

    if (password.type === 'password') {
        password.type = 'text';
        toggleBtn.innerHTML = '🙈';
    } else {
        password.type = 'password';
        toggleBtn.innerHTML = '👁️';
    }

}
</script>

</body>
</html>
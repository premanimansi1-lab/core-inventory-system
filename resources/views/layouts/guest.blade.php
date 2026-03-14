<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Core Inventory</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#4e73df,#1cc88a);
font-family:Arial;
}

.auth-card{
width:380px;
background:white;
padding:35px;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

.auth-title{
text-align:center;
margin-bottom:25px;
font-weight:600;
}

.auth-btn{
width:100%;
}

.auth-link{
text-align:center;
margin-top:15px;
}

</style>

</head>

<body>

<div class="auth-card">

@yield('content')

</div>

</body>
</html>
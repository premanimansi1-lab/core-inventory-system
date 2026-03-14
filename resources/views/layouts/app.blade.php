<!DOCTYPE html>
<html>
<head>
<title>Inventory System</title>

<style>

body{
font-family: Arial;
margin:0;
display:flex;
background:#f4f6f9;
}

/* sidebar */

.sidebar{
width:220px;
background:#2c3e50;
color:white;
height:100vh;
padding:20px;
}

.sidebar h2{
margin-bottom:30px;
}

.sidebar a{
color:white;
display:block;
margin:12px 0;
text-decoration:none;
padding:8px;
border-radius:4px;
}

.sidebar a:hover{
background:#34495e;
}

/* main area */

.main{
flex:1;
display:flex;
flex-direction:column;
}

/* top bar */

.topbar{
background:white;
padding:15px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 2px 4px rgba(0,0,0,0.1);
}

.content{
padding:30px;
}
.sidebar a{
color:white;
display:block;
margin:12px 0;
text-decoration:none;
padding:10px;
border-radius:5px;
transition:0.2s;
}

.sidebar a:hover{
background:#34495e;
}
button{
background:#3498db;
color:white;
border:none;
padding:8px 14px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#2980b9;
}
table{
width:100%;
border-collapse:collapse;
background:white;
}

th{
background:#f2f2f2;
padding:10px;
}

td{
padding:10px;
border-top:1px solid #ddd;
}
input,select{
padding:7px;
border:1px solid #ccc;
border-radius:4px;
}

.cards{
display:flex;
gap:10px;
margin-top:20px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
width:220px;
box-shadow:0 3px 8px rgba(0,0,0,0.1);
}

.card h3{
margin:0;
color:#555;
}

.card h2{
margin-top:10px;
font-size:28px;
}
</style>
</head>

<body>

<div class="sidebar">

<h2>Inventory</h2>

<a href="/dashboard">Dashboard</a>

<a href="/products">Products</a>

@if(auth()->user()->role == 'staff')

<a href="/movements/create">Add Movement</a>
<a href="/movements">My Requests</a>

@endif


@if(auth()->user()->role == 'manager')

<a href="/movements">Approve Movements</a>

@endif

</div>
<div class="main">

<div class="topbar">

<h3>Inventory Dashboard</h3>

<div>

{{ Auth::user()->name }}

<form method="POST" action="{{ route('logout') }}" style="display:inline">
@csrf
<button type="submit">Logout</button>
</form>

</div>

</div>

<div class="content">

@yield('content')

</div>

</div>

</body>
</html>
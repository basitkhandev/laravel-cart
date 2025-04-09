<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>laravel Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<button onclick="logoutuser()" class="hide btn btn-danger" id="logoutBtn" style="float: right;margin:20px">Logout</button>
@yield('content')
<style>
    .hide {
        display: none;
    }
    .show {
        display: block;
    }
</style>
<script>
    $(document).ready(function() {
        const token = localStorage.getItem('token');
        if (token) {
            $("#logoutBtn").removeClass('hide');
            $("#logoutBtn").addClass('show');
        }else{
            $("#logoutBtn").removeClass('show');
            $("#logoutBtn").addClass('hide');
        }
    });
    function logoutuser(){
            localStorage.removeItem('token');
            localStorage.clear();
            return window.location.href = '/';
    }
</script>
</body>
</html>

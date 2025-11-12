<!DOCTYPE html>
<html>
<head>
    <title>Auto Login</title>
</head>
<body>
    <h3>Fazendo login automaticamente...</h3>
    <form id="loginForm" method="POST" action="http://127.0.0.1:8000/login">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="email" value="admin@pie.com">
        <input type="hidden" name="password" value="admin123">
    </form>
    
    <script>
        document.getElementById('loginForm').submit();
    </script>
</body>
</html>

    <!DOCTYPE html>
<html>
<head>
    <title>Привет от меня с Ларавел</title>
</head>
<body>
@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<h1>Cкоро закончиться война и все наладится</h1>
<p>Laravel 8 send email example</p>

</body>
</html>

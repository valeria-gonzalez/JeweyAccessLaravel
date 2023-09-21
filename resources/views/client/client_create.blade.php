<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
</head>
<body>
    <h1>Create client</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Post Form -->
    <form action = "/client" method = "POST">
        @csrf <!--cross site resource forgery-->
        <label for = "name">Name</label>
        <input type = "text" name = "name"><br><br>
        <label for = "first_lastname">First Lastname</label>
        <input type = "text" name = "first_lastname"><br><br>
        <label for = "second_lastname">Second Lastname</label>
        <input type = "text" name = "second_lastname"><br><br>
        <label for = "phone_number">Phone Number</label>
        <input type = "tel" name = "phone_number"><br><br>
        <input type = "submit" value = "submit">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
</head>
<body>
    <h1>Client information</h1>
    <table>
        <thead>
            <throw>
                <td>Name</td>
                <td>First Lastname</td>
                <td>Second Lastname</td>
                <td>Phone Number</td>
            <throw>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->first_lastname }}</td>
                    <td>{{ $client->second_lastname }}</td>
                    <td>{{ $client->phone_number }}</td>
                </tr>
        </tbody>
    </table>
    <a href = '/client'> Go back</a>
    
</body>
</html>
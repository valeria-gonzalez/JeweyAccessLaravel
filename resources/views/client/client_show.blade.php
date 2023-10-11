<!-- <!DOCTYPE html>
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
    <a href = "{{ route('client.index') }}"> Go back</a>
    
</body>
</html> -->
<x-mi-layout>
    <div class="container-fluid flex-grow-1 container-p-y">
        <x-text.page-heading1 span="Client / " after-span="Show Client"/>
        <x-table.hoverable-table 
        title="Client Information #ID: {{ $client->id }}"
        :headings="['Name', 'Last Name', 'Last Name', 'Phone Number']"
        :models="[$client]"
        :properties="['name', 'first_lastname', 'second_lastname', 'phone_number']"
        :actions="[]"
        :action-routes="[]"
        />
    </div> 
</x-mi-layout>
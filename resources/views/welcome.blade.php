<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

    <h4>Data from DB</h4>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Main Point</th>
                <th scope="col">Sex</th>
                <th scope="col">Age</th>
                <th scope="col">Params</th>
                <th scope="col">Created At</th>
                <th scope="col">Opdated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->main_point }}</td>
                    <td>{{ $item->sex }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->params }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <h4>Data from Access logs</h4>
    <table id="example_2" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">IP</th>
                <th scope="col">Date</th>
                <th scope="col">Method</th>
                <th scope="col">Url</th>
                <th scope="col">Status</th>
                <th scope="col">Browser</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accessLogs as $key => $log)
                @foreach ($log as $item)
                    <tr>
                        <td>{{ $item['ip'] }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['method'] }}</td>
                        <td>{{ $item['url'] }}</td>
                        <td>{{ $item['status'] }}</td>
                        <td>{{ $item['browser'] }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>


    <h4>Data from Error logs</h4>
    <table id="errors" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Pid</th>
                <th scope="col">Message</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($errorsLog as $key => $log)
                @foreach ($log as $item)
                    <tr>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['type'] }}</td>
                        <td>{{ $item['pid'] }}</td>
                        <td>{{ $item['message'] }}</td>
                        
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>



    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
        new DataTable('#example_2');
        new DataTable('#errors');
    </script>
</body>

</html>

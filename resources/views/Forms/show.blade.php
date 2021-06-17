<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thx for submission!</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>

        body {
            font-family: 'Nunito', sans-serif;
        }
        .table-wrap {
            text-align: center;
            display: inline-block;
            background-color: #fff;
            padding: 2rem 2rem;
            color: #000;
        }

        table {
            border: 1px solid #ccc;
            width: 100%;
            margin:0;
            padding:0;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table tr {
            border: 1px solid #ddd;
            padding: 5px;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border-right: 1px solid #ddd;
        }

        table th {
            color: #fff;
            background-color: #444;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }


        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table thead {
                display: none;
            }
            table tr {
                margin-bottom: 10px;
                display: block;
                border-bottom: 2px solid #ddd;
            }
            table td {
                display: block;
                text-align: right;
                font-size: 13px;
                border-bottom: 1px dotted #ccc;
                border-right: 1px solid transparent;
            }
            table td:last-child {
                border-bottom: 0;
            }
            table td:before {
                content: attr(data-label);
                float: left;
                text-transform: uppercase;
                font-weight: bold;
            }
        }


    </style>
</head>

<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">



    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>Submitted At</th>
                <th>Vardas</th>
                <th>Telefonas</th>
                <th>El paštas</th>
                <th>Pageidaujamos šalys</th>
                @foreach ($moreInfo as $key => $value)
                <th>{{$key ? : 'Kiti pageidavimai'}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="Submitted At">{{$form->created_at}}</td>
                <td data-label="Vardas">{{$form->vardas}}</td>
                <td data-label="Telefonas">{{$form->tel}}</td>
                <td data-label="El paštas">{{$form->el_pastas}}</td>
                <td data-label="Pageidaujamos šalys">{{$countries}}</td>
                @foreach ($moreInfo as $key => $value)
                    <td data-label="{{$key ? : 'Kiti pageidavimai'}}">{{$value}}</td>
                @endforeach
            </tr>

            </tbody>
        </table>
    </div>
</div>

</body>

</html>
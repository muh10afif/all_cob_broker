<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        th, td {
        padding: 5px;
        font-size: 20px;
        }
        th {
        text-align: center;
        }
        /* thead tr th {
        background-color: #eee;
        }
        body {
        margin: 20px 20px 20px 20px;
        color: black;
        } */
    </style>
</head>
<body>
<table border="1" width="100%">
    <thead>
        <tr>
            <?php foreach ($data as $d): ?>
                <th><?= $d['field_sppa'] ?></th>
            <?php endforeach; ?>
    </thead>
    <tbody>
    </tbody>
</table>
    
</body>
</html>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<style>

body{
    font-family: DejaVu Sans;
    font-size:12px;
}

table{

    width:100%;
    border-collapse:collapse;

}

th,td{

    border:1px solid black;
    padding:8px;

}

th{

    background:#dddddd;

}

h2{

    text-align:center;

}

</style>

</head>

<body>

<h2>

Daftar Film MovieHub

</h2>

<table>

<thead>

<tr>

<th>No</th>

<th>Judul</th>

<th>Genre</th>

<th>Sutradara</th>

<th>Tahun</th>

<th>Rating</th>

</tr>

</thead>

<tbody>

@foreach($films as $film)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $film->title }}</td>

<td>{{ $film->genre }}</td>

<td>{{ $film->director }}</td>

<td>{{ $film->release_year }}</td>

<td>{{ $film->rating }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>
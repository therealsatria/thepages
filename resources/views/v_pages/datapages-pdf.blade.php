<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2>Let the table borders collapse</h2>

<table>
  <tr>
    <th>id</th>
    <th>Subject</th>
    <th>Author</th>
  </tr>
  @foreach ($data as $index => $row)
  <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->subject}}</td>
    <td>{{$row->author}}</td>
  </tr>
  @endforeach

</table>

</body>
</html>



@extends('layout.main')

@section('isi')
<main class="container">
    <p>/home/{{ Route::currentRouteName() }}</p>

    <a href="{{ url(''); }}/tambahpages" type="button" class="btn btn-primary">Tambah +</a>
    <a href="{{ url('/pdfpages'); }}" type="button" class="btn btn-info">Export PDF</a>
    <div class="row g-3 align-items-center mt-2">
        <div class="col-auto">
            <form action="{{ url(''); }}/pages" method="GET">
                <input type="search" name="search" placeholder="search here" class="form-control" aria-describedby="passwordHelpInline">
            </form>
          </div>
    </div>

    <hr>

    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{$message}}
        </div>
        @endif
        <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $index => $row)
            <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>{{$row->subject}}</td>
                <td>
                    <a href="{{ url(''); }}/tampilkanpages/{{$row->id}}" type="button" class="btn btn-warning">Edit</a>
                    <a href="{{ url(''); }}/deletepages/{{$row->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        {{ $data->links() }}
    </div>
    <hr>
    sign in as <a href="{{ url(''); }}/logout">{{ Auth::user()->name }}</a>
</main>
@endsection


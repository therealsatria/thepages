@extends('layout.main')

@section('isi')
<main class="container">
<p>/home/{{ Route::currentRouteName() }}</p>
    <div class="row justify-content-center" >
        <div class="col-6">
        <div class="card">
        <div class="card-body">
            <form action="{{ url(''); }}/updatepages/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Subject</label>
                <input type="text" name="subject" value="{{$data->subject}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea type="text" name="content" value="" rows="13" class="form-control">{{$data->content}}</textarea>
            </div>

            <a href="{{ Session::get('halaman_url') }}" type="button" class="btn btn-primary"><<</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        </div>
        </div>
    </div>
</div>

</main>
@endsection


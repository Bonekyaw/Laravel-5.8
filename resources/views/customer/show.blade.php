
 @extends('layouts.app')
 @section('content')
    <div class="badge badge-secondary text-wrap" style="width: 100%;height:4rem;"><h1>{{'Detail from'. '' .$customer->name}}</h1></div>
    <div class="d-flex my-2">
                <a href="/customers/{{$customer->id}}/edit">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>

                <form action="/customers/{{$customer->id}}" method="post">
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @csrf
                </form>

    </div>
    <div class="row">
        <div class="col-12">
            <strong>Name :</strong> {{$customer->name}}
        </div>
        <div class="col-12">
            <strong>Email :</strong>{{$customer->email}}
        </div>
        <div class="col-12">
            <strong>Company :</strong>{{$customer->company->name}}
        </div>
        <div class="col-12">
            <strong>Status :</strong>{{$customer->active }}
        </div>
    </div>
    @if ($customer->image)
        <div class="row">
            <div class="col-12">
            <img src="{{asset('storage/'.$customer->image)}}" alt="Image" class="img-thumbnail">
            </div>
        </div>

    @endif
@endsection

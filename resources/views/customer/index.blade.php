
 @extends('layout')
 @section('content')
 <div class="container">
    <div class="badge badge-secondary text-wrap" style="width: 100%;height:4rem;"><h1>Customer List</h1></div>
    <p><a href="/customers/create">Add New Customer</a></p>
    <div class="row">
        @foreach ($customers as $customer)
            <div class="col-1">
                {{$customer->id}}
            </div>
            <div class="col-3">
                <a href="/customers/{{$customer->id}}">
                    {{ $customer->name}}

                </a>
            </div>
            <div class="col-3">
                {{ $customer->email}}
            </div>
            <div class="col-2">
                {{ $customer->company->name}}
            </div>
            <div class="col-1">
                {{ $customer->active ? 'Active' : 'Inactive' }}
            </div>
            <div class="col-2">
                <div class="d-flex ">
                        <a href="/customers/{{$customer->id}}/edit">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form action="/customers/{{$customer->id}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @csrf
                        </form>
                </div>


            </div>
        @endforeach
    </div>
 </div>
@endsection

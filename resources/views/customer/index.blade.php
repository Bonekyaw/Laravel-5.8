
 @extends('layouts.app')
 @section('content')
    <div class="badge badge-secondary text-wrap" style="width: 100%;height:4rem;"><h1>Customer List</h1></div>
    @can('create', \App\Customer::class)
        <p class="my-2">
            <a href="/customers/create">Add New Customer</a>
        </p>
    @endcan
    <div class="row pt-2">
        @foreach ($customers as $customer)
            <div class="col-1">
                {{$customer->id}}
            </div>
            <div class="col-3">
                @can('view', $customer)
                    <a href="/customers/{{$customer->id}}">
                        {{ $customer->name}}
                    </a>
                @endcan
                @cannot('view', $customer)
                    {{ $customer->name}}
                @endcannot
            </div>
            <div class="col-3">
                {{ $customer->email}}
            </div>
            <div class="col-2">
                {{ $customer->company->name}}
            </div>
            <div class="col-1">
                {{ $customer->active }}
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
    <div class="row pt-3">
        <div class="col-2">
            {{$customers->links()}}
        </div>
    </div>
@endsection


 @extends('layouts.app')
 @section('content')
    <div class="badge badge-secondary text-wrap" style="width: 100%;height:4rem;"><h1>Add New Customer</h1></div>
    <form action="/customers" method="POST">

    @include('customer.form')
    <button type="submit" class="btn btn-primary">Add </button>
        @csrf
    </form>

@endsection

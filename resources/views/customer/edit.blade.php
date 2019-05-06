
 @extends('layout')
 @section('content')
 <div class="container">
    <div class="badge badge-secondary text-wrap" style="width: 100%;height:4rem;"><h1>Modify Customer</h1></div>
    <form action="/customers/{{$customer->id}}" method="POST">
        @method('PATCH')
    @include('customer.form')
    <button type="submit" class="btn btn-primary">Update </button>
        @csrf
    </form>

 </div>
@endsection

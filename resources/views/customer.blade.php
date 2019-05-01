
 @extends('layout')
 @section('content')
 <div class="container">
    <div class="badge badge-secondary text-wrap" style="width: 30rem;height:4rem;"><h1>Customer List</h1></div>
    <form action="customer" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name :</label>
          <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here">
        </div>
        @if ($errors->first('name'))
        <div class="alert alert-danger">{{$errors->first('name')}}</div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">Email :</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here">
        </div>
        @if ($errors->first('email'))
        <div class="alert alert-danger">{{$errors->first('email')}}</div>
        @endif


        <button type="submit" class="btn btn-primary">Add New Name</button>
      </form>
      <hr>
      <p>
        <ul class="list-group">
            @foreach ($customers as $customer )
                <li class="list-group-item">{{ $customer->name }} <span class="text-muted">({{ $customer->email}})</span></li>
            @endforeach
        </ul>
    </p>

</div>
@endsection


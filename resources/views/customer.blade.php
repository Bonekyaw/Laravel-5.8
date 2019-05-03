
 @extends('layout')
 @section('content')
 <div class="container">
    <div class="badge badge-secondary text-wrap" style="width: 100%;height:4rem;"><h1>Customer List</h1></div>
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

        <div class="form-group">
            <label for="active">Status :</label>
            <select class="custom-select" name="active" id="active">
                    <option selected disabled>Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
            </select>
        </div>
        @if ($errors->first('active'))
        <div class="alert alert-danger">{{$errors->first('active')}}</div>
        @endif

        <div class="form-group">
            <label for="company_id">Company :</label>
            <select class="custom-select" name="company_id" id="company_id">
                    <option selected disabled>Select Company</option>
                    @foreach ($company as $com)
                        <option value="{{$com->id}}">{{$com->name}}</option>
                    @endforeach

            </select>
        </div>
        @if ($errors->first('company_id'))
        <div class="alert alert-danger">{{$errors->first('company_id')}}</div>
        @endif
        <button type="submit" class="btn btn-primary">Add New Name</button>
      </form>
      <hr>
      <div class="row">
        <div class="col-6">
            <h3>Active Customer</h1>
                <ul>
                    @foreach ($activeCustomer as $customer )
                        <li>{{ $customer->name }}
                                <span class="text-muted">({{ $customer->company->name}})</span>
                        </li>
                    @endforeach
                    </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customer</h1>
                <ul>
                    @foreach ($inactiveCustomer as $incustomer )
                        <li>{{ $incustomer->name }}
                                <span class="text-muted">({{ $incustomer->company->name}})</span>
                        </li>
                    @endforeach

                </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            @foreach ($company as $comp)

                <h3>{{$comp->name}}</h1>
                <ul>
                    @foreach ($comp->customers as $customer)
                        <li>{{$customer->name}}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
      </div>
@endsection

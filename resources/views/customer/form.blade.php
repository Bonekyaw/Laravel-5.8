    <div class="form-group">
      <label for="exampleInputEmail1">Name :</label>
      <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here">
    </div>
    @if ($errors->first('name'))
    <div class="alert alert-danger">{{$errors->first('name')}}</div>
    @endif

    <div class="form-group">
        <label for="exampleInputEmail1">Email :</label>
    <input type="email" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here">
    </div>
    @if ($errors->first('email'))
    <div class="alert alert-danger">{{$errors->first('email')}}</div>
    @endif

    <div class="form-group">
        <label for="active">Status :</label>
        <select class="custom-select" name="active" id="active">
                <option selected disabled>Select status</option>
                @foreach ($customer->activeOption() as $activeKey => $activeValue)
                    <option value="{{$activeKey}}" {{ $customer->active == $activeValue ? 'selected': '' }}>{{$activeValue}}</option>
                @endforeach
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
                    <option value="{{$com->id}}" {{$com->id == $customer->company_id ? 'selected': ''}}>{{$com->name}}</option>
                @endforeach

        </select>
    </div>
    @if ($errors->first('company_id'))
    <div class="alert alert-danger">{{$errors->first('company_id')}}</div>
    @endif

    <div class="form-group d-flex flex-column" >
        <label for="image">Upload your profile :</label>
        <input type="file" name="image" id="image" class="py-2">
    </div>
    @if ($errors->first('image'))
    <div class="alert alert-danger">{{$errors->first('image')}}</div>
    @endif

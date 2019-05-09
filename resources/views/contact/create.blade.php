@extends('layout')
@section('content')
<div class="container">
        <h1>Contact</h1>
        <form action="contact" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name :</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here">
            </div>
            @if ($errors->first('name'))
              <div class="alert alert-danger">{{$errors->first('name')}}</div>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Email :</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here">
            </div>
            @if ($errors->first('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Message :</label>
                <textarea name="message" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="type here"></textarea>
            </div>
            @if ($errors->first('message'))
                <div class="alert alert-danger">{{$errors->first('message')}}</div>
            @endif

            <input type="submit" value="Send Email" class="btn btn-primary">

        </form>
</div>
@endsection

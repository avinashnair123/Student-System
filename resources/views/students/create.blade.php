@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back To The List</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
<div class="col-md-8">
<form action="{{ route('students.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" 
                required value="{{ old('name') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Age</strong>
                <input type="number" pattern="[0-9]" name="age" class="form-control" placeholder="Age" min='1' 
                required value="{{ old('age') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><strong>Gender</strong></label>
                <label class="radio-inline"> <input type="radio"  name="gender" value="M" 
                @if(old('gender') != 'F') checked @endif>Male</label>
                <label class="radio-inline"><input type="radio" name="gender" value="F"
                @if(old('gender') == 'F') checked @endif>Female</label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reporting Teacher</strong>
                <select name="id_teacher" class="form-control" required>
                    <option value="">--Select Teacher--</option>
                    @foreach ($teachersList as $teacher)
                        <option value="{{ $teacher->id_teacher }}" 
                        @if(old('id_teacher') == $teacher->id_teacher) selected 
                        @endif>{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection
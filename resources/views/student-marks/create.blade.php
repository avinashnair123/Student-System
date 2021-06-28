@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Marks For Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students-marks.index') }}"> Back To The List</a>
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
<form action="{{ route('students-marks.store') }}" method="POST">
    @csrf

     <div class="row">
        
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student</strong>
                <select name="id_student" class="form-control" required>
                    <option value="">--Select Student--</option>
                    @foreach ($studentsList as $student)
                        <option value="{{ $student->id_student }}"  
                        @if(old('id_student') == $student->id_student) selected 
                        @endif>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label><strong>Select Term</strong></label>
                <label class="radio-inline"> <input type="radio"  name="term" value="One" 
                @if(old('term') != 'Two') checked @endif>One</label>
                <label class="radio-inline"> <input type="radio"  name="term" value="Two"
                @if(old('term') == 'Two') checked @endif>Two</label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Maths</strong>
                <input type="number" name="maths" class="form-control" placeholder="Marks achieved in Maths" min='0' 
                required value="{{ old('maths') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Science</strong>
                <input type="number" name="science" class="form-control" placeholder="Marks achieved in Science" min='0' 
                required value="{{ old('science') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>History</strong>
                <input type="number" name="history" class="form-control" placeholder="Marks achieved in History" min='0' 
                required value="{{ old('history') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection
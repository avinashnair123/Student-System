@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Add New Student</a>
                <a class="btn btn-success" href="{{ route('students-marks.create') }}"> Add Marks For Students</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Reporting Teacher</th>
            <th>Actions</th>
        </tr>
        @foreach ($studentsList as $student)
        <tr>
            <td>{{ $student->id_student }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->teacher->name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('students.edit',$student->id_student) }}">Edit</a>
                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('students.delete',$student->id_student) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $studentsList->links() !!}

@endsection
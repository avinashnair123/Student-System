@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students Marks List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students-marks.create') }}"> Add Marks For New Student</a>
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
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
        @foreach ($studentMarkList as $studentMark)
        <tr>
            <td>{{ $studentMark->id_student_mark }}</td>
            <td>{{ $studentMark->student->name }}</td>
            <td>{{ $studentMark->maths }}</td>
            <td>{{ $studentMark->science }}</td>
            <td>{{ $studentMark->history }}</td>
            <td>{{ $studentMark->term }}</td>
            <td>{{ $studentMark->maths + $studentMark->science + $studentMark->history  }}</td>
            <td>{{ date('M d, Y h:i A', strtotime($studentMark->created_at)) }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('students-marks.edit', $studentMark->id_student_mark) }}">Edit</a>
                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('students-marks.delete', $studentMark->id_student_mark) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $studentMarkList->links() !!}

@endsection
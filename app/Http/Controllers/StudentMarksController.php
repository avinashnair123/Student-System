<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Services */
use App\Services\StudentService;

class StudentMarksController extends Controller
{
    private $studentService;
    
    /**
     * constructor
     *
     * @param App\Services\StudentService $studentService
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    
    /**
     * Display a list of Marks of the Students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : object
    {
        $studentMarkList =  $this->studentService->getStudentsMarksList();
        
        return view('student-marks.index', compact('studentMarkList'));
    }

    /**
     * Show the form for adding marks for Student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : object
    {
        $studentsList = $this->studentService->getStudentsList();

        return view('student-marks.create', compact('studentsList'));
    }

    /**
     * Store a newly added Student.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : object
    {
        $idStudent = $request->input('id_student');
        $request->validate([
            'id_student' => 'required',
            'term' => 'required',
            'term' => "required|unique:student_marks,term,$idStudent,id_student",
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ]);

        if ($this->studentService->storeStudentMark($request->all()))
        {
            return redirect()->route('students-marks.index')->with('success','Marks for Student added successfully.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Try again'])->withInput();
        }
    }

    /**
     * Show the form for editing the marks of the specified Student.
     *
     * @param int $idStudentMark
     * @return \Illuminate\Http\Response
     */
    public function edit(int $idStudentMark) : object
    {
        $studentMarkData = $this->studentService->getStudentMarkData($idStudentMark);
        $studentsList = $this->studentService->getStudentsList();

        return view('student-marks.edit',compact('studentMarkData', 'studentsList'));
    }

    /**
     * Update the marks of the specified student
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) : object
    {
        $request->validate([
            'id_student' => 'required',
            'term' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ]);

        $postData = $request->except('id_student_mark', '_token', '_method');

        if ($this->studentService->updateStudentMark($request->input('id_student_mark'), $postData))
        {
            return redirect()->route('students-marks.index')->with('success','Student marks updated successfully.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Try again'])->withInput();
        }
    }

    /**
     * Delete the specified Students Marks.
     *
     * @param int $idStudentMark
     * @return \Illuminate\Http\Response
     */
    public function delete(int $idStudentMark) : object
    {
        if ($this->studentService->deleteStudentMark($idStudentMark))
        {
            return redirect()->back()->with('success','Student Marks delted successfully.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Try again'])->withInput();
        }
    }
}
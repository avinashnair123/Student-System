<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Services */
use App\Services\StudentService;

class StudentController extends Controller
{
    
    private $studentService;
    
    /**
     * constructor.
     *
     * @param App\Services\StudentService $studentService
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    
    /**
     * Display a list of the Students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : object
    {
        $studentsList = $this->studentService->getStudentsList();

        return view('students.index', compact('studentsList'));
    }

    /**
     * Show the form for creating new Student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : object
    {
        $teachersList = $this->studentService->getTeachersList();

        return view('students.create', compact('teachersList'));
    }

    /**
     * Store a newly added Student.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : object
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'id_teacher' => 'required',
        ]);

        if ($this->studentService->storeStudent($request->all()))
        {
            return redirect()->route('students.index')->with('success','New Student created successfully.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Try again'])->withInput();
        }
    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param int $idStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(int $idStudent) : object
    {
        $studentData = $this->studentService->getStudentData($idStudent);
        $teachersList = $this->studentService->getTeachersList();

        return view('students.edit',compact('studentData', 'teachersList'));
    }

    /**
     * Update the specified student
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) : object
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'id_teacher' => 'required',
        ]);

        $postData = $request->except('id_student', '_token', '_method');

        if ($this->studentService->updateStudent($request->input('id_student'), $postData))
        {
            return redirect()->route('students.index')->with('success','Student details updated successfully.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Try again'])->withInput();
        }
    }

    /**
     * Delete the specified Student.
     *
     * @param int $idStudent
     * @return \Illuminate\Http\Response
     */
    public function delete(int $idStudent) : object
    {
        if ($this->studentService->deleteStudent($idStudent))
        {
            return redirect()->back()->with('success','Student delted successfully.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Try again'])->withInput();
        }
    }

}

<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\StudentMark;
use App\Models\Teacher;

class StudentRepository
{
    private $studentModel;
    private $studentMarkModel;
    private $teacherModel;

    public function __construct(
        Student $studentModel,
        StudentMark $studentMarkModel,
        Teacher $teacherModel
    )
    {
        $this->studentModel = $studentModel;
        $this->studentMarkModel = $studentMarkModel;
        $this->teacherModel = $teacherModel;
    }

    /**
     * Get teachers data
     *
     * @return object
     */
    public function getTeachersList() : object
    {
        return $this->teacherModel->all();
    }

    /**
     * Store newly creted Student Data
     * 
     * @param array $studentData
     * @return void
     */
    public function storeStudent(array $studentData) : void
    {
        $this->studentModel->create($studentData);
    }

    /**
     * Get students data
     *
     * @return object
     */
    public function getStudentsList() : object
    {
        return $this->studentModel->with('teacher')->paginate(50);
    }

    /**
     * Get detail of the specified Student.
     *
     * @param int $idStudent
     * @return object
     */
    public function getStudentData(int $idStudent) : object
    {
        return $this->studentModel->where('id_student', $idStudent)->first();
    }

    /**
     * Update Student Data
     * 
     * @param int $idStudent
     * @param array $studentData
     * @return void
     */
    public function updateStudent(int $idStudent, array $studentData) : void
    {
        $this->studentModel->where('id_student', $idStudent)->update($studentData);
    }

    /**
     * Delete Student Data
     * 
     * @param int $idStudent
     * @return void
     */
    public function deleteStudent(int $idStudent) : void
    {
        $this->studentModel->where('id_student', $idStudent)->delete();
    }

    /**
     * Store newly creted Student Mark Data
     * 
     * @param array $studentMarkData
     * @return void
     */
    public function storeStudentMark(array $studentMarkData) : void
    {
        $this->studentMarkModel->create($studentMarkData);
    }

    /**
     * Get Students Marks Data
     * 
     * @return object
     */
    public function getStudentsMarksList() : object
    {
        return $this->studentMarkModel->with('student')->paginate(50);;
    }

    /**
     * Get detail of the Mark of a specified Student.
     *
     * @param int $idStudentMark
     * @return object
     */
    public function getStudentMarkData(int $idStudentMark) : object
    {
        return $this->studentMarkModel->where('id_student_mark', $idStudentMark)->first();
    }

    /**
     * Update Student Mark Data
     * 
     * @param int $idStudentMark
     * @param array $studentMarkData
     * @return void
     */
    public function updateStudentMark(int $idStudentMark, array $studentMarkData) : void
    {
        $this->studentMarkModel->where('id_student_mark', $idStudentMark)->update($studentMarkData);
    }

    /**
     * Delete Student Mark Data
     * 
     * @param int $idStudentMark
     * @return void
     */
    public function deleteStudentMark(int $idStudentMark) : void
    {
        $this->studentMarkModel->where('id_student_mark', $idStudentMark)->delete();
    }

    /**
     * Delete Marks of the Student
     * 
     * @param int $idStudent
     * @return void
     */
    public function deleteMarksOfStudent(int $idStudent) : void
    {
        $this->studentMarkModel->where('id_student', $idStudent)->delete();
    }

}
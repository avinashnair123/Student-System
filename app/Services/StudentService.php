<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\DatabaseManager;

/** @Repositories */
use App\Repositories\StudentRepository;

class StudentService
{
    private $studentRepo;
    private $db;
    
    public function __construct(
        StudentRepository $studentRepo,
        DatabaseManager $db
    )
    {
        $this->studentRepo = $studentRepo;
        $this->db = $db;
    }

    /**
     * Get Teachers Data
     * 
     * @return object
     */
    public function getTeachersList() : object
    {
        return $this->studentRepo->getTeachersList();
    }

    /**
     * Store newly creted Student Data
     * 
     * @param array $studentData
     * @return bool
     */
    public function storeStudent($studentData) : bool
    {
        try {
            $this->studentRepo->storeStudent($studentData);

            return true;
        } catch (Exception $e) {
            Log::error('Student Creation Failed', [
                'data' => $studentData,
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Get Students Data
     * 
     * @return object
     */
    public function getStudentsList() : object
    {
        return $this->studentRepo->getStudentsList();
    }

    /**
     * Get detail of the specified Student.
     *
     * @param int $idStudent
     * @return object
     */
    public function getStudentData(int $idStudent) : object
    {
        return $this->studentRepo->getStudentData($idStudent);
    }

    /**
     * Update the specified student
     * 
     * @param int $idStudent
     * @param array $studentData
     * @return bool
     */
    public function updateStudent(int $idStudent, array $studentData) : bool
    {
        try {
            $this->studentRepo->updateStudent($idStudent, $studentData);

            return true;
        } catch (Exception $e) {
            Log::error('Student Update Failed', [
                'data' => $studentData,
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Delete the specified student
     * 
     * @param int $idStudent
     * @return bool
     */
    public function deleteStudent(int $idStudent) : bool
    {
        $this->db->beginTransaction();

        try {
            $this->studentRepo->deleteMarksOfStudent($idStudent);
            $this->studentRepo->deleteStudent($idStudent);
            $this->db->commit();

            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            Log::error('Student Deletion Failed', [
                'studentID' => $idStudent,
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Store newly added Student Mark Data
     * 
     * @param array $studentMarkData
     * @return bool
     */
    public function storeStudentMark($studentMarkData) : bool
    {
        try {
            $this->studentRepo->storeStudentMArk($studentMarkData);

            return true;
        } catch (Exception $e) {
            Log::error('Student Creation Failed', [
                'data' => $studentMarkData,
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Get Students Marks Data
     * 
     * @return object
     */
    public function getStudentsMarksList() : object
    {
        return $this->studentRepo->getStudentsMarksList();
    }

    /**
     * Get detail of the mark of a specified Student.
     *
     * @param int $idStudentMark
     * @return object
     */
    public function getStudentMarkData(int $idStudentMark) : object
    {
        return $this->studentRepo->getStudentMarkData($idStudentMark);
    }

    /**
     * Update marks of the specified student
     * 
     * @param int $idStudentMark
     * @param array $studentMarkData
     * @return bool
     */
    public function updateStudentMark(int $idStudentMark, array $studentMarkData) : bool
    {
        try {
            $this->studentRepo->updateStudentMark($idStudentMark, $studentMarkData);

            return true;
        } catch (Exception $e) {
            Log::error('Student Mark Update Failed', [
                'data' => $studentMarkData,
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Delete the specified student marks
     * 
     * @param int $idStudentMark
     * @return bool
     */
    public function deleteStudentMark(int $idStudentMark) : bool
    {
        try {
            $this->studentRepo->deleteStudentMark($idStudentMark);

            return true;
        } catch (Exception $e) {
            Log::error('Student Marks Deletion Failed', [
                'studentID' => $idStudentMark,
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
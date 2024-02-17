<?php

namespace App\Controllers;

use App\Models\Student;

class StudentController extends BaseController
{
    private $student;
    public function __construct()
    {
        $this->student = new Student();
    }
    public function getStudent()
    {
        $students = $this->student->getListStudent();
        return $this->render('student.index', compact('students'));
    }

    public function addStudent()
    {
        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
        } else {
            $msg = null;
        }

        if (!empty($_SESSION['msg_type'])) {
            $msg_type = $_SESSION['msg_type'];
        } else {
            $msg_type = null;
        }

        if (!empty($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
        } else {
            $errors = null;
        }

        if (!empty($_SESSION['old'])) {
            $old = $_SESSION['old'];
        } else {
            $old = null;
        }

        session_destroy();
        return $this->render('student.add', compact('msg', 'msg_type', 'errors', 'old'));
    }

    public function postStudent()
    {
        $errors = [];

        if (empty($_POST['name'])) {
            $errors['name'] = 'Ho va ten khong duoc de trong';
        }

        if (empty($_POST['year_of_birth'])) {
            $errors['year_of_birth'] = 'Nam sinh khong duoc de trong';
        }

        if (empty($_POST['phone_number'])) {
            $errors['phone_number'] = 'So dien thoai khong duoc de trong';
        }

        if (empty($errors)) {
            // khong co loi xay ra
            $name = $_POST['name'];
            $year_of_birth = $_POST['year_of_birth'];
            $phone_number = $_POST['phone_number'];

            $this->student->insertStudent($name, $year_of_birth, $phone_number);

            $_SESSION['msg'] = 'Thêm sinh viên thành công!';
            $_SESSION['msg_type'] = 'success';
        } else {
            $_SESSION['msg'] = 'Co loi xay ra, vui long kiem tra lai!';
            $_SESSION['msg_type'] = 'danger';
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
        }

        header("Location: add-student");
    }

    public function editStudent($id)
    {
        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
        } else {
            $msg = null;
        }

        if (!empty($_SESSION['msg_type'])) {
            $msg_type = $_SESSION['msg_type'];
        } else {
            $msg_type = null;
        }

        if (!empty($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
        } else {
            $errors = null;
        }
        session_destroy();

        $studentDetail = $this->student->getDetailStudent($id);
        return $this->render('student.edit', compact('msg', 'msg_type', 'errors', 'studentDetail'));
    }

    public function postEdit($id)
    {
        $errors = [];

        if (empty($_POST['name'])) {
            $errors['name'] = 'Ho va ten khong duoc de trong';
        }

        if (empty($_POST['year_of_birth'])) {
            $errors['year_of_birth'] = 'Nam sinh khong duoc de trong';
        }

        if (empty($_POST['phone_number'])) {
            $errors['phone_number'] = 'So dien thoai khong duoc de trong';
        }

        if (empty($errors)) {
            // khong co loi xay ra
            $name = $_POST['name'];
            $year_of_birth = $_POST['year_of_birth'];
            $phone_number = $_POST['phone_number'];

            $this->student->updateStudent($name, $year_of_birth, $phone_number, $id);

            $_SESSION['msg'] = 'Cập nhật sinh viên thành công!';
            $_SESSION['msg_type'] = 'success';
        } else {
            $_SESSION['msg'] = 'Co loi xay ra, vui long kiem tra lai!';
            $_SESSION['msg_type'] = 'danger';
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
        }

        header("Location: " . BASE_URL . 'edit-student/' . $id);
    }

    public function deleteStudent($id)
    {
        $this->student->deleteStudent($id);
        header("Location: " . BASE_URL . 'list-student');
    }
}

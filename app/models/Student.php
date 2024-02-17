<?php

namespace App\Models;

use App\Models\BaseModel;

class Student extends BaseModel implements StudentInterface
{
    public function getListStudent()
    {
        $sql = "select * from sinh_vien";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function insertStudent($name, $year_of_birth, $phone_number)
    {
        $sql = "INSERT INTO sinh_vien(`name`, `year_of_birth`, `phone_number`) VALUES('$name', '$year_of_birth', '$phone_number')";
        $this->setQuery($sql);
        $this->execute();
    }

    public function getDetailStudent($id)
    {
        $sql = "SELECT * FROM sinh_vien WHERE id=$id";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    public function updateStudent($name, $year_of_birth, $phone_number, $id = '')
    {
        if (!empty($id)) {
            $sql = "UPDATE sinh_vien SET `name`='$name', `year_of_birth`='$year_of_birth',`phone_number`='$phone_number' WHERE id=$id";
        } else {
            $sql = "UPDATE sinh_vien SET `name`='$name', `year_of_birth`='$year_of_birth',`phone_number`='$phone_number'";
        }

        $this->setQuery($sql);
        $this->execute();
    }

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM sinh_vien WHERE id=$id";
        $this->setQuery($sql);
        $this->execute();
    }
}

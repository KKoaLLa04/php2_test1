<?php

namespace App\Models;

interface StudentInterface
{

    public function getListStudent();

    public function insertStudent($name, $year_of_birth, $phone_number);

    public function getDetailStudent($id);

    public function updateStudent($name, $year_of_birth, $phone_number, $id = '');

    public function deleteStudent($id);
}

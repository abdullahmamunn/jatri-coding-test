<?php
namespace App\Repositories;

interface AuthInterface
{
    public function userRegister($data);
    public function userLogin($data);
    public function userLogout();
}
?>
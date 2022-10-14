<?php

require_once "modelClass.php";
require_once "roleClass.php";

class RoleManager extends Model {

    private $roles = [];

    public function ajoutRole($role) {
        $this->roles[] = $role;
    }
}
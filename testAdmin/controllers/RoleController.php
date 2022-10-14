
<?php
require_once "models/roleManager.php";
require_once "controllers/GlobalController.php";

class RoleController
{
    private $roleManager;

    public function __construct()
    {
        $this->roleManager = new RoleManager;
    }
}
<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private UserModel $model;
    
    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function index()
    {
        helper("admin");

        $users = $this->model->orderBy("created_at")->paginate(3);

        return view("Admin\Views\Users\index", [
            "users" => $users,
            "pager" => $this->model->pager
        ]);
    }

    public function show($id)
    {
        
        $user = $this->getUserOr404($id);
        
    return view("Admin\Views\Users\show", [
            "user" => $user
        ]);

    }

    public function toggleBan($id)
    {
        $user = $this->getUserOr404($id);
        if ($user->isBanned()) {

        } else {
            $user->ban();
        }

        return redirect()->back()
                        ->with("message", "Used saved.");
    }

    private function getUserOr404($id): User
    {
        $user = $this->model->find($id);

        if($user === null) {

            throw new PageNotFoundException("Usuario $id no encontrado.");
        }

        return $user;

    }

}

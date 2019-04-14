<?php
namespace App\Services;

use App\User;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->index();
    }

    public function store($request)
    {
        return $this->userRepository->store($request);
    }
    public function showDetail($id)
    {
        return $this->userRepository->show($id);
    }
    public function edit($id)
    {
        return $this->userRepository->show($id);
    }
    public function update($request, $id)
    {
        return $this->userRepository->update($request, $id);
        
    }
    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function count()
    {
        return $this->userRepository->count();
    }

}

<?php

class UserController extends AbstractController {
    private UserManager $um;

    public function __construct()
    {
        $this->um = new UserManager();
    }

    public function getUsers()
    {
        // get all the users from the manager
       $users =  $this->um->getAllUsers();

        // render
        $this->render($users);


    }

    public function getUser(array $get)
    {
        // get the user from the manager
        $user = $this->uc->getUserById($get['id']);
        // either by email or by id

        // render
        $this->render(['user' => $user]);
    }

    public function createUser(array $post)
    {
        // create the user in the manager
        $newUser = new User(null, $post['username'], $post['firstName'], $post['lastName'], $post['email']);
        $userCreated = $this->uc->createUser($newUser);

        // render the created user
        $this->render(['user'=> $userCreated]);

    }

    public function updateUser(array $post)
    {
        // update the user in the manager
        $userToUpdate = new User($post['id'], $post['username'], $post['firstName'], $post['lastName'], $post['email']);
        $this->uc->updateUser($userToUpdate);

        // render the updated user
        $this->render(['user' => $userToUpdate]);

    }

    public function deleteUser(array $post)
    {
        // delete the user in the manager
        $this->uc->deleteUser($post['id']);

        // render the list of all users
        $this->render(['users' => $this->uc->getAllUsers()]);
    }
}
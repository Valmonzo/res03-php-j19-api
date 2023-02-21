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
       $usersTab = [];


       foreach($users as $user) {
           $usersTab[] = $user->toArray();
       }

        // render
        $this->render($usersTab);


    }

    public function getUser(string $get)
    {
        $id = intval($get);
        // get the user from the manager
        $userToLoad = $this->um->getUserById($id);
        // either by email or by id
        $userTab = $userToLoad->toArray();

        // render
        $this->render(['user' => $userTab]);
    }

    public function createUser(array $post)
    {
        // create the user in the manager
        $newUser = new User(null, $post['username'], $post['firstName'], $post['lastName'], $post['email']);
        $userCreated = $this->um->createUser($newUser);

        $userTab = $userCreated->toArray();

        // render the created user
        $this->render($userTab);

    }

    public function updateUser(array $post)
    {
        // update the user in the manager
        $userToUpdate = new User(intval($post['id']), $post['username'], $post['firstName'], $post['lastName'], $post['email']);
        $this->um->updateUser($userToUpdate);

        $userTab = $userToUpdate->toArray();

        // render the updated user
        $this->render($userTab);

    }

    public function deleteUser(array $post)
    {
        // delete the user in the manager
        $this->um->deleteUser(intval($post['id']));

        // render the list of all users
        $this->render(['users' => $this->um->getAllUsers()]);
    }
}
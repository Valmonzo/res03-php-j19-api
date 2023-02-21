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

        // render
    }

    public function getUser(array $get)
    {
        // get the user from the manager
        // either by email or by id

        // render
    }

    public function createUser(array $post)
    {
        // create the user in the manager

        // render the created user
    }

    public function updateUser(array $post)
    {
        // update the user in the manager

        // render the updated user
    }

    public function deleteUser(array $post)
    {
        // delete the user in the manager

        // render the list of all users
    }
}
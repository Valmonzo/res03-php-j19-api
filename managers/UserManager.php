<?php

class UserManager extends AbstractManager {

    public function getAllUsers() : array
    {
        // get all the users from the database
        $usersTab = [];

        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($users as $user)
        {
            $userToPush = new User($user["id"], $user["username"], $user["first_name"], $user['last_name'], $user['email']);
            $usersTab[] = $userToPush;
        }

        return $usersTab;
    }

    public function getUserById(int $id) : User
    {
        // get the user with $id from the database

        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $parameters = [
        'id' => $id
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        $userToLoad = new User($user['id'], $user['username'], $user['first_name'], $user['last_name'], $user['email']);

        return $userToLoad;
    }

    public function createUser(User $user) : User
    {
        // create the user from the database

        // return it with its id

        $query = $this->db->prepare('INSERT INTO users (`id`,`username`, `firstName`, `lastName`, `email`) VALUES(NULL, :username, :firstName, :lastName, :email)');

        $parameters = [
        'email' => $user->getEmail(),
        'username' => $user->getUsername(),
        'firstName'=>$user->getFirstName(),
        'lastName' =>$user->getLastName()
        ];
        $query->execute($parameters);

        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $user->getEmail()
            ];
        $query->execute($parameters);
        $userSelected = $query->fetch(PDO::FETCH_ASSOC);
        $userToLoad = new User($userSelected['id'], $userSelected['username'], $userSelected['first_name'], $userSelected['last_name'], $userSelected['email']);

        return $userToLoad;

    }

    public function updateUser(User $user) : User
    {
        // update the user in the database

        // return it

        $query = $this->db->prepare('UPDATE users SET username = :username, firstName = :firstName, lastName = :lastName, email = :email WHERE id = :id ');
        $parameters = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName()
            ];

        $query->execute($parameters);

        return $user;
    }

    public function deleteUser(User $user) : array
    {
        // delete the user from the database

        // return the full list of users

        $query = $this->db->prepare('DELETE * FROM users WHERE id = :id ');
        $parameters = [
            'id'=> $user->getId()
            ];

        $query->execute($parameters);

        return $this->getAllUsers();
    }
}
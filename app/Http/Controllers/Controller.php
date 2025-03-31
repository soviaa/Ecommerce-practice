<?php

namespace App\Http\Controllers;

class Controller
{
    public function isPalindrome($number){
        if($number != intval($number)){
            return ('it is not a number');
        }
        $temp = strval($number);
        $reverse = strrev($temp);
        if($temp == $reverse){
            return ('it is palindrome');
        }
        return ('it is not palindrome');
    }
    public function length($word){
        $last = explode(' ', $word);
        $last = $last[count($last)-1];
        $count = strlen($last);
        return $count;
    }
    public function checkDomain(){
        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['name' => 'Mike Johnson', 'email' => 'mike@gmail.com'],
            ['name' => 'Anna Lee', 'email' => 'anna@example.com']
        ];
        // You have an array of user data that contains several records with the fields name and email.
        // Write a Laravel function to filter out all users who have an email domain of example.com and return the names of those users.
        $result = [];
        foreach($users as $user){
            $email= explode('@', $user['email']);
            // dd($email);
            if($email[1] == 'example.com'){
              $result[] = $user['name'];
            }
        }
        return $result;
    }
}

<?php 
function generatePassword($length = 12)
{
    // Define character sets to meet the requirements
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specials = '!@#$%^&*()-_=+';

    // Combine all subsets for the rest of the password
    $allCharacters = $uppercase . $lowercase . $numbers . $specials;

    // Ensure that the password meets the basic requirements
    $password = '';
    $password .= $uppercase[random_int(0, strlen($uppercase) - 1)]; // At least one uppercase letter
    $password .= $lowercase[random_int(0, strlen($lowercase) - 1)]; // At least one lowercase letter
    $password .= $numbers[random_int(0, strlen($numbers) - 1)];     // At least one number
    $password .= $specials[random_int(0, strlen($specials) - 1)];   // At least one special character

    // Complete the remaining length with random characters
    for ($i = strlen($password); $i < $length; $i++) {
        $password .= $allCharacters[random_int(0, strlen($allCharacters) - 1)];
    }

    // Shuffle the characters to avoid a predictable pattern
    $password = str_shuffle($password);

    return $password;
}

?>
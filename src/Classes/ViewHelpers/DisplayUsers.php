<?php

namespace Todo\ViewHelpers;

use Todo\Entities\UserEntity;

class DisplayUsers
{
    public static function displayUsers(array $users): string
    {
        $result = '';
        foreach ($users as $user) {
            if ($user instanceof UserEntity) {
                $result .= '<option value="' . $user->getid() . '">' . $user->getUserName() .'</option>';
            } else {
                $result .= '';
            }

        }
        return $result;
    }
}

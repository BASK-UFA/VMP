<?php

namespace App\Observers;

use App\Models\User;
use File;

class UserObserver
{
    /**
     * Обработка ПЕРЕД обновлением записи
     *
     * @param User $user
     */
    public function updating(User $user)
    {
        $this->setAvatar($user);
//        dd($user->getDirty());
    }

    /**
     * Сохранить файл в памяти и обновить поле avatar пользователя
     *
     * @param User $user
     */
    private function setAvatar(User $user)
    {
        /** @var File $file */
        if ($user->isDirty('avatar') and is_file($user->avatar)) {
            $file = $user->avatar;

            $path = $file
                ->store('users/' . $user->id, 'public');

            $user->avatar = 'storage/' . $path;
        }
    }

}

<?php

use App\Models\EducationCourse;
use Illuminate\Database\Seeder;

class EducationCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new EducationCourse())->fill(
            [
                'name' => 'Динамическое WEB программирование',
                'user_id' => 1,
                'content' => 'Веб-разработчики используют для создания веб-сайтов специальные программы, языки программирования и разметки, которые связывают ссылки на различные веб-страницы, другие веб-сайты, графические элементы, текст и фото в единый функциональный и удобный информационный продукт.'
            ]
        )->save();

        (new EducationCourse())->fill(
            [
                'name' => 'Сетевое и системное администрирование',
                'user_id' => 1,
                'content' => ' '
            ]
        )->save();

        (new EducationCourse())->fill(
            [
                'name' => 'Школа юного программиста',
                'user_id' => 1,
                'content' => ' '
            ]
        )->save();

        DB::table('users_education_courses')->insert(
            ['user_id' => 1, 'course_id' => 1, 'user_name' => 'Прытков Данил', 'user_phone' => '+7 987 133 01 01']
        );
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

include APPPATH . '/third_party/faker/autoload.php';

class Faker extends CI_Controller
{
    public function seed($items = null)
    {
        $this->load->model('faker_model');

        $faker = Faker\Factory::create();

        $genders=['male','female'];
        
        for ($i = 0; $i < $items; $i++) {
             $data = [
                 'name'=>$faker->title($gender = 'male'|'female').' '.$faker->name('male'|'female'),
                 'phone'=>$faker->e164PhoneNumber,
                 'gender'=>$genders[rand(0,1)],
                 'address'=>$faker->address,
             ];

             $this->faker_model->seed($data);

        }
    }
}

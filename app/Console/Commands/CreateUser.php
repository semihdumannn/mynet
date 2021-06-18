<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:createUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project create manually user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->validate_cmd(function() {
            return $this->ask('Ad Soyad giriniz?');
        }, ['name','required|max:75']);

        $email = $this->validate_cmd(function() {
            return $this->ask('E-mail adresi giriniz ?');
        }, ['email','required|email|max:100|unique:users']);

        $password = $this->validate_cmd(function() {
            return $this->ask('Şifre giriniz?');
        }, ['password','required|min:8']);

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ];
        User::create($data);

        $this->info('User successfully created');

        return 0;
    }

    public function validate_cmd($method, $rules)
    {
        $value = $method();
        $validate = $this->validateInput($rules, $value);

        if ($validate !== true) {
            $this->warn($validate);
            $value = $this->validate_cmd($method, $rules);
        }
        return $value;
    }

    public function validateInput($rules, $value)
    {

        $validator = Validator::make([$rules[0] => $value], [ $rules[0] => $rules[1] ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return $error->first($rules[0]);
        }else{
            return true;
        }

    }
}

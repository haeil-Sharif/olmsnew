<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = Carbon::now();
        $data = [
            //1
            [
                'role_id' => 1,
                'username' => 'puptlibrary2021',
                'email' => 'admin@email.com',
                'password' => Hash::make('admin'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //2
            [
                'role_id' => '3',
                'username' => '2018-00525-TG-0',
                'email' => 'ecbangga@gmail.com',
                'password' => Hash::make('2018-00525-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //3
            [
                'role_id' => '3',
                'username' => '2018-00086-TG-0',
                'email' => 'eugeneraynera110820@gmail.com',
                'password' => Hash::make('2018-00086-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //4
            [
                'role_id' => '3',
                'username' => '2019-00114-TG-0',
                'email' => 'etinjannielyn@gmail.com',
                'password' => Hash::make('2019-00114-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //5
            [
                'role_id' => '3',
                'username' => '2019-00126-TG-0',
                'email' => 'gierza29@gmail.com',
                'password' => Hash::make('2019-00126-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //6
            [
                'role_id' => '3',
                'username' => '2018-00399-TG-0',
                'email' => 'kzcortes27@gmail.com',
                'password' => Hash::make('2018-00399-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //7
            [
                'role_id' => '3',
                'username' => 'JDionisio',
                'email' => 'galidojoymee@gmail.com',
                'password' => Hash::make('JDionisio'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //8
            [
                'role_id' => '3',
                'username' => '2018-00366-TG-0',
                'email' => '2018-00366-TG-0',
                'password' => Hash::make('2018-00366-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //9
            [
                'role_id' => '3',
                'username' => '2018-00231-TG-0',
                'email' => 'paulinellagas@gmail.com',
                'password' => Hash::make('2018-00231-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //10
            [
                'role_id' => '3',
                'username' => '2019-00422-TG-0',
                'email' => 'virtusioaira7@gmail.com',
                'password' => Hash::make('2019-00422-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //11
            [
                'role_id' => '3',
                'username' => '2018-00220-TG-0',
                'email' => 'quieljeremiahcariaso04@gmail.com',
                'password' => Hash::make('2018-00220-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //12
            [
                'role_id' => '3',
                'username' => '2018-00232-TG-0',
                'email' => 'mhar.apura@gmail.com',
                'password' => Hash::make('2018-00232-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //13
            [
                'role_id' => '3',
                'username' => '2018-00341-TG-0',
                'email' => 'j.balatong1999@gmail.com',
                'password' => Hash::make('2018-00341-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //14
            [
                'role_id' => '3',
                'username' => '2018-00484-TG-0',
                'email' => 'llynttburton08@gmail.com',
                'password' => Hash::make('2018-00484-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //15
            [
                'role_id' => '3',
                'username' => '2018-00343-TG-0',
                'email' => 'cabanelacharmie24@gmail.com',
                'password' => Hash::make('2018-00343-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //16
            [
                'role_id' => '3',
                'username' => '2018-00256-TG-0',
                'email' => 'joshuacapalaran27@gmail.com',
                'password' => Hash::make('2018-00256-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //17
            [
                'role_id' => '3',
                'username' => '2018-00361-TG-0',
                'email' => 'johnrusseldacanay@gmail.com',
                'password' => Hash::make('2018-00361-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //18
            [
                'role_id' => '3',
                'username' => '2018-00368-TG-0',
                'email' => 'rhingmakz21@gmail.com',
                'password' => Hash::make('2018-00368-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //19
            [
                'role_id' => '3',
                'username' => '2018-00353-TG-0',
                'email' => 'erjohn13@gmail.com',
                'password' => Hash::make('2018-00353-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //20
            [
                'role_id' => '3',
                'username' => '2018-00379-TG-0',
                'email' => 'froilanfernandez08@gmail.com',
                'password' => Hash::make('2018-00379-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //21
            [
                'role_id' => '3',
                'username' => '2018-00322-TG-0',
                'email' => 'gabitoraymond358@gmail.com',
                'password' => Hash::make('2018-00322-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //22
            [
                'role_id' => '3',
                'username' => '2018-00293-TG-0',
                'email' => 'jerome.jalandoon@gmail.com',
                'password' => Hash::make('2018-00293-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //23
            [
                'role_id' => '3',
                'username' => '2018-00315-TG-0',
                'email' => 'choilapitan47@gmail.com',
                'password' => Hash::make('2018-00315-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //24
            [
                'role_id' => '3',
                'username' => '2018-00487-TG-0',
                'email' => 'khimlaude@gmail.com',
                'password' => Hash::make('2018-00487-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //25
            [
                'role_id' => '3',
                'username' => '2018-00523-TG-0',
                'email' => 'lazarochan03@gmail.com',
                'password' => Hash::make('2018-00523-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //26
            [
                'role_id' => '3',
                'username' => '2018-00299-TG-0',
                'email' => 'davidlimba19@gmail.com',
                'password' => Hash::make('2018-00299-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //27
            [
                'role_id' => '3',
                'username' => '2018-00376-TG-0',
                'email' => 'linijin17@gmail.com',
                'password' => Hash::make('2018-00376-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //28
            [
                'role_id' => '3',
                'username' => '2018-00349-TG-0',
                'email' => 'zklumabi@gmail.com',
                'password' => Hash::make('2018-00349-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //29
            [
                'role_id' => '3',
                'username' => '2018-00330-TG-0',
                'email' => 'nerissamaglente2@gmail.com',
                'password' => Hash::make('2018-00330-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //30
            [
                'role_id' => '3',
                'username' => '2018-00328-TG-0',
                'email' => 'jamreimanalo@gmail.com',
                'password' => Hash::make('2018-00328-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //31
            [
                'role_id' => '3',
                'username' => '2018-00372-TG-0',
                'email' => 'marcusmanuel.pupt@gmail.com',
                'password' => Hash::make('2018-00372-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //32
            [
                'role_id' => '3',
                'username' => '2018-00305-TG-0',
                'email' => 'mnmerielmanuel@gmail.com',
                'password' => Hash::make('2018-00305-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //33
            [
                'role_id' => '3',
                'username' => '2018-00513-TG-0',
                'email' => 'jcnavaja28@gmail.com',
                'password' => Hash::make('2018-00513-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //34
            [
                'role_id' => '3',
                'username' => '2018-00345-TG-0',
                'email' => 'jillianpollescas@gmail.com',
                'password' => Hash::make('2018-00345-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //35
            [
                'role_id' => '3',
                'username' => '2018-00354-TG-0',
                'email' => 'grasyamallen@gmail.com',
                'password' => Hash::make('2018-00354-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //36
            [
                'role_id' => '3',
                'username' => '2018-00260-TG-0',
                'email' => 'rakimjasmine@gmail.com',
                'password' => Hash::make('2018-00260-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //37
            [
                'role_id' => '3',
                'username' => '2018-00355-TG-0',
                'email' => 'shailynjoycesaan@gmail.com',
                'password' => Hash::make('2018-00355-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //38
            [
                'role_id' => '3',
                'username' => '2018-00338-TG-0',
                'email' => 'jamiesamar18@gmail.com',
                'password' => Hash::make('2018-00338-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //39
            [
                'role_id' => '3',
                'username' => '2018-00263-TG-0',
                'email' => 'serojealdrin@gmail.com',
                'password' => Hash::make('2018-00263-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //40
            [
                'role_id' => '3',
                'username' => '2018-00313-TG-0',
                'email' => 'tmbrccl@gmail.com',
                'password' => Hash::make('2018-00313-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //41
            [
                'role_id' => '3',
                'username' => '2018-00370-TG-0',
                'email' => 'csollanojr@gmail.com',
                'password' => Hash::make('2018-00370-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //42
            [
                'role_id' => '3',
                'username' => '2018-00304-TG-0',
                'email' => 'bernatrads4@gmail.com',
                'password' => Hash::make('2018-00304-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //43
            [
                'role_id' => '3',
                'username' => '2018-00342-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2018-00342-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
            //44
            [
                'role_id' => '3',
                'username' => '2017-00342-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00342-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //45
            [
                'role_id' => '3',
                'username' => '2017-00111-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00111-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //46
            [
                'role_id' => '3',
                'username' => '2018-00123-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2018-00123-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //47
            [
                'role_id' => '3',
                'username' => '2017-00112-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00112-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //48
            [
                'role_id' => '3',
                'username' => '2017-00113-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00113-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //49
            [
                'role_id' => '3',
                'username' => '2017-00114-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00114-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //50
            [
                'role_id' => '3',
                'username' => '2017-00115-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00115-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //51
            [
                'role_id' => '3',
                'username' => '2017-00116-TG-0',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('2017-00116-TG-0'),
                'updated_at' => $currentTime,
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'deleted_at' => NULL,
            ],

            //52
            [
                'role_id' => '3',
                'username' => '2020-00000-TG-0',
                'email' => 'richard.gabito@gmail.com',
                'password' => Hash::make('2020-00000-TG-0'),
                'limit' => NULL,
                'status' => '1',
                'remember_token' => NULL,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
                'deleted_at' => NULL,
            ],
           
        ];
        DB::table('users')->insert($data);
    }
}
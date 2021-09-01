<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InsertSampleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:sample_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        // Sample User
        $user = new \App\Model\User;
        $user->nama = 'Aldefa Pratiwi';
        $user->username = 'aldefa123';
        $user->password = bcrypt('aldefa123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Novela Andriyani';
        $user->username = 'novela123';
        $user->password = bcrypt('novela123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Mhd. Izzu Salam';
        $user->username = 'izzu123';
        $user->password = bcrypt('izzu123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Hadi Atmaja';
        $user->username = 'hadi123';
        $user->password = bcrypt('hadi123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Nita Permata Sari';
        $user->username = 'nita123';
        $user->password = bcrypt('nita123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Fikri Akbar Pratama';
        $user->username = 'fikri123';
        $user->password = bcrypt('fikri123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Nabila Syifa';
        $user->username = 'nabila123';
        $user->password = bcrypt('nabila123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Syafira Ayu';
        $user->username = 'ayu123';
        $user->password = bcrypt('ayu123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Mhd. Rifqi';
        $user->username = 'rifqi123';
        $user->password = bcrypt('rifqi123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        $user = new \App\Model\User;
        $user->nama = 'Dewa Abid';
        $user->username = 'dewa123';
        $user->password = bcrypt('dewa123');
        $user->jabatan = 'pelamar';
        $user->remember_token = Str::random(60);
        $user->save();

        // Sample Nilai
        // User 1
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 3;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 3;
        $seleksi->save();

          // User 2
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 4;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 2;
        $seleksi->save();

        // User 3
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 5;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 3;
        $seleksi->save();

        // User 4
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 6;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 4;
        $seleksi->save();

        // User 5
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 2;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 7;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 4;
        $seleksi->save();

        // User 6
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 2;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 8;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 2;
        $seleksi->save();

        // User 7
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 2;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 9;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 3;
        $seleksi->save();

        // User 8
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 2;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 2;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 10;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 4;
        $seleksi->save();

        // User 9
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 5;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 2;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 11;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 2;
        $seleksi->save();

        // User 10
        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 1;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 2;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 3;
        $seleksi->nilai = 4;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 4;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 5;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 6;
        $seleksi->nilai = 3;
        $seleksi->save();

        $seleksi = new \App\Model\Seleksi;
        $seleksi->id_user = 12;
        $seleksi->id_kriteria = 7;
        $seleksi->nilai = 2;
        $seleksi->save();
    }
}

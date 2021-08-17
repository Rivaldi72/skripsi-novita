<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Kriteria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:kriteria';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menginput Data Kriteria';

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
        $kriteria = new \App\Model\Kriteria;
        $kriteria->truncate();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'Pendidikan Terakhir';
        $kriteria->bobot = 0.3646;
        $kriteria->jenis = 'benefit';
        $kriteria->kepentingan = 9;
        $kriteria->save();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'Usia';
        $kriteria->bobot = 0.2123;
        $kriteria->jenis = 'benefit';
        $kriteria->kepentingan = 8;
        $kriteria->save();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'IPK';
        $kriteria->bobot = 0.1584;
        $kriteria->jenis = 'cost';
        $kriteria->kepentingan = 6;
        $kriteria->save();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'Kemampuan Bahasa Asing (Inggris, Arab)';
        $kriteria->bobot = 0.1191;
        $kriteria->jenis = 'cost';
        $kriteria->kepentingan = 5;
        $kriteria->save();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'Wawancara';
        $kriteria->bobot = 0.0802;
        $kriteria->jenis = 'cost';
        $kriteria->kepentingan = 4;
        $kriteria->save();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'Pengalaman Kerja';
        $kriteria->bobot = 0.0463;
        $kriteria->jenis = 'cost';
        $kriteria->kepentingan = 3;
        $kriteria->save();

        $kriteria = new \App\Model\Kriteria;
        $kriteria->kriteria = 'Psikotest';
        $kriteria->bobot = 0.0192;
        $kriteria->jenis = 'cost';
        $kriteria->kepentingan = 2;
        $kriteria->save();
    }
}

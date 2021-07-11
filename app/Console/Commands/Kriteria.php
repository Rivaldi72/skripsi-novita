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
        $kriteria->kriteria = 'Admin';
        $kriteria->bobot = 'admin123';
        $kriteria->jenis = 'cost';
        $kriteria->save();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Trash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a random trash can';

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
		$max_capacity = rand(500,1100);
		$cur_capacity = rand(0,$max_capacity);
        DB::table('garbage_bin_register')->insert([
													'name'=>"vcx",
													'max_capacity'=>$max_capacity,
													'cur_capacity'=>$cur_capacity
												 ]);
    }
}

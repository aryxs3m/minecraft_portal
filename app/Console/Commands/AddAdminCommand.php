<?php

namespace App\Console\Commands;

use App\Models\AuthMeUser;
use Illuminate\Console\Command;

class AddAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mcp:add_admin {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gives admin roles to a user';

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
        $user = $this->argument('username');
        $amu = AuthMeUser::where('username', '=', $user)->first();
        $amu->assignRole('admin');
        return 0;
    }
}

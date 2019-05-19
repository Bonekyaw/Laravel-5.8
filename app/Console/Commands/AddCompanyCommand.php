<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'add:company {name} {phone?}';
    protected $signature = 'add:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new company with arguments';

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
        $name = $this->ask('Add a company name');
        $phone = $this->ask('Add company phone number');

        if ($this->confirm('Are you sure to add '. $name)) {
            $company = Company::create([
                'name' => $name,
                'phone' => $phone,

                ]);
            return  $this->info('Now added : '. $company->name);
        }
        return $this->warn('No company is added');

        // $company = Company::create([
        //     'name' => $this->argument('name'),
        //     'phone' => $this->argument('phone') ?? 'N/A',

        //     ]);
        //     $this->info('Now added : '. $company->name);
    }
}

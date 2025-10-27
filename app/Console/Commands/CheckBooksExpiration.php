<?php

namespace App\Console\Commands;

use App\Models\Books;
use Carbon\Carbon;
use Illuminate\Console\Command;

use function Pest\Laravel\get;

class CheckBooksExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:check-books-expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $expiredBooks = Books::whereDate('due_date', '<', $today)->where('active', true)->get();

        foreach($expiredBooks as $book){
            $book-> active = false;
            $book -> save();
        }

        $this -> info('Se han desactivo ' . $expiredBooks->count() . ' libros vencido.');
    }
}

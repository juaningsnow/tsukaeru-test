<?php

namespace App\Console\Commands;

use App\Clients\ExchangeRatesClient;
use App\Helpers\CurrencyNames;
use App\Models\Currency;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateCurrencyRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Currency Records';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            print("Updating Records . . .\n");
            $exchangeRateClient = new ExchangeRatesClient();
            $rates = $exchangeRateClient->getLatestRates();
            $dateTime = Carbon::parse($rates['timestamp']);
            foreach ($rates['rates'] as $key => $conversionRate) {
                Currency::updateOrCreate([
                    'code' => $key,
                    'name' => CurrencyNames::getCurrencyName($key),
                ], [
                    'rate' => $conversionRate,
                    'date' => $dateTime
                ]);
            }
            print("Records Successfully Updated!\n");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            print("Error Updating, Check laravel.log\n");
        }
    }
}

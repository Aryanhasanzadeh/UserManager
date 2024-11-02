<?php

namespace App\Jobs\User;

use App\Dtos\User\UpdateUserCountryInformationDto;
use App\Models\User;
use App\Services\CountryService;
use App\Services\UserService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateUserCountryInformation implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User   $user,
        public string $country
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = CountryService::new()->getCountry($this->country);

        UserService::new()->updateCountryInformation(
            $this->user,
            UpdateUserCountryInformationDto::from([
                'country' => $data[0]?->name ?? null,
                'currencies' => $data[0]?->currencies ?? null,
            ])
        );
    }
}

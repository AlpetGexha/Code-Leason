<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Jobs\DeployBatchJob;
use App\Jobs\DeployJob;
use App\Jobs\PaymentJob;
use App\Jobs\PullBatchJob;
use App\Jobs\PullJob;
use App\Jobs\RateLimitJob;
use App\Jobs\TestPullBatchJob;
use App\Jobs\TestPullJob;
use App\Jobs\WelcomeEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Bus;

class Queue extends Controller
{
    public function job()
    {
        // $user = User::toBase()->first();
        // dd($user);
        foreach (range(1, 5) as $i) {
            (new WelcomeEmailJob())->dispatch();
        }

        (new PaymentJob())->dispatch()->onQueue('payment');
        // php artisan queue:work --queue=payment,default
        return to_route('home')->with('status', 'Job Request Start');
    }

    public function workflow()
    {
        $chain = [
            new PullJob,
            new TestPullJob,
            new DeployJob,
        ];

        Bus::chain($chain)->dispatch();
        return to_route('home')->with('status', 'Job workflow Chain Request Start');
    }

    public function workflow2()
    {
        $batch = [
            new PullBatchJob,
            new TestPullBatchJob,
            new DeployBatchJob,
        ];

        Bus::batch($batch)
            // ->allowFailures()
            // ->catch(function ($batch, Throwable $e) {
            //     info('Batch failed with exception: ' . $e->getMessage());
            // })
            // ->then(function ($batch) {
            //     info('All Batch completed successfully!');
            // })
            // ->finally(function ($batch) {
            //     info('All batch finished');
            // })
            // ->onQueue('deplyoment')
            ->dispatch();
        return to_route('home')->with('status', 'Job workflow batch Request Start');
    }

    public function ratelimit()
    {
        foreach (range(1, 5) as $i) {
            (new RateLimitJob())->dispatch();
        }

        return to_route('home')->with('status', 'Job ratelimit Request Start');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SearchResult;
use App\Models\SearchResultItem;
use App\Services\SubscriptionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public $subscriptionService;

    public function __construct()
    {
        $this->subscriptionService = new SubscriptionService;
    }

    public function dashboard()
    {
        $authId = auth()->id();
        $data['pageTitle'] = __('Dashboard');
        $data['totalSearchResult'] = SearchResult::query()->where('user_id', $authId)->count();
        $data['totalRemainingCharacter'] = getLimit(RULES_CHARACTER, $authId);
        $data['planRemainingDays'] = getLimit(RULES_PLAN_REMAINING_DAYS, $authId);
        $data['userPlan'] = $this->subscriptionService->getLastPlan();

        $documentMonthlyResult = SearchResultItem::query()
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->whereMonth('created_at', date('m'))
            ->select(DB::raw('COUNT(*) as "total_items"'), DB::raw("DATE_FORMAT(created_at, '%e') as day"))
            ->where('user_id', $authId)
            ->get();
        $data['currentMonthDays'] = range(1, date('t') - 15);
        $documentMonthlyResultByDay = [];
        foreach ($data['currentMonthDays'] as $day) {
            foreach ($documentMonthlyResult as $result) {
                if ($result->day == $day) {
                    array_push($documentMonthlyResultByDay, $result->total_items);
                } else {
                    array_push($documentMonthlyResultByDay, 0);
                }
            }
        }
        $data['documentMonthlyResult'] = $documentMonthlyResultByDay;
        return view('user.dashboard', $data);
    }
}

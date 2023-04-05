<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\UserPackage;
use App\Services\OrderService;
use App\Services\PackageService;
use App\Services\SubscriptionService;
use App\Services\UsersService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ResponseTrait;
    public $usersService, $subscriptionService;

    public function __construct()
    {
        $this->usersService = new UsersService;
        $this->subscriptionService = new SubscriptionService;
    }

    public function details($id)
    {
        $data['pageTitle'] = __('User Details');
        $data['userPlan'] = $this->subscriptionService->getCurrentPlan($id);
        $data['user'] = $this->usersService->getInfo($id);
        $orderService = new OrderService;

        $data['invoices'] = UserPackage::query()
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->leftJoin('orders', 'orders.id', '=', 'user_packages.order_id')
            ->where('user_packages.user_id', $id)
            ->select(['user_packages.*', 'packages.name as packageName',  DB::raw('(CASE WHEN orders.total is null THEN \'Admin\' ELSE orders.total END) AS orders_total')])
            ->orderBy('user_packages.id', 'desc')
            ->get();
        $data['orders'] = $orderService->getPendingOrderByUser($id);
        $packageService = new PackageService;
        $data['packages'] = $packageService->getActiveAll();
        return view('admin.users.details', $data);
    }

    public function store(UserRequest $request)
    {
        return $this->usersService->store($request);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->usersService->getAllUsersData($request);
        } else {
            $data['pageTitle'] = __('Users');
            return view('admin.users.list', $data);
        }
    }

    public function getInfo(Request $request)
    {
        $data = $this->usersService->getInfo($request->id);
        return $this->success($data);
    }

    public function status(Request $request)
    {
        return $this->usersService->statusChange($request);
    }
}

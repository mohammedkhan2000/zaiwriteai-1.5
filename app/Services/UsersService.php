<?php

namespace App\Services;

use App\Models\User;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    use ResponseTrait;

    public function getAllUsersData($request)
    {
        $users = User::query()
            ->where('role', USER_ROLE_USER);

        return datatables($users)
            ->addIndexColumn()
            ->addColumn('name', function ($user) {
                return '<a href="' . route('admin.users.details', $user->id) . '" class="link-primary">' . $user->name . '</a>';
            })->addColumn('status', function ($user) {
                if ($user->status == ACTIVE) {
                    return '<div class="status-btn status-btn-blue font-13 radius-4">Active</div>';
                } else {
                    return '<div class="status-btn status-btn-orange font-13 radius-4">Deactivate</div>';
                }
            })->addColumn('action', function ($user) {
                $html = '<div class="tbl-action-btns d-inline-flex">';
                $html .= '<a href="' . route('admin.users.details', $user->id) . '" class="p-1 tbl-action-btn" data-id="' . $user->id . '" title="Edit"><span class="iconify" data-icon="zondicons:view-show"></span></a>';
                $html .= '<button type="button" class="p-1 tbl-action-btn edit" data-id="' . $user->id . '" title="Edit"><span class="iconify" data-icon="clarity:note-edit-solid"></span></button>';
                $html .= '<button type="button" class="p-1 tbl-action-btn statusBtn" data-id="' . $user->id . '" title="Status Change"><span class="iconify" data-icon="fluent:text-change-previous-20-filled"></span></button>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['name', 'status', 'action'])
            ->make(true);
    }

    public function getActiveAll()
    {
        return User::where('status', ACTIVE)->where('role', USER_ROLE_USER)->get();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', '');
            if ($id != '') {
                $user = User::findOrFail($request->id);
            } else {
                $user = new User();
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            if (!is_null($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->role = USER_ROLE_USER;
            $user->status = $request->status ?? DEACTIVATE;
            $user->email_verified_at = now()->format("Y-m-d H:i:s");
            $user->save();

            DB::commit();
            $message = $request->id ? __(UPDATED_SUCCESSFULLY) : __(CREATED_SUCCESSFULLY);
            return $this->success([], $message);
        } catch (Exception $e) {
            DB::rollBack();
            $message = getErrorMessage($e, $e->getMessage());
            return $this->error([],  $message);
        }
    }

    public function getInfo($id)
    {
        return User::where('role', USER_ROLE_USER)->findOrFail($id);
    }

    public function statusChange($request)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($request->id);
            $user->status = $request->status == ACTIVE ? ACTIVE : DEACTIVATE;
            $user->save();
            DB::commit();
            $message = __(UPDATED_SUCCESSFULLY);
            return $this->success([], $message);
        } catch (Exception $e) {
            DB::rollBack();
            $message = getErrorMessage($e, $e->getMessage());
            return $this->error([],  $message);
        }
    }
}

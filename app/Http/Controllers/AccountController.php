<?php

namespace App\Http\Controllers;

use App\Account;
use App\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use ResponseCache;

class AccountController extends Controller
{
    public function admin_index(): Factory|View|Application
    {
        $cities = City::all();
        $account_cur = \auth()->user();
        $accounts = Account::where('id', '!=', auth()->id())->paginate(5);
        return view('admin.accounts.account_list', compact('cities', 'accounts'));
    }

    public function logOut(Request $request): RedirectResponse
    {
        cache()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function edit($id): Factory|View|Application
    {
        $account_cur = Session::get('current_account');
        $account = Account::where('id', '=', $id)->where('id', '!=', $account_cur->id)->first();
        $cities = City::where('status', '=', '1')->get();
        return view('admin.accounts.edit', compact('account', 'cities'));
    }

    public function update(Request $request, $id): Redirector|Application|RedirectResponse
    {
        $request->validate([
            'fullName'    => 'required',
            'email'       => 'required',
            'birthDate'   => 'required',
            'phoneNumber' => 'required',
            'status'      => 'required',
            'city'        => 'required',
            'role'        => 'required',
        ]);
        $account = Account::find($id);
        $account->fullName = $request->fullName;
        $account->email = $request->email;
        $account->birthDate = $request->birthDate;
        $account->status = $request->status;
        $account->save();
        return redirect(route('admin_account_list'));
    }

    public function create(): Factory|View|Application
    {
        $cities = City::all();
        return view('admin.accounts.create', compact('cities'));
    }

    public function store(Request $request): Redirector|Application|RedirectResponse
    {

        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên hãng là cần thiết',
        ]);

        $account = new Account();
        //        dd($request);
        $account->name = $request->name;
        $account->save();
        return redirect(route('admin_account_list'));
    }

    public function delete($id): Redirector|Application|RedirectResponse
    {
        $account = Account::find($id);
        $account->status = 0;
        $account->save();
        return redirect(route('admin_account_list'));
    }

    public function delete_multi(Request $request): JsonResponse
    {
        $ids = $request->ids;
        $ids_array = explode(',', $ids);
        //        return response()->json(['success'=>$ids_array]);
        Account::whereIn('id', $ids_array)->update(['status' => 0]);

        return response()->json(['success' => "Account Deleted successfully."]);
        //        $products_array = $request->accounts;
        //dd($products_array);
        //check product con ton` tai hay khong
        //
    }

    public function user_update(Request $request): RedirectResponse
    {
        $account = auth()->user();

        // Remove cache to render render errors
        ResponseCache::forget(route('profile'));

        $attributes = $request->validate([
            'fullName'    => 'required|max:20',
            'birthDate'   => 'nullable',
            'sex'         => Rule::in(['Male', 'Female']),
            'address'     => 'nullable|max:250',
            'phoneNumber' => 'nullable|numeric|digits_between:9,15'
        ]);
        $attributes['birthDate'] = date("Y-m-d", strtotime($attributes['birthDate']));
        $account->update($attributes);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Account;
use App\City;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {
        $cities = City::all();
        session(['previous_link' => url()->previous()]);
        return view('auth.login_register', compact('cities'));
    }

    public function admin_index()
    {
        $cities = City::all();
        $account_cur = \auth()->user();
        $accounts = Account::where('id', '!=', auth()->id())->paginate(5);
        return view('admin.accounts.account_list', compact('cities', 'accounts'));
    }

    public function loginProgress(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remembered === 'checked'))
        {
            $request->session()->regenerate();
            if (auth()->user()->role->name === 'admin')
            {
                return redirect('/admin');
            }
            return redirect(session('previous_link'));
        }

        return redirect(route('login'))->withErrors([['emailLogin' => 'account not found'], ['passwordLogin' => 'Account not found']]);
    }

    public function logOut(Request $request): RedirectResponse
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function edit($id)
    {
        $account_cur = Session::get('current_account');
        $account = Account::where('id', '=', $id)->where('id', '!=', $account_cur->id)->first();
        $cities = City::where('status', '=', '1')->get();
        return view('admin.accounts.edit', compact('account', 'cities'));
    }

    public function update(Request $request, $id)
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

    public function create()
    {
        $cities = City::all();
        return view('admin.accounts.create', compact('cities'));
    }

    public function store(Request $request)
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

    public function delete($id)
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
        $attributes = $request->validate([
            'fullName'  => 'required',
            'birthDate' => 'required',
            'sex'       => 'required'
        ]);
        $attributes['birthDate'] = date("Y-m-d", strtotime($attributes['birthDate']));
        $account->update($attributes);

        return back();
    }
}

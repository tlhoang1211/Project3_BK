<?php

namespace App\Http\Controllers;

use App\Account;
use App\City;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('login_register',compact('cities'));
    }
    public function admin_index(){
        $cities = City::all();
        $account_cur = Session::get('current_account');
        $accounts = Account::where('id','!=',$account_cur->id)->paginate(5);
        return view('admin.accounts.account_list',compact('cities','accounts'));
    }

    public function registerProgress(RegisterRequest $request){
//        dd($request);
//        $request->validate([
//            'email' => 'required',
//            'password' => 'required',
//            'firstName' => 'required',
//            'lastName' => 'required',
//            'address' => 'required',
//            'city' => 'required',
//            'phone' => 'required',
//            'term' => 'required',
//        ]);
//        $request->validate();
        $account = new Account();
        $account->email = $request->email;
        $account->passwordHash = md5($request->password.$request->firstName);
        $account->salt = $request->firstName;
        $account->fullName = $request->lastName.' '.$request->firstName;
        $account->phoneNumber = $request->phone;
        $account->email_verified = 'unverified';
        $account->status = 1;
        $account->city_id = $request->city;
        $account->sex = $request->sex;
        $account->birthDate = $request->birthDate ;

        $account->roles();

        $account->save();
        $currentId = $account->id;
        $account->roles()->sync(1);
//        dd($account->roles()->sync(1)->toSql());
//        dd($account);
        return redirect('/login');
    }

    public function loginProgress(Request $request){
        $request->validate([
            'emailLogin' => 'required',
            'passwordLogin' => 'required',
        ]);
//        dd($request);
        $condition = ['email' => $request->emailLogin, 'status' => "1",];
//        dd($condition);
        $account = Account::where($condition)->get()->first();
//        dd($account->roles);
//        dd($request->password);
        if (isset($account)){
            $passwordHash = $account->passwordHash;
            $salt = $account->salt;
//            dd(md5($request->password.$salt));
//            dd($passwordHash);
            if ($passwordHash == md5($request->passwordLogin.$salt)){
                session_start();
                $account_session = $request->session();
                $account['roles']= $account->roles;
//                dd($account['roles']);
//                dd($account);
                $account_session->put('current_account', $account);
//                dd($account_session->get('current_account'));
              return redirect('/admin');
            }
            return redirect(route('login'))->withErrors([['emailLogin'=>'account not found'],['passwordLogin'=>'Account not found']]);
        }else{
            return redirect(route('login'))->withErrors([['emailLogin'=>'account not found'],['passwordLogin'=>'Account not found']]);
        }
    }

    public function logOut(Request $request){

        Session::forget('current_account');

        return redirect('/');
    }

    public function edit($id){
        $account_cur = Session::get('current_account');
        $account = Account::where('id','=',$id)->where('id','!=',$account_cur->id)->first();
        $cities = City::where('status','=','1')->get();
        return view('admin.accounts.edit',compact('account','cities'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'birthDate' => 'required',
            'phoneNumber' => 'required',
            'status' => 'required',
            'city' => 'required',
            'role' => 'required',
        ]);
        $account = Account::find($id);
        $account->fullName = $request->fullName;
        $account->email = $request->email;
        $account->birthDate = $request->birthDate;
        $account->status = $request->status;
        dd($request);
        $account->save();
        return redirect(route('admin_account_list'));
    }
    public function create(){
        $cities = City::all();
        return view('admin.accounts.create',compact('cities'));
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Tên hãng là cần thiết',
        ]);

        $account = new Account();
//        dd($request);
        $account->name = $request->name;
        $account->save();
        return redirect(route('admin_account_list'));
    }
    public function delete($id){
        $account = Account::find($id);
        $account->status = 0;
        $account->save();
        return redirect(route('admin_account_list'));
    }
    public function delete_multi(Request $request){
        $ids_array = new Array_();
        $ids = $request->ids;
        $ids_array = explode(',', $ids);
//        return response()->json(['success'=>$ids_array]);
        Account::whereIn('id', $ids_array)->update(['status' => 0]);

        return response()->json(['success'=>"Account Deleted successfully."]);
//        $products_array = $request->accounts;
        //dd($products_array);
        //check product con ton` tai hay khong
//
    }
}

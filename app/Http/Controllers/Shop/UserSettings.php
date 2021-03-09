<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserSettingsRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettings extends Controller
{
    public function index()
    {
        $items=Auth::user();

        $date=Carbon::parse($items->birth_day)->format('Y-m-d');

        return view('shop.products.user-profile',compact('items','date'));

    }

    public function updatePass(PasswordRequest $request)
    {

        $result=$request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
        if($result){
            return redirect()->route('shop.settings.index')
                ->with(['success'=>'User password sucsessfuly updated']);
        }else{
            return redirect()->route('shop.settings.index')->withErrors(['msd'=>'Error on save date'])->withInput();
        }
    }

    public function update(UserSettingsRequest $request)
    {


        $inputs=$request->input();
        $result=Auth::user()->update($inputs);

        if($result){
            return redirect()->route('shop.settings.index')
                ->with(['success'=>'User updates sucsessfuly']);
        }else{
            return redirect()->route('shop.settings.index')->withErrors(['msd'=>'Error on save date'])->withInput();
        }

    }




}

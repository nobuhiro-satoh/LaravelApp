<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $items = Customer::all();
        return view('customer.index',['items' => $items]);
    }

    public function find(Request $request)
    {
        $items = Customer::all();
        return view('customer.index',['items' => $items]);
    }

    public function search(Request $request)
    {
        // 変数queryを設定
        $query = Customer::query();

        // 検索条件の値を設定
        $id = $request->input('id');
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $last_name_ruby = $request->input('last_name_ruby');
        $first_name_ruby = $request->input('first_name_ruby');
        $address = $request->input('address');
        $phone_number_1 = $request->input('phone_number_1');
        $phone_number_2 = $request->input('phone_number_2');
        $phone_number_3 = $request->input('phone_number_3');

        // idが設定されている場合、idで絞る
        if(!empty($id)){
            $query->where('id', '=', $id);
        }

        // 姓が設定されている場合、姓で絞る
        if(!empty($last_name)){
            $query->where('last_name', 'like', '%'.$last_name.'%');
        }

        // 名が設定されている場合、名で絞る
        if(!empty($first_name)){
            $query->where('first_name', 'like', '%'.$first_name.'%');
        }
        
        // 姓(ひらがな)が設定されている場合、姓(ひらがな)で絞る
        if(!empty($last_name_ruby)){
            $query->where('last_name_ruby', 'like', '%'.$last_name_ruby.'%');
        }
        
        // 名(ひらがな)が設定されている場合、名(ひらがな)で絞る
        if(!empty($first_name_ruby)){
            $query->where('first_name_ruby', 'like', '%'.$first_name_ruby.'%');
        }

        // メールアドレスが設定されている場合、メールアドレスで絞る
        if(!empty($address)){
            $query->where('address', 'like', '%'.$address.'%');
        }
        
        // 電話番号が設定されている場合、電話番号で絞る
        if(!empty($phone_number_1)){
            $query->where('phone_number', 'like', $phone_number_1.'-%');
        }
        
        if(!empty($phone_number_2)){
            $query->where('phone_number', 'like', '%-'.$phone_number_2.'-%');
        }
        
        if(!empty($phone_number_3)){
            $query->where('phone_number', 'like', '%-'.$phone_number_3);
        }

        $items = $query->get();

        return view('customer.index', ['items' => $items]);

    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
	public function index(Request $request)
	{
		return view('hello.index',['msg'=>'フォームを入力:']);
	}
	
	public function post(Request $request)
	{
		$rules = [
			'name' => 'required',
			'mail' => 'email',
			'age' => 'numeric',
		];
		
		$messages = [
			'name.required' => '名前は必ず入力してください。',
			'mail.email' => 'メールアドレスが必要です。',
			'age.numeric' => '年齢を整数で記入ください。',
			'age.min' => '年齢はゼロ歳以上で入力ください。',
			'age.max' => '年齢は200歳以下で入力してください。'
		];
		
		$validator = Validator::make($request->all(), $rules, $messages);
		
		$validator->sometimes('age', 'min:0', function($input){
			return is_numeric($input->age);
		});
		
		$validator->sometimes('age', 'max:200', function($input){
			return is_numeric($input->age);
		});
		
		if($validator->fails()){
			return redirect('/hello')
				->withErrors($validator)
				->withInput();
		}
		
		return view('hello.index',['msg'=>'正しく入力されました!']);
		
	}
}

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SettingRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'address' => 'required',
			'contact' => 'required',
			'email' => 'required',
			'info' => 'required',
			'chat' => 'required',
			'paging' => 'required',
			'slide_front' => 'required',
			'slide_inside' => 'required',
			'facebook' => 'required',
			'twitter' => 'required',
			'google' => 'required',
			'rss' => 'required'
		];
	}

}

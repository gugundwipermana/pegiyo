<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request {

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
			'title' => 'required',
			'contents' => 'required',
			'date_start' => 'required|date',
			'date_end' => 'required|date',
			'location' => 'required',
			'city_id' => 'required',
			//'banner' => 'required',
			'type' => 'required'
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'Judul tidak boleh kosong.',
			'date_start.date' => 'Format date salah. Gunakan format yyyy-mm-ddTh:i',
			'date_end.date' => 'Format date salah. Gunakan format yyyy-mm-ddTh:i',
			'city_id.required' => 'Nama kota tidak boleh kosong',
		];
	}

}

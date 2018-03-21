<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoteEditRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'note_id'     => [
				'required',
				'integer',
				Rule::exists( 'posts', 'id' )->where( function ( $query ) {
					$user_id = \Auth::id();
					$query->where( 'user_id', $user_id );
				} ),
			],
			'title'       => 'required|string|max:255',
			'description' => 'required|string|max:255',
		];
	}
}

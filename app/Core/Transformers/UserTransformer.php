<?php

namespace App\Core\Transformers;


use App\Core\Models\User;

class UserTransformer extends ATransformer {
	protected $user;

	public function __construct( User $user, array $guard = [] ) {
		$this->user  = $user;
		$this->guard = $guard;
	}//__construct


	public function toArray() {
		$user = array_except( [
			'id'      => (int) $this->user->id,
			'email'   => $this->user->email,
			'created' => $this->user->created_at,
			'token'   => $this->user->api_token,
		], $this->guard );

		$resp = [
			"status" => self::SUCCESS,
			"data"   => $user,
		];

		return $resp;

	}//toArray

}//ClientTransformer
<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 21.03.2018
 */

namespace App\Core\Transformers;


use App\Core\Models\Post;

class NoteTransformer extends ATransformer
{
	protected $note;

	public function __construct( Post $note, array $guard = [] ) {
		$this->note  = $note;
		$this->guard = $guard;
	}//__construct


	public function toArray() {
		$note = array_except( [
			'id'      => (int) $this->note->id,
		], $this->guard );

		$resp = [
			"status" => self::SUCCESS,
			"data"   => $note,
		];

		return $resp;
	}

}//ATransformer
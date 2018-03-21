<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 21.03.2018
 */

namespace App\Core\Transformers;


use App\Core\Models\Post;

class NoteTransformer extends ATransformer {
	protected $notes;

	public function __construct($notes) {
		$this->notes = $notes;
	}//__construct


	public function toArray() {
		$notes = [];
		foreach ( $this->notes as $note ) {
			$notes[] = [
				'id' => (int) $note->id,
				'title' => $note->title,
				'description' => $note->description,
			];
		}

		$resp = [
			"status" => self::SUCCESS,
			"data"   => [
				'note list' => $notes,
			],
		];

		return $resp;
	}

}//ATransformer
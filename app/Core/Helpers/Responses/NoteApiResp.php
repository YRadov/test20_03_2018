<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 21.03.2018
 */

namespace App\Core\Helpers\Responses;


use App\Core\Models\Post;

class NoteApiResp  extends AApiResp
{
	public function createNew(Post $note)
	{
		return [
			'status' => self::SUCCESS,
			'data' => [
				'created note id' => $note->id,
			]
		];
	}//createNew


	public function edited($note_id)
	{
		return [
			'status' => self::SUCCESS,
			'data' => [
				'note id' => $note_id,
			]
		];

	}//edited

}//NoteApiResp
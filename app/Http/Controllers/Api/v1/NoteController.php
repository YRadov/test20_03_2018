<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Helpers\Responses\NoteApiResp;
use App\Core\Models\Post;
use App\Core\Services\NoteService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Note\NoteCreateRequest;

class NoteController extends Controller
{
	protected $noteService;
	protected $apiNoteResp;


	public function __construct(NoteService $noteService, NoteApiResp $apiNoteResp) {
		$this->noteService = $noteService;
		$this->apiNoteResp = $apiNoteResp;
	}

	public function createNew(NoteCreateRequest $request)
	{

		$note = $this->noteService->createNew($request->all());

		if (!$note) {
			return $this->apiNoteResp->fail("Registration failed");
		}

		/**
		 * @var $note Post
		 */
		return $this->apiNoteResp->createNew($note);

	}// createNew


}//NoteController

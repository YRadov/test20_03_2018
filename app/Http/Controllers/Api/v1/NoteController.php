<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Helpers\Responses\NoteApiResp;
use App\Core\Models\Post;
use App\Core\Services\NoteService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Note\NoteCreateRequest;
use App\Http\Requests\Note\NoteEditRequest;

class NoteController extends Controller
{
	protected $noteService;
	protected $apiNoteResp;


	public function __construct(NoteService $noteService, NoteApiResp $apiNoteResp) {
		$this->noteService = $noteService;
		$this->apiNoteResp = $apiNoteResp;
	}

	/**
	 * @api {post} /api/v1/note/create  Create New Note
	 *
	 * @apiHeaderExample {json} Header-Example:
	 * {
	 *      "Accept"        : "application/json"
	 *      "Authorization" : "Bearer d1ud5yQnjO3eeg64ZkmYupwGh6fKZJ4W"
	 * }
	 */
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


	/**
	 * @api {post} /api/v1/note/update  Edit Note
	 *
	 * @apiHeaderExample {json} Header-Example:
	 * {
	 *      "Accept"        : "application/json"
	 *      "Authorization" : "Bearer d1ud5yQnjO3eeg64ZkmYupwGh6fKZJ4W"
	 * }
	 */
	public function edit(NoteEditRequest $request)
	{
		$res = $this->noteService->edit($request->all());

		if (!$res) {
			return $this->apiNoteResp->fail("Edit failed");
		}

		return $this->apiNoteResp->edited($request->input('note_id'));
	}// edit


	/**
	 * @api {post} /api/v1/note/list  All User's Notes
	 *
	 * @apiHeaderExample {json} Header-Example:
	 * {
	 *      "Accept"        : "application/json"
	 *      "Authorization" : "Bearer d1ud5yQnjO3eeg64ZkmYupwGh6fKZJ4W"
	 * }
	 */
	public function getAllForUsers()
	{
		$user_id = \Auth::id();
		$notes = $this->noteService->getAllForUser($user_id);

		return $this->apiNoteResp->allForUser($notes);

	}//getAllForUsers

}//NoteController

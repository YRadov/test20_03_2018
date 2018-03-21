<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 21.03.2018
 */

namespace App\Core\Services;


use App\Core\Repositories\NoteRepository;

class NoteService
{
	protected $noteRep;

	public function __construct(NoteRepository $noteRep ) {
		$this->noteRep = $noteRep;
	}

	public function createNew($params)
	{
		return $this->noteRep->addNew($params);
	}// createNew


	public function edit($params)
	{
		return $this->noteRep->edit($params);
	}// edit

}//NoteService
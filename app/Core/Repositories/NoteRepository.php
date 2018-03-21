<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 21.03.2018
 */

namespace App\Core\Repositories;


use App\Core\Models\Post;

class NoteRepository extends ADefaultRepository {
	public function __construct( Post $model ) {
		parent::__construct( $model );
	}

	public function addNew( $params ) {
		return Post::create( [
				'title'       => $params['title'],
				'description' => $params['description'],
				'user_id'     => \Auth::id(),
			]
		);
	}//addNew


	public function edit( $params ) {
		return $this->model->where( 'id', $params['note_id'] )
		                   ->update( [
			                   'title'       => $params['title'],
			                   'description' => $params['description'],
		                   ] );
	}//edit

	public function getAllForUser($user_id)
	{
		return $this->getAllWithClause(['user_id' => $user_id]);
	}//getAllForUser
}//NoteRepository
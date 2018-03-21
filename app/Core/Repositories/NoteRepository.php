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

}//NoteRepository
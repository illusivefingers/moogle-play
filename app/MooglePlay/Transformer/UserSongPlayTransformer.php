<?php namespace MooglePlay\Transformer;

use \League\Fractal\TransformerAbstract;
use \User;

class UserSongPlayTransformer extends TransformerAbstract
{

	protected $availableIncludes = [
		'song_plays'
	];


	public function transform(User $user)
	{
		return [
			'id'            => (int) $user->id,
			'display_name'  => $user->display_name
		];
	}

	public function includeSongPlays(User $user)
	{
		return $this->collection( $user->songsPlayed, new SongPlayTransformer);
	}
}

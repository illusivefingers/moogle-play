<?php namespace MooglePlay\Transformer;

use \League\Fractal\TransformerAbstract;
use \Song;

class SongPlayTransformer extends TransformerAbstract
{
	public function transform($song)
	{
		return [
			'title'         => $song->title,
			'started_at'    => $song->started_at
		];
	}
}
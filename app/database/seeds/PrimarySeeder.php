<?php

use Faker\Factory as Faker;

class PrimarySeeder extends Seeder
{
	const TOTAL_USERS = 30;
	const TOTAL_ARTISTS = 15;
	const MAX_ALBUMS = 4;
	const MAX_SONGS = 13;
	const MAX_SONG_PLAYS = 300;

	/**
	 * Instance of Faker available to seeder
	 *
	 * @var Faker
	 */
	private $faker;

	/**
	 * A DateTime object that holds the current time
	 *
	 * @var DateTime
	 */
	private $now;

	/**
	 * A list of all tables affected by the seeder.
	 *
	 * @var array
	 */
	private $tables = [
		'users',
		'artists',
		'albums',
		'songs',
		'song_plays'
	];

	public function __construct()
	{
		$this->faker = Faker::create();
		$this->now = new DateTime('now');
	}

	public function run()
	{
		$this->cleanTables();
		$this->createUsers();
		$this->createArtistsWithAlbumsAndSongs();
		$this->createSongPlays();
	}

	private function cleanTables()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

		foreach ($this->tables as $tableName)
		{
			 DB::table($tableName)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
	}

	private function createUsers()
	{
		foreach(range(1, self::TOTAL_USERS) as $userNumber)
		{
			User::create([
				'display_name'  => $this->faker->userName(),
				'email'         => $this->faker->email(),
				'password'      => $this->faker->randomLetter(),
				'created_at'    => $this->now,
				'updated_at'    => $this->now
			]);
		}
	}

	private function createArtistsWithAlbumsAndSongs()
	{
		foreach(range(1, self::TOTAL_ARTISTS) as $artistNumber)
		{
			$artist = Artist::create([
				'name'          => ucwords($this->faker->catchPhrase()),
				'created_at'    => $this->now,
				'updated_at'    => $this->now
			]);

			$artistId = $artist->id;

			$this->createAlbums($artistId);
		}
	}

	private function createAlbums($artistId)
	{
		foreach(range(1, rand(1, SELF::MAX_ALBUMS)) as $albumNumber)
		{
			$album = Album::create([
				'name'          => ucwords($this->faker->city() . ' ' . $this->faker->lastName()),
				'artist_id'     => $artistId,
				'year'          => $this->faker->year(),
				'created_at'    => $this->now,
				'updated_at'    => $this->now
			]);

			$albumId = $album->id;

			$this->createSongs($albumId);
		}
	}

	private function createSongs($albumId)
	{
		foreach (range(1, rand(1, SELF::MAX_SONGS)) as $songNumber)
		{
			Song::create([
				'title'         => ucwords($this->faker->state() . ' ' . $this->faker->domainWord()),
				'album_id'      => $albumId,
				'created_at'    => $this->now,
				'updated_at'    => $this->now
			]);
		}
	}

	private function createSongPlays()
	{
		$userIds = User::lists('id');
		$songIds = Song::lists('id');

		foreach(range(1, rand(1, SELF::MAX_SONG_PLAYS)) as $songPlay)
		{
			SongPlay::create([
				'user_id'       => $this->faker->randomElement($songIds),
				'song_id'       => $this->faker->randomElement($userIds),
				'started_at'    => $this->faker->dateTimeBetween('-1 years', 'now')
			]);
		}
	}


}
<?php

class Profile {
	private $description;
	private $profilePicture;

	public function __construct($description, $profilePicture) {
		$this->description = $description;
		$this->profilePicture = $profilePicture;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getProfilePicture() {
		return $this->profilePicture;
	}

	public function setDescription($newDescription) {
		$this->description = $newDescription;
	}

	public function setProfilePicture($newProfilePicture) {
		$this->profilePicture = $newProfilePicture;
	}

	public static function findProfileForUser($userId) {
		// $db = ...

		// WHERE

		// return new Profile($profile->description, $profile->profilePicture);

		// return new Profile();
	}

	public function save() {
		// $db = ...

		// INSERT INTO profiles 
	}
}
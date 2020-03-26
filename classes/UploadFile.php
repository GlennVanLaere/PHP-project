<?php

class UploadFile {
	private $file;
	private $fileName;
	private $fileExtension;

	public function __construct($file) {
		$this->file = $file;
		$this->fileName = $file['name'];

		$fileExt = explode('.', $file['name']);
		$fileExtention = strtolower(end($fileExt));

		$this->fileExtension = $fileExt;
	}

	public function getFile() {
		return $this->file;
	}

	public function getFileName() {
		return $this->fileName;
	}

	public function getFileExtension() {
		return $this->fileExtension;
	}

	public function upload() {
		// ...
	}
}

?>
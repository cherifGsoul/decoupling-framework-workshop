<?php

namespace SimpleKanban\Kanban\Model\Board;

class BoardStatus
{
	const OPEN = 'open';
	const CLOSED = 'closed';

	private $status;

	private function __construc() {}

	public static function OPEN()
	{
		$status = new BoardStatus;
		$status->setStatus(self::OPEN);
		return $status;
	}

	public static function CLOSED()
	{
		$status = new BoardStatus;
		$status->setStatus(self::CLOSED);
		return $status;	
	}

	public function status()
	{
		return $this->status;
	}

	public function __toString()
	{
		return $this->status();
	}

	public function equals(BoardStatus $other)
	{
		return $this->status() == $other->status();
	}

	private function setStatus($status)
	{
		$this->status = $status;
	}
}
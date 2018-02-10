<?php

namespace SimpleKanban\Kanban\Model\Board;

class BoardStatus
{
	/**
	 * 
	 */
	const OPEN = 'open';

	/**
	 * 
	 */
	const CLOSED = 'closed';

	/**
	 * Undocumented variable
	 *
	 * @var [type]
	 */
	private $status;

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public static function OPEN()
	{
		$status = new BoardStatus;
		$status->setStatus(self::OPEN);
		return $status;
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public static function CLOSED()
	{
		$status = new BoardStatus;
		$status->setStatus(self::CLOSED);
		return $status;	
	}

	public static function fromString($status)
	{
		
		$boardStatus = new BoardStatus;
		$boardStatus->setStatus($status);
		return $boardStatus;
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function status()
	{
		return $this->status;
	}

	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->status();
	}

	/**
	 * Undocumented function
	 *
	 * @param BoardStatus $other
	 * @return boolean
	 */
	public function equals(BoardStatus $other)
	{
		return $this->status() == $other->status();
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $status
	 * @return void
	 * @throws Exception
	 */
	private function setStatus($status)
	{
		if (false == in_array($status,[self::OPEN, self::CLOSED])) {
			throw new \Exception('Invalid status');
		}
		$this->status = $status;
	}
}
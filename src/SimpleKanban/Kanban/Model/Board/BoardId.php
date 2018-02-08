<?php

namespace SimpleKanban\Kanban\Model\Board;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class BoardId
{
	/**
	 * Undocumented variable
	 *
	 * @var UuidInterface
	 */
	private $uuid;

	/**
	 * Undocumented function
	 *
	 * @return BoardId
	 */
	public static function generate()
	{
		return new self(Uuid::uuid4());
	}

	/**
	 * Undocumented function
	 *
	 * @param string $uuid
	 * @return BoardId
	 */
	public static function fromString($uuid)
	{
		return new self(Uuid::fromString($uuid));
	}

	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	public function asString()
	{
		return $this->uuid->toString();
	}

	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->asString();
	}

	/**
	 * Undocumented function
	 *
	 * @param BoardId $other
	 * @return void
	 */
	public function equals(BoardId $other)
	{
		return $this->uuid->equals($other->uuid);
	}

	/**
	 * Undocumented function
	 *
	 * @param UuidInterface $uuid
	 */
	private function __construct(UuidInterface $uuid)
	{
		$this->uuid = $uuid;
	}
}
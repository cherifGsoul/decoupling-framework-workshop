<?php

namespace SimpleKanban\Kanban\Model\Column;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class ColumnId
{
	private $uuid;

	public static function generate()
	{
		return new self(Uuid::uuid4());
	}

	public static function fromString($uuid)
	{
		return new self(Uuid::fromString($uuid));
	}

	public function asString()
	{
		return $this->uuid->toString();
	}

	public function __toString()
	{
		return $this->asString();
	}

	public function equals(ColumnId $other)
	{
		return $this->uuid->equals($other->uuid);
	}

	private function __construct(UuidInterface $uuid)
	{
		$this->uuid = $uuid;
	}
}
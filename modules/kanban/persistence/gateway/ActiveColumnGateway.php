<?php

namespace app\modules\kanban\persistence\gateway;

use SimpleKanban\Kanban\Model\Column\ColumnGateway;
use SimpleKanban\Kanban\Model\Column\ColumnId;
use SimpleKanban\Kanban\Model\Column\Column;
use app\modules\kanban\persistence\records\ColumnRecord;
use SimpleKanban\Kanban\Model\Column\ColumnFactory;

class ActiveColumnGateway implements ColumnGateway
{
	private $factory;
	
	public function __construct(ColumnFactory $factory)
	{
		$this->factory = $factory;
	}

	public function nextIdentity()
	{
		return ColumnId::generate();
	}

	public function forTitle($title)
	{
		$record = $this->createQuery()->where(['title' => $title])->one();
		if (null == $record) {
			return false;
		}
		return $this->factory->fromRawData($record->toArray());
	}

	public function forId(ColumnId $ColumnId)
	{

		$record = $this->createQuery()->where(['id' => $ColumnId->asString()])->one();
		
		if (null == $record) {
			return false;
		}
		return $this->factory->fromRawData($record->toArray());
	}

	public function persist(Column $Column)
	{
		$id = $Column->getId()->asString();
		$record = $this->createQuery()->where(['id' => $id])->one();

		if (null == $record) {
			$record = new ColumnRecord();
		}
		
		$record->setAttributes([
			'id' => $Column->getId(),
			'title' => $Column->getTitle(),
			'slug' => $Column->getSlug()
		], false);

		return $record->save(false);
	}

	private function createQuery()
	{
		return ColumnRecord::find();
	}
}
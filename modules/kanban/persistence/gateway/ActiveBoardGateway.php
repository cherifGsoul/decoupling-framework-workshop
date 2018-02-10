<?php

namespace app\modules\kanban\persistence\gateway;

use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Board\BoardId;
use SimpleKanban\Kanban\Model\Board\Board;
use app\modules\kanban\persistence\records\Board as BoardRecord;
use app\modules\kanban\persistence\records\Column as ColumnRecord;
use SimpleKanban\Kanban\Model\Board\BoardFactory;

class ActiveBoardGateway implements BoardGateway
{
	private $factory;
	
	public function __construct(BoardFactory $factory)
	{
		$this->factory = $factory;
	}

	public function nextIdentity()
	{
		return BoardId::generate();
	}

	public function forTitle($title)
	{
		$record = $this->createQuery()
					->asArray()
					->where(['title' => $title])
					->one();

		if (null == $record) {
			return false;
		}
		return $this->factory->fromRawData($record);
	}

	public function forId(BoardId $boardId)
	{

		$record = $this->createQuery()
					->asArray()
					->where(['id' => $boardId->asString()])
					->one();


		
		if (null == $record) {
			return false;
		}

		return $this->factory->fromRawData($record);
	}

	public function persist(Board $board)
	{
		$id = $board->getId()->asString();
		$record = $this->createQuery()->where(['id' => $id])->one();

		if (null == $record) {
			$record = new BoardRecord();
		}
		
		$record->setAttributes([
			'id' => $board->getId(),
			'title' => $board->getTitle(),
			'slug' => $board->getSlug(),
			'status' => $board->getStatus()
		], false);

		$this->persistColumns($board, $record);

		return $record->save(false);
	}

	private function createQuery()
	{
		return BoardRecord::find()
		->with(['columns' => function($query) {
			$query->select(['id','title', 'board_id']);
		}]);
	}

	private function persistColumns($board, $record)
	{
		if (false == $record->getIsNewRecord()) {
			if (false == $board->getColumns()->isEmpty()) {
				$columnsCollectionToPersist = $board->getColumns()->filter(function($column) use($record){
					$ids = array_map(function($columnRecord){
						return $columnRecord->id;
					}, $record->columns);
							
					return !in_array($column->getId()->asString(), $ids);
				});

				array_map(function($column) use ($record) {
					$columnRecord = new ColumnRecord();
					$columnRecord->setAttributes([
						'id' => $column->getId(),
						'title' => $column->getTitle()
					], false);

					$columnRecord->link('board',$record);
					return $columnRecord;
				}, $columnsCollectionToPersist->toArray());
			}
		}
	}
}
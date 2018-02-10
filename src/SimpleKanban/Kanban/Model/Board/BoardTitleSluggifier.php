<?php

namespace SimpleKanban\Kanban\Model\Board;

interface BoardTitleSluggifier
{
	public function sluggify($title);
}
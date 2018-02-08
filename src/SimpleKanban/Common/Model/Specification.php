<?php

namespace SimpleKanban\Common\Model;

interface Specification
{
	public function isSatisfiedBy($entity);
}
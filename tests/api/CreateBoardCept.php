<?php 
$I = new ApiTester($scenario);
$I->wantTo('Create a board');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendPOST('boards', ['title' => 'a project']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);
$I->seeResponseIsJson();
$I->seeRecord('app\models\Board', array('title' => 'a project'));
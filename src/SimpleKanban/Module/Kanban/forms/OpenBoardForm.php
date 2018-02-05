<?php

namespace SimpleKanban\Module\kanban\actions\boards;

use yii\base\Model;

class BoardForm extends Model
{
  public $title;

  /**
   * Undocumented function
   *
   * @return void
   */
  public function rules()
  {
    return [
      ['title', 'required']
    ];
  }

  /**
   * Undocumented function
   *
   * @return void
   */
  public function attributeLabels()
  {
    return [
      'title' => 'Title'
    ];
  }
}
import Component from 'can-component';
import DefineMap from 'can-define/map/';
import './list.less';
import view from './list.stache';
import Board from 'simple-kanban/models/board';

export const ViewModel = DefineMap.extend({
  app: "any",
  boardsPromise: {
  	default() {
  		return Board.getList({});
  	}
  }
});

export default Component.extend({
  tag: 'ui-board-list',
  ViewModel,
  view
});

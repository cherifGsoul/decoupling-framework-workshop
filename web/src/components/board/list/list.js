import Component from 'can-component';
import DefineMap from 'can-define/map/';
import './list.less';
import view from './list.stache';
import Board from 'simple-kanban/models/board';

export const ViewModel = DefineMap.extend({
  boardsPromise: {
  	default() {
  		return Board.getList({}).then(data => {
  			console.log(data)
  		});
  	}
  }
});

export default Component.extend({
  tag: 'ui-board-list',
  ViewModel,
  view
});

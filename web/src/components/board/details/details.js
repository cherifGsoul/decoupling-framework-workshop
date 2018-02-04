import Component from 'can-component';
import DefineMap from 'can-define/map/';
import './details.less';
import view from './details.stache';
import Board from 'simple-kanban/models/board'

export const ViewModel = DefineMap.extend({
	boardId: 'number',
	board: {
		get(lastSet, setVal) {
			this.boardPromise.then(setVal);
		}
	},
  	get boardPromise() {
		return Board.get({id: this.boardId, expand:'columns' });
	},
});

export default Component.extend({
  tag: 'ui-board-details',
  ViewModel,
  view
});

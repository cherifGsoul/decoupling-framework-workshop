import DefineMap from 'can-define/map/';
import DefineList from 'can-define/list/';
import set from 'can-set';
import superMap from 'can-connect/can/super-map/';

const Board = DefineMap.extend({
  'id': 'any',
  title: 'string',
  slug: 'string',
  created_at: 'string',
  updated_at: 'string'
});

Board.List = DefineList.extend({
  '#': Board
});

const algebra = new set.Algebra(
  set.props.id('id')
);

Board.connection = superMap({
  url: '/api/boards',
  Map: Board,
  List: Board.List,
  name: 'board',
  algebra
});

export default Board;

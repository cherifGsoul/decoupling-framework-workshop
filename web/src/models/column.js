import DefineMap from 'can-define/map/';
import DefineList from 'can-define/list/';
import set from 'can-set';
import superMap from 'can-connect/can/super-map/';
import Board from "./board";

const Column = DefineMap.extend({
  'id': 'any',
  title: 'string',
  slug: 'string',
  created_at: 'string',
  updated_at: 'string',
  board: Board
});

Column.List = DefineList.extend({
  '#': Column
});

const algebra = new set.Algebra(
  set.props.id('id')
);

Column.connection = superMap({
  url: '/api/columns',
  Map: Column,
  List: Column.List,
  name: 'column',
  algebra
});

export default Column;

import fixture from 'can-fixture';
import Board from '../board';

const store = fixture.store([{
  id: 0,
  description: 'First item'
}, {
  id: 1,
  description: 'Second item'
}], Board.connection.algebra);

fixture('/api/boards/{id}', store);

export default store;

import fixture from 'can-fixture';
import Column from '../column';

const store = fixture.store([{
  id: 0,
  description: 'First item'
}, {
  id: 1,
  description: 'Second item'
}], Column.connection.algebra);

fixture('/api/colum,s/{id}', store);

export default store;

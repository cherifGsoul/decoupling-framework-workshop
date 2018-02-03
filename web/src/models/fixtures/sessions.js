import fixture from 'can-fixture';
import Session from '../session';

const store = fixture.store([{
  id: 0,
  description: 'First item'
}, {
  id: 1,
  description: 'Second item'
}], Session.connection.algebra);

fixture('/api/session/{id}', store);

export default store;

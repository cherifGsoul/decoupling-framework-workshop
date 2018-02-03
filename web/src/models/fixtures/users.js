import fixture from 'can-fixture';
import User from '../user';

const store = fixture.store([{
  id: 0,
  description: 'First item'
}, {
  id: 1,
  description: 'Second item'
}], User.connection.algebra);

fixture('/api/users/{id}', store);

export default store;

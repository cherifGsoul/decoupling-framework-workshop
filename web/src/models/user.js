import DefineMap from 'can-define/map/';
import DefineList from 'can-define/list/';
import set from 'can-set';
import superMap from 'can-connect/can/super-map/';

const User = DefineMap.extend({
  'id': 'any',
  username: 'string',
  password: 'string',
  newPassword: 'string',
  email: 'string',
});

User.List = DefineList.extend({
  '#': User
});

const algebra = new set.Algebra(
  set.props.id('id')
);

User.connection = superMap({
  url: '/api/users',
  Map: User,
  List: User.List,
  name: 'user',
  algebra
});

export default User;

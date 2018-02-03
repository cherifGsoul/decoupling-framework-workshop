import QUnit from 'steal-qunit';
import Session from './session';

QUnit.module('models/session');

QUnit.test('getList', function(){
  stop();
  Session.getList().then(function(items) {
    QUnit.equal(items.length, 2);
    QUnit.equal(items.item(0).description, 'First item');
    start();
  });
});

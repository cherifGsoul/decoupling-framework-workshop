import QUnit from 'steal-qunit';
import Column from './column';

QUnit.module('models/column');

QUnit.test('getList', function(){
  stop();
  Column.getList().then(function(items) {
    QUnit.equal(items.length, 2);
    QUnit.equal(items.item(0).description, 'First item');
    start();
  });
});

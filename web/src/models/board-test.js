import QUnit from 'steal-qunit';
import Board from './board';

QUnit.module('models/board');

QUnit.test('getList', function(){
  stop();
  Board.getList().then(function(items) {
    QUnit.equal(items.length, 2);
    QUnit.equal(items.item(0).description, 'First item');
    start();
  });
});

import QUnit from 'steal-qunit';
import { ViewModel } from './list';

// ViewModel unit tests
QUnit.module('simple-kanban/components/board/list');

QUnit.test('Has message', function(){
  var vm = new ViewModel();
  QUnit.equal(vm.message, 'This is the ui-board-list component');
});

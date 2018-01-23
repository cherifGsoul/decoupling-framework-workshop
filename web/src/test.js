import F from 'funcunit';
import QUnit from 'steal-qunit';

import 'simple-kanban/models/test';

F.attach(QUnit);

QUnit.module('simple-kanban functional smoke test', {
  beforeEach() {
    F.open('./development.html');
  }
});

QUnit.test('simple-kanban main page shows up', function() {
  F('title').text('simple-kanban', 'Title is set');
});

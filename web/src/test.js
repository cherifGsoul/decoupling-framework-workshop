import F from 'funcunit';
import QUnit from 'steal-qunit';

import 'simple-kanban/models/test';

import 'simple-kanban/components/ui/login/login-test';

import 'simple-kanban/components/user/login/login-test';

import 'simple-kanban/components/board/list/list-test';

import 'simple-kanban/components/board/details/details-test';

F.attach(QUnit);

QUnit.module('simple-kanban functional smoke test', {
  beforeEach() {
    F.open('./development.html');
  }
});

QUnit.test('simple-kanban main page shows up', function() {
  F('title').text('simple-kanban', 'Title is set');
});

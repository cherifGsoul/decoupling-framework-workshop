import DefineMap from 'can-define/map/';
import route from 'can-route';
import "can-route-pushstate";
import Session from './models/session';
import Board from './models/board';
import 'can-stache-route-helpers';

//import 'can-route-pushstate';

const AppViewModel = DefineMap.extend({
	title: {
		default: 'Simple Kanban',
		serialize: false
	},
	page: 'string',
	session: {
		serialize: false,
		default: function() {
			var self = this;
			Session.get({}).then(function(session) {
				self.session = session;
			});
		}
	},
	sessionPromise: {
		type: 'any',
		serialize: false
	},
	logout(ev) {
		if (ev) {
			ev.preventDefault();
		}
		var sessionPromise = this.session.destroy();
		this.sessionPromise = sessionPromise;
		this.session = null;
	},
	boardSlug: 'string',
	boardId: 'number'
});

route.register('boards/{boardId}/{boardSlug}');
route.register('{page}', {page: 'boards'});

export default AppViewModel;
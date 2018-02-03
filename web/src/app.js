import DefineMap from 'can-define/map/';
import route from 'can-route';
import Session from './models/session';

//import 'can-route-pushstate';

const AppViewModel = DefineMap.extend({
	title: {
		default: 'Simple Kanban',
		serialize: false
	},
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
	}
});

export default AppViewModel;
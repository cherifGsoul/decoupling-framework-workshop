import Component from 'can-component';
import DefineMap from 'can-define/map/';
import './login.less';
import view from './login.stache';
import User from 'simple-kanban/models/user';
import Session from 'simple-kanban/models/session';

export const ViewModel = DefineMap.extend({
	app: 'any',
	sessionPromise: 'any',
	session: {
		default () {
			return new Session({
				user: new User()
			});
		}
	},
	createSession(ev) {
		if (ev) {
			ev.preventDefault();
		}
		let sessionPromise = this.session.save().then(session => {
			this.session = new Session({
				user: new User
			});
			this.app.session = session;
		});
		this.sessionPromise = sessionPromise;
	}
});

export default Component.extend({
	tag: 'ui-login',
	ViewModel,
	view
});
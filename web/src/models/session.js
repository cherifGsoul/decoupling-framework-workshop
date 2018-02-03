import DefineMap from 'can-define/map/';
import DefineList from 'can-define/list/';
import tag from "can-connect/can/tag/";
import connect from 'can-connect';

import connectConstructor from "can-connect/constructor/" ;
import CanMap from "can-connect/can/map/" ;
import connectStore from "can-connect/constructor/store/" ;
import connectConstructorCallbackOne from "can-connect/constructor/callbacks-once/" ;
import connectDataCallbacks from "can-connect/data/callbacks/" ;
import connectDataParse from "can-connect/data/parse/" ;
import url from "can-connect/data/url/";
import $ from "jquery";
import User from "./user";

const Session = DefineMap.extend('Session', {
	user: User
});

Session.List = DefineList.extend({
  '#': Session
});

const behaviors = [
	connectConstructor,
	CanMap,
	connectStore,
	connectConstructorCallbackOne,
	connectDataCallbacks,
	connectDataCallbacks,
	connectDataParse,
	url
];

const options = {
	ajax: $.ajax,
	Map: Session,
	List: Session.List,
	//name: "session",
	url: {
		getData: "/api/sessions",
		createData: "/api/sessions",
		destroyData: "/api/sessions",
		contentType: "application/x-www-form-urlencoded"
	}
};

Session.connection = connect(behaviors, options);

tag('session-model', Session.connection);

export default Session;

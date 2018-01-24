import Component from 'can-component';
import DefineMap from 'can-define/map/';
import './login.less';
import view from './login.stache';

export const ViewModel = DefineMap.extend({
  message: {
    value: 'This is the ui-login component'
  }
});

export default Component.extend({
  tag: 'ui-login',
  ViewModel,
  view
});

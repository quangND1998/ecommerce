
// main store
import state from './store/state';
import mutations from './store/mutations';
import getters from './store/getters';
import actions from './store/actions';

export default {
    namespaced: true,
    modules: {
        // settings,
        // left: manager,
        // right: manager,
        // tree,
        // modal,
        // messages,
        // tour,
        // notifications
    },
    state,
    mutations,
    actions,
    getters,
};
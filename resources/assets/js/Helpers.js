const Helper = {

    component: {
        HOME_COMPONENTS_PATH: './components/Home/',
        home: function (path) {
            "use strict";
            return Helper.component.HOME_COMPONENTS_PATH + path + '.vue';
        }
    }
};
export default Helper;
function getBodyClasses() {
    return document.body.classList || [];
}

function checkBodyClass(page) {
    page = page ? page : '';
    page = _.trim('page-admin-' + page, '- ');

    return _.indexOf(getBodyClasses(), page ) >= 0;
}

function requireComponent(component) {
    require('../components/' + component);
}

if (typeof _ !== "function") {
    throw "Please, load lodash first";
}

export default {
    loadComponent: function(component, page) {
        if (! checkBodyClass(page || null)) {
            return;
        }

        requireComponent(component);
    }
}

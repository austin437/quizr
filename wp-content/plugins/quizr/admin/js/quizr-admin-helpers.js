const helpers = (() => {
    let methods = {};

    methods.find_parent_by_tag_name = function (element, tagName) {
        let parent = element;

        while (parent !== null && parent.tagName !== tagName.toUpperCase()) {
            parent = parent.parentNode;
        }

        return parent;
    };

    return methods;

})();

var Render = (function (Mustache) {
    var _templates = [];

    var _loadTemplate = function (id) {
        if (typeof _templates[id] === 'undefined') {
            var element = $('[type="text/template"][template-id="' + id + '"]');
            if (!element.length) {
                throw Error('Template ' + id +  ' not found!');
            }

            _templates[id] = element.html();
        }

        return _templates[id];
    },

    _parseContent = function (templateId, data) {
        return Mustache.render(_loadTemplate(templateId), data);
    };

    return {
        parseContent: _parseContent
    }
})(Mustache);
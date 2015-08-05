var RefreshableContent = (function (Render) {
    var _render = null;

    var _init = function () {
        $('[update-content-handler]').on('click', function () {
            var customCallback = $(this).data('callback');
            _requestUpdate($(this).data('update-url'), function (resp) {
                _updateHTML(resp);
                eval(customCallback + '(' + JSON.stringify(resp) + ')');
            });
        });
    },

    _requestUpdate = function (url, callback) {
        $.get(url, function (resp) {
            callback(resp);
        });
    },

    _updateHTML = function (resp) {
        var elementData, domElement, html;

        for (var elementId in resp) {
            elementData = resp[elementId];
            html = Render.parseContent(elementId, elementData);

            domElement = $('[content-id="' + elementId + '"]');

            if (!domElement.length) {
                throw Error('Invalid content element!');
            }
            domElement.html(html);
        }
    };

    return {
        init: _init
    }
})(Render);

$(document).on('ready', function () {
    RefreshableContent.init();
});

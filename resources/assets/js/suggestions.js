$(function () {
    var $sPage = $('#suggestion-index');
    var $suggestionsRows = $('.suggestion-row');
    var ids = [];

    var formActions = function (_element) {
        var $add = $('.btn-add-suggestion', _element);
        var $cancel = $('.btn-cancel-suggestion', _element);
        var $form = $('.form-suggestion', _element);

        $add.on('click', function () {
            $add.hide();
            $form.show();
        });

        $cancel.on('click', function () {
            $form.hide();
            $add.show();
        });
    };
    var votesActions = function (_row) {
        var $countEl = $('.suggestion-votes-count', _row);

        ids.push(_row.data('id'));

        $countEl.on('click', function () {
            var $this = $(this);
            var url = $this.data('url');
            var $icon = $this.find('.icon-like');

            $icon.removeClass('icon-like text-info').addClass('icon-reload spin');
            $this.attr('title', 'robôs trabalhando...');

            $.get(url, function (_data) {
                $icon.removeClass('icon-reload spin')
                    .addClass('icon-like')
                    .addClass(function () {
                        if(_data.action == 'attach'){
                            return 'text-info';
                        }
                    });

                $('span', $this).text(_data.count);

                $this.attr('title', null);
            });
        });
    };
    var loadVotes = function (_el) {
        var url = _el.data('url');

        _el.show();

        $.get(url, {ids: ids}, function (_data) {
            _el.hide();

            $(_data).each(function (_index, _id) {
                $('._iconVote', '.suggestion-' + _id).addClass('text-info');
            });
        });
    };

    if ($sPage.length == 1) {
        formActions($sPage);
    }
    if ($suggestionsRows.length > 0) {
        $suggestionsRows.each(function () {
            votesActions($(this));
        });

        loadVotes($('.load-votes'));
    }
});

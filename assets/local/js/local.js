(function($) { if (!$) return console.error('System requires jQuery to function');

    var base_url = $('meta[name="base_url"]').attr('content');
    var $document = $(document);

    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $document.on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });


    $document.on('keydown', '.id-input',
        (e) => e.key.match(new RegExp(/[0-9]/)) ||
            (e.key.match(new RegExp(/[-]/)) && ! e.target.value.match(new RegExp(/[-]/))) ||
            (e.shiftKey && e.key.length > 1) ||
            e.key.length > 1 ||
            e.ctrlKey
            ? true: false )

    window.addEventListener('load', function() {
        // go to the latest tab, if it exists:
        var lastTab = localStorage.getItem('lastTab');
        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }
        $('.show-on-load').removeClass('hide');
    })

    window.initStudentSearchModal = function(callback) {
        var searchModal = createModal('studentSearchModal', 'Search Student');
        $('body').append(searchModal.modal);

        var resultDiv = createDiv('searchResult', null);
        resultDiv.style.paddingTop = "5px";
        var input = searchInput('searchInput', 'form-control', function(el) {
            if (el.req && typeof el.req.abort == "function") el.req.abort();
            el.req = $.ajax({
                url: base_url + "/api/students",
                method: 'GET',
                data: { q: input.value },
                beforeSend: function() {
                    $(resultDiv).html("<p class=\"text-center\">Loading...</p>");
                }
            }).done(function(result) {
                var resultHtml = $(result.html);

                /* Trigger row clicks */
                var row = resultHtml.find('tbody tr');
                row.css({ cursor: 'pointer' });
                row.on('click', function() {
                    var $row = $(this);
                    if (typeof callback == "function") callback(this, result);
                    $('#studentSearchModal').modal('hide');
                });

                $(resultDiv).html(resultHtml);
            }).fail(function(result) {
                $(resultDiv).html('<p class="text-center alert alert-danger">An error occured. Please contact administrator to address this issue.</p>');
            });
        });

        searchModal.body.appendChild(input);
        searchModal.body.appendChild(resultDiv);

        var search = $(searchModal.modal);
        search.on('shown.bs.modal', function() {
            input.focus();
        }).on('hidden.bs.modal', function() {
            input.value = "";
            $(resultDiv).html('');
        })
    };

})(window.jQuery);
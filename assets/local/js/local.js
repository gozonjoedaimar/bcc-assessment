(function($) { if (!$) return console.error('System requires jQuery to function');

    var base_url = $('meta[name="base_url"]').attr('content');

    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }

    window.addEventListener('load', function() {
      $('.show-on-load').removeClass('hide');
      initStudentSearchModal();
    })

    var initStudentSearchModal = function() {
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


    /* For debugging */
    $(document).on('dblclick', function() {
        $('#studentSearchModal').modal('show');
    });

})(window.jQuery);
(function($) { if (!$) return console.error('System requires jQuery to function');

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

        $(searchModal.modal).on('bs.modal.show', function() {
            console.log('Hey');
        });

        var resultDiv = createDiv('searchResult', null);
        var input = searchInput('searchInput', 'form-control', function(el) {
            $('#searchResult').html(el.value);
        });
        searchModal.body.appendChild(input);
        searchModal.body.appendChild(resultDiv);
    };

})(window.jQuery);
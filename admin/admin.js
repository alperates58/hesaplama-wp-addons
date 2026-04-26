jQuery(function ($) {
    $('#hc-check-version').on('click', function () {
        var $result = $('#hc-version-result');
        var repo    = $('#repo').val();

        if (!repo) {
            $result.text(hcAdmin.norepo).css('color', '#d63638');
            return;
        }

        $result.text(hcAdmin.checking).css('color', '#666');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_check_github_version',
            nonce:  hcAdmin.nonce
        }, function (resp) {
            if (resp.success && resp.data.sha) {
                $result.html('Son commit: <code>' + resp.data.sha + '</code>').css('color', '#1d7917');
            } else {
                $result.text('Bağlanamadı. Repo adını ve token\'ı kontrol edin.').css('color', '#d63638');
            }
        });
    });
});

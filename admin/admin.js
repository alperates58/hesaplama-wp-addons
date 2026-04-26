jQuery(function ($) {

    /* ---- GitHub versiyon kontrol ---- */
    $('#hc-check-version').on('click', function () {
        var $result = $('#hc-version-result');
        var repo    = $('#repo').val();
        if (!repo) { $result.text(hcAdmin.norepo).css('color', '#d63638'); return; }
        $result.text(hcAdmin.checking).css('color', '#666');
        $.post(hcAdmin.ajaxurl, { action: 'hc_check_github_version', nonce: hcAdmin.nonce }, function (resp) {
            if (resp.success && resp.data.sha) {
                $result.html('Son commit: <code>' + resp.data.sha + '</code>').css('color', '#1d7917');
            } else {
                $result.text('Bağlanamadı. Repo adını ve token\'ı kontrol edin.').css('color', '#d63638');
            }
        });
    });

    /* ---- Karakter sayaçları ---- */
    $(document).on('input', '#hc-r-meta-baslik', function () {
        $('#hc-mb-count').text($(this).val().length);
    });
    $(document).on('input', '#hc-r-meta-acik', function () {
        $('#hc-ma-count').text($(this).val().length);
    });

    /* ---- Makale oluştur ---- */
    $(document).on('click', '#hc-writer-btn', function () {
        var url = $('#hc-writer-url').val().trim();
        if (!url) { alert('Lütfen bir URL girin.'); return; }

        $('#hc-writer-result').hide();
        $('#hc-writer-error').hide();
        $('#hc-writer-loading').show();
        $('#hc-writer-btn').prop('disabled', true).text('⏳ Yazılıyor...');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_generate_article',
            nonce:  hcAdmin.nonce,
            url:    url
        }, function (resp) {
            $('#hc-writer-loading').hide();
            $('#hc-writer-btn').prop('disabled', false).text('✨ Makale Oluştur');

            if (!resp.success) {
                $('#hc-writer-error').text('Hata: ' + resp.data).show();
                return;
            }

            var d = resp.data;
            $('#hc-r-odak').val(d.odak_anahtar_kelime || '');
            $('#hc-r-meta-baslik').val(d.meta_baslik || '').trigger('input');
            $('#hc-r-meta-acik').val(d.meta_aciklama || '').trigger('input');
            $('#hc-r-etiketler').val(Array.isArray(d.etiketler) ? d.etiketler.join(', ') : (d.etiketler || ''));
            $('#hc-r-baslik').val(d.baslik || '');
            $('#hc-r-icerik').val(d.icerik || '');
            $('#hc-writer-result').show();
        }).fail(function () {
            $('#hc-writer-loading').hide();
            $('#hc-writer-btn').prop('disabled', false).text('✨ Makale Oluştur');
            $('#hc-writer-error').text('Sunucu hatası oluştu.').show();
        });
    });

    /* ---- Taslak kaydet ---- */
    $(document).on('click', '#hc-save-draft-btn', function () {
        var etiketRaw = $('#hc-r-etiketler').val();
        var etiketler = etiketRaw.split(',').map(function(e) { return e.trim(); }).filter(Boolean);

        $('#hc-save-msg').text(hcAdmin.saving).css('color', '#666');
        $('#hc-save-draft-btn').prop('disabled', true);

        $.post(hcAdmin.ajaxurl, {
            action:               'hc_save_draft',
            nonce:                hcAdmin.nonce,
            baslik:               $('#hc-r-baslik').val(),
            icerik:               $('#hc-r-icerik').val(),
            odak_anahtar_kelime:  $('#hc-r-odak').val(),
            meta_baslik:          $('#hc-r-meta-baslik').val(),
            meta_aciklama:        $('#hc-r-meta-acik').val(),
            etiketler:            etiketler
        }, function (resp) {
            $('#hc-save-draft-btn').prop('disabled', false);
            if (resp.success) {
                $('#hc-save-msg').html(
                    '✓ Kaydedildi! <a href="' + resp.data.edit_url + '" target="_blank">Yazıyı aç &rarr;</a>'
                ).css('color', '#1d7917');
            } else {
                $('#hc-save-msg').text('Hata: ' + resp.data).css('color', '#d63638');
            }
        });
    });

});

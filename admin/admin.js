jQuery(function ($) {

    // Yüklenme kontrolü — browser konsolunda "HC Admin JS v1.0.3" görünmeli
    console.log('HC Admin JS v1.0.3 yüklendi.');

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

    /* ---- Kullanım kontrol ---- */
    $(document).on('click', '#hc-check-usage-btn', function () {
        var $btn     = $(this);
        var $card    = $('#hc-usage-card');
        var $content = $('#hc-usage-content');

        $btn.prop('disabled', true).text('Kontrol ediliyor...');
        $card.hide();

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_check_ai_usage',
            nonce:  hcAdmin.nonce
        })
        .done(function (resp) {
            $btn.prop('disabled', false).text('Kullanımı Kontrol Et');
            if (!resp.success) {
                $content.html('<p style="color:#d63638;">Hata: ' + resp.data + '</p>');
                $card.show();
                return;
            }
            var d    = resp.data;
            var html = '<table style="width:100%;border-collapse:collapse;">';
            if (d.kalan_kredi !== undefined) {
                html += '<tr><td style="padding:6px 0;border-bottom:1px solid #eee;">Kalan Kredi</td><td style="text-align:right;font-weight:700;color:#1d7917;">$' + d.kalan_kredi + '</td></tr>';
                html += '<tr><td style="padding:6px 0;border-bottom:1px solid #eee;">Toplam Verilen</td><td style="text-align:right;">$' + d.toplam_kredi + '</td></tr>';
                html += '<tr><td style="padding:6px 0;border-bottom:1px solid #eee;">Harcanan</td><td style="text-align:right;">$' + d.harcanan + '</td></tr>';
            }
            if (d.bu_ay_harcama !== undefined) {
                html += '<tr><td style="padding:6px 0;">Bu Ay Harcama</td><td style="text-align:right;">$' + d.bu_ay_harcama + '</td></tr>';
            }
            if (d.durum) {
                html += '<tr><td colspan="2" style="padding:8px 0;color:#1d7917;">' + d.durum + '</td></tr>';
            }
            html += '</table>';
            $content.html(html);
            $card.show();
        })
        .fail(function () {
            $btn.prop('disabled', false).text('Kullanımı Kontrol Et');
            $content.html('<p style="color:#d63638;">Sunucu hatası.</p>');
            $card.show();
        });
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
        })
        .done(function (resp, status, xhr) {
            $('#hc-writer-loading').hide();
            $('#hc-writer-btn').prop('disabled', false).text('✨ Makale Oluştur');

            // JSON string gelirse parse et
            if (typeof resp === 'string') {
                try { resp = JSON.parse(resp); } catch(e) {
                    $('#hc-writer-error').text('JSON parse hatası. Ham yanıt: ' + resp.substring(0, 200)).show();
                    return;
                }
            }

            if (!resp || !resp.success) {
                var msg = (resp && resp.data) ? resp.data : 'Bilinmeyen hata.';
                $('#hc-writer-error').text('Hata: ' + msg).show();
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
        })
        .fail(function (xhr) {
            $('#hc-writer-loading').hide();
            $('#hc-writer-btn').prop('disabled', false).text('✨ Makale Oluştur');
            $('#hc-writer-error').text('Sunucu hatası: HTTP ' + xhr.status + ' — ' + xhr.responseText.substring(0, 150)).show();
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
            etiketler:            etiketler,
            shortcode:            $('#hc-writer-shortcode').val()
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

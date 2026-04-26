jQuery(function ($) {

    $('#hc-mb-btn').on('click', function () {
        var url       = $('#hc-mb-url').val().trim();
        var shortcode = $('#hc-mb-shortcode').val();

        if (!url) { alert('Lütfen URL girin.'); return; }

        $('#hc-mb-error').hide();
        $('#hc-mb-success').hide();
        $('#hc-mb-loading').show();
        $('#hc-mb-btn').prop('disabled', true).text('⏳ Yazılıyor...');

        $.post(hcMetabox.ajaxurl, {
            action: 'hc_generate_article',
            nonce:  hcMetabox.nonce,
            url:    url
        })
        .done(function (resp) {
            $('#hc-mb-loading').hide();
            $('#hc-mb-btn').prop('disabled', false).text('✨ Oluştur');

            if (typeof resp === 'string') {
                try { resp = JSON.parse(resp); } catch(e) {
                    $('#hc-mb-error').text('Yanıt parse hatası.').show(); return;
                }
            }
            if (!resp || !resp.success) {
                $('#hc-mb-error').text('Hata: ' + (resp && resp.data ? resp.data : 'Bilinmeyen')).show();
                return;
            }

            var d       = resp.data;
            var icerik  = d.icerik || '';

            // Shortcode en üste ekle
            if (shortcode) {
                icerik = '<p>' + shortcode + '</p>\n\n' + icerik;
            }

            // --- Başlığı doldur ---
            if (d.baslik && $('#title').length) {
                $('#title').val(d.baslik).trigger('input');
                // WP başlık önizlemesini güncelle
                $('#title-prompt-text').hide();
            }

            // --- İçeriği TinyMCE veya textarea'ya doldur ---
            if (typeof tinyMCE !== 'undefined' && tinyMCE.get('content')) {
                tinyMCE.get('content').setContent(icerik);
            } else {
                $('#content').val(icerik);
            }

            // --- Yoast SEO alanlarını doldur ---
            // Focus keyword
            $('input[name="yoast_wpseo_focuskw"], #focus-keyword-input-metabox, .wpseo-metabox-keyword-input')
                .first().val(d.odak_anahtar_kelime || '').trigger('input change');

            // Meta açıklama (hidden input + visible textarea)
            $('textarea[name="yoast_wpseo_metadesc"], input[name="yoast_wpseo_metadesc"]')
                .val(d.meta_aciklama || '').trigger('input change');

            // SEO title (genelde post title'dan otomatik gelir ama varsa set et)
            $('input[name="yoast_wpseo_title"]')
                .val(d.meta_baslik || '').trigger('input change');

            // Etiketler — WP tag input'una ekle
            if (d.etiketler && Array.isArray(d.etiketler)) {
                d.etiketler.forEach(function (tag) {
                    // WP classic editor tag box
                    if (typeof tagBox !== 'undefined') {
                        tagBox.flushTags($('#post_tag.tagsdiv'), false, tag);
                    }
                });
            }

            $('#hc-mb-success').show();

            // Kelime sayısını güncelle
            if (typeof wordCountL10n !== 'undefined' && typeof wp !== 'undefined' && wp.utils) {
                setTimeout(function () {
                    $('#content').trigger('input');
                }, 300);
            }
        })
        .fail(function (xhr) {
            $('#hc-mb-loading').hide();
            $('#hc-mb-btn').prop('disabled', false).text('✨ Oluştur');
            $('#hc-mb-error').text('Sunucu hatası: ' + xhr.status).show();
        });
    });

});

jQuery(function ($) {

    $('#hc-mb-btn').on('click', function () {
        var url       = $('#hc-mb-url').val().trim();
        var shortcode = $('#hc-mb-shortcode').val();
        var postTitle = $('#title').val().trim();
        var postId    = $('#post_ID').val();

        // URL yoksa başlıktan üret
        if (!url && !postTitle) {
            alert('URL girin veya yazı başlığını doldurun.');
            return;
        }

        $('#hc-mb-error').hide();
        $('#hc-mb-success').hide();
        $('#hc-mb-loading').show();
        $('#hc-mb-btn').prop('disabled', true).text('⏳ Yazılıyor...');

        $.post(hcMetabox.ajaxurl, {
            action: 'hc_generate_article',
            nonce:  hcMetabox.nonce,
            url:    url,
            title:  postTitle
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

            var d      = resp.data;
            var icerik = d.icerik || '';

            // Shortcode en üste ekle
            if (shortcode) {
                icerik = '<p>' + shortcode + '</p>\n\n' + icerik;
            }

            // Başlığı doldur (sadece boşsa)
            if (d.baslik && !$('#title').val().trim()) {
                $('#title').val(d.baslik).trigger('input');
                $('#title-prompt-text').hide();
            }

            // TinyMCE veya textarea
            if (typeof tinyMCE !== 'undefined' && tinyMCE.get('content')) {
                tinyMCE.get('content').setContent(icerik);
            } else {
                $('#content').val(icerik);
            }

            // Etiketleri WP tag box'a ekle
            var etiketler = Array.isArray(d.etiketler) ? d.etiketler : [];
            etiketler.forEach(function (tag) {
                if (typeof tagBox !== 'undefined') {
                    tagBox.flushTags($('#post_tag.tagsdiv'), $('<span>' + tag + '</span>'), 1);
                }
            });

            // Yoast + etiketleri sunucu tarafında kaydet, sonra sayfayı otomatik yenile
            if (postId) {
                // Önce yazıyı kaydet (içerik DB'ye işlensin)
                $('#publish, #save-post').first().trigger('click');

                setTimeout(function () {
                    $.post(hcMetabox.ajaxurl, {
                        action:               'hc_update_post_meta',
                        nonce:                hcMetabox.nonce,
                        post_id:              postId,
                        odak_anahtar_kelime:  d.odak_anahtar_kelime || '',
                        meta_baslik:          d.meta_baslik          || '',
                        meta_aciklama:        d.meta_aciklama         || '',
                        etiketler:            etiketler
                    }, function(metaResp) {
                        if (metaResp.success) {
                            $('#hc-mb-success').html('✓ Kaydedildi, sayfa yenileniyor...').show();
                            setTimeout(function () {
                                window.location.reload();
                            }, 1200);
                        }
                    });
                }, 1500); // kayıt tamamlanana kadar bekle
            } else {
                $('#hc-mb-success').text('✓ İçerik editöre eklendi.').show();
            }
        })
        .fail(function (xhr) {
            $('#hc-mb-loading').hide();
            $('#hc-mb-btn').prop('disabled', false).text('✨ Oluştur');
            $('#hc-mb-error').text('Sunucu hatası: ' + xhr.status).show();
        });
    });

});

jQuery(function ($) {
    var hcModulePreviewPayload = null;

    function hcNormalizeCategory(value) {
        return (value || '').replace(/\s+/g, ' ').trim();
    }

    function hcGetCategories() {
        var raw = $('#hc-categories').val() || '';
        var seen = {};
        var categories = [];

        raw.split(/[\r\n,]+/).forEach(function (item) {
            var category = hcNormalizeCategory(item);
            var key = category.toLocaleLowerCase('tr-TR');

            if (category && !seen[key]) {
                seen[key] = true;
                categories.push(category);
            }
        });

        categories.sort(function (a, b) {
            return a.localeCompare(b, 'tr-TR');
        });

        return categories;
    }

    function hcSetCategories(categories) {
        $('#hc-categories').val(categories.join("\n"));
    }

    function hcRefreshCategorySelects() {
        var categories = hcGetCategories();

        $('.hc-category-select').each(function () {
            var $select = $(this);
            var selected = $select.val();

            $select.find('option:not(:first)').remove();

            categories.forEach(function (category) {
                $('<option>').val(category).text(category).appendTo($select);
            });

            if (selected) {
                if (!categories.some(function (category) { return category === selected; })) {
                    $('<option>').val(selected).text(selected).appendTo($select);
                }

                $select.val(selected);
            }
        });
    }

    $(document).on('input', '#hc-categories', hcRefreshCategorySelects);

    $(document).on('click', '#hc-add-category-btn', function () {
        var $input = $('#hc-new-category');
        var category = hcNormalizeCategory($input.val());
        var categories = hcGetCategories();

        if (!category) {
            alert('Lütfen kategori adı girin.');
            return;
        }

        if (!categories.some(function (item) { return item.toLocaleLowerCase('tr-TR') === category.toLocaleLowerCase('tr-TR'); })) {
            categories.push(category);
            categories.sort(function (a, b) {
                return a.localeCompare(b, 'tr-TR');
            });
            hcSetCategories(categories);
            hcRefreshCategorySelects();
        }

        $input.val('').focus();
    });

    $(document).on('keydown', '#hc-new-category', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            $('#hc-add-category-btn').trigger('click');
        }
    });

    $('#hc-check-version').on('click', function () {
        var $result = $('#hc-version-result');
        var repo = $('#repo').val();

        if (!repo) {
            $result.text(hcAdmin.norepo).css('color', '#d63638');
            return;
        }

        $result.text(hcAdmin.checking).css('color', '#646970');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_check_github_version',
            nonce: hcAdmin.nonce
        }, function (resp) {
            if (resp.success && resp.data.sha) {
                $result.html('Son commit: <code>' + resp.data.sha + '</code>').css('color', '#067647');
                return;
            }

            $result.text('Bağlantı kurulamadı. Repo bilgisini ve token alanını kontrol edin.').css('color', '#d63638');
        });
    });

    $(document).on('input', '#hc-r-meta-baslik', function () {
        $('#hc-mb-count').text($(this).val().length);
    });

    $(document).on('input', '#hc-r-meta-acik', function () {
        $('#hc-ma-count').text($(this).val().length);
    });

    $(document).on('click', '.hc-yazi-ekle-btn', function () {
        var $btn = $(this);
        var $msg = $btn.siblings('.hc-yazi-ekle-msg');

        $btn.prop('disabled', true).text('Oluşturuluyor...');
        $msg.hide().text('');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_create_module_post',
            nonce: $btn.data('nonce'),
            name: $btn.data('name'),
            shortcode: $btn.data('shortcode')
        }, function (resp) {
            $btn.prop('disabled', false).text('Yazı Ekle');

            if (!resp.success) {
                $msg.text('Hata: ' + resp.data).css('color', '#d63638').show();
                return;
            }

            if (resp.data.existing) {
                $msg.html('Taslak zaten var. <a href="' + resp.data.edit_url + '">Düzenle</a>').css('color', '#b45309').show();
                return;
            }

            window.location.href = resp.data.edit_url;
        });
    });

    $(document).on('click', '#hc-check-usage-btn', function () {
        var $btn = $(this);
        var $card = $('#hc-usage-card');
        var $content = $('#hc-usage-content');

        $btn.prop('disabled', true).text('Kontrol ediliyor...');
        $card.hide();

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_check_ai_usage',
            nonce: hcAdmin.nonce
        })
            .done(function (resp) {
                var d;
                var html = '<table style="width:100%;border-collapse:collapse;">';

                $btn.prop('disabled', false).text('Kullanımı Kontrol Et');

                if (!resp.success) {
                    $content.html('<p style="color:#d63638;">Hata: ' + resp.data + '</p>');
                    $card.show();
                    return;
                }

                d = resp.data;

                if (d.kalan_kredi !== undefined) {
                    html += '<tr><td style="padding:6px 0;border-bottom:1px solid #eee;">Kalan Kredi</td><td style="text-align:right;font-weight:700;color:#067647;">$' + d.kalan_kredi + '</td></tr>';
                    html += '<tr><td style="padding:6px 0;border-bottom:1px solid #eee;">Toplam Limit</td><td style="text-align:right;">$' + d.toplam_kredi + '</td></tr>';
                    html += '<tr><td style="padding:6px 0;border-bottom:1px solid #eee;">Harcanan</td><td style="text-align:right;">$' + d.harcanan + '</td></tr>';
                }

                if (d.bu_ay_harcama !== undefined) {
                    html += '<tr><td style="padding:6px 0;">Bu Ay Harcama</td><td style="text-align:right;">$' + d.bu_ay_harcama + '</td></tr>';
                }

                if (d.durum) {
                    html += '<tr><td colspan="2" style="padding:8px 0;color:#067647;">' + d.durum + '</td></tr>';
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

    $(document).on('click', '#hc-writer-btn', function () {
        var url = $('#hc-writer-url').val().trim();

        if (!url) {
            alert('Lütfen bir URL girin.');
            return;
        }

        $('#hc-writer-result').hide();
        $('#hc-writer-error').hide();
        $('#hc-writer-loading').show();
        $('#hc-writer-btn').prop('disabled', true).text('Hazırlanıyor...');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_generate_article',
            nonce: hcAdmin.nonce,
            url: url,
            source: 'writer_tab'
        })
            .done(function (resp) {
                var d;

                $('#hc-writer-loading').hide();
                $('#hc-writer-btn').prop('disabled', false).text('Makale Oluştur');

                if (typeof resp === 'string') {
                    try {
                        resp = JSON.parse(resp);
                    } catch (e) {
                        $('#hc-writer-error').text('JSON parse hatası. Ham yanıt: ' + resp.substring(0, 200)).show();
                        return;
                    }
                }

                if (!resp || !resp.success) {
                    $('#hc-writer-error').text('Hata: ' + ((resp && resp.data) ? resp.data : 'Bilinmeyen hata.')).show();
                    return;
                }

                d = resp.data;
                $('#hc-r-odak').val(d.odak_anahtar_kelime || '');
                $('#hc-r-ikincil').val(Array.isArray(d.ikincil_anahtar_kelimeler) ? d.ikincil_anahtar_kelimeler.join(', ') : (d.ikincil_anahtar_kelimeler || ''));
                $('#hc-r-meta-baslik').val(d.meta_baslik || '').trigger('input');
                $('#hc-r-meta-acik').val(d.meta_aciklama || '').trigger('input');
                $('#hc-r-etiketler').val(Array.isArray(d.etiketler) ? d.etiketler.join(', ') : (d.etiketler || ''));
                $('#hc-r-url-slug').val(d.url_slug || '');
                $('#hc-r-baslik').val(d.baslik || '');
                $('#hc-r-icerik').val(d.icerik || '');
                $('#hc-r-ic-linkler').val(Array.isArray(d.ic_link_onerileri) ? d.ic_link_onerileri.join('\n') : (d.ic_link_onerileri || ''));
                $('#hc-r-alt-text').val(d.gorsel_alt_text || '');
                $('#hc-r-yoast').val(formatYoastChecklist(d.yoast_kontrol || {}));
                $('#hc-writer-result').show();
            })
            .fail(function (xhr) {
                $('#hc-writer-loading').hide();
                $('#hc-writer-btn').prop('disabled', false).text('Makale Oluştur');
                $('#hc-writer-error').text('Sunucu hatası: HTTP ' + xhr.status + ' — ' + xhr.responseText.substring(0, 150)).show();
            });
    });

    $(document).on('click', '#hc-save-draft-btn', function () {
        var etiketler = $('#hc-r-etiketler').val().split(',').map(function (etiket) {
            return etiket.trim();
        }).filter(Boolean);

        $('#hc-save-msg').text(hcAdmin.saving).css('color', '#646970');
        $('#hc-save-draft-btn').prop('disabled', true);

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_save_draft',
            nonce: hcAdmin.nonce,
            baslik: $('#hc-r-baslik').val(),
            icerik: $('#hc-r-icerik').val(),
            odak_anahtar_kelime: $('#hc-r-odak').val(),
            meta_baslik: $('#hc-r-meta-baslik').val(),
            meta_aciklama: $('#hc-r-meta-acik').val(),
            url_slug: $('#hc-r-url-slug').val(),
            etiketler: etiketler,
            shortcode: $('#hc-writer-shortcode').val()
        }, function (resp) {
            $('#hc-save-draft-btn').prop('disabled', false);

            if (resp.success) {
                $('#hc-save-msg').html('Kaydedildi. <a href="' + resp.data.edit_url + '" target="_blank">Taslağı aç</a>').css('color', '#067647');
                return;
            }

            $('#hc-save-msg').text('Hata: ' + resp.data).css('color', '#d63638');
        });
    });

    $(document).on('click', '#hc-module-generate-btn', function () {
        var $btn = $(this);
        var $status = $('#hc-module-generate-status');
        var topic = $('#hc-module-topic').val().trim();
        var url = $('#hc-module-url').val().trim();
        var notes = $('#hc-module-notes').val().trim();

        if (!topic && !url) {
            alert('Lütfen konu veya URL girin.');
            return;
        }

        hcModulePreviewPayload = null;
        $('#hc-module-preview').hide();
        $('#hc-module-error').hide().text('');
        $('#hc-module-publish-btn').prop('disabled', true);
        $btn.prop('disabled', true).text('Taslak hazırlanıyor...');
        $status.text('GPT-5 mini modül dosyalarını hazırlıyor. Bu işlem 30-90 saniye sürebilir.').css('color', '#646970');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_generate_module_preview',
            nonce: hcAdmin.nonce,
            topic: topic,
            url: url,
            notes: notes
        })
            .done(function (resp) {
                var d;

                $btn.prop('disabled', false).text('Modül Taslağı Oluştur');

                if (!resp || !resp.success) {
                    $('#hc-module-error').text('Hata: ' + ((resp && resp.data) ? resp.data : 'Bilinmeyen hata.')).show();
                    $status.text('').css('color', '');
                    return;
                }

                d = resp.data;
                hcModulePreviewPayload = d;
                hcFillModulePreview(d);
                $('#hc-module-preview').show();
                $status.text('Taslak hazır. Kaydetmeden önce dosyaları hızlıca gözden geçirin.').css('color', '#067647');
            })
            .fail(function (xhr) {
                $btn.prop('disabled', false).text('Modül Taslağı Oluştur');
                $('#hc-module-error').text('Sunucu hatası: HTTP ' + xhr.status + ' - ' + xhr.responseText.substring(0, 150)).show();
                $status.text('').css('color', '');
            });
    });

    $(document).on('input', '#hc-file-meta, #hc-file-php, #hc-file-js, #hc-file-css', function () {
        if (!hcModulePreviewPayload) {
            return;
        }

        hcModulePreviewPayload.files.meta_json = $('#hc-file-meta').val();
        hcModulePreviewPayload.files.calculator_php = $('#hc-file-php').val();
        hcModulePreviewPayload.files.calculator_js = $('#hc-file-js').val();
        hcModulePreviewPayload.files.calculator_css = $('#hc-file-css').val();
        $('#hc-module-publish-btn').prop('disabled', true);
    });

    $(document).on('click', '#hc-module-save-btn', function () {
        var $btn = $(this);
        var $status = $('#hc-module-save-status');

        if (!hcModulePreviewPayload) {
            alert('Önce modül taslağı oluşturun.');
            return;
        }

        $btn.prop('disabled', true).text('Kaydediliyor...');
        $status.text('Dosyalar kontrol ediliyor ve yeni modül klasörü oluşturuluyor...').css('color', '#646970');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_save_module_files',
            nonce: hcAdmin.nonce,
            payload: JSON.stringify(hcModulePreviewPayload)
        })
            .done(function (resp) {
                $btn.prop('disabled', false).text('Modülü Eklentiye Kaydet');

                if (!resp || !resp.success) {
                    $status.text('Hata: ' + ((resp && resp.data) ? resp.data : 'Bilinmeyen hata.')).css('color', '#d63638');
                    return;
                }

                $status.html('Kaydedildi: <code>' + resp.data.path + '</code> Shortcode: <code>' + resp.data.shortcode + '</code>').css('color', '#067647');
                $('#hc-module-publish-btn').prop('disabled', false);
            })
            .fail(function (xhr) {
                $btn.prop('disabled', false).text('Modülü Eklentiye Kaydet');
                $status.text('Sunucu hatası: HTTP ' + xhr.status).css('color', '#d63638');
            });
    });

    $(document).on('click', '#hc-module-publish-btn', function () {
        var $btn = $(this);
        var $status = $('#hc-module-save-status');

        if (!hcModulePreviewPayload) {
            alert('Önce modül taslağı oluşturun.');
            return;
        }

        if (!window.confirm('Bu modülü GitHub ayarlarında seçili branch üzerine commit olarak göndermek istiyor musunuz?')) {
            return;
        }

        $btn.prop('disabled', true).text('GitHub’a gönderiliyor...');
        $status.text('GitHub API üzerinden dosyalar oluşturuluyor...').css('color', '#646970');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_publish_module_github',
            nonce: hcAdmin.nonce,
            payload: JSON.stringify(hcModulePreviewPayload)
        })
            .done(function (resp) {
                $btn.prop('disabled', false).text('GitHub\'a Gönder');

                if (!resp || !resp.success) {
                    $status.text('GitHub hatası: ' + ((resp && resp.data) ? resp.data : 'Bilinmeyen hata.')).css('color', '#d63638');
                    return;
                }

                $status.text('GitHub’a gönderildi: ' + resp.data.repo + ' / ' + resp.data.branch).css('color', '#067647');
            })
            .fail(function (xhr) {
                $btn.prop('disabled', false).text('GitHub\'a Gönder');
                $status.text('Sunucu hatası: HTTP ' + xhr.status).css('color', '#d63638');
            });
    });

    function hcFillModulePreview(data) {
        var module = data.module || {};
        var files = data.files || {};

        $('#hc-module-name-label').text(module.name || '-');
        $('#hc-module-slug-label').text(module.slug || '-');
        $('#hc-module-path-label').text(module.path || (module.slug ? 'modules/' + module.slug + '/' : '-'));
        $('#hc-module-desc-label').text(module.desc || '-');
        $('#hc-module-source-label').text(module.source_url || module.formula_source_url || 'Kaynak yok');
        $('#hc-module-shortcode-badge').text(module.shortcode || '');
        $('#hc-file-meta').val(files.meta_json || '');
        $('#hc-file-php').val(files.calculator_php || '');
        $('#hc-file-js').val(files.calculator_js || '');
        $('#hc-file-css').val(files.calculator_css || '');

        if (module.needs_review || module.review_note) {
            $('#hc-module-review-note').text(module.review_note || 'Formül için insan kontrolü önerilir.').show();
        } else {
            $('#hc-module-review-note').hide().text('');
        }
    }

    function formatYoastChecklist(data) {
        var lines = [];
        var map = {
            anahtar_kelime_baslikta: 'Anahtar kelime başlıkta',
            ilk_paragrafta: 'İlk paragrafta',
            meta_aciklamada: 'Meta açıklamada',
            alt_baslikta: 'Alt başlıkta',
            okunabilirlik: 'Okunabilirlik',
            seo_skoru: 'SEO skoru'
        };

        Object.keys(map).forEach(function (key) {
            if (data[key] !== undefined && data[key] !== null && data[key] !== '') {
                lines.push(map[key] + ': ' + data[key]);
            }
        });

        return lines.join('\n');
    }
});

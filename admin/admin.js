jQuery(function ($) {
    var hcModulePreviewPayload = null;
    var hcPreviewState = {
        name: '',
        shortcode: '',
        standaloneUrl: '',
        trigger: null
    };

    // Theme Toggle
    var isLight = localStorage.getItem('hc_theme_light') === 'true';
    if (isLight) {
        $('.hc-wrap').addClass('hc-light-mode');
    }

    $('.hc-module-grid + .hc-table-wrap').find(':input').prop('disabled', true);

    $('#hc-theme-toggle').on('click', function(e) {
        e.preventDefault();
        var $wrap = $('.hc-wrap');
        $wrap.toggleClass('hc-light-mode');
        localStorage.setItem('hc_theme_light', $wrap.hasClass('hc-light-mode'));
    });

    function hcCopyText(text) {
        if (!text) {
            return Promise.reject();
        }

        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        }

        return new Promise(function (resolve, reject) {
            var textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'fixed';
            textarea.style.top = '-999px';
            document.body.appendChild(textarea);
            textarea.select();

            try {
                document.execCommand('copy') ? resolve() : reject();
            } catch (e) {
                reject(e);
            } finally {
                document.body.removeChild(textarea);
            }
        });
    }

    function hcSetPreviewStatus(message, type) {
        var status = document.getElementById('hc-preview-status');

        if (!status) {
            return;
        }

        status.textContent = message || '';
        status.dataset.type = type || '';
    }

    function hcActivatePreviewScripts(container) {
        if (!container) {
            return;
        }

        Array.prototype.slice.call(container.querySelectorAll('script')).forEach(function (script) {
            var fresh = document.createElement('script');

            Array.prototype.slice.call(script.attributes).forEach(function (attr) {
                fresh.setAttribute(attr.name, attr.value);
            });

            fresh.text = script.text || script.textContent || '';
            script.parentNode.replaceChild(fresh, script);
        });
    }

    function hcOpenPreviewModal(button) {
        var modal = document.getElementById('hc-preview-modal');
        var content = document.getElementById('hc-preview-content');
        var loading = document.getElementById('hc-preview-loading');
        var title = document.getElementById('hc-preview-title');
        var shortcodeText = document.getElementById('hc-preview-shortcode-text');
        var shortcodeButton = modal ? modal.querySelector('.hc-preview-shortcode') : null;
        var standalone = document.getElementById('hc-preview-standalone');

        if (!modal || !button) {
            return;
        }

        hcPreviewState = {
            name: button.getAttribute('data-name') || '',
            shortcode: button.getAttribute('data-shortcode') || '',
            standaloneUrl: button.getAttribute('data-standalone-url') || '#',
            trigger: button
        };

        title.textContent = hcPreviewState.name || 'Modül Önizleme';
        shortcodeText.textContent = hcPreviewState.shortcode;
        shortcodeButton.setAttribute('data-shortcode', hcPreviewState.shortcode);
        standalone.href = hcPreviewState.standaloneUrl;
        content.innerHTML = '';
        loading.hidden = false;
        hcSetPreviewStatus(hcAdmin.previewing || 'Önizleme hazırlanıyor...', 'loading');

        modal.hidden = false;
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('hc-preview-open');
        modal.querySelector('.hc-icon-button').focus();

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_preview_shortcode',
            nonce: hcAdmin.nonce,
            shortcode: hcPreviewState.shortcode
        })
            .done(function (resp) {
                loading.hidden = true;

                if (!resp || !resp.success) {
                    content.innerHTML = '<div class="hc-preview-error">' + ((resp && resp.data) ? resp.data : (hcAdmin.previewError || 'Önizleme yüklenemedi.')) + '</div>';
                    hcSetPreviewStatus(hcAdmin.previewError || 'Önizleme yüklenemedi.', 'error');
                    return;
                }

                content.innerHTML = resp.data.html || '';
                hcActivatePreviewScripts(content);
                hcSetPreviewStatus('Önizleme hazır.', 'success');
            })
            .fail(function (xhr) {
                loading.hidden = true;
                content.innerHTML = '<div class="hc-preview-error">Sunucu hatası: HTTP ' + xhr.status + '</div>';
                hcSetPreviewStatus(hcAdmin.previewError || 'Önizleme yüklenemedi.', 'error');
            });
    }

    function hcClosePreviewModal() {
        var modal = document.getElementById('hc-preview-modal');

        if (!modal || modal.hidden) {
            return;
        }

        modal.hidden = true;
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('hc-preview-open');
        document.getElementById('hc-preview-content').innerHTML = '';
        hcSetPreviewStatus('', '');

        if (hcPreviewState.trigger) {
            hcPreviewState.trigger.focus();
        }
    }

    $(document).on('click', '[data-hc-preview]', function () {
        hcOpenPreviewModal(this);
    });

    $(document).on('click', '[data-hc-preview-close]', function () {
        hcClosePreviewModal();
    });

    $(document).on('keydown', function (event) {
        if (event.key === 'Escape') {
            hcClosePreviewModal();
        }
    });

    $(document).on('click', '[data-hc-preview-size]', function () {
        var size = this.getAttribute('data-hc-preview-size');
        var frame = document.querySelector('.hc-preview-frame');

        $('[data-hc-preview-size]').removeClass('is-active');
        $(this).addClass('is-active');

        if (frame) {
            frame.setAttribute('data-preview-size', size);
        }
    });

    $(document).on('click', '[data-hc-copy-shortcode], [data-hc-modal-copy]', function () {
        var shortcode = this.getAttribute('data-shortcode') || hcPreviewState.shortcode;

        hcCopyText(shortcode)
            .then(function () {
                hcSetPreviewStatus(hcAdmin.copied || 'Shortcode kopyalandı.', 'success');
            })
            .catch(function () {
                hcSetPreviewStatus(hcAdmin.copyError || 'Shortcode kopyalanamadı.', 'error');
                alert(hcAdmin.copyError || 'Shortcode kopyalanamadı.');
            });
    });

    $(document).on('click', '#hc-preview-insert', function () {
        if (!hcPreviewState.shortcode || !hcPreviewState.name) {
            return;
        }

        var $btn = $(this);
        $btn.prop('disabled', true).text(hcAdmin.creatingDraft || 'Taslak oluşturuluyor...');
        hcSetPreviewStatus('Yazı taslağı hazırlanıyor...', 'loading');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_create_module_post',
            nonce: hcAdmin.nonce,
            name: hcPreviewState.name,
            shortcode: hcPreviewState.shortcode
        }, function (resp) {
            $btn.prop('disabled', false).text(hcAdmin.createDraft || 'Taslak oluştur');

            if (!resp.success) {
                hcSetPreviewStatus('Hata: ' + resp.data, 'error');
                return;
            }

            var message = resp.data.existing
                ? 'Taslak zaten vardı; kategori ve shortcode güncellendi.'
                : 'Taslak oluşturuldu ve kaydedildi.';

            if (resp.data.reason) {
                message += ' ' + resp.data.reason;
            }

            hcSetPreviewStatus(message + ' <a href=\"' + resp.data.edit_url + '\">Düzenle</a>', 'success');
        }).fail(function (xhr) {
            $btn.prop('disabled', false).text(hcAdmin.createDraft || 'Taslak oluştur');
            hcSetPreviewStatus('Sunucu hatası: HTTP ' + xhr.status, 'error');
        });
    });

    $(document).on('click', '[data-hc-delete-module]', function () {
        var button = this;
        var slug = button.getAttribute('data-slug') || '';
        var name = button.getAttribute('data-name') || slug;
        var $button = $(button);
        var $card = $button.closest('[data-module-card]');

        if (!slug || !window.confirm((hcAdmin.deleteConfirm || 'Bu modülü silmek istediğinize emin misiniz?') + '\n\n' + name)) {
            return;
        }

        $button.prop('disabled', true).text('Siliniyor...');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_delete_module',
            nonce: hcAdmin.nonce,
            slug: slug
        })
            .done(function (resp) {
                if (!resp || !resp.success) {
                    $button.prop('disabled', false).text('Modülü Sil');
                    alert(((resp && resp.data) ? resp.data : (hcAdmin.deleteError || 'Modül silinemedi.')));
                    return;
                }

                $card.addClass('is-removing');
                window.setTimeout(function () {
                    $card.remove();
                    $(document).trigger('hc:module-deleted', [slug]);
                    if (!$('[data-module-card]').length) {
                        $('.hc-module-grid').replaceWith('<div class="hc-empty-state"><span class="dashicons dashicons-screenoptions" aria-hidden="true"></span><h3>Modül kalmadı</h3><p>Katalogda gösterilecek aktif modül bulunmuyor.</p></div>');
                    }
                }, 240);
            })
            .fail(function (xhr) {
                $button.prop('disabled', false).text('Modülü Sil');
                alert((hcAdmin.deleteError || 'Modül silinemedi.') + ' HTTP ' + xhr.status);
            });
    });

    $(document).on('click', '[data-hc-toggle-categories]', function () {
        $('#hc-category-manager').stop(true, true).slideToggle(180);
    });

    $(document).ajaxError(function (event, xhr, settings) {
        var $versionResult = $('#hc-version-result');

        if (!settings || settings.url !== hcAdmin.ajaxurl || !$versionResult.length || $versionResult.text() !== hcAdmin.checking) {
            return;
        }

        $versionResult.text((xhr.responseJSON && xhr.responseJSON.data) ? xhr.responseJSON.data : 'Sunucu hatası: HTTP ' + xhr.status).css('color', '#d63638');
    });

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
        var $card = $btn.closest('[data-module-card]');
        var $select = $card.find('.hc-category-select');
        var $msg = $card.find('.hc-yazi-ekle-msg').first();
        var desc = $btn.data('desc') || $.trim($card.find('.hc-module-card-main p').first().text()) || $.trim($card.find('[data-module-desc]').first().text());

        $btn.prop('disabled', true).text(hcAdmin.creatingDraft || 'Taslak oluşturuluyor...');
        $msg.hide().text('');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_create_module_post',
            nonce: $btn.data('nonce'),
            name: $btn.data('name'),
            shortcode: $btn.data('shortcode'),
            slug: $card.data('slug'),
            desc: desc,
            category: $select.val() || ''
        }, function (resp) {
            $btn.prop('disabled', false).text(hcAdmin.createDraft || 'Taslak oluştur');

            if (!resp.success) {
                $msg.text('Hata: ' + resp.data).css('color', '#d63638').show();
                return;
            }

            if ($select.length && resp.data.category) {
                if (!$select.find('option[value="' + resp.data.category + '"]').length) {
                    $('<option>').val(resp.data.category).text(resp.data.category).appendTo($select);
                }
                $select.val(resp.data.category).trigger('change');
            }

            if (resp.data.existing) {
                $msg.html('Taslak zaten vardı; kategori ve shortcode güncellendi. <a href="' + resp.data.edit_url + '">Düzenle</a>').css('color', '#b45309').show();
            } else {
                $msg.html('Taslak oluşturuldu ve kaydedildi. <a href="' + resp.data.edit_url + '">Düzenle</a>').css('color', '#067647').show();
            }

            $(document).trigger('hc:draft-created');
        });
    });

    $(document).on('click', '.hc-ai-category-btn', function () {
        var $btn = $(this);
        var $card = $btn.closest('[data-module-card]');
        var $select = $card.find('.hc-category-select');
        var $msg = $card.find('.hc-yazi-ekle-msg').first();

        $btn.prop('disabled', true).text(hcAdmin.analyzingCategory || 'AI kategori analizi yapılıyor...');
        $msg.hide().text('');

        $.post(hcAdmin.ajaxurl, {
            action: 'hc_ai_analyze_module_category',
            nonce: $btn.data('nonce'),
            name: $btn.data('name'),
            desc: $btn.data('desc')
        }, function (resp) {
            $btn.prop('disabled', false).text(hcAdmin.analyzeCategory || 'AI ile kategori analizi');

            if (!resp || !resp.success) {
                $msg.text('Hata: ' + ((resp && resp.data) ? resp.data : 'Kategori analizi yapılamadı.')).css('color', '#d63638').show();
                return;
            }

            if ($select.length && resp.data && resp.data.category) {
                if (!$select.find('option[value="' + resp.data.category + '"]').length) {
                    $('<option>').val(resp.data.category).text(resp.data.category).appendTo($select);
                }
                $select.val(resp.data.category).trigger('change');
            }

            $msg.text((resp.data && resp.data.reason) ? resp.data.reason : (hcAdmin.categoryAnalyzed || 'Kategori önerisi seçildi. Kaydetmeyi unutmayın.')).css('color', '#067647').show();
        }).fail(function (xhr) {
            $btn.prop('disabled', false).text(hcAdmin.analyzeCategory || 'AI ile kategori analizi');
            $msg.text('Sunucu hatası: HTTP ' + xhr.status).css('color', '#d63638').show();
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

    function hcDebounce(fn, wait) {
        var timer;

        return function () {
            var args = arguments;
            var context = this;
            clearTimeout(timer);
            timer = window.setTimeout(function () {
                fn.apply(context, args);
            }, wait || 250);
        };
    }

    function hcBuildStandaloneUrl(shortcode) {
        return hcAdmin.ajaxurl + '?action=hc_preview_shortcode&nonce=' + encodeURIComponent(hcAdmin.nonce) + '&shortcode=' + encodeURIComponent(shortcode) + '&standalone=1';
    }

    function hcEscapeHtml(value) {
        return $('<div>').text(value || '').html();
    }

    function hcInitExplorer() {
        var $root = $('#hc-explorer');
        var $layout = $('.hc-explorer-layout');
        var $drawer = $('#hc-explorer-drawer');
        var state;
        var categoryOptions = [];
        var pendingAssignments = {};
        var selectedMap = {};

        if (!$root.length || hcAdmin.currentPage !== 'hesaplama-suite') {
            return;
        }

        state = {
            search: $root.data('search') || '',
            category: $root.data('category') || '',
            post_status: $root.data('post-status') || '',
            collection: $root.data('collection') || '',
            sort_by: $root.data('sort-by') || 'updated',
            sort_dir: $root.data('sort-dir') || 'desc',
            page: parseInt($root.data('page'), 10) || 1,
            per_page: parseInt($root.data('per-page'), 10) || 50,
            view: 'gallery',
            favorites: [],
            recent: []
        };

        function setDrawerEmpty(isEmpty) {
            $layout.toggleClass('is-drawer-empty', !!isEmpty);
            $drawer.toggleClass('is-empty', !!isEmpty);
        }

        function getPayload() {
            return {
                nonce: hcAdmin.nonce,
                search: state.search,
                category: state.category,
                post_status: state.post_status,
                collection: state.collection,
                sort_by: state.sort_by,
                sort_dir: state.sort_dir,
                page: state.page,
                per_page: state.per_page,
                view: state.view
            };
        }

        function setStatus(message, type) {
            var $status = $('#hc-explorer-status');
            $status.text(message || '').attr('data-type', type || '');
        }

        function syncCategoryTextarea(categories) {
            categoryOptions = categories.slice();
            $('#hc-categories').val(categories.join('\n'));
            var $bulk = $('#hc-explorer-bulk-category');
            $bulk.find('option:not(:first)').remove();
            categories.forEach(function (category) {
                $('<option>').val(category).text(category).appendTo($bulk);
            });
        }

        function getCategoriesFromSidebar(sidebarCategories) {
            var seen = {};
            var categories = [];

            (sidebarCategories || []).forEach(function (node) {
                if (node.label && !seen[node.label]) {
                    seen[node.label] = true;
                    categories.push(node.label);
                }
                (node.children || []).forEach(function (child) {
                    if (child.path && !seen[child.path]) {
                        seen[child.path] = true;
                        categories.push(child.path);
                    }
                });
            });

            categories.sort(function (a, b) {
                return a.localeCompare(b, 'tr-TR');
            });

            return categories;
        }

        function renderStats(stats) {
            var latest = stats.latest_post || {};
            var cards = [
                { label: 'Toplam Modül', value: stats.total_modules || 0, foot: 'Canlı katalog' },
                { label: 'Kategori', value: stats.total_categories || 0, foot: 'Gezgin ağacı' },
                { label: 'Toplam Kullanım', value: stats.total_usage || 0, foot: 'Shortcode yerleşimi' },
                { label: 'Mükerrer Kullanım', value: stats.duplicate_modules || 0, foot: (stats.duplicate_usage || 0) + ' ekstra kullanım' },
                { label: 'Son Eklenen', value: latest.title || '-', foot: latest.date || '-', small: true }
            ];
            var html = '';

            cards.forEach(function (card) {
                html += '<div class="hc-stat-card">';
                html += '<span class="hc-stat-label">' + hcEscapeHtml(card.label) + '</span>';
                html += '<strong class="hc-stat-value' + (card.small ? ' hc-stat-small' : '') + '">' + hcEscapeHtml(String(card.value)) + '</strong>';
                html += '<span class="hc-stat-foot">' + hcEscapeHtml(card.foot) + '</span>';
                html += '</div>';
            });

            $('#hc-explorer-stats').removeClass('hc-stats-grid-skeleton').html(html);
        }

        function renderCollections(collections) {
            var html = '';

            (collections || []).forEach(function (item) {
                var active = state.collection === item.key ? ' is-active' : '';
                html += '<button type="button" class="hc-explorer-nav-item' + active + '" data-collection="' + hcEscapeHtml(item.key) + '">';
                html += '<span>' + hcEscapeHtml(item.label) + '</span>';
                html += '<strong>' + hcEscapeHtml(String(item.count)) + '</strong>';
                html += '</button>';
            });

            $('#hc-explorer-collections').removeClass('hc-skeleton-block').html(html);
        }

        function renderCategoryTree(categories) {
            var html = '<button type="button" class="hc-explorer-tree-item' + (!state.category ? ' is-active' : '') + '" data-category="">Tüm kategoriler <strong></strong></button>';

            (categories || []).forEach(function (node) {
                var parentActive = state.category === node.label ? ' is-active' : '';
                var hasChildren = node.children && node.children.length;
                var childActive = false;
                if (hasChildren) {
                    node.children.forEach(function (child) {
                        if (state.category === child.path) { childActive = true; }
                    });
                }
                var isOpen = childActive || state.category === node.label;
                html += '<div class="hc-explorer-tree-node' + (isOpen ? ' is-open' : '') + '">';
                html += '<div class="hc-explorer-tree-parent">';
                html += '<button type="button" class="hc-explorer-tree-item' + parentActive + '" data-category="' + hcEscapeHtml(node.label) + '"><span>' + hcEscapeHtml(node.label) + '</span><strong>' + hcEscapeHtml(String(node.count)) + '</strong></button>';
                if (hasChildren) {
                    html += '<button type="button" class="hc-tree-toggle" data-tree-toggle aria-label="Alt kategorileri aç/kapat">&#8250;</button>';
                }
                html += '</div>';

                if (hasChildren) {
                    html += '<div class="hc-explorer-tree-children">';
                    node.children.forEach(function (child) {
                        var active = state.category === child.path ? ' is-active' : '';
                        html += '<button type="button" class="hc-explorer-tree-item is-child' + active + '" data-category="' + hcEscapeHtml(child.path) + '"><span>' + hcEscapeHtml(child.label) + '</span><strong>' + hcEscapeHtml(String(child.count)) + '</strong></button>';
                    });
                    html += '</div>';
                }

                html += '</div>';
            });

            $('#hc-explorer-categories').removeClass('hc-skeleton-block').html(html);
            syncCategoryTextarea(getCategoriesFromSidebar(categories));
        }

        function renderPagination(list) {
            $('#hc-explorer-page-label').text('Sayfa ' + list.page + ' / ' + list.pages + ' • ' + list.total + ' modül');
            $('#hc-explorer-prev').prop('disabled', list.page <= 1);
            $('#hc-explorer-next').prop('disabled', !list.has_more);
            $('#hc-explorer-list-meta').text(list.total + ' sonuç bulundu');
        }

        function buildCategorySelect(value) {
            var html = '<select class="hc-category-select"><option value="">Seçiniz</option>';
            categoryOptions.forEach(function (category) {
                html += '<option value="' + hcEscapeHtml(category) + '"' + (category === value ? ' selected' : '') + '>' + hcEscapeHtml(category) + '</option>';
            });
            if (value && categoryOptions.indexOf(value) === -1) {
                html += '<option value="' + hcEscapeHtml(value) + '" selected>' + hcEscapeHtml(value) + '</option>';
            }
            html += '</select>';
            return html;
        }

        function buildRowActions(item) {
            return [
                '<button type="button" class="button button-small button-primary hc-preview-btn" data-hc-preview data-name="' + hcEscapeHtml(item.name) + '" data-shortcode="' + hcEscapeHtml(item.shortcode) + '" data-standalone-url="' + hcEscapeHtml(hcBuildStandaloneUrl(item.shortcode)) + '">Önizle</button>',
                '<button type="button" class="button button-small hc-ai-category-btn" data-name="' + hcEscapeHtml(item.name) + '" data-desc="' + hcEscapeHtml(item.desc || '') + '" data-nonce="' + hcEscapeHtml(hcAdmin.nonce) + '">AI kategori</button>',
                '<button type="button" class="button button-small hc-yazi-ekle-btn" data-name="' + hcEscapeHtml(item.name) + '" data-shortcode="' + hcEscapeHtml(item.shortcode) + '" data-desc="' + hcEscapeHtml(item.desc || '') + '" data-nonce="' + hcEscapeHtml(hcAdmin.nonce) + '">Taslak</button>',
                '<a class="button button-small hc-button-ghost" href="' + hcEscapeHtml(item.posts_url) + '">Kullanımlar</a>',
                '<button type="button" class="button button-small hc-button-danger" data-hc-delete-module data-slug="' + hcEscapeHtml(item.slug) + '" data-name="' + hcEscapeHtml(item.name) + '">Sil</button>'
            ].join('');
        }

        function renderTable(list) {
            var html = '';

            if (!list.items.length) {
                html = '<tr><td colspan="9"><div class="hc-empty-state"><span class="dashicons dashicons-search"></span><h3>Sonuç bulunamadı</h3><p>Arama veya filtreleri değiştirerek tekrar deneyin.</p></div></td></tr>';
                $('#hc-explorer-table-body').html(html);
                return;
            }

            list.items.forEach(function (item) {
                var checked = selectedMap[item.slug] ? ' checked' : '';
                var favorite = state.favorites.indexOf(item.slug) > -1 ? ' is-active' : '';
                html += '<tr data-module-card data-slug="' + hcEscapeHtml(item.slug) + '" data-module-desc="' + hcEscapeHtml(item.desc || '') + '">';
                html += '<td class="hc-cell-check"><input type="checkbox" class="hc-explorer-row-check" data-slug="' + hcEscapeHtml(item.slug) + '"' + checked + '></td>';
                html += '<td><button type="button" class="hc-explorer-row-link" data-module-open="' + hcEscapeHtml(item.slug) + '"><strong>' + hcEscapeHtml(item.name) + '</strong><span>' + hcEscapeHtml(item.slug) + '</span></button></td>';
                html += '<td>' + buildCategorySelect(item.category || '') + '</td>';
                html += '<td><span class="hc-inline-badge">' + hcEscapeHtml(item.status) + '</span></td>';
                html += '<td><button type="button" class="hc-shortcode-chip" data-hc-copy-shortcode data-shortcode="' + hcEscapeHtml(item.shortcode) + '"><code>' + hcEscapeHtml(item.shortcode) + '</code></button></td>';
                html += '<td><span class="hc-ai-pill' + (item.ai_enabled ? ' is-active' : '') + '">' + (item.ai_enabled ? 'Aktif' : 'Pasif') + '</span></td>';
                html += '<td><span class="hc-usage-badge ' + (item.post_count > 0 ? 'is-used' : 'is-unused') + '">' + hcEscapeHtml(String(item.post_count)) + ' kullanım</span></td>';
                html += '<td>' + hcEscapeHtml(item.updated) + '</td>';
                html += '<td><div class="hc-row-actions">' + buildRowActions(item) + '<button type="button" class="hc-icon-star' + favorite + '" data-favorite-toggle="' + hcEscapeHtml(item.slug) + '" aria-label="Favori değiştir">★</button><span class="hc-yazi-ekle-msg"></span></div></td>';
                html += '</tr>';
            });

            $('#hc-explorer-table-body').html(html);
        }

        function renderGallery(list) {
            var html = '';

            list.items.forEach(function (item) {
                var favorite = state.favorites.indexOf(item.slug) > -1 ? ' is-active' : '';
                html += '<article class="hc-module-card hc-module-card-compact" data-module-card data-slug="' + hcEscapeHtml(item.slug) + '" data-module-desc="' + hcEscapeHtml(item.desc || '') + '">';
                html += '<div class="hc-module-card-top"><span class="hc-category-badge">' + hcEscapeHtml(item.category || 'Kategorisiz') + '</span><span class="hc-usage-badge ' + (item.post_count > 0 ? 'is-used' : 'is-unused') + '">' + hcEscapeHtml(String(item.post_count)) + ' kullanım</span></div>';
                html += '<div class="hc-module-card-main"><h3>' + hcEscapeHtml(item.name) + '</h3><p>' + hcEscapeHtml(item.desc || '') + '</p></div>';
                html += '<div class="hc-module-meta-inline"><span>' + hcEscapeHtml(item.updated) + '</span><span>' + hcEscapeHtml(item.shortcode) + '</span></div>';
                html += buildCategorySelect(item.category || '');
                html += '<div class="hc-card-actions hc-card-actions-compact">' + buildRowActions(item) + '<button type="button" class="hc-icon-star' + favorite + '" data-favorite-toggle="' + hcEscapeHtml(item.slug) + '" aria-label="Favori değiştir">★</button><span class="hc-yazi-ekle-msg"></span></div>';
                html += '</article>';
            });

            $('#hc-explorer-gallery').html(html);
        }

        function renderDrawer(module) {
            var favorite = state.favorites.indexOf(module.slug) > -1 ? ' is-active' : '';
            var html = '<div class="hc-explorer-drawer-body" data-module-card data-slug="' + hcEscapeHtml(module.slug) + '">';
            html += '<div class="hc-explorer-drawer-head"><div><span class="hc-toolbar-kicker">Module Detail</span><h3>' + hcEscapeHtml(module.name) + '</h3><p data-module-desc>' + hcEscapeHtml(module.desc || '') + '</p></div><button type="button" class="hc-icon-star' + favorite + '" data-favorite-toggle="' + hcEscapeHtml(module.slug) + '">★</button></div>';
            html += '<div class="hc-module-meta-grid">';
            html += '<div><span>Kategori</span><strong>' + hcEscapeHtml(module.category || 'Kategorisiz') + '</strong></div>';
            html += '<div><span>Shortcode</span><code>' + hcEscapeHtml(module.shortcode) + '</code></div>';
            html += '<div><span>Kullanım</span><strong>' + hcEscapeHtml(String(module.post_count)) + '</strong></div>';
            html += '<div><span>Draft</span><strong>' + hcEscapeHtml(String(module.draft_count)) + '</strong></div>';
            html += '<div><span>Güncelleme</span><strong>' + hcEscapeHtml(module.updated) + '</strong></div>';
            html += '<div><span>Yayıncı</span><strong>' + hcEscapeHtml(module.publisher || '-') + '</strong></div>';
            html += '</div>';
            html += '<label class="hc-card-select-label"><span>Kategori</span>' + buildCategorySelect(module.category || '') + '</label>';
            html += '<button type="button" class="hc-shortcode-chip" data-hc-copy-shortcode data-shortcode="' + hcEscapeHtml(module.shortcode) + '"><code>' + hcEscapeHtml(module.shortcode) + '</code></button>';
            html += '<div class="hc-card-actions">' + buildRowActions(module) + '</div>';
            html += '<span class="hc-yazi-ekle-msg"></span>';
            html += '</div>';

            $('#hc-explorer-drawer').html(html);
            setDrawerEmpty(false);
        }

        function refreshSelectionBar() {
            var selected = Object.keys(selectedMap);
            $('#hc-explorer-selection-count').text(selected.length + ' modül seçildi');
            $('#hc-explorer-bulkbar').prop('hidden', !selected.length);
        }

        function fetchModules() {
            setStatus(hcAdmin.explorerLoading || 'Modüller yükleniyor...', 'loading');

            $.post(hcAdmin.ajaxurl, $.extend({ action: 'hc_explorer_modules' }, getPayload()))
                .done(function (resp) {
                    if (!resp || !resp.success) {
                        setStatus(hcAdmin.explorerError || 'Modül verisi yüklenemedi.', 'error');
                        return;
                    }

                    renderPagination(resp.data.list);
                    renderGallery(resp.data.list);
                    $('#hc-explorer-table-wrap').prop('hidden', true);
                    $('#hc-explorer-gallery').prop('hidden', false);
                    setStatus('', '');
                })
                .fail(function (xhr) {
                    setStatus((hcAdmin.explorerError || 'Modül verisi yüklenemedi.') + ' HTTP ' + xhr.status, 'error');
                });
        }

        function fetchBootstrap() {
            $.post(hcAdmin.ajaxurl, $.extend({ action: 'hc_explorer_bootstrap' }, getPayload()))
                .done(function (resp) {
                    if (!resp || !resp.success) {
                        setStatus(hcAdmin.explorerError || 'Modül verisi yüklenemedi.', 'error');
                        return;
                    }

                    state.favorites = resp.data.preferences.favorites || [];
                    state.recent = resp.data.preferences.recent || [];
                    renderStats(resp.data.stats || {});
                    renderCollections(resp.data.sidebar.collections || []);
                    renderCategoryTree(resp.data.sidebar.categories || []);
                    renderPagination(resp.data.list);
                    renderGallery(resp.data.list);
                    $('#hc-explorer-table-wrap').prop('hidden', true);
                    $('#hc-explorer-gallery').prop('hidden', false);
                    setStatus('', '');
                })
                .fail(function (xhr) {
                    setStatus((hcAdmin.explorerError || 'Modül verisi yüklenemedi.') + ' HTTP ' + xhr.status, 'error');
                });
        }

        function openModule(slug) {
            $.post(hcAdmin.ajaxurl, {
                action: 'hc_explorer_module_detail',
                nonce: hcAdmin.nonce,
                slug: slug
            }).done(function (resp) {
                if (!resp || !resp.success) {
                    return;
                }

                state.favorites = resp.data.favorites || state.favorites;
                state.recent = resp.data.recent || state.recent;
                renderDrawer(resp.data.module);
            });
        }

        $(document).on('input', '#hc-explorer-search-input', hcDebounce(function () {
            state.search = $(this).val().trim();
            state.page = 1;
            fetchModules();
        }, 280));

        $(document).on('change', '#hc-explorer-status-filter, #hc-explorer-sort-by', function () {
            state.post_status = $('#hc-explorer-status-filter').val();
            state.sort_by = $('#hc-explorer-sort-by').val();
            state.page = 1;
            fetchModules();
        });

        $(document).on('click', '#hc-explorer-sort-dir', function () {
            state.sort_dir = state.sort_dir === 'asc' ? 'desc' : 'asc';
            $(this).attr('data-direction', state.sort_dir).text(state.sort_dir === 'asc' ? 'A-Z / Eski-Yeni' : 'Z-A / Yeni-Eski');
            fetchModules();
        });

        $(document).on('click', '#hc-sidebar-toggle', function () {
            var $sidebar = $('.hc-explorer-sidebar');
            var $layout = $('.hc-explorer-layout');
            var collapsed = $sidebar.hasClass('is-collapsed');
            $sidebar.toggleClass('is-collapsed', !collapsed);
            $layout.toggleClass('is-sidebar-collapsed', !collapsed);
            $(this).html(collapsed ? '&#8249;' : '&#8250;');
        });

        $(document).on('click', '[data-tree-toggle]', function (e) {
            e.stopPropagation();
            $(this).closest('.hc-explorer-tree-node').toggleClass('is-open');
        });

        $(document).on('click', '.hc-explorer-tree-item', function () {
            state.category = $(this).data('category') || '';
            state.page = 1;
            fetchModules();
            $('.hc-explorer-tree-item').removeClass('is-active');
            $(this).addClass('is-active');
        });

        $(document).on('click', '.hc-explorer-nav-item', function () {
            state.collection = $(this).data('collection') || '';
            state.page = 1;
            fetchModules();
            $('.hc-explorer-nav-item').removeClass('is-active');
            $(this).addClass('is-active');
        });

        $(document).on('click', '#hc-explorer-prev, #hc-explorer-next', function () {
            if (this.id === 'hc-explorer-prev' && state.page > 1) {
                state.page -= 1;
            }

            if (this.id === 'hc-explorer-next') {
                state.page += 1;
            }

            fetchModules();
        });

        $(document).on('click', '[data-module-open]', function () {
            openModule($(this).data('module-open'));
        });

        $(document).on('change', '.hc-explorer-row-check', function () {
            var slug = $(this).data('slug');
            if (this.checked) {
                selectedMap[slug] = true;
            } else {
                delete selectedMap[slug];
            }
            refreshSelectionBar();
        });

        $(document).on('change', '#hc-explorer-select-all', function () {
            var checked = this.checked;
            $('.hc-explorer-row-check').each(function () {
                $(this).prop('checked', checked).trigger('change');
            });
        });

        $(document).on('change', '#hc-explorer tbody .hc-category-select, #hc-explorer-gallery .hc-category-select, #hc-explorer-drawer .hc-category-select', function () {
            var slug = $(this).closest('[data-module-card]').data('slug');
            pendingAssignments[slug] = $(this).val() || '';
        });

        $(document).on('click', '#hc-explorer-bulk-apply', function () {
            var category = $('#hc-explorer-bulk-category').val();
            Object.keys(selectedMap).forEach(function (slug) {
                pendingAssignments[slug] = category;
                $('[data-module-card][data-slug="' + slug + '"]').find('.hc-category-select').val(category);
            });
            setStatus('Toplu kategori seçimi hazır. Kaydet ile kalıcı hale getirin.', 'success');
        });

        $(document).on('click', '#hc-explorer-bulk-draft', function () {
            Object.keys(selectedMap).forEach(function (slug) {
                $('[data-module-card][data-slug="' + slug + '"]').find('.hc-yazi-ekle-btn').first().trigger('click');
            });
        });

        $(document).on('click', '#hc-explorer-save-categories', function () {
            var $btn = $(this);
            var assignments = $.extend({}, pendingAssignments);

            $('#hc-explorer .hc-category-select').each(function () {
                assignments[$(this).closest('[data-module-card]').data('slug')] = $(this).val() || '';
            });

            $btn.prop('disabled', true).text(hcAdmin.savingCategories || 'Kategoriler kaydediliyor...');

            $.post(hcAdmin.ajaxurl, {
                action: 'hc_save_module_catalog_state',
                nonce: hcAdmin.nonce,
                hc_categories: $('#hc-categories').val(),
                assignments: assignments,
                hc_module_category: assignments
            }).done(function (resp) {
                $btn.prop('disabled', false).text('Kategori Değişikliklerini Kaydet');
                $('#hc-explorer-category-status').text((resp && resp.success && resp.data && resp.data.message) ? resp.data.message : (hcAdmin.savedCategories || 'Kategori değişiklikleri kaydedildi.'));
                pendingAssignments = {};
                fetchBootstrap();
            }).fail(function (xhr) {
                $btn.prop('disabled', false).text('Kategori Değişikliklerini Kaydet');
                $('#hc-explorer-category-status').text('Sunucu hatası: HTTP ' + xhr.status);
            });
        });

        $(document).on('click', '[data-favorite-toggle]', function () {
            var slug = $(this).data('favorite-toggle');
            var $btn = $(this);

            $.post(hcAdmin.ajaxurl, {
                action: 'hc_toggle_module_favorite',
                nonce: hcAdmin.nonce,
                slug: slug
            }).done(function (resp) {
                if (!resp || !resp.success) {
                    return;
                }

                state.favorites = resp.data.favorites || [];
                $btn.toggleClass('is-active', !!resp.data.active);
                fetchBootstrap();
            });
        });

        $(document).on('hc:module-deleted hc:draft-created', function () {
            fetchBootstrap();
        });

        setDrawerEmpty(true);
        fetchBootstrap();
    }

    hcInitExplorer();

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


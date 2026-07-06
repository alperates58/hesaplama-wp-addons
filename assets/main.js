/* Hesaplama Suite - global sonuc paylasim araclari */
(function () {
    'use strict';

    var PANEL_CLASS = 'hc-share-panel';
    var BUTTON_CLASS = 'hc-share-btn';

    function buildShareMessage(title) {
        return title + ' sonucumu hesapladim. Sen de buradan dene: ' + window.location.href;
    }

    function escapeHtml(text) {
        return String(text)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function copyText(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }

        return new Promise(function (resolve, reject) {
            var textarea = document.createElement('textarea');

            textarea.value = text;
            textarea.setAttribute('readonly', 'readonly');
            textarea.style.position = 'fixed';
            textarea.style.top = '-9999px';
            document.body.appendChild(textarea);
            textarea.select();

            try {
                document.execCommand('copy');
                document.body.removeChild(textarea);
                resolve();
            } catch (error) {
                document.body.removeChild(textarea);
                reject(error);
            }
        });
    }

    function inlineComputedStyles(source, target) {
        var computedStyle = window.getComputedStyle(source);
        var i;

        for (i = 0; i < computedStyle.length; i++) {
            var property = computedStyle[i];

            target.style.setProperty(
                property,
                computedStyle.getPropertyValue(property),
                computedStyle.getPropertyPriority(property)
            );
        }
    }

    function cloneNodeWithStyles(node) {
        var clone;
        var childNodes;
        var i;

        if (node.nodeType === Node.TEXT_NODE) {
            return document.createTextNode(node.textContent);
        }

        if (node.nodeType !== Node.ELEMENT_NODE) {
            return null;
        }

        clone = node.cloneNode(false);
        inlineComputedStyles(node, clone);
        childNodes = node.childNodes;

        for (i = 0; i < childNodes.length; i++) {
            var childClone = cloneNodeWithStyles(childNodes[i]);

            if (childClone) {
                clone.appendChild(childClone);
            }
        }

        return clone;
    }

    function loadImage(src) {
        return new Promise(function (resolve, reject) {
            var image = new Image();

            image.onload = function () {
                resolve(image);
            };

            image.onerror = reject;
            image.src = src;
        });
    }

    function canvasToBlob(canvas) {
        return new Promise(function (resolve, reject) {
            canvas.toBlob(function (blob) {
                if (blob) {
                    resolve(blob);
                    return;
                }

                reject(new Error('Gorsel olusturulamadi.'));
            }, 'image/png');
        });
    }

    async function renderNodeToBlob(resultElement) {
        var rect = resultElement.getBoundingClientRect();
        var scale = Math.min(window.devicePixelRatio || 1, 2);
        var width = Math.max(Math.ceil(rect.width), 320);
        var height = Math.max(Math.ceil(rect.height), 120);
        var wrapper = document.createElement('div');
        var clone = cloneNodeWithStyles(resultElement);
        var markup;
        var svg;
        var dataUrl;
        var image;
        var canvas;
        var context;

        wrapper.style.width = width + 'px';
        wrapper.style.height = height + 'px';
        wrapper.style.padding = '0';
        wrapper.style.margin = '0';
        wrapper.style.background = '#ffffff';
        wrapper.appendChild(clone);

        markup = new XMLSerializer().serializeToString(wrapper);
        svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' + width + '" height="' + height + '">' +
            '<foreignObject width="100%" height="100%">' +
            '<div xmlns="http://www.w3.org/1999/xhtml" style="width:' + width + 'px;height:' + height + 'px;background:#ffffff;">' +
            markup +
            '</div>' +
            '</foreignObject>' +
            '</svg>';

        dataUrl = 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg);
        image = await loadImage(dataUrl);

        canvas = document.createElement('canvas');
        canvas.width = width * scale;
        canvas.height = height * scale;
        context = canvas.getContext('2d');
        context.scale(scale, scale);
        context.fillStyle = '#ffffff';
        context.fillRect(0, 0, width, height);
        context.drawImage(image, 0, 0, width, height);

        return canvasToBlob(canvas);
    }

    function wrapText(context, text, x, y, maxWidth, lineHeight) {
        var words = text.split(/\s+/);
        var line = '';
        var i;

        for (i = 0; i < words.length; i++) {
            var testLine = line ? line + ' ' + words[i] : words[i];
            var width = context.measureText(testLine).width;

            if (width > maxWidth && line) {
                context.fillText(line, x, y);
                line = words[i];
                y += lineHeight;
            } else {
                line = testLine;
            }
        }

        if (line) {
            context.fillText(line, x, y);
            y += lineHeight;
        }

        return y;
    }

    async function renderTextFallbackToBlob(calculator, resultElement) {
        var title = getCalculatorTitle(calculator);
        var lines = resultElement.innerText
            .split('\n')
            .map(function (line) {
                return line.trim();
            })
            .filter(Boolean);
        var canvas = document.createElement('canvas');
        var width = 1080;
        var padding = 64;
        var lineHeight = 42;
        var titleHeight = 60;
        var footerHeight = 60;
        var height = padding * 2 + titleHeight + footerHeight + Math.max(lines.length, 1) * lineHeight;
        var context = canvas.getContext('2d');
        var i;
        var y;

        canvas.width = width;
        canvas.height = height;

        context.fillStyle = '#ffffff';
        context.fillRect(0, 0, width, height);
        context.strokeStyle = '#d8e1ee';
        context.lineWidth = 4;
        context.strokeRect(24, 24, width - 48, height - 48);

        context.fillStyle = '#1d3557';
        context.font = '700 42px Arial, sans-serif';
        context.fillText(title, padding, padding + 12);

        y = padding + titleHeight;
        context.fillStyle = '#24364b';
        context.font = '28px Arial, sans-serif';

        for (i = 0; i < lines.length; i++) {
            y = wrapText(context, lines[i], padding, y, width - padding * 2, lineHeight);
        }

        context.fillStyle = '#5b6b82';
        context.font = '24px Arial, sans-serif';
        context.fillText(window.location.href, padding, height - padding);

        return canvasToBlob(canvas);
    }

    async function renderResultToBlob(calculator, resultElement) {
        try {
            return await renderNodeToBlob(resultElement);
        } catch (error) {
            return renderTextFallbackToBlob(calculator, resultElement);
        }
    }

    function downloadBlob(blob, filename) {
        var url = URL.createObjectURL(blob);
        var link = document.createElement('a');

        link.href = url;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        window.setTimeout(function () {
            URL.revokeObjectURL(url);
        }, 1000);
    }

    function getCalculatorTitle(calculator) {
        var heading = calculator.querySelector('h3');
        return heading ? heading.textContent.trim() : 'Hesaplama Sonucu';
    }

    function hasMeaningfulResult(resultElement) {
        if (!resultElement) {
            return false;
        }

        if (resultElement.classList.contains('visible')) {
            return true;
        }

        return resultElement.textContent.trim().length > 0 || resultElement.children.length > 0;
    }

    function updatePanelVisibility(resultElement, panelElement) {
        panelElement.hidden = !hasMeaningfulResult(resultElement);
    }

    function findCalculatorRoot(element) {
        if (!element || element.nodeType !== 1) {
            return null;
        }

        if (element.classList.contains('hc-calculator')) {
            return element;
        }

        if (
            element.id &&
            element.id.indexOf('hc-') === 0 &&
            element.querySelector('h3') &&
            element.querySelector('.hc-result, [id$="-result"], [id*="sonuc"], #hc-result')
        ) {
            return element;
        }

        return null;
    }

    function buildShareUrl(platform, calculator) {
        var title = getCalculatorTitle(calculator);
        var url = window.location.href;
        var message = buildShareMessage(title);
        var encodedUrl = encodeURIComponent(url);
        var encodedMessage = encodeURIComponent(message);
        var encodedTitle = encodeURIComponent(title);

        if (platform === 'whatsapp') {
            return 'https://wa.me/?text=' + encodedMessage;
        }

        if (platform === 'telegram') {
            return 'https://t.me/share/url?url=' + encodedUrl + '&text=' + encodeURIComponent(title + ' sonucumu hesapladim.');
        }

        if (platform === 'facebook') {
            return 'https://www.facebook.com/sharer/sharer.php?u=' + encodedUrl;
        }

        if (platform === 'x') {
            return 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(title + ' sonucumu hesapladim.') + '&url=' + encodedUrl;
        }

        if (platform === 'email') {
            return 'mailto:?subject=' + encodedTitle + '&body=' + encodedMessage;
        }

        return '#';
    }

    async function shareWithNativeSheet(calculator, resultElement, options) {
        var title = getCalculatorTitle(calculator);
        var message = buildShareMessage(title);
        var blob;
        var file;

        options = options || {};

        if (!navigator.share) {
            return false;
        }

        try {
            blob = await renderResultToBlob(calculator, resultElement);
            file = new File([blob], 'hesaplama-sonucu.png', { type: 'image/png' });
        } catch (error) {
            return false;
        }

        try {
            if (navigator.canShare && navigator.canShare({ files: [file] })) {
                await navigator.share({
                    title: title,
                    text: message,
                    files: [file]
                });
                return true;
            }

            if (!options.allowLinkFallbackInSheet) {
                return false;
            }

            await navigator.share({
                title: title,
                text: message,
                url: window.location.href
            });
            return true;
        } catch (error) {
            if (error && error.name === 'AbortError') {
                return true;
            }

            return false;
        }
    }

    async function handleShare(calculator, resultElement) {
        var title = getCalculatorTitle(calculator);
        var message = buildShareMessage(title);
        var blob;
        var file;
        var sharedWithFile = false;

        try {
            blob = await renderResultToBlob(calculator, resultElement);
            file = new File([blob], 'hesaplama-sonucu.png', { type: 'image/png' });
        } catch (error) {
            try {
                await copyText(message);
            } catch (copyError) {
                // Sessizce devam et.
            }

            alert('Gorsel olusturulamadi. Paylasim mesaji kopyalandi.');
            return;
        }

        if (navigator.share) {
            try {
                if (navigator.canShare && navigator.canShare({ files: [file] })) {
                    await navigator.share({
                        title: title,
                        text: message,
                        files: [file]
                    });
                    sharedWithFile = true;
                    return;
                }

                await navigator.share({
                    title: title,
                    text: message,
                    url: window.location.href
                });
                return;
            } catch (error) {
                if (error && error.name === 'AbortError') {
                    return;
                }
            }
        }

        try {
            await copyText(message);
        } catch (copyFallbackError) {
            // Sessizce devam et.
        }

        downloadBlob(blob, 'hesaplama-sonucu.png');
        if (!sharedWithFile) {
            alert('Bu platform gorseli dogrudan ekleyemedi. Gorsel indirildi ve paylasim mesaji kopyalandi.');
        }
    }

    async function handleCopy(calculator) {
        var title = getCalculatorTitle(calculator);
        var message = buildShareMessage(title);

        try {
            await copyText(message);
            alert('Paylasim mesaji kopyalandi.');
        } catch (error) {
            alert('Paylasim mesaji kopyalanamadi.');
        }
    }

    async function handleDownload(calculator, resultElement) {
        try {
            var blob = await renderResultToBlob(calculator, resultElement);
            downloadBlob(blob, 'hesaplama-sonucu.png');
        } catch (error) {
            alert('Gorsel indirilemedi. Lutfen tekrar deneyin.');
        }
    }

    function getIconSvg(name) {
        var icons = {
            share: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 16a3 3 0 0 0-2.39 1.2l-6.7-3.35a3.1 3.1 0 0 0 0-1.7l6.7-3.35A3 3 0 1 0 15 7a3.1 3.1 0 0 0 .09.73l-6.7 3.35a3 3 0 1 0 0 1.84l6.7 3.35A3 3 0 1 0 18 16Z" fill="currentColor"/></svg>',
            copy: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 1H6a2 2 0 0 0-2 2v12h2V3h10V1Zm3 4H10a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2Zm0 16H10V7h9v14Z" fill="currentColor"/></svg>',
            download: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 20h14v-2H5v2Zm7-18v10.17l3.59-3.58L17 10l-5 5-5-5 1.41-1.41L11 12.17V2h1Z" fill="currentColor"/></svg>',
            whatsapp: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19.05 4.91A9.82 9.82 0 0 0 12.03 2C6.53 2 2.05 6.48 2.05 11.98c0 1.76.46 3.49 1.33 5.01L2 22l5.12-1.34a9.92 9.92 0 0 0 4.9 1.26h.01c5.5 0 9.98-4.48 9.98-9.98 0-2.66-1.04-5.16-2.96-7.03ZM12.03 20.24h-.01a8.24 8.24 0 0 1-4.2-1.15l-.3-.18-3.04.8.81-2.96-.2-.31a8.2 8.2 0 0 1-1.26-4.39c0-4.54 3.69-8.23 8.24-8.23 2.2 0 4.26.85 5.82 2.41a8.17 8.17 0 0 1 2.41 5.82c0 4.54-3.69 8.23-8.23 8.23Zm4.52-6.16c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.65.8-.8.97-.15.17-.29.19-.54.06-.25-.13-1.05-.39-2-1.25a7.46 7.46 0 0 1-1.38-1.72c-.15-.25-.02-.38.11-.5.11-.11.25-.29.38-.44.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.48-.4-.41-.56-.42h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.09s.9 2.42 1.02 2.59c.13.17 1.78 2.73 4.32 3.83.61.26 1.09.42 1.47.54.62.2 1.18.17 1.63.1.5-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.09-.23-.15-.48-.27Z" fill="currentColor"/></svg>',
            telegram: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21.94 4.66a1.5 1.5 0 0 0-1.67-.2L3.63 12.1a1.5 1.5 0 0 0 .17 2.78l4.14 1.42 1.57 4.78a1.5 1.5 0 0 0 2.63.47l2.4-3 4.41 3.23a1.5 1.5 0 0 0 2.35-.9l2.68-15.14a1.5 1.5 0 0 0-.04-1.08ZM10.8 18.05l-.7-2.12 7.66-7.46-5.97 8.39-.99 1.19Zm8.28 1.35-4.87-3.57a1.5 1.5 0 0 0-2.07.28l-.57.72-.68-2.05a1.5 1.5 0 0 0-.93-.95l-3.35-1.15 14.98-6.87L19.08 19.4Z" fill="currentColor"/></svg>',
            facebook: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3h-3.1V9.1c0-.87.24-1.46 1.5-1.46H17V4.96c-.38-.05-1.17-.12-2.23-.12-2.2 0-3.71 1.34-3.71 3.8V11H8.5v3h2.56v8h2.44Z" fill="currentColor"/></svg>',
            x: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.9 2H22l-6.77 7.74L23 22h-6.09l-4.78-6.25L6.66 22H3.55l7.24-8.28L1 2h6.24l4.32 5.71L18.9 2Zm-1.09 18h1.69L6.33 3.9H4.52L17.81 20Z" fill="currentColor"/></svg>',
            email: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4.24-8 5.34-8-5.34V6l8 5.33L20 6v2.24Z" fill="currentColor"/></svg>'
        };

        return icons[name] || '';
    }

    function buildSocialButton(platform, label) {
        return '<a class="' + BUTTON_CLASS + ' hc-share-btn--social hc-share-btn--' + platform + '" data-hc-social="' + platform + '" href="' + escapeHtml(platform) + '">' +
            '<span class="hc-share-btn-icon">' + getIconSvg(platform) + '</span>' +
            '<span>' + label + '</span>' +
            '</a>';
    }

    function createPanel(calculator, resultElement) {
        var panel = document.createElement('div');

        panel.className = PANEL_CLASS;
        panel.hidden = true;
        panel.innerHTML =
            '<div class="hc-share-title">Sonucu Paylas veya Islem Yap</div>' +
            '<div class="hc-share-actions">' +
                '<button type="button" class="' + BUTTON_CLASS + '" data-hc-share-action="share">' +
                    '<span class="hc-share-btn-icon">' + getIconSvg('share') + '</span><span>Paylas</span>' +
                '</button>' +
                '<button type="button" class="' + BUTTON_CLASS + '" data-hc-share-action="copy">' +
                    '<span class="hc-share-btn-icon">' + getIconSvg('copy') + '</span><span>Mesaji Kopyala</span>' +
                '</button>' +
                '<button type="button" class="' + BUTTON_CLASS + '" data-hc-share-action="download">' +
                    '<span class="hc-share-btn-icon">' + getIconSvg('download') + '</span><span>Gorseli Indir</span>' +
                '</button>' +
                buildSocialButton('facebook', 'Facebook') +
                buildSocialButton('x', 'X') +
                buildSocialButton('telegram', 'Telegram') +
                buildSocialButton('whatsapp', 'WhatsApp') +
                buildSocialButton('email', 'E-posta') +
            '</div>';

        panel.addEventListener('click', function (event) {
            var button = event.target.closest('button[data-hc-share-action]');
            var action;

            if (!button) {
                return;
            }

            action = button.getAttribute('data-hc-share-action');

            if (action === 'share') {
                handleShare(calculator, resultElement);
                return;
            }

            if (action === 'copy') {
                handleCopy(calculator);
                return;
            }

            if (action === 'download') {
                handleDownload(calculator, resultElement);
            }
        });

        panel.addEventListener('click', async function (event) {
            var link = event.target.closest('a[data-hc-social]');
            var platform;
            var shareUrl;
            var usedNativeShare;

            if (!link) {
                return;
            }

            event.preventDefault();
            platform = link.getAttribute('data-hc-social');

            if (platform === 'whatsapp') {
                usedNativeShare = await shareWithNativeSheet(calculator, resultElement, {
                    allowLinkFallbackInSheet: false
                });

                if (usedNativeShare) {
                    return;
                }
            }

            shareUrl = buildShareUrl(platform, calculator);
            window.open(shareUrl, '_blank', 'noopener,noreferrer,width=640,height=720');
        });

        resultElement.insertAdjacentElement('afterend', panel);
        return panel;
    }

    function setupCalculator(calculator) {
        var resultElement = calculator.querySelector('.hc-result, [id$="-result"], [id*="sonuc"], #hc-result');
        var observer;
        var panel;

        if (!resultElement || calculator.getAttribute('data-hc-share-ready') === '1') {
            return;
        }

        calculator.setAttribute('data-hc-share-ready', '1');
        panel = createPanel(calculator, resultElement);
        updatePanelVisibility(resultElement, panel);

        observer = new MutationObserver(function () {
            updatePanelVisibility(resultElement, panel);
        });

        observer.observe(resultElement, {
            attributes: true,
            attributeFilter: ['class'],
            childList: true,
            subtree: true,
            characterData: true
        });
    }

    // ── Result Engine Mimari Standart (Faz 2E) ──────────────────────────
    window.HC = window.HC || {};

    function getSafeModuleName(slug) {
        if (!slug) return '';
        // 1. Check templates registry
        var templates = window.hcTemplates || [];
        var tpl = templates.find(function (t) { return t.module_slug === slug; });
        if (tpl && tpl.name) return tpl.name;

        // 2. Check module registry (supports module_name and name keys)
        if (window.hcRegistry && window.hcRegistry[slug]) {
            if (window.hcRegistry[slug].module_name) return window.hcRegistry[slug].module_name;
            if (window.hcRegistry[slug].name) return window.hcRegistry[slug].name;
        }

        // 3. Fallback: Slug to readable title
        var parts = slug.split('-');
        var capitalized = parts.map(function (p) {
            if (!p) return '';
            return p.charAt(0).toUpperCase() + p.slice(1);
        });
        return capitalized.join(' ');
    }

    window.HC.ResultEngine = {
        version: "1.0.1",

        render: function (slug, data, targetSelector) {
            // 1. Feature Flag Check
            if (!window.hcConfig || !window.hcConfig.resultEngineEnabled) {
                return false;
            }

            // 2. Registry Validation (Only ready_for_pilot templates)
            var templates = window.hcTemplates || [];
            var tpl = templates.find(function (t) { return t.module_slug === slug; });
            if (!tpl || tpl.content_review_status !== "ready_for_pilot") {
                return false;
            }

            try {
                var target = document.querySelector(targetSelector) || 
                             document.querySelector('#hc-' + slug + ' .hc-result') || 
                             document.getElementById('hc-' + slug + '-result');
                if (!target) return false;

                var html = '';
                var severity = (data.metadata && data.metadata.severity && data.metadata.severity !== 'undefined') ? data.metadata.severity : 'info';

                // Base Card Block
                html += '<div class="hc-rt-card hc-rt-card--' + escapeHtml(severity) + '">';

                // Header Block
                html += '<div class="hc-rt-header">';
                if (tpl.result_sections_enabled.result_title) {
                    var titleText = data.title || getSafeModuleName(slug);
                    if (titleText && titleText !== 'undefined') {
                        html += '<h4 class="hc-rt-title">' + escapeHtml(titleText) + '</h4>';
                    }
                }

                // Badges
                var badges = (data.metadata && data.metadata.badges) ? data.metadata.badges : [];
                if (badges && badges.length > 0) {
                    var validBadges = badges.filter(function (b) { return b && b !== 'undefined'; });
                    if (validBadges.length > 0) {
                        html += '<div class="hc-rt-badges">';
                        validBadges.forEach(function (b) {
                            html += '<span class="hc-rt-badge hc-rt-badge--highlight">' + escapeHtml(b) + '</span>';
                        });
                        html += '</div>';
                    }
                }
                html += '</div>';

                // Primary Result Block
                if (tpl.result_sections_enabled.primary_result && data.primaryResult && data.primaryResult !== 'undefined') {
                    html += '<div class="hc-rt-primary" aria-live="polite" aria-atomic="true">' + escapeHtml(data.primaryResult) + '</div>';
                }

                // Short Summary Block
                if (tpl.result_sections_enabled.short_summary && data.shortSummary && data.shortSummary !== 'undefined') {
                    html += '<section class="hc-rt-section">';
                    html += '<div class="hc-rt-section-body"><strong>' + escapeHtml(data.shortSummary) + '</strong></div>';
                    html += '</section>';
                }

                // Interpretation Block
                if (tpl.result_sections_enabled.interpretation && data.interpretation && data.interpretation !== 'undefined') {
                    html += '<section class="hc-rt-section">';
                    html += '<h5 class="hc-rt-section-title">Değerlendirme</h5>';
                    html += '<div class="hc-rt-section-body">' + data.interpretation + '</div>';
                    html += '</section>';
                }

                // Reference Table Block
                if (tpl.result_sections_enabled.reference_table && data.referenceTable && data.referenceTable.rows && data.referenceTable.rows.length > 0) {
                    html += '<section class="hc-rt-section">';
                    html += '<h5 class="hc-rt-section-title">Referans Değerleri</h5>';
                    html += '<div class="hc-rt-table-wrapper">';
                    html += '<table class="hc-rt-table">';
                    if (data.referenceTable.headers && data.referenceTable.headers.length > 0) {
                        html += '<thead><tr>';
                        data.referenceTable.headers.forEach(function (h) {
                            html += '<th scope="col">' + escapeHtml(h || '') + '</th>';
                        });
                        html += '</tr></thead>';
                    }
                    html += '<tbody>';
                    data.referenceTable.rows.forEach(function (row, rIndex) {
                        if (!row || row.length === 0) return;
                        var trClass = (data.referenceTable.highlightedRowIndex === rIndex) ? ' class="hc-rt-row-highlight"' : '';
                        html += '<tr' + trClass + '>';
                        row.forEach(function (cell) {
                            html += '<td>' + escapeHtml(cell || '') + '</td>';
                        });
                        html += '</tr>';
                    });
                    html += '</tbody></table></div></section>';
                }

                // Formula Explanation Block
                if (tpl.result_sections_enabled.formula_explanation && data.formula && (data.formula.raw || data.formula.text)) {
                    html += '<section class="hc-rt-section">';
                    html += '<h5 class="hc-rt-section-title">Formül ve Hesaplama Yöntemi</h5>';
                    html += '<div class="hc-rt-section-body">';
                    if (data.formula.raw && data.formula.raw !== 'undefined') {
                        html += '<code>' + escapeHtml(data.formula.raw) + '</code><br><br>';
                    }
                    if (data.formula.text && data.formula.text !== 'undefined') {
                        html += escapeHtml(data.formula.text);
                    }
                    html += '</div></section>';
                }

                // Example Calculation Block
                if (tpl.result_sections_enabled.example_calculation && data.example && data.example !== 'undefined') {
                    html += '<section class="hc-rt-section">';
                    html += '<h5 class="hc-rt-section-title">Örnek Senaryo</h5>';
                    html += '<div class="hc-rt-section-body">' + escapeHtml(data.example) + '</div>';
                    html += '</section>';
                }

                // Source Note Block
                if (tpl.result_sections_enabled.source_note && data.source && data.source.name && data.source.name !== 'undefined') {
                    html += '<section class="hc-rt-section">';
                    html += '<h5 class="hc-rt-section-title">Resmi Kaynak</h5>';
                    html += '<div class="hc-rt-section-body">';
                    if (data.source.url && data.source.url !== 'undefined') {
                        html += '<a href="' + escapeHtml(data.source.url) + '" target="_blank" rel="noopener noreferrer" style="color:var(--hc-rt-color-info); font-weight:600;">' + escapeHtml(data.source.name) + ' ↗</a>';
                    } else {
                        html += escapeHtml(data.source.name);
                    }
                    html += '</div></section>';
                }

                // Disclaimer Block
                if (tpl.result_sections_enabled.disclaimer) {
                    var discType = '';
                    if (window.hcRegistry && window.hcRegistry[slug]) {
                        discType = window.hcRegistry[slug].target_disclaimer_type || window.hcRegistry[slug].disclaimer_type;
                    }
                    var discData = (discType && window.hcDisclaimers && window.hcDisclaimers[discType]) ? window.hcDisclaimers[discType] : null;
                    if (discData && discData.title && discData.text && discData.title !== 'undefined' && discData.text !== 'undefined') {
                        html += '<div class="hc-rt-disclaimer">';
                        html += '<div><strong>' + escapeHtml(discData.title) + ':</strong> ' + escapeHtml(discData.text) + '</div>';
                        html += '</div>';
                    }
                }

                // Next Actions Block
                if (tpl.result_sections_enabled.next_actions && data.nextActions && data.nextActions.length > 0) {
                    var actionsHtml = '';
                    data.nextActions.forEach(function (act) {
                        if (act && act !== 'undefined') {
                            actionsHtml += '<li class="hc-rt-action-item">' + escapeHtml(act) + '</li>';
                        }
                    });
                    if (actionsHtml) {
                        html += '<section class="hc-rt-section">';
                        html += '<h5 class="hc-rt-section-title">Önerilen Adımlar</h5>';
                        html += '<ul class="hc-rt-next-actions">' + actionsHtml + '</ul>';
                        html += '</section>';
                    }
                }

                // Related Calculators Block
                if (tpl.result_sections_enabled.related_calculators && tpl.related_calculators && tpl.related_calculators.length > 0) {
                    var relatedHtml = '';
                    tpl.related_calculators.forEach(function (relSlug) {
                        if (!relSlug) return;
                        var relName = getSafeModuleName(relSlug);
                        if (!relName || relName === 'undefined') return;
                        relatedHtml += '<a href="../' + escapeHtml(relSlug) + '/" class="hc-rt-related-link">' + escapeHtml(relName) + '</a>';
                    });
                    if (relatedHtml) {
                        html += '<section class="hc-rt-section">';
                        html += '<h5 class="hc-rt-section-title">İlgili Hesaplayıcılar</h5>';
                        html += '<div class="hc-rt-related-list">' + relatedHtml + '</div>';
                        html += '</section>';
                    }
                }

                // FAQ Block
                if (tpl.result_sections_enabled.faq_snippets && data.faq && data.faq.length > 0) {
                    var faqHtml = '';
                    data.faq.forEach(function (f) {
                        if (f && f.question && f.answer && f.question !== 'undefined' && f.answer !== 'undefined') {
                            faqHtml += '<details class="hc-rt-faq-item">';
                            faqHtml += '<summary>' + escapeHtml(f.question) + '</summary>';
                            faqHtml += '<div class="hc-rt-faq-answer">' + escapeHtml(f.answer) + '</div>';
                            faqHtml += '</details>';
                        }
                    });
                    if (faqHtml) {
                        html += '<section class="hc-rt-section">';
                        html += '<h5 class="hc-rt-section-title">Sıkça Sorulan Sorular</h5>';
                        html += faqHtml;
                        html += '</section>';
                    }
                }

                html += '</div>'; // End card

                target.innerHTML = html;
                target.classList.add('visible');
                return true;
            } catch (err) {
                console.error("HC ResultEngine Render Error: ", err);
                return false;
            }
        },

        update: function (slug, data) {
            return this.render(slug, data);
        },

        destroy: function (slug) {
            var target = document.querySelector('#hc-' + slug + ' .hc-result') || document.getElementById('hc-' + slug + '-result');
            if (target) {
                target.innerHTML = '';
                target.classList.remove('visible');
                return true;
            }
            return false;
        }
    };

    // ── Merkezi Yapı Yardımcıları ────────────────────────────────────────

    window.hcGetFormulaConstant = function (key, defaultValue) {
        if (window.hcCentralData && window.hcCentralData.dictionary && typeof window.hcCentralData.dictionary[key] !== 'undefined') {
            return window.hcCentralData.dictionary[key];
        }
        return typeof defaultValue !== 'undefined' ? defaultValue : null;
    };

    function initCategoryDisclaimers() {
        var boxes = document.querySelectorAll('.hc-disclaimer-box');
        var i;

        if (boxes.length === 0) {
            return;
        }

        if (!window.hcCentralData || !window.hcCentralData.disclaimers) {
            return;
        }

        // Inject disclaimer CSS
        if (!document.getElementById('hc-disclaimer-styles')) {
            var style = document.createElement('style');
            style.id = 'hc-disclaimer-styles';
            style.textContent = 
                '.hc-disclaimer-box { margin-top: 24px; padding: 16px 20px; border-radius: 12px; border-left: 5px solid #667085; background-color: #f8fafc; font-size: 13.5px; color: #334155; line-height: 1.6; text-align: left; }' +
                '.hc-disclaimer-title { font-weight: 700; margin-bottom: 6px; color: #1e293b; font-size: 14.5px; }' +
                '.hc-disclaimer-health { border-left-color: #c0362c; background-color: #fef2f2; }' +
                '.hc-disclaimer-health .hc-disclaimer-title { color: #991b1b; }' +
                '.hc-disclaimer-legal { border-left-color: #c98905; background-color: #fffbeb; }' +
                '.hc-disclaimer-legal .hc-disclaimer-title { color: #92400e; }' +
                '.hc-disclaimer-finance { border-left-color: #155eef; background-color: #eff6ff; }' +
                '.hc-disclaimer-finance .hc-disclaimer-title { color: #1e40af; }' +
                '.hc-disclaimer-tax, .hc-disclaimer-sgk { border-left-color: #0f8a5f; background-color: #f0fdf4; }' +
                '.hc-disclaimer-tax .hc-disclaimer-title, .hc-disclaimer-sgk .hc-disclaimer-title { color: #166534; }' +
                '.hc-disclaimer-automotive { border-left-color: #eab308; background-color: #fefce8; }' +
                '.hc-disclaimer-automotive .hc-disclaimer-title { color: #854d0e; }' +
                '.hc-disclaimer-engineering { border-left-color: #0f172a; background-color: #f1f5f9; }' +
                '.hc-disclaimer-engineering .hc-disclaimer-title { color: #0f172a; }';
            document.head.appendChild(style);
        }

        for (i = 0; i < boxes.length; i++) {
            var box = boxes[i];
            var type = box.getAttribute('data-hc-disclaimer-type');
            if (type && window.hcCentralData.disclaimers[type]) {
                var data = window.hcCentralData.disclaimers[type];
                box.className = 'hc-disclaimer-box ' + (data.css_class || '');
                box.innerHTML = '<div class="hc-disclaimer-title">' + escapeHtml(data.title) + '</div>' +
                                '<div class="hc-disclaimer-text">' + escapeHtml(data.text) + '</div>';
            }
        }
    }

    function initSharePanels() {
        var calculators = document.querySelectorAll('.hc-calculator, [id^="hc-"]');
        var i;

        for (i = 0; i < calculators.length; i++) {
            var root = findCalculatorRoot(calculators[i]);

            if (root) {
                setupCalculator(root);
            }
        }
    }

    function initCentralizedFeatures() {
        initSharePanels();
        initCategoryDisclaimers();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCentralizedFeatures);
        return;
    }

    initCentralizedFeatures();
})();

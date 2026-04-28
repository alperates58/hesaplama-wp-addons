/* Hesaplama Suite - global sonuc paylasim araclari */
(function () {
    'use strict';

    var PANEL_CLASS = 'hc-share-panel';
    var BUTTON_CLASS = 'hc-share-btn';

    function buildShareMessage(title) {
        return title + ' sonucumu hesapladım. Sen de buradan dene: ' + window.location.href;
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

    function canvasToBlob(canvas) {
        return new Promise(function (resolve, reject) {
            canvas.toBlob(function (blob) {
                if (blob) {
                    resolve(blob);
                    return;
                }

                reject(new Error('Görsel oluşturulamadı.'));
            }, 'image/png');
        });
    }

    async function renderResultToBlob(resultElement) {
        var rect = resultElement.getBoundingClientRect();
        var scale = Math.min(window.devicePixelRatio || 1, 2);
        var width = Math.max(Math.ceil(rect.width), 320);
        var height = Math.max(Math.ceil(rect.height), 120);
        var wrapper = document.createElement('div');
        var clone = cloneNodeWithStyles(resultElement);
        var serialized;
        var svgMarkup;
        var svgBlob;
        var imageUrl;
        var image;
        var canvas;
        var context;

        wrapper.setAttribute('xmlns', 'http://www.w3.org/1999/xhtml');
        wrapper.style.width = width + 'px';
        wrapper.style.height = height + 'px';
        wrapper.style.padding = '0';
        wrapper.style.margin = '0';
        wrapper.style.background = '#ffffff';
        wrapper.appendChild(clone);

        serialized = new XMLSerializer().serializeToString(wrapper)
            .replace(/#/g, '%23')
            .replace(/\n/g, '%0A');

        svgMarkup = '<svg xmlns="http://www.w3.org/2000/svg" width="' + width + '" height="' + height + '">' +
            '<foreignObject width="100%" height="100%">' + serialized + '</foreignObject>' +
            '</svg>';

        svgBlob = new Blob([svgMarkup], { type: 'image/svg+xml;charset=utf-8' });
        imageUrl = URL.createObjectURL(svgBlob);
        image = new Image();
        image.decoding = 'sync';

        await new Promise(function (resolve, reject) {
            image.onload = resolve;
            image.onerror = reject;
            image.src = imageUrl;
        });

        canvas = document.createElement('canvas');
        canvas.width = width * scale;
        canvas.height = height * scale;
        context = canvas.getContext('2d');
        context.scale(scale, scale);
        context.fillStyle = '#ffffff';
        context.fillRect(0, 0, width, height);
        context.drawImage(image, 0, 0, width, height);

        URL.revokeObjectURL(imageUrl);

        return canvasToBlob(canvas);
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

    function updatePanelVisibility(resultElement, panelElement) {
        panelElement.hidden = !resultElement.classList.contains('visible');
    }

    async function handleShare(calculator, resultElement) {
        var title = getCalculatorTitle(calculator);
        var message = buildShareMessage(title);
        var blob;
        var file;

        try {
            blob = await renderResultToBlob(resultElement);
            file = new File([blob], 'hesaplama-sonucu.png', { type: 'image/png' });
        } catch (error) {
            alert('Sonucun görseli oluşturulamadı. Lütfen tekrar deneyin.');
            return;
        }

        if (navigator.share && navigator.canShare && navigator.canShare({ files: [file] })) {
            try {
                await navigator.share({
                    title: title,
                    text: message,
                    url: window.location.href,
                    files: [file]
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
        } catch (error) {
            // Kopyalama desteklenmezse sessizce devam et.
        }

        downloadBlob(blob, 'hesaplama-sonucu.png');
        alert('Cihazınız görselli paylaşımı doğrudan desteklemiyor. Görsel indirildi ve paylaşım mesajı kopyalandı.');
    }

    async function handleCopy(calculator) {
        var title = getCalculatorTitle(calculator);
        var message = buildShareMessage(title);

        try {
            await copyText(message);
            alert('Paylaşım mesajı kopyalandı.');
        } catch (error) {
            alert('Paylaşım mesajı kopyalanamadı.');
        }
    }

    async function handleDownload(resultElement) {
        try {
            var blob = await renderResultToBlob(resultElement);
            downloadBlob(blob, 'hesaplama-sonucu.png');
        } catch (error) {
            alert('Görsel indirilemedi. Lütfen tekrar deneyin.');
        }
    }

    function createPanel(calculator, resultElement) {
        var panel = document.createElement('div');

        panel.className = PANEL_CLASS;
        panel.hidden = true;
        panel.innerHTML =
            '<div class="hc-share-title">Sonucu paylaş</div>' +
            '<div class="hc-share-actions">' +
                '<button type="button" class="' + BUTTON_CLASS + '" data-hc-share-action="share">Paylaş</button>' +
                '<button type="button" class="' + BUTTON_CLASS + '" data-hc-share-action="copy">Mesajı Kopyala</button>' +
                '<button type="button" class="' + BUTTON_CLASS + '" data-hc-share-action="download">Görseli İndir</button>' +
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
                handleDownload(resultElement);
            }
        });

        resultElement.insertAdjacentElement('afterend', panel);
        return panel;
    }

    function setupCalculator(calculator) {
        var resultElement = calculator.querySelector('.hc-result');
        var observer;
        var panel;

        if (!resultElement) {
            return;
        }

        panel = createPanel(calculator, resultElement);
        updatePanelVisibility(resultElement, panel);

        observer = new MutationObserver(function () {
            updatePanelVisibility(resultElement, panel);
        });

        observer.observe(resultElement, {
            attributes: true,
            attributeFilter: ['class']
        });
    }

    function initSharePanels() {
        var calculators = document.querySelectorAll('.hc-calculator');
        var i;

        for (i = 0; i < calculators.length; i++) {
            setupCalculator(calculators[i]);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSharePanels);
        return;
    }

    initSharePanels();
})();

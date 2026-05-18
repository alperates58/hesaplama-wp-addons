function hcHy3HedefDegisti() {
    var hedef = document.getElementById('hc-hy3-hedef').value;
    var girdiler = document.getElementById('hc-hy3-girdiler');
    
    if (hedef === 'kuvvet') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-hy3-sabitle">Yay Sabiti (k - N/m)</label>' +
            '<input type="number" step="any" id="hc-hy3-sabitle" placeholder="Örn: 150" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-hy3-uzama">Uzama Miktarı (x - metre)</label>' +
            '<input type="number" step="any" id="hc-hy3-uzama" placeholder="Örn: 0.2" required>' +
            '</div>';
    } else if (hedef === 'sabitle') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-hy3-kuvvet">Yay Kuvveti (F - Newton)</label>' +
            '<input type="number" step="any" id="hc-hy3-kuvvet" placeholder="Örn: 30" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-hy3-uzama">Uzama Miktarı (x - metre)</label>' +
            '<input type="number" step="any" id="hc-hy3-uzama" placeholder="Örn: 0.2" required>' +
            '</div>';
    } else {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-hy3-kuvvet">Yay Kuvveti (F - Newton)</label>' +
            '<input type="number" step="any" id="hc-hy3-kuvvet" placeholder="Örn: 30" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-hy3-sabitle">Yay Sabiti (k - N/m)</label>' +
            '<input type="number" step="any" id="hc-hy3-sabitle" placeholder="Örn: 150" required>' +
            '</div>';
    }
}

function hcHookeYasasiHesapla() {
    var hedef = document.getElementById('hc-hy3-hedef').value;
    var resultDiv = document.getElementById('hc-hooke-yasasi-hesaplama-result');
    var finalVal = 0;
    var html = '';
    
    if (hedef === 'kuvvet') {
        var k = parseFloat(document.getElementById('hc-hy3-sabitle').value);
        var x = parseFloat(document.getElementById('hc-hy3-uzama').value);
        if (isNaN(k) || k <= 0 || isNaN(x)) {
            alert('Lütfen geçerli değerler giriniz.');
            return;
        }
        // F = k * x
        finalVal = k * x;
        html = '<p><strong>Hesaplanan Yay Kuvveti (F):</strong> <span class="hc-result-value">' + finalVal.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' N</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">F = k · x formülüne göre hesaplanmıştır.</p>';
    } else if (hedef === 'sabitle') {
        var F = parseFloat(document.getElementById('hc-hy3-kuvvet').value);
        var x = parseFloat(document.getElementById('hc-hy3-uzama').value);
        if (isNaN(F) || isNaN(x) || x === 0) {
            alert('Lütfen geçerli değerler giriniz (Uzama miktarı 0 olamaz).');
            return;
        }
        // k = F / x
        finalVal = Math.abs(F / x);
        html = '<p><strong>Hesaplanan Yay Sabiti (k):</strong> <span class="hc-result-value">' + finalVal.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' N/m</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">k = F / x formülüne göre hesaplanmıştır.</p>';
    } else {
        var F = parseFloat(document.getElementById('hc-hy3-kuvvet').value);
        var k = parseFloat(document.getElementById('hc-hy3-sabitle').value);
        if (isNaN(F) || isNaN(k) || k <= 0) {
            alert('Lütfen geçerli değerler giriniz (Yay sabiti sıfırdan büyük olmalıdır).');
            return;
        }
        // x = F / k
        finalVal = F / k;
        var finalCm = finalVal * 100;
        html = '<p><strong>Hesaplanan Uzama Miktarı (x):</strong> <span class="hc-result-value">' + finalVal.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' m</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Birim</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Metre (m)</td>' +
                        '<td>' + finalVal.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' m</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Santimetre (cm)</td>' +
                        '<td>' + finalCm.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' cm</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' + html;
    resultDiv.classList.add('visible');
}

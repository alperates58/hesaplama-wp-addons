function hcIgeTipDegisti() {
    var tip = document.getElementById('hc-ige-tip').value;
    var girdiler = document.getElementById('hc-ige-girdiler');
    
    var html = '';
    if (tip === 'is-guc') {
        html = '<div class="hc-form-group">' +
            '<label for="hc-ige-kuvvet">Kuvvet (F - Newton)</label>' +
            '<input type="number" step="any" id="hc-ige-kuvvet" value="100" placeholder="N" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ige-yol">Mesafe (d - metre)</label>' +
            '<input type="number" step="any" id="hc-ige-yol" value="10" placeholder="m" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ige-sure">Geçen Süre (t - saniye)</label>' +
            '<input type="number" step="any" id="hc-ige-sure" value="5" placeholder="s" required>' +
            '</div>';
    } else if (tip === 'potansiyel') {
        html = '<div class="hc-form-group">' +
            '<label for="hc-ige-kutle">Kütle (m - kg)</label>' +
            '<input type="number" step="any" id="hc-ige-kutle" value="5" placeholder="kg" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ige-yukseklik">Yükseklik (h - metre)</label>' +
            '<input type="number" step="any" id="hc-ige-yukseklik" value="10" placeholder="m" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ige-yercekimi">Yerçekimi İvmesi (g - m/s²)</label>' +
            '<input type="number" step="any" id="hc-ige-yercekimi" value="9.80665" placeholder="Dünya: 9.80665" required>' +
            '</div>';
    } else {
        html = '<div class="hc-form-group">' +
            '<label for="hc-ige-kutle">Kütle (m - kg)</label>' +
            '<input type="number" step="any" id="hc-ige-kutle" value="5" placeholder="kg" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ige-hiz">Hız (v - m/s)</label>' +
            '<input type="number" step="any" id="hc-ige-hiz" value="10" placeholder="m/s" required>' +
            '</div>';
    }
    
    girdiler.innerHTML = html;
}

function hcIsGucVeEnerjiHesapla() {
    var tip = document.getElementById('hc-ige-tip').value;
    var resultDiv = document.getElementById('hc-is-guc-ve-enerji-hesaplama-result');
    var html = '';
    
    if (tip === 'is-guc') {
        var F = parseFloat(document.getElementById('hc-ige-kuvvet').value);
        var d = parseFloat(document.getElementById('hc-ige-yol').value);
        var t = parseFloat(document.getElementById('hc-ige-sure').value);
        if (isNaN(F) || isNaN(d) || isNaN(t) || t <= 0) {
            alert('Lütfen geçerli değerler giriniz (Süre pozitif olmalıdır).');
            return;
        }
        var W = F * d;
        var P = W / t;
        html = '<p><strong>Yapılan İş (W):</strong> <span class="hc-result-value">' + W.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' J</span></p>' +
            '<p><strong>Üretilen Güç (P):</strong> <span class="hc-result-value" style="color: var(--hc-front-gold);">' + P.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' W</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">W = F · d  ve  P = W / t formülleri kullanılmıştır.</p>';
    } else if (tip === 'potansiyel') {
        var m = parseFloat(document.getElementById('hc-ige-kutle').value);
        var h = parseFloat(document.getElementById('hc-ige-yukseklik').value);
        var g = parseFloat(document.getElementById('hc-ige-yercekimi').value);
        if (isNaN(m) || m <= 0 || isNaN(h) || isNaN(g) || g <= 0) {
            alert('Lütfen geçerli pozitif kütle, yükseklik ve yerçekimi değerleri giriniz.');
            return;
        }
        var PE = m * g * h;
        html = '<p><strong>Potansiyel Enerji (PE):</strong> <span class="hc-result-value">' + PE.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' J</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">PE = m · g · h formülüyle hesaplanmıştır.</p>';
    } else {
        var m = parseFloat(document.getElementById('hc-ige-kutle').value);
        var v = parseFloat(document.getElementById('hc-ige-hiz').value);
        if (isNaN(m) || m <= 0 || isNaN(v)) {
            alert('Lütfen geçerli pozitif kütle ve hız değerleri giriniz.');
            return;
        }
        var KE = 0.5 * m * Math.pow(v, 2);
        html = '<p><strong>Kinetik Enerji (KE):</strong> <span class="hc-result-value">' + KE.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' J</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">KE = 0.5 · m · v² formülüyle hesaplanmıştır.</p>';
    }
    
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' + html;
    resultDiv.classList.add('visible');
}

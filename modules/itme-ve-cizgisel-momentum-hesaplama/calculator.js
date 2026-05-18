function hcIcmTipDegisti() {
    var tip = document.getElementById('hc-icm-tip').value;
    var girdiler = document.getElementById('hc-icm-girdiler');
    
    var html = '';
    if (tip === 'momentum') {
        html = '<div class="hc-form-group">' +
            '<label for="hc-icm-kutle">Kütle (m - kg)</label>' +
            '<input type="number" step="any" id="hc-icm-kutle" value="10" placeholder="kg" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-icm-hiz">Hız (v - m/s)</label>' +
            '<input type="number" step="any" id="hc-icm-hiz" value="5" placeholder="m/s" required>' +
            '</div>';
    } else if (tip === 'itme-kuvvet') {
        html = '<div class="hc-form-group">' +
            '<label for="hc-icm-kuvvet">Ortalama Kuvvet (F - Newton)</label>' +
            '<input type="number" step="any" id="hc-icm-kuvvet" value="50" placeholder="N" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-icm-sure">Etki Süresi (Δt - saniye)</label>' +
            '<input type="number" step="any" id="hc-icm-sure" value="2" placeholder="s" required>' +
            '</div>';
    } else {
        html = '<div class="hc-form-group">' +
            '<label for="hc-icm-kutle">Kütle (m - kg)</label>' +
            '<input type="number" step="any" id="hc-icm-kutle" value="10" placeholder="kg" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-icm-vilk">İlk Hız (vi - m/s)</label>' +
            '<input type="number" step="any" id="hc-icm-vilk" value="2" placeholder="m/s" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-icm-vson">Son Hız (vf - m/s)</label>' +
            '<input type="number" step="any" id="hc-icm-vson" value="8" placeholder="m/s" required>' +
            '</div>';
    }
    
    girdiler.innerHTML = html;
}

function hcItmeVeCizgiselMomentumHesapla() {
    var tip = document.getElementById('hc-icm-tip').value;
    var resultDiv = document.getElementById('hc-itme-ve-cizgisel-momentum-hesaplama-result');
    var html = '';
    
    if (tip === 'momentum') {
        var m = parseFloat(document.getElementById('hc-icm-kutle').value);
        var v = parseFloat(document.getElementById('hc-icm-hiz').value);
        if (isNaN(m) || m <= 0 || isNaN(v)) {
            alert('Lütfen geçerli pozitif kütle ve hız değerleri giriniz.');
            return;
        }
        var p = m * v;
        html = '<p><strong>Çizgisel Momentum (p):</strong> <span class="hc-result-value">' + p.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg·m/s</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">p = m · v formülüyle hesaplanmıştır.</p>';
    } else if (tip === 'itme-kuvvet') {
        var F = parseFloat(document.getElementById('hc-icm-kuvvet').value);
        var dt = parseFloat(document.getElementById('hc-icm-sure').value);
        if (isNaN(F) || isNaN(dt) || dt <= 0) {
            alert('Lütfen geçerli kuvvet ve pozitif süre değerleri giriniz.');
            return;
        }
        var I = F * dt;
        html = '<p><strong>İtme (I):</strong> <span class="hc-result-value">' + I.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' N·s</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">I = F · Δt formülüyle hesaplanmıştır (İtme birimi N·s veya kg·m/s olarak ifade edilebilir).</p>';
    } else {
        var m = parseFloat(document.getElementById('hc-icm-kutle').value);
        var vi = parseFloat(document.getElementById('hc-icm-vilk').value);
        var vf = parseFloat(document.getElementById('hc-icm-vson').value);
        if (isNaN(m) || m <= 0 || isNaN(vi) || isNaN(vf)) {
            alert('Lütfen geçerli pozitif kütle ve hız değerleri giriniz.');
            return;
        }
        var dv = vf - vi;
        var I = m * dv;
        html = '<p><strong>İtme (I):</strong> <span class="hc-result-value">' + I.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg·m/s</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr><th>Parametre</th><th>Değer</th></tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr><td>Hız Değişimi (Δv)</td><td>' + dv.toLocaleString('tr-TR') + ' m/s</td></tr>' +
                    '<tr><td>İlk Momentum (pi)</td><td>' + (m * vi).toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg·m/s</td></tr>' +
                    '<tr><td>Son Momentum (pf)</td><td>' + (m * vf).toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg·m/s</td></tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' + html;
    resultDiv.classList.add('visible');
}

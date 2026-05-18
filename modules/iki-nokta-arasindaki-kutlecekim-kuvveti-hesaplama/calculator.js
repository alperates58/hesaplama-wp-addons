function hcInkkM1Secildi() {
    var val = document.getElementById('hc-inkk-m1-pres').value;
    if (val) {
        document.getElementById('hc-inkk-m1').value = val;
    }
}

function hcInkkM2Secildi() {
    var val = document.getElementById('hc-inkk-m2-pres').value;
    if (val) {
        document.getElementById('hc-inkk-m2').value = val;
    }
}

function hcInkkMesafeSecildi() {
    var val = document.getElementById('hc-inkk-mesafe-pres').value;
    if (val) {
        document.getElementById('hc-inkk-mesafe').value = val;
    }
}

function hcIkiNoktaArasindakiKutlecekimKuvvetiHesapla() {
    var m1 = parseFloat(document.getElementById('hc-inkk-m1').value);
    var m2 = parseFloat(document.getElementById('hc-inkk-m2').value);
    var r = parseFloat(document.getElementById('hc-inkk-mesafe').value);
    
    if (isNaN(m1) || m1 <= 0 || isNaN(m2) || m2 <= 0 || isNaN(r) || r <= 0) {
        alert('Lütfen tüm girdileri geçerli pozitif sayılar olarak doldurunuz.');
        return;
    }
    
    // G = 6.67430e-11 N.m²/kg²
    var G = 6.6743e-11;
    
    // F = G * m1 * m2 / r^2
    var F = G * (m1 * m2) / Math.pow(r, 2);
    
    var resultDiv = document.getElementById('hc-iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Kütleçekim Çekim Kuvveti (F):</strong> <span class="hc-result-value">' + F.toExponential(5) + ' N</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Kuvvet (Standart formatta)</td>' +
                    '<td>' + (F >= 0.01 && F < 1e9 ? F.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' N' : F.toExponential(4) + ' N') + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Yerçekimi Katsayısı (G)</td>' +
                    '<td>6.6743 x 10⁻¹¹ m³/(kg·s²)</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Mesafe (r)</td>' +
                    '<td>' + r.toLocaleString('tr-TR') + ' m (' + (r / 1000).toLocaleString('tr-TR') + ' km)</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}

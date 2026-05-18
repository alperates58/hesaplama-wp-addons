function hcIhTipDegisti() {
    var tip = document.getElementById('hc-ih-tip').value;
    var girdiler = document.getElementById('hc-ih-girdiler');
    
    if (tip === 'direnc') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-ih-direnc">Direnç (R - Ohm [Ω])</label>' +
            '<input type="number" step="any" id="hc-ih-direnc" value="10" placeholder="Örn: 10" required>' +
            '</div>';
    } else {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-ih-malzeme">İletken Malzeme (σ - Siemens/metre [S/m])</label>' +
            '<select id="hc-ih-malzeme-select" onchange="hcIhMalzemeSecildi()">' +
                '<option value="5.96e7" selected>Bakır (5.96 x 10⁷ S/m)</option>' +
                '<option value="6.30e7">Gümüş (6.30 x 10⁷ S/m)</option>' +
                '<option value="3.50e7">Alüminyum (3.50 x 10⁷ S/m)</option>' +
                '<option value="4.11e7">Altın (4.11 x 10⁷ S/m)</option>' +
                '<option value="1.00e7">Demir (1.00 x 10⁷ S/m)</option>' +
                '<option value="custom">Özel Değer...</option>' +
            '</select>' +
            '</div>' +
            '<div class="hc-form-group" id="hc-ih-ozel-kapsayici" style="display:none;">' +
            '<label for="hc-ih-katsayi">Özel İletkenlik Katsayısı (σ - S/m)</label>' +
            '<input type="number" step="any" id="hc-ih-katsayi" value="5.96e7" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ih-uzunluk">Tel Uzunluğu (L - metre)</label>' +
            '<input type="number" step="any" id="hc-ih-uzunluk" value="1" placeholder="Metre" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ih-kesit">Kesit Alanı (A - mm²)</label>' +
            '<input type="number" step="any" id="hc-ih-kesit" value="1.5" placeholder="Örn: 1.5 mm²" required>' +
            '</div>';
    }
}

function hcIhMalzemeSecildi() {
    var val = document.getElementById('hc-ih-malzeme-select').value;
    var ozel = document.getElementById('hc-ih-ozel-kapsayici');
    if (val === 'custom') {
        ozel.style.display = 'block';
    } else {
        ozel.style.display = 'none';
        document.getElementById('hc-ih-katsayi').value = val;
    }
}

function hcIletkenlikHesapla() {
    var tip = document.getElementById('hc-ih-tip').value;
    var resultDiv = document.getElementById('hc-iletkenlik-hesaplama-result');
    
    if (tip === 'direnc') {
        var R = parseFloat(document.getElementById('hc-ih-direnc').value);
        if (isNaN(R) || R <= 0) {
            alert('Lütfen geçerli pozitif bir direnç değeri giriniz.');
            return;
        }
        // G = 1 / R
        var G = 1 / R;
        var G_mS = G * 1000; // miliSiemens
        var G_uS = G * 1e6; // microSiemens
        
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Elektriksel İletkenlik (G):</strong> <span class="hc-result-value">' + G.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' S</span> (Siemens)</p>' +
            '<table>' +
                '<thead>' +
                    '<tr><th>Birim</th><th>İletkenlik Değeri</th></tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr><td>miliSiemens (mS)</td><td>' + G_mS.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' mS</td></tr>' +
                    '<tr><td>mikroSiemens (μS)</td><td>' + G_uS.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' μS</td></tr>' +
                '</tbody>' +
            '</table>';
    } else {
        var val = document.getElementById('hc-ih-malzeme-select').value;
        var sigma = 0;
        if (val === 'custom') {
            sigma = parseFloat(document.getElementById('hc-ih-katsayi').value);
        } else {
            sigma = parseFloat(val);
        }
        
        var L = parseFloat(document.getElementById('hc-ih-uzunluk').value);
        var Amm2 = parseFloat(document.getElementById('hc-ih-kesit').value);
        
        if (isNaN(sigma) || sigma <= 0 || isNaN(L) || L <= 0 || isNaN(Amm2) || Amm2 <= 0) {
            alert('Lütfen tüm girdileri geçerli pozitif sayılar olarak giriniz.');
            return;
        }
        
        // A (mm² -> m²) = Amm2 * 1e-6
        var A = Amm2 * 1e-6;
        
        // G = sigma * A / L
        var G = sigma * A / L;
        var R = 1 / G;
        
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>İletkenlik (G):</strong> <span class="hc-result-value">' + G.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' S</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr><th>Parametre</th><th>Değer</th></tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr><td>Telin Direnci (R)</td><td>' + R.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' Ω (Ohm)</td></tr>' +
                    '<tr><td>İletkenlik Katsayısı (σ)</td><td>' + sigma.toExponential(3) + ' S/m</td></tr>' +
                    '<tr><td>Kesit Alanı (A)</td><td>' + A.toExponential(3) + ' m²</td></tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}

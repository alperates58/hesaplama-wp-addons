function hcIgyHedefDegisti() {
    var hedef = document.getElementById('hc-igy-hedef').value;
    var girdiler = document.getElementById('hc-igy-girdiler');
    
    var html = '';
    
    if (hedef !== 'basinc') {
        html += '<div class="hc-form-group">' +
            '<label for="hc-igy-basinc">Basınç (P - Pascal [Pa])</label>' +
            '<input type="number" step="any" id="hc-igy-basinc" value="101325" placeholder="Deniz seviyesi standart: 101325" required>' +
            '</div>';
    }
    if (hedef !== 'hacim') {
        html += '<div class="hc-form-group">' +
            '<label for="hc-igy-hacim">Hacim (V - Metreküp [m³])</label>' +
            '<input type="number" step="any" id="hc-igy-hacim" value="0.0224" placeholder="Örn: 0.0224" required>' +
            '</div>';
    }
    if (hedef !== 'mol') {
        html += '<div class="hc-form-group">' +
            '<label for="hc-igy-mol">Madde Miktarı (n - Mol)</label>' +
            '<input type="number" step="any" id="hc-igy-mol" value="1.0" placeholder="Örn: 1.0" required>' +
            '</div>';
    }
    if (hedef !== 'sicaklik') {
        html += '<div class="hc-form-group">' +
            '<label for="hc-igy-sicaklik">Sıcaklık (T - °C)</label>' +
            '<input type="number" step="any" id="hc-igy-sicaklik" value="0" placeholder="Örn: 0" required>' +
            '</div>';
    }
    
    girdiler.innerHTML = html;
}

function hcIdealGazYasasiHesapla() {
    var hedef = document.getElementById('hc-igy-hedef').value;
    var R = 8.314462618; // J/(mol.K)
    
    var P, V, n, T_c, T_k;
    var resultDiv = document.getElementById('hc-ideal-gaz-yasasi-hesaplama-result');
    var finalHtml = '';
    
    if (hedef === 'basinc') {
        V = parseFloat(document.getElementById('hc-igy-hacim').value);
        n = parseFloat(document.getElementById('hc-igy-mol').value);
        T_c = parseFloat(document.getElementById('hc-igy-sicaklik').value);
        if (isNaN(V) || V <= 0 || isNaN(n) || n <= 0 || isNaN(T_c)) {
            alert('Lütfen geçerli pozitif hacim, mol ve sıcaklık değerleri giriniz.');
            return;
        }
        T_k = T_c + 273.15;
        // P = (n * R * T) / V
        P = (n * R * T_k) / V; // Pa
        var Patm = P / 101325;
        var Pbar = P / 1e5;
        finalHtml = '<p><strong>Hesaplanan Basınç (P):</strong> <span class="hc-result-value">' + P.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' Pa</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr><th>Birim</th><th>Basınç Değeri</th></tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr><td>Atmosfer (atm)</td><td>' + Patm.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' atm</td></tr>' +
                    '<tr><td>Bar (bar)</td><td>' + Pbar.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' bar</td></tr>' +
                    '<tr><td>Kilopascal (kPa)</td><td>' + (P / 1000).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kPa</td></tr>' +
                '</tbody>' +
            '</table>';
    } else if (hedef === 'hacim') {
        P = parseFloat(document.getElementById('hc-igy-basinc').value);
        n = parseFloat(document.getElementById('hc-igy-mol').value);
        T_c = parseFloat(document.getElementById('hc-igy-sicaklik').value);
        if (isNaN(P) || P <= 0 || isNaN(n) || n <= 0 || isNaN(T_c)) {
            alert('Lütfen geçerli pozitif basınç, mol ve sıcaklık değerleri giriniz.');
            return;
        }
        T_k = T_c + 273.15;
        // V = (n * R * T) / P
        V = (n * R * T_k) / P; // m³
        var Vlitre = V * 1000;
        finalHtml = '<p><strong>Hesaplanan Hacim (V):</strong> <span class="hc-result-value">' + V.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m³</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr><th>Birim</th><th>Hacim Değeri</th></tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr><td>Litre (L)</td><td>' + Vlitre.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' L</td></tr>' +
                    '<tr><td>Mililitre (mL)</td><td>' + (Vlitre * 1000).toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' mL</td></tr>' +
                '</tbody>' +
            '</table>';
    } else if (hedef === 'mol') {
        P = parseFloat(document.getElementById('hc-igy-basinc').value);
        V = parseFloat(document.getElementById('hc-igy-hacim').value);
        T_c = parseFloat(document.getElementById('hc-igy-sicaklik').value);
        if (isNaN(P) || P <= 0 || isNaN(V) || V <= 0 || isNaN(T_c)) {
            alert('Lütfen geçerli pozitif basınç, hacim ve sıcaklık değerleri giriniz.');
            return;
        }
        T_k = T_c + 273.15;
        // n = (P * V) / (R * T)
        n = (P * V) / (R * T_k);
        finalHtml = '<p><strong>Hesaplanan Madde Miktarı (n):</strong> <span class="hc-result-value">' + n.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' mol</span></p>';
    } else {
        P = parseFloat(document.getElementById('hc-igy-basinc').value);
        V = parseFloat(document.getElementById('hc-igy-hacim').value);
        n = parseFloat(document.getElementById('hc-igy-mol').value);
        if (isNaN(P) || P <= 0 || isNaN(V) || V <= 0 || isNaN(n) || n <= 0) {
            alert('Lütfen geçerli pozitif basınç, hacim ve mol değerleri giriniz.');
            return;
        }
        // T = (P * V) / (n * R)
        T_k = (P * V) / (n * R);
        T_c = T_k - 273.15;
        finalHtml = '<p><strong>Hesaplanan Sıcaklık (T):</strong> <span class="hc-result-value">' + T_c.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' °C</span></p>' +
            '<p style="font-size: 14px; margin-top: 10px;">Mutlak Sıcaklık: <strong>' + T_k.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' K</strong></p>';
    }
    
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' + finalHtml;
    resultDiv.classList.add('visible');
}

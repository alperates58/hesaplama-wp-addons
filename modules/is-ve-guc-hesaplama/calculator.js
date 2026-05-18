function hcIsVeGucHesapla() {
    var F = parseFloat(document.getElementById('hc-ivg-kuvvet').value);
    var d = parseFloat(document.getElementById('hc-ivg-yol').value);
    var aciDeg = parseFloat(document.getElementById('hc-ivg-aci').value);
    var t = parseFloat(document.getElementById('hc-ivg-sure').value);
    
    if (isNaN(F) || isNaN(d) || isNaN(aciDeg) || isNaN(t) || t <= 0) {
        alert('Lütfen geçerli değerler giriniz (Süre pozitif olmalıdır).');
        return;
    }
    
    var aciRad = aciDeg * Math.PI / 180;
    var cosTheta = Math.cos(aciRad);
    
    // W = F * d * cos(theta)
    var W = F * d * cosTheta;
    var W_kJ = W / 1000;
    
    // P = W / t
    var P = W / t;
    var HP = P / 745.699872; // Beygir Gücü (Horsepower)
    
    var resultDiv = document.getElementById('hc-is-ve-guc-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<div style="display: flex; gap: 15px; margin-bottom: 20px; flex-wrap: wrap;">' +
            '<div style="flex: 1; min-width: 120px; padding: 14px; border: 1px solid #dce5f0; border-radius: 12px; background: #fff;">' +
                '<span style="display: block; font-size: 12px; color: var(--hc-front-muted); font-weight: bold; text-transform: uppercase;">Yapılan İş (W)</span>' +
                '<span class="hc-result-value" style="font-size: 26px;">' + W.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' J</span>' +
            '</div>' +
            '<div style="flex: 1; min-width: 120px; padding: 14px; border: 1px solid #dce5f0; border-radius: 12px; background: #fff;">' +
                '<span style="display: block; font-size: 12px; color: var(--hc-front-muted); font-weight: bold; text-transform: uppercase;">Ortalama Güç (P)</span>' +
                '<span class="hc-result-value" style="font-size: 26px; color: var(--hc-front-gold);">' + P.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' W</span>' +
            '</div>' +
        '</div>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>İş (Kilojoule - kJ)</td>' +
                    '<td>' + W_kJ.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' kJ</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Güç (Kilowatt - kW)</td>' +
                    '<td>' + (P / 1000).toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' kW</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Beygir Gücü (HP)</td>' +
                    '<td>' + HP.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' HP</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Açı Cosine (cos θ)</td>' +
                    '<td>' + cosTheta.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + '</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}

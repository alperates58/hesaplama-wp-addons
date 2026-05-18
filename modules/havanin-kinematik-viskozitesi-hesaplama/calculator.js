function hcHavaninKinematikViskozitesiHesapla() {
    var T = parseFloat(document.getElementById('hc-hkv-sicaklik').value);
    var P = parseFloat(document.getElementById('hc-hkv-basinc').value);
    
    if (isNaN(T) || isNaN(P) || P <= 0) {
        alert('Lütfen geçerli sıcaklık ve pozitif basınç değerleri giriniz.');
        return;
    }
    
    var Tkelvin = T + 273.15;
    var Ppascal = P * 100;
    
    // Sutherland Yasası ile Dinamik Viskozite (mu) Hesabı
    var mu0 = 1.716e-5; // Pa.s (273.15 K'deki referans viskozite)
    var T0 = 273.15; // K
    var C = 110.4; // K (Sutherland sabiti)
    
    var mu = mu0 * ((T0 + C) / (Tkelvin + C)) * Math.pow(Tkelvin / T0, 1.5);
    
    // Hava Yoğunluğu (rho) Hesabı: rho = P / (R * T)
    var R = 287.058; // J/(kg.K)
    var rho = Ppascal / (R * Tkelvin);
    
    // Kinematik Viskozite (nu) = mu / rho
    var nu = mu / rho;
    
    var resultDiv = document.getElementById('hc-havanin-kinematik-viskozitesi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Kinematik Viskozite (ν):</strong> <span class="hc-result-value">' + nu.toExponential(5) + ' m²/s</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Dinamik Viskozite (μ)</td>' +
                    '<td>' + mu.toExponential(5) + ' Pa·s (kg/(m·s))</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Hava Yoğunluğu (ρ)</td>' +
                    '<td>' + rho.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kg/m³</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Sıcaklık (Kelvin)</td>' +
                    '<td>' + Tkelvin.toLocaleString('tr-TR') + ' K</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}

function hcHbiTipDegisti() {
    var tip = document.getElementById('hc-hbi-tip').value;
    var girdiler = document.getElementById('hc-hbi-girdiler');
    
    if (tip === 'konum') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-hbi-deger">Konum Belirsizliği (Δx - metre)</label>' +
            '<input type="number" step="any" id="hc-hbi-deger" placeholder="Örn: 1e-10 (1 Ångström)" required>' +
            '</div>';
    } else {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-hbi-deger">Zaman Belirsizliği (Δt - saniye)</label>' +
            '<input type="number" step="any" id="hc-hbi-deger" placeholder="Örn: 1e-8" required>' +
            '</div>';
    }
}

function hcHeisenbergBelirsizlikIlkesiHesapla() {
    var tip = document.getElementById('hc-hbi-tip').value;
    var girdi = parseFloat(document.getElementById('hc-hbi-deger').value);
    
    if (isNaN(girdi) || girdi <= 0) {
        alert('Lütfen geçerli pozitif bir belirsizlik değeri giriniz.');
        return;
    }
    
    var hbar = 1.054571817e-34; // J.s (İndirgenmiş Planck Sabiti)
    var limit = hbar / 2;
    var sonuc = limit / girdi;
    
    var resultDiv = document.getElementById('hc-heisenberg-belirsizlik-ilkesi-hesaplama-result');
    
    if (tip === 'konum') {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Minimum Momentum Belirsizliği (Δp):</strong> <span class="hc-result-value">' + sonuc.toExponential(6) + ' kg·m/s</span></p>' +
            '<p style="font-size: 13px; margin-top: 10px;">Eğer bir parçacığın konumu <strong>' + girdi.toExponential(3) + ' m</strong> hassasiyetle ölçülürse, momentumundaki belirsizlik en az yukarıdaki değer kadar olmalıdır.</p>';
    } else {
        var sonucEv = sonuc / 1.602176634e-19; // eV cinsine dönüşüm
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Minimum Enerji Belirsizliği (ΔE):</strong> <span class="hc-result-value">' + sonucEv.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' eV</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Birim</th>' +
                        '<th>Minimum Belirsizlik</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Joule (J)</td>' +
                        '<td>' + sonuc.toExponential(6) + ' J</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Elektronvolt (eV)</td>' +
                        '<td>' + sonucEv.toExponential(6) + ' eV</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}

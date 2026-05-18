function hcFrekansDalgaBoyuHedefDegisti() {
    var hedef = document.getElementById('hc-fdb-hedef').value;
    var label = document.getElementById('hc-fdb-girdi-label');
    var input = document.getElementById('hc-fdb-girdi');
    
    if (hedef === 'dalga') {
        label.innerText = 'Frekans (f - Hz)';
        input.placeholder = 'Örn: 1000';
    } else {
        label.innerText = 'Dalga Boyu (λ - metre)';
        input.placeholder = 'Örn: 0.34';
    }
}

function hcFrekansDalgaBoyuHesapla() {
    var v = parseFloat(document.getElementById('hc-fdb-hiz').value);
    var hedef = document.getElementById('hc-fdb-hedef').value;
    var girdi = parseFloat(document.getElementById('hc-fdb-girdi').value);
    
    if (isNaN(v) || v <= 0 || isNaN(girdi) || girdi <= 0) {
        alert('Lütfen geçerli pozitif yayılma hızı ve girdi değeri giriniz.');
        return;
    }
    
    var sonuc = 0;
    var resultDiv = document.getElementById('hc-frekans-dalga-boyu-hesaplama-result');
    
    if (hedef === 'dalga') {
        // lambda = v / f
        sonuc = v / girdi;
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Hesaplanan Dalga Boyu (λ):</strong> <span class="hc-result-value">' + sonuc.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Birim</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        'Santimetre (cm)' +
                        '<td>' + (sonuc * 100).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' cm</td>' +
                    '</tr>' +
                    '<tr>' +
                        'Milimetre (mm)' +
                        '<td>' + (sonuc * 1000).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' mm</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    } else {
        // f = v / lambda
        sonuc = v / girdi;
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Hesaplanan Frekans (f):</strong> <span class="hc-result-value">' + sonuc.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' Hz</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Birim</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        'Kilohertz (kHz)' +
                        '<td>' + (sonuc / 1000).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' kHz</td>' +
                    '</tr>' +
                    '<tr>' +
                        'Megahertz (MHz)' +
                        '<td>' + (sonuc / 1e6).toLocaleString('tr-TR', {maximumFractionDigits: 9}) + ' MHz</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}

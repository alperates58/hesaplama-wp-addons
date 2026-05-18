function hcFrekansDonusturmeHesapla() {
    var deger = parseFloat(document.getElementById('hc-fd-deger').value);
    var birim = document.getElementById('hc-fd-birim').value;
    
    if (isNaN(deger) || deger < 0) {
        alert('Lütfen geçerli pozitif bir frekans değeri giriniz.');
        return;
    }
    
    // Hertz (Hz) cinsinden temel değer hesabı
    var hz = 0;
    if (birim === 'hz') hz = deger;
    else if (birim === 'khz') hz = deger * 1e3;
    else if (birim === 'mhz') hz = deger * 1e6;
    else if (birim === 'ghz') hz = deger * 1e9;
    else if (birim === 'thz') hz = deger * 1e12;
    else if (birim === 'rads') hz = deger / (2 * Math.PI);
    
    var khz = hz / 1e3;
    var mhz = hz / 1e6;
    var ghz = hz / 1e9;
    var thz = hz / 1e12;
    var rads = hz * 2 * Math.PI;
    
    var resultDiv = document.getElementById('hc-frekans-donusturme-hesaplama-result');
    resultDiv.innerHTML = '<h4>Dönüşüm Sonuçları:</h4>' +
        '<p><strong>Hertz (Hz):</strong> <span class="hc-result-value">' + hz.toLocaleString('tr-TR') + ' Hz</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Kilohertz (kHz)</td>' +
                    '<td>' + khz.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' kHz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Megahertz (MHz)</td>' +
                    '<td>' + mhz.toLocaleString('tr-TR', {maximumFractionDigits: 9}) + ' MHz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Gigahertz (GHz)</td>' +
                    '<td>' + ghz.toLocaleString('tr-TR', {maximumFractionDigits: 12}) + ' GHz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Terahertz (THz)</td>' +
                    '<td>' + thz.toLocaleString('tr-TR', {maximumFractionDigits: 15}) + ' THz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Açısal Frekans (rad/s)</td>' +
                    '<td>' + rads.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' rad/s</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}

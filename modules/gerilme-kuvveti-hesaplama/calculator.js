function hcGerilmeKuvvetiHesapla() {
    var m = parseFloat(document.getElementById('hc-gk2-kutle').value);
    var a = parseFloat(document.getElementById('hc-gk2-ivme').value);
    var yon = document.getElementById('hc-gk2-yon').value;
    
    if (isNaN(m) || m <= 0 || isNaN(a) || a < 0) {
        alert('Lütfen geçerli pozitif kütle ve ivme değerleri giriniz.');
        return;
    }
    
    var g = 9.80665; // Yerçekimi ivmesi
    var T = 0;
    var aciklama = '';
    
    if (yon === 'durgun' || a === 0) {
        T = m * g;
        aciklama = 'Sistem durgun veya sabit hızlı olduğu için gerilme kuvveti doğrudan kütlenin ağırlığına eşittir (T = m * g).';
    } else if (yon === 'yukari') {
        T = m * (g + a);
        aciklama = 'Sistem yukarı yönlü ivmelendiği için gerilme kuvveti ağırlıktan büyüktür (T = m * (g + a)).';
    } else if (yon === 'asagi') {
        T = m * (g - a);
        aciklama = 'Sistem aşağı yönlü ivmelendiği için gerilme kuvveti ağırlıktan küçüktür (T = m * (g - a)).';
    }
    
    var resultDiv = document.getElementById('hc-gerilme-kuvveti-hesaplama-result');
    
    if (T < 0) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p style="color: var(--hc-front-red); font-weight: bold;">İp Gevşek Durumda!</p>' +
            '<p>Aşağı yönlü ivme yerçekimi ivmesinden büyük olduğu için ipte gerilme oluşmaz (T = 0 N) ve cisim serbest düşmeye geçer.</p>';
    } else {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>İp Gerilme Kuvveti (T):</strong> <span class="hc-result-value">' + T.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' N</span></p>' +
            '<p style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;">' + aciklama + '</p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Parametre</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Cismin Ağırlığı (G)</td>' +
                        '<td>' + (m * g).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' N</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>İvme Kuvvet Bileşeni (m * a)</td>' +
                        '<td>' + (m * a).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' N</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}

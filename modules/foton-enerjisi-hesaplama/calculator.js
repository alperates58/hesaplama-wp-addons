function hcFotonEnerjisiTipDegisti() {
    var tip = document.getElementById('hc-fe-tip').value;
    var etiket = document.getElementById('hc-fe-etiket');
    var input = document.getElementById('hc-fe-deger');
    
    if (tip === 'dalga') {
        etiket.innerText = 'Dalga Boyu (nm)';
        input.placeholder = 'Örn: 500';
    } else {
        etiket.innerText = 'Frekans (THz)';
        input.placeholder = 'Örn: 600';
    }
}

function hcFotonEnerjisiHesapla() {
    var tip = document.getElementById('hc-fe-tip').value;
    var deger = parseFloat(document.getElementById('hc-fe-deger').value);
    
    if (isNaN(deger) || deger <= 0) {
        alert('Lütfen pozitif bir değer giriniz.');
        return;
    }
    
    var h = 6.62607015e-34; // J.s
    var c = 299792458; // m/s
    var evToJ = 1.602176634e-19;
    
    var enerjiJoule = 0;
    var frekansHz = 0;
    var dalgaBoyuNm = 0;
    
    if (tip === 'dalga') {
        dalgaBoyuNm = deger;
        var lambda = dalgaBoyuNm * 1e-9;
        enerjiJoule = (h * c) / lambda;
        frekansHz = c / lambda;
    } else {
        var frekansThz = deger;
        frekansHz = frekansThz * 1e12;
        enerjiJoule = h * frekansHz;
        dalgaBoyuNm = (c / frekansHz) * 1e9;
    }
    
    var enerjiEv = enerjiJoule / evToJ;
    var frekansThzOutput = frekansHz / 1e12;
    
    var resultDiv = document.getElementById('hc-foton-enerjisi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Foton Enerjisi:</strong> <span class="hc-result-value">' + enerjiEv.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' eV</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Enerji (Joule)</td>' +
                    '<td>' + enerjiJoule.toExponential(4) + ' J</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Frekans (THz)</td>' +
                    '<td>' + frekansThzOutput.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' THz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Dalga Boyu (nm)</td>' +
                    '<td>' + dalgaBoyuNm.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' nm</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}

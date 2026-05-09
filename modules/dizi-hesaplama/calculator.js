function hcDiziTurDegistir() {
    var tur = document.getElementById('hc-diz-tur').value;
    document.getElementById('hc-diz-fark-label').textContent = (tur === 'aritmetik') ? 'Ortak Fark (d)' : 'Ortak Oran (r)';
    document.getElementById('hc-diz-fark').placeholder = (tur === 'aritmetik') ? 'örn. 3' : 'örn. 2';
}
function hcDiziHesapla() {
    var tur = document.getElementById('hc-diz-tur').value;
    var a1 = parseFloat(document.getElementById('hc-diz-a1').value);
    var fark = parseFloat(document.getElementById('hc-diz-fark').value);
    var n = parseInt(document.getElementById('hc-diz-n').value);
    var sonuc = document.getElementById('hc-dizi-hesaplama-result');
    if (isNaN(a1)||isNaN(fark)||isNaN(n)||n<1) { alert('İlk terim, ortak fark/oran ve n değerini girin.'); return; }
    var an, sn, ilkTermler = [];
    if (tur === 'aritmetik') {
        an = a1 + (n-1)*fark;
        sn = n*(a1+an)/2;
        for (var i=1;i<=Math.min(n,5);i++) ilkTermler.push(a1+(i-1)*fark);
        sonuc.innerHTML =
            '<p><strong>' + n + '. Terim (aₙ = a₁ + (n−1)d):</strong></p>' +
            '<p class="hc-result-value">a' + n + ' = ' + an.toLocaleString('tr-TR',{maximumFractionDigits:4}) + '</p>' +
            '<p><strong>İlk n terimi toplamı (Sₙ = n×(a₁+aₙ)/2):</strong> ' + sn.toLocaleString('tr-TR',{maximumFractionDigits:4}) + '</p>' +
            '<p><strong>İlk 5 terim:</strong> ' + ilkTermler.map(function(x){return x.toLocaleString('tr-TR',{maximumFractionDigits:4})}).join(', ') + '...</p>';
    } else {
        if (fark === 0) { alert('Ortak oran sıfır olamaz.'); return; }
        an = a1 * Math.pow(fark, n-1);
        sn = (fark !== 1) ? a1*(1-Math.pow(fark,n))/(1-fark) : a1*n;
        for (var j=1;j<=Math.min(n,5);j++) ilkTermler.push(a1*Math.pow(fark,j-1));
        sonuc.innerHTML =
            '<p><strong>' + n + '. Terim (aₙ = a₁ × r^(n−1)):</strong></p>' +
            '<p class="hc-result-value">a' + n + ' = ' + an.toLocaleString('tr-TR',{maximumFractionDigits:4}) + '</p>' +
            '<p><strong>İlk n terimi toplamı:</strong> ' + sn.toLocaleString('tr-TR',{maximumFractionDigits:4}) + '</p>' +
            '<p><strong>İlk 5 terim:</strong> ' + ilkTermler.map(function(x){return x.toLocaleString('tr-TR',{maximumFractionDigits:4})}).join(', ') + '...</p>';
    }
    sonuc.classList.add('visible');
}

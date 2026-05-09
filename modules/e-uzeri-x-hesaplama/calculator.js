function hcEUzeriXHesapla() {
    var x = parseFloat(document.getElementById('hc-eux-x').value);
    var sonuc = document.getElementById('hc-e-uzeri-x-hesaplama-result');
    if (isNaN(x)) { alert('Lütfen üs değerini girin.'); return; }
    var sonucDeger = Math.exp(x);
    var taylorTermler = [];
    var taylorToplam = 0;
    for (var k=0; k<6; k++) {
        var fk = 1; for (var j=1;j<=k;j++) fk*=j;
        var terim = Math.pow(x,k)/fk;
        taylorTermler.push((k===0?'1':(k===1?'x':'x'+(['','','²','³','⁴','⁵'][k])+'/'+fk)));
        taylorToplam += terim;
    }
    sonuc.innerHTML =
        '<p><strong>e ≈</strong> ' + Math.E.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>' +
        '<p><strong>e^' + x.toLocaleString('tr-TR') + ' = </strong></p>' +
        '<p class="hc-result-value">' + sonucDeger.toLocaleString('tr-TR', {maximumFractionDigits:8}) + '</p>' +
        '<p><strong>Taylor serisi (ilk 6 terim):</strong> 1 + x + x²/2! + x³/3! + ... ≈ ' + taylorToplam.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>' +
        '<p><strong>ln(eˣ) kontrolü:</strong> ' + Math.log(Math.abs(sonucDeger)).toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>';
    sonuc.classList.add('visible');
}

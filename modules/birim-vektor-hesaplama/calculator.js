function hcBirimVektorBoyutGuncelle() {
    var boyut = document.getElementById('hc-bvh-boyut').value;
    document.getElementById('hc-bvh-z-grup').style.display = (boyut === '3') ? 'block' : 'none';
}

function hcBirimVektorHesapla() {
    var x = parseFloat(document.getElementById('hc-bvh-x').value);
    var y = parseFloat(document.getElementById('hc-bvh-y').value);
    var boyut = document.getElementById('hc-bvh-boyut').value;
    var sonuc = document.getElementById('hc-birim-vektor-hesaplama-result');

    if (isNaN(x) || isNaN(y)) { alert('Lütfen x ve y bileşenlerini girin.'); return; }

    var buyukluk, bvx, bvy, bvz, html;

    if (boyut === '2') {
        buyukluk = Math.sqrt(x * x + y * y);
        if (buyukluk === 0) { alert('Sıfır vektörün birim vektörü tanımsızdır.'); return; }
        bvx = x / buyukluk;
        bvy = y / buyukluk;
        html =
            '<p><strong>Özgün Vektör:</strong> v = (' + x.toLocaleString('tr-TR') + ', ' + y.toLocaleString('tr-TR') + ')</p>' +
            '<p><strong>Büyüklük |v|:</strong> ' + buyukluk.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + '</p>' +
            '<p class="hc-result-value">û = (' + bvx.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ', ' + bvy.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ')</p>' +
            '<p><strong>Doğrulama |û|:</strong> ≈ ' + Math.sqrt(bvx*bvx+bvy*bvy).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + '</p>';
    } else {
        var z = parseFloat(document.getElementById('hc-bvh-z').value);
        if (isNaN(z)) { alert('Lütfen z bileşenini girin.'); return; }
        buyukluk = Math.sqrt(x*x + y*y + z*z);
        if (buyukluk === 0) { alert('Sıfır vektörün birim vektörü tanımsızdır.'); return; }
        bvx = x / buyukluk; bvy = y / buyukluk; bvz = z / buyukluk;
        html =
            '<p><strong>Özgün Vektör:</strong> v = (' + x.toLocaleString('tr-TR') + ', ' + y.toLocaleString('tr-TR') + ', ' + z.toLocaleString('tr-TR') + ')</p>' +
            '<p><strong>Büyüklük |v|:</strong> ' + buyukluk.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + '</p>' +
            '<p class="hc-result-value">û = (' + bvx.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ', ' + bvy.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ', ' + bvz.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ')</p>' +
            '<p><strong>Doğrulama |û|:</strong> ≈ ' + Math.sqrt(bvx*bvx+bvy*bvy+bvz*bvz).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + '</p>';
    }
    sonuc.innerHTML = html;
    sonuc.classList.add('visible');
}

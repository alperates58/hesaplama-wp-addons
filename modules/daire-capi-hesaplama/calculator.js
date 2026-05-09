function hcDaireCapiKaynakDegistir() {
    var k = document.getElementById('hc-dcp-kaynak').value;
    var etiketler = { yaricap: 'Yarıçap (m)', cevre: 'Çevre (m)', alan: 'Alan (m²)' };
    document.getElementById('hc-dcp-deger-label').textContent = etiketler[k];
}

function hcDaireCapiHesapla() {
    var deger = parseFloat(document.getElementById('hc-dcp-deger').value);
    var kaynak = document.getElementById('hc-dcp-kaynak').value;
    var sonuc = document.getElementById('hc-daire-capi-hesaplama-result');
    if (isNaN(deger) || deger <= 0) { alert('Lütfen pozitif bir değer girin.'); return; }
    var cap;
    if (kaynak === 'yaricap') cap = 2 * deger;
    else if (kaynak === 'cevre') cap = deger / Math.PI;
    else cap = 2 * Math.sqrt(deger / Math.PI);
    sonuc.innerHTML =
        '<p class="hc-result-value">Çap = ' + cap.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>' +
        '<p><strong>Yarıçap:</strong> ' + (cap/2).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>' +
        '<p><strong>Çevre:</strong> ' + (Math.PI * cap).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</p>' +
        '<p><strong>Alan:</strong> ' + (Math.PI * Math.pow(cap/2, 2)).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m²</p>';
    sonuc.classList.add('visible');
}

function hcDaireYaricapiKaynakDegistir() {
    var k = document.getElementById('hc-dyr-kaynak').value;
    var etiketler = { cap: 'Çap (m)', cevre: 'Çevre (m)', alan: 'Alan (m²)' };
    document.getElementById('hc-dyr-deger-label').textContent = etiketler[k];
}
function hcDaireYaricapiHesapla() {
    var deger = parseFloat(document.getElementById('hc-dyr-deger').value);
    var kaynak = document.getElementById('hc-dyr-kaynak').value;
    var sonuc = document.getElementById('hc-daire-yaricipi-hesaplama-result');
    if (isNaN(deger) || deger <= 0) { alert('Lütfen pozitif bir değer girin.'); return; }
    var r;
    if (kaynak === 'cap') r = deger / 2;
    else if (kaynak === 'cevre') r = deger / (2 * Math.PI);
    else r = Math.sqrt(deger / Math.PI);
    sonuc.innerHTML =
        '<p class="hc-result-value">Yarıçap = ' + r.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Çap:</strong> ' + (2*r).toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Çevre:</strong> ' + (2*Math.PI*r).toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Alan:</strong> ' + (Math.PI*r*r).toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m²</p>';
    sonuc.classList.add('visible');
}

function hcDaireDilimiAlaniHesapla() {
    var r = parseFloat(document.getElementById('hc-dda-r').value);
    var aci = parseFloat(document.getElementById('hc-dda-aci').value);
    var sonuc = document.getElementById('hc-daire-dilimi-alani-hesaplama-result');
    if (isNaN(r) || r <= 0) { alert('Lütfen pozitif yarıçap girin.'); return; }
    if (isNaN(aci) || aci <= 0 || aci > 360) { alert('Açı 0 ile 360 arasında olmalıdır.'); return; }
    var alan = (aci / 360) * Math.PI * r * r;
    var yay = (aci / 360) * 2 * Math.PI * r;
    sonuc.innerHTML =
        '<p><strong>Yarıçap:</strong> ' + r.toLocaleString('tr-TR', {maximumFractionDigits:4}) + ' m | <strong>Açı:</strong> ' + aci + '°</p>' +
        '<p class="hc-result-value">Dilim Alanı = ' + alan.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m²</p>' +
        '<p><strong>Yay Uzunluğu:</strong> ' + yay.toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' m</p>' +
        '<p><strong>Formül:</strong> A = (θ/360) × π × r²</p>';
    sonuc.classList.add('visible');
}

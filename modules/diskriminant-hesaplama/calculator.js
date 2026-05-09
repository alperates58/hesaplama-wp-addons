function hcDiskriminantHesapla() {
    var a = parseFloat(document.getElementById('hc-dis-a').value);
    var b = parseFloat(document.getElementById('hc-dis-b').value);
    var c = parseFloat(document.getElementById('hc-dis-c').value);
    var sonuc = document.getElementById('hc-diskriminant-hesaplama-result');
    if (isNaN(a)||isNaN(b)||isNaN(c)) { alert('a, b ve c katsayılarını girin.'); return; }
    if (a === 0) { alert('a katsayısı sıfır olamaz.'); return; }
    var delta = b*b - 4*a*c;
    var yorumText, yorkRengi;
    if (delta > 0) { yorumText = '✅ İki farklı gerçel kök var (Δ > 0)'; }
    else if (delta === 0) { yorumText = '⚠️ Çift kök (eşit iki gerçel kök) var (Δ = 0)'; }
    else { yorumText = '❌ Gerçel kök yok (Δ < 0), karmaşık kökler mevcut'; }
    sonuc.innerHTML =
        '<p><strong>Δ = b² − 4ac = ' + b + '² − 4×' + a + '×' + c + '</strong></p>' +
        '<p class="hc-result-value">Δ = ' + delta.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>' +
        '<p>' + yorumText + '</p>';
    sonuc.classList.add('visible');
}

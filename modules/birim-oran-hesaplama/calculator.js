function hcBirimOranHesapla() {
    var miktar1 = parseFloat(document.getElementById('hc-bor-miktar1').value);
    var miktar2 = parseFloat(document.getElementById('hc-bor-miktar2').value);
    var birim1 = document.getElementById('hc-bor-birim1').value.trim() || 'birim1';
    var birim2 = document.getElementById('hc-bor-birim2').value.trim() || 'birim2';
    var sonuc = document.getElementById('hc-birim-oran-hesaplama-result');

    if (isNaN(miktar1) || isNaN(miktar2)) { alert('Lütfen her iki miktarı da girin.'); return; }
    if (miktar2 === 0) { alert('Bölen (Miktar 2) sıfır olamaz.'); return; }

    var birimOran = miktar1 / miktar2;
    var tersBirimOran = miktar2 / miktar1;

    sonuc.innerHTML =
        '<p><strong>Birim Oran (1 ' + birim2 + ' başına):</strong></p>' +
        '<p class="hc-result-value">' + birimOran.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' ' + birim1 + ' / 1 ' + birim2 + '</p>' +
        '<p><strong>Ters Birim Oran (1 ' + birim1 + ' başına):</strong></p>' +
        '<p>' + tersBirimOran.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' ' + birim2 + ' / 1 ' + birim1 + '</p>' +
        '<p><strong>Oran:</strong> ' + miktar1.toLocaleString('tr-TR') + ' ' + birim1 + ' : ' + miktar2.toLocaleString('tr-TR') + ' ' + birim2 + '</p>';
    sonuc.classList.add('visible');
}

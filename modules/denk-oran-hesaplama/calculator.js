function hcDenkOranHesapla() {
    var a = parseFloat(document.getElementById('hc-dor-a').value);
    var b = parseFloat(document.getElementById('hc-dor-b').value);
    var c = parseFloat(document.getElementById('hc-dor-c').value);
    var dStr = document.getElementById('hc-dor-d').value.trim();
    var sonuc = document.getElementById('hc-denk-oran-hesaplama-result');
    var d = dStr === '' ? null : parseFloat(dStr);
    if (isNaN(a) || isNaN(b) || isNaN(c)) { alert('Lütfen a, b ve c değerlerini girin.'); return; }
    if (b === 0 || a === 0) { alert('a ve b sıfır olamaz.'); return; }
    if (d === null) {
        d = (b * c) / a;
        sonuc.innerHTML =
            '<p><strong>a : b = c : d</strong></p>' +
            '<p><strong>' + a + ' : ' + b + ' = ' + c + ' : ?</strong></p>' +
            '<p class="hc-result-value">d = ' + d.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>' +
            '<p><strong>Denkleme göre:</strong> d = b × c / a = ' + b + ' × ' + c + ' / ' + a + '</p>';
    } else {
        var denkmi = Math.abs(a / b - c / d) < 1e-9;
        sonuc.innerHTML =
            '<p><strong>a : b = c : d</strong> → <strong>' + a + ' : ' + b + ' = ' + c + ' : ' + d + '</strong></p>' +
            '<p class="hc-result-value">' + (denkmi ? '✅ Oranlar denktir.' : '❌ Oranlar denk değildir.') + '</p>' +
            '<p>' + a + '/' + b + ' = ' + (a/b).toLocaleString('tr-TR', {maximumFractionDigits:4}) + ' &nbsp;|&nbsp; ' + c + '/' + d + ' = ' + (c/d).toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>';
    }
    sonuc.classList.add('visible');
}

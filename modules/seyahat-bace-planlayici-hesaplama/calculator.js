function hcSeyahatButceHesapla() {
    var gun = parseInt(document.getElementById('hc-sbp-gun').value) || 0;
    var ulasim = parseFloat(document.getElementById('hc-sbp-ulasim').value) || 0;
    var otel = parseFloat(document.getElementById('hc-sbp-otel').value) || 0;
    var yasam = parseFloat(document.getElementById('hc-sbp-yasam').value) || 0;
    var vize = parseFloat(document.getElementById('hc-sbp-vize').value) || 0;

    if (gun <= 0) {
        alert('Lütfen seyahat süresini giriniz.');
        return;
    }

    var otelTop = otel * gun;
    var yasamTop = yasam * gun;
    var toplam = ulasim + otelTop + yasamTop + vize;
    var gunluk = toplam / gun;

    document.getElementById('hc-sbp-res-otel').innerText = otelTop.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-sbp-res-yasam').innerText = yasamTop.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-sbp-res-toplam').innerText = toplam.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-sbp-res-gunluk').innerText = gunluk.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-sbp-result').classList.add('visible');
}
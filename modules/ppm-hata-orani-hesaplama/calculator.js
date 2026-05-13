function hcPpmHataHesapla() {
    const defects = parseFloat(document.getElementById('hc-ppm-defects').value);
    const total = parseFloat(document.getElementById('hc-ppm-total').value);
    const resultDiv = document.getElementById('hc-ppm-hata-orani-hesaplama-result');

    if (isNaN(defects) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli sayılar giriniz (Toplam parça sayısı > 0 olmalıdır).');
        return;
    }

    const ppm = (defects / total) * 1000000;
    const percent = (defects / total) * 100;

    document.getElementById('hc-ppm-res-value').innerText = ppm.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + " PPM";
    document.getElementById('hc-ppm-res-percent').innerText = `Yüzde (%) Oranı: %${percent.toLocaleString('tr-TR', {maximumFractionDigits: 6})}`;

    resultDiv.classList.add('visible');
}

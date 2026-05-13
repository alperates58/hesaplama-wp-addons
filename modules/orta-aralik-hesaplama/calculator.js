function hcOrtaAralikHesapla() {
    const dataText = document.getElementById('hc-mr-data').value.trim();
    const resultDiv = document.getElementById('hc-orta-aralik-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri setini giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n));

    if (numbers.length < 1) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    const min = Math.min(...numbers);
    const max = Math.max(...numbers);
    const midrange = (min + max) / 2;

    document.getElementById('hc-mr-res-value').innerText = midrange.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-mr-res-minmax').innerText = `En Küçük: ${min.toLocaleString('tr-TR')} | En Büyük: ${max.toLocaleString('tr-TR')}`;

    resultDiv.classList.add('visible');
}

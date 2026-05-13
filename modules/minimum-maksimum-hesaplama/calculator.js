function hcMinMaxHesapla() {
    const dataText = document.getElementById('hc-minmax-data').value.trim();
    const resultDiv = document.getElementById('hc-minimum-maksimum-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri setini giriniz.');
        return;
    }

    const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n));
    if (nums.length === 0) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    const min = Math.min(...nums);
    const max = Math.max(...nums);
    const range = max - min;

    document.getElementById('hc-minmax-res-min').innerText = min.toLocaleString('tr-TR');
    document.getElementById('hc-minmax-res-max').innerText = max.toLocaleString('tr-TR');
    document.getElementById('hc-minmax-res-range').innerText = `Aralık (Range): ${range.toLocaleString('tr-TR')}`;

    resultDiv.classList.add('visible');
}

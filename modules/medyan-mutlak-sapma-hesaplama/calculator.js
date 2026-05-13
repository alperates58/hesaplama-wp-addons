function hcMmadHesapla() {
    const dataText = document.getElementById('hc-mmad-data').value.trim();
    const resultDiv = document.getElementById('hc-medyan-mutlak-sapma-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri giriniz.');
        return;
    }

    const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n)).sort((a, b) => a - b);
    if (nums.length === 0) {
        alert('Geçerli sayılar giriniz.');
        return;
    }

    function getMedian(arr) {
        const sorted = [...arr].sort((a, b) => a - b);
        const mid = Math.floor(sorted.length / 2);
        return sorted.length % 2 !== 0 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }

    const medianVal = getMedian(nums);
    const absDiffs = nums.map(x => Math.abs(x - medianVal));
    const mad = getMedian(absDiffs);

    document.getElementById('hc-mmad-res-val').innerText = mad.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-mmad-res-median').innerText = `Veri Seti Medyanı: ${medianVal.toLocaleString('tr-TR')}`;

    resultDiv.classList.add('visible');
}

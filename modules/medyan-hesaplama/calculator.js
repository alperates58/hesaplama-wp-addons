function hcMedyanHesapla() {
    const dataText = document.getElementById('hc-median-data').value.trim();
    const resultDiv = document.getElementById('hc-medyan-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri giriniz.');
        return;
    }

    const nums = dataText.split(/[,;\s\t\n]+/).map(n => parseFloat(n)).filter(n => !isNaN(n)).sort((a, b) => a - b);
    if (nums.length === 0) {
        alert('Geçerli sayılar giriniz.');
        return;
    }

    const n = nums.length;
    let median;
    if (n % 2 !== 0) {
        median = nums[Math.floor(n / 2)];
    } else {
        median = (nums[n / 2 - 1] + nums[n / 2]) / 2;
    }

    document.getElementById('hc-median-res-val').innerText = median.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-median-res-sorted').innerText = `Sıralanmış Veri: ${nums.join(', ')}`;

    resultDiv.classList.add('visible');
}

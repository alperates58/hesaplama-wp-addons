function hcHarmMeanHesapla() {
    const raw = document.getElementById('hc-ha-data').value;
    const nums = raw.split(/[\s,]+/).map(n => parseFloat(n.trim())).filter(n => !isNaN(n) && n > 0);

    if (nums.length === 0) {
        alert('Lütfen geçerli pozitif sayılar giriniz.');
        return;
    }

    let sumReciprocal = 0;
    for (let n of nums) {
        sumReciprocal += (1 / n);
    }

    const result = nums.length / sumReciprocal;

    document.getElementById('hc-ha-res-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-harm-mean-result').classList.add('visible');
}

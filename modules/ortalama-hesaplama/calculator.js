function hcAverageHesapla() {
    const input = document.getElementById('hc-avg-input').value;
    const nums = input.replace(/,/g, ' ').split(/\s+/).map(n => parseFloat(n)).filter(n => !isNaN(n));

    if (nums.length === 0) {
        alert('Lütfen en az bir sayı giriniz.');
        return;
    }

    const sum = nums.reduce((a, b) => a + b, 0);
    const avg = sum / nums.length;

    document.getElementById('hc-avg-res-val').innerText = avg.toLocaleString('tr-TR');
    document.getElementById('hc-avg-sum').innerText = sum.toLocaleString('tr-TR');
    document.getElementById('hc-avg-count').innerText = nums.length;
    document.getElementById('hc-average-result').classList.add('visible');
}

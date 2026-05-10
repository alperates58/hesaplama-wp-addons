function hcAdditionHesapla() {
    const input = document.getElementById('hc-a-input').value;
    const nums = input.replace(/,/g, ' ').split(/\s+/).map(n => parseFloat(n)).filter(n => !isNaN(n));

    if (nums.length === 0) {
        alert('Lütfen en az bir sayı giriniz.');
        return;
    }

    const sum = nums.reduce((a, b) => a + b, 0);

    document.getElementById('hc-a-res-val').innerText = sum.toLocaleString('tr-TR');
    document.getElementById('hc-toplama-result').classList.add('visible');
}

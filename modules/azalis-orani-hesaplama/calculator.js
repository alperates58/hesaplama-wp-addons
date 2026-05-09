function hcAzalisHesapla() {
    const oldVal = parseFloat(document.getElementById('hc-dr-old').value);
    const newVal = parseFloat(document.getElementById('hc-dr-new').value);

    if (isNaN(oldVal) || isNaN(newVal)) {
        alert('Lütfen her iki değeri de girin.');
        return;
    }

    if (oldVal === 0) {
        alert('İlk değer 0 olamaz.');
        return;
    }

    const diff = oldVal - newVal;
    const percentage = (diff / oldVal) * 100;

    document.getElementById('hc-res-dr-val').innerText = '%' + percentage.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-dr-diff').innerText = diff.toLocaleString('tr-TR');

    document.getElementById('hc-dr-result').classList.add('visible');
}

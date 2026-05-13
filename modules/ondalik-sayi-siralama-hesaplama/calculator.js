function hcOndalikSiralamaHesapla() {
    const dataText = document.getElementById('hc-os-data').value.trim();
    const order = document.getElementById('hc-os-order').value;
    const resContent = document.getElementById('hc-os-res-content');
    const resultDiv = document.getElementById('hc-ondalik-sayi-siralama-hesaplama-result');

    if (!dataText) {
        alert('Lütfen sayıları giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => n.replace(',', '.'))
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n));

    if (numbers.length < 1) {
        alert('Geçerli sayılar giriniz.');
        return;
    }

    if (order === 'asc') {
        numbers.sort((a, b) => a - b);
    } else {
        numbers.sort((a, b) => b - a);
    }

    resContent.innerHTML = numbers.map(n => `<span class="hc-os-badge">${n.toLocaleString('tr-TR')}</span>`).join(' ');

    resultDiv.classList.add('visible');
}

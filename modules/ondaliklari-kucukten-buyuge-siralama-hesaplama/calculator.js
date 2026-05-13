function hcOndalikSirala() {
    const dataText = document.getElementById('hc-sort-data').value.trim();
    const resList = document.getElementById('hc-sort-res-list');
    const resultDiv = document.getElementById('hc-ondaliklari-kucukten-buyuge-siralama-hesaplama-result');

    if (!dataText) {
        alert('Lütfen sayıları giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => n.replace(',', '.')) // Handle Turkish comma decimal if present
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n));

    if (numbers.length < 1) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    numbers.sort((a, b) => a - b);

    resList.innerHTML = numbers.map(n => `<span class="hc-sort-item">${n.toLocaleString('tr-TR')}</span>`).join(' <span class="hc-sort-sep">→</span> ');

    resultDiv.classList.add('visible');
}

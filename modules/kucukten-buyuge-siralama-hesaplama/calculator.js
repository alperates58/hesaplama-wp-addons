function hcSiralamaHesapla() {
    const input = document.getElementById('hc-sort-input').value;
    const data = input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));

    if (data.length === 0) {
        alert('Lütfen geçerli sayılar girin.');
        return;
    }

    const sorted = [...data].sort((a, b) => a - b);
    const sum = sorted.reduce((acc, n) => acc + n, 0);

    document.getElementById('hc-sorted-list').innerText = sorted.map(n => n.toLocaleString('tr-TR')).join(' < ');
    document.getElementById('hc-res-sort-count').innerText = sorted.length.toLocaleString('tr-TR');
    document.getElementById('hc-res-sort-sum').innerText = sum.toLocaleString('tr-TR');

    document.getElementById('hc-kucukten-buyuge-result').classList.add('visible');
}

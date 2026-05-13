function hcStandartHataHesapla() {
    const sigma = parseFloat(document.getElementById('hc-se-sigma').value);
    const n = parseInt(document.getElementById('hc-se-n').value);
    const resultDiv = document.getElementById('hc-orneklem-ortalamasi-standart-sapmasi-hesaplama-result');

    if (isNaN(sigma) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler giriniz (n > 0 olmalıdır).');
        return;
    }

    const se = sigma / Math.sqrt(n);

    document.getElementById('hc-se-res-value').innerText = se.toLocaleString('tr-TR', {maximumFractionDigits: 4});
    document.getElementById('hc-se-res-desc').innerText = `Örneklem ortalaması, popülasyon ortalamasından standart olarak ${se.toLocaleString('tr-TR', {maximumFractionDigits: 4})} birim sapma gösterebilir.`;

    resultDiv.classList.add('visible');
}
